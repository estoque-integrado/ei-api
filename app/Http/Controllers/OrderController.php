<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
     * Cadastrar pedido
     *
     * Salvar um novo pedido
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam valor_frete float required Valor do frete
     * @bodyParam tipo_entrega string required Tipo de entrega: retirada|entrega
     * @bodyParam prazo_entrega string required Prazo de entrega
     * @bodyParam endereco_entrega_id integer required ID do endereço de entrega. Required se for entregar
     * @bodyParam desconto_codigo string Codigo do cupom de desconto
     * @bodyParam desconto_valor float Valor do desconto
     * @bodyParam desconto_percentual boolean Se o desconto aplicado é em percentual(%) ou valor(R$)
     * <br><i><small>1 = desconto aplicado em percentual (%) | 2 = desconto aplicado em valor (R$)</i></small>
     *
     * @group Site
     * @response scenario=success {
     *      "id":1,
     *      "user_id":1,
     *      "numero": 100256,
     *      "valor": 1849.90
     *      [...]
     * }
     */
    public function checkout(Request $request)
    {
        $loggedUser = Auth::user();

        $request['user_id'] = $loggedUser->id;
        $request['empresa_id'] = $request->company->id;
        $request['status_id'] = 1; // @TODO Definir Classe
        $request['numero'] = DB::select('select max(numero) as numero from pedidos')[0]->numero + 1;

        $this->validate(
            $request,
            Order::getValidationRules(),
            Order::getValidationMessages()
        );

        try {
            $cart = Cart::where([
                'user_id' => $loggedUser->id,
                'empresa_id' => $request->company->id
            ])->get();

            if (!$cart) return response(['message' => 'Carrinho não encontrado'], 404);

            $cartTotal = $cart->sum('subtotal');
            $request['valor'] = $cartTotal + $request['valor_frete'];

            // Verifica se tem desconto
            if ($request->desconto_codigo) {
                /**
                 * @TODO Aplicar cupom de desconto
                 */
            }

            $retorno = DB::transaction(function () use ($request, $cart, $loggedUser) {
                // Salva o pedido
                $order = Order::create($request->except('api_token', 'dominio'));

                foreach ($cart as $cartItem) {
                    OrderItem::create([
                        'produto_id' => $cartItem->produto_id,
                        'pedido_id' => $order->id,
                        'quantidade' => $cartItem->quantidade,
                        'valor' => $cartItem->subtotal,
                        'tamanho_id' => $cartItem->tamanho_id,
                        'cor_id' => $cartItem->cor_id
                    ]);
                }

                // Email loja
                $this->createJobSendMail(
                    'emails.novaVenda',
                    [
                        'user' => $loggedUser,
                        'empresa' => $order->company
                    ],
                    'Nova Venda @ estoqueintegrado.com'
                );

                // Email cliente
                $this->createJobSendMail(
                    'emails.confirmacaoCompra',
                    [
                        'user' => $loggedUser,
                        'empresa' => $order->company,
                        'pedido' => $order
                    ],
                    'Pedido Recebido @ estoqueintegrado.com'
                );

                // Limpar carrinho
//                Cart::where([
//                    'user_id' => $loggedUser->id,
//                    'empresa_id' => $request->company->id
//                ])->delete();
            });

            return $retorno;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }

    }
}
