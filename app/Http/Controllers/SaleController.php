<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Criar venda
     *
     * Salva uma nova venda presencial
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam user_id integer ID do cliente, caso ja esteja cadastrado
     * @bodyParam nome string Nome ou email ou cpf do cliente para futuros descontos ou relatórios, caso não queira informar dados
     * @bodyParam vendedor_id integer ID do vendedor, se houver
     * @bodyParam forma_pagamento string required Forma pagamento aceitas: <br>
     * <i><small>dinheiro|cartao_credito|cartao_debito|crediario|cheque</small></i>
     * @bodyParam entrada float Valor de entrada, se houver Ex: 1589.00
     * @bodyParam parcelas integer Quantidade de parcelas. Default: 1
     * @bodyParam desconto_juros string Se foi aplicado desconto ou juros no valor.
     * <i><small>valores aceitos: desconto | juros</small></i>
     * @bodyParam desconto_percentual boolean Se o desconto aplicado foi em percentual(%) ou reais(R$).
     * <i><small>1 = desconto aplicado em percentual(%) | 0 = desconto aplicado em reais(R$)</small></i>
     * @bodyParam desconto_juros_valor float Valor do desconto ou juros aplicado.
     * @bodyParam produtos array required Array de produtos <br>
     * [<br>
     * {<br>
     *      "id":11,
     *      "quantidade":3,
     *      "cor_id": 43,
     *      "tamanho_id": 56
     * <br>},
     * <br>{
     *      "id":45,
     *      "quantidade":1,
     *      "cor_id": null,
     *      "tamanho_id": 157
     * <br>}
     * <br>]
     *
     * @group Venda Presencial
     * @authenticated
     * @response {
     *      "id":1,
     *      "user_id":22,
     *      "entrada":200.00,
     *      "forma_pagamento":"dinheiro",
     *      "vendedor": {
                "nome":"Nome do vendedor",
                "comissao":10,
     *      }
     * }
     */
    public function create(Request $request)
    {
        $request['empresa_id'] = $request->company->id;

        $this->validate(
            $request,
            Sale::getValidationRules(),
            Sale::getValidationMessages()
        );

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $sale = DB::transaction(function () use ($request) {
                $totalOrder = 0.0;
                $idsProductsSold = [];
                $loggedUser = Auth::user();

                // Cria a venda
                $sale = Sale::create([
                    'empresa_id' => $request->company->id,
                    'forma_pagamento' => $request->forma_pagamento,
                    'desconto_juros_valor' => $request->desconto_juros_valor ?? null,
                    'desconto_juros' => $request->desconto_juros ?? null,
                    'desconto_percentual' => $request->desconto_percentual ?? null,
                    'parcelas' => $request->parcelas ?? 1,
                    'entrada' => $request->entrada ?? null,
                    'subtotal' => 0.0,
                    'total' => 0.0,
                ]);

                foreach ($request->produtos as $itemSale) {
                    $cor_id = $itemSale['cor_id'] ?? null;
                    $tamanho_id = $itemSale['tamanho_id'] ?? null;
                    $product = Product::where(['id' => $itemSale['id'], 'empresa_id' => $request->company->id])->first();

                    if (!$product)
                        throw new \Exception("Produto ID: {$itemSale['id']} não encontrado!", 404);

                    // Verifica se existe o estoque
                    $stock = $product->stock($tamanho_id, $cor_id)->first();

                    if (!$stock)
                        throw new \Exception("Estoque do produto: {$product->nome}, tamanho_id: {$tamanho_id}, cor_id: {$cor_id} não foi encontrado!", 404);

                    // Verifica se existe a quantidade solicitada em estoque
                    if ($itemSale['quantidade'] > $stock->quantidade)
                        throw new \Exception("Quantidade em estoque insuficiente! Disponível: {$stock->quantidade}, solicitado: {$itemSale['quantidade']}");

                    /**
                     * Reduz estoque
                     * @TODO Reduzir item do estoque somente quando o pagamento for confirmado
                     */
//                    $stock->quantidade -= $itemSale->quantidade;
//                    $stock->save();

                    // Soma ao valor total do pedido
                    $totalItem = $itemSale['quantidade'] * $product->getSaleValue($tamanho_id, $cor_id);
                    $totalOrder += $totalItem;

                    // Adiciona o produto no array de produtos vendidos
                    $idsProductsSold[$product->id] = [
                        'quantidade' => $itemSale['quantidade'],
                        'tamanho_id' => $tamanho_id,
                        'cor_id' => $cor_id,
                        'valor' => $totalItem
                    ];
                }

                $sale->subtotal = $totalOrder;
                $sale->total = $totalOrder;

                if ($request->desconto_juros_valor)
                    $sale->total = $this->getFeeOrDiscount($request, $totalOrder);

                // Atualiza a venda com os valores
                $sale->save();

                // Associa os produtos à venda
                $sale->products()->sync($idsProductsSold);

                // Cria as parcelas
                $date = Carbon::now();
                for ($i = 1; $i <= $sale->parcelas; $i++) {
                    $dueDate = $date->addMonth(1);
                    $parcelValue = $sale->total / $sale->parcelas;

                    Statement::create([
                        'venda_id' => $sale->id,
                        'mes' => $dueDate->month,
                        'ano' => $dueDate->year,
                        'valor' => $parcelValue,
                        'data_vencimento' => $dueDate,
                        'pago' => false,
                        'obs' => "Parcela {$i} de {$sale->parcelas}",
                    ]);
                }

                Log::info("Venda efetuada por {$loggedUser->name}, " .
                    "empresa: {$request->company->nome}" .
                    "valor: {$sale->total}, " .
                    "desconto_juros_valor_juros: {$request->desconto_juros_valor}, " .
                    "desconto_juros: {$request->desconto_juros}, " .
                    "desconto_percentual: {$request->desconto_percentual}, " .
                    "produtos: " . json_encode($idsProductsSold)
                );

                return $sale;
            });

            $sale->products;
            $sale->statements;
            return $sale;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], $e->getCode() ?: 400);
        }
    }



    /**
     * Relatório das vendas
     *
     * Retorna os dados das vendas presenciais conforme os filtros passados
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam data_inicio date Data de inicio do relatório
     * @bodyParam data_fim date Data fim do relatório
     * @bodyParam cliente string Nome, email ou cpf do cliente
     * @bodyParam ordenar_por string valor, nome, data
     * @bodyParam ordem string asc = ascendente | desc = descendente. Default: asc
     *
     * @group Venda Presencial
     * @response {
     *
     * }
     */
    public function report(Request $request)
    {
        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $data[] = ['empresa_id', '=', $request->company->id];

            // Data de inicio
            if ($request->data_inicio)
                $data[] = ['created_at', '>=', $request->data_inicio];

            // Data fim
            if ($request->data_fim)
                $data[] = ['created_at', '<=', $request->data_fim];

            $sales = Sale::where($data);

            // Ordenar
            if ($request->ordenar_por)
                $sales->orderBy($request->ordenar_por, $request->ordem ?? 'asc');

            // Cliente
            if ($request->cliente) {
                $sales->where('nome', 'like', '%'. $request->cliente .'%')
                    ->orWhereHas('user', function ($query) use ($request) {
                       $query->where('name', 'like', '%'. $request->cliente .'%')
                           ->orWhere('cpf', 'like', '%'. $request->cliente .'%')
                           ->orWhere('email', 'like', '%'. $request->cliente .'%');
                });
            }

            return $sales->get();
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], $e->getCode() ?: 400);
        }
    }


    /**
     * Retorna o valor total $totalOrder calculando o juros ou desconto
     *
     * @param $request
     * @param $totalOrder
     * @return float|int
     */
    public function getFeeOrDiscount($request, $totalOrder)
    {
        // Verifica se existe desconto ou juros
        if ($request->desconto_juros == 'desconto') {
            $totalOrder -= $request->desconto_percentual ?
                ($totalOrder * $request->desconto_juros_valor) / 100 :
                $request->desconto_juros_valor;
        } else {
            $totalOrder += $request->desconto_percentual ?
                ($totalOrder * $request->desconto_juros_valor) / 100 :
                $request->desconto_juros_valor;
        }
        return $totalOrder;
    }
}
