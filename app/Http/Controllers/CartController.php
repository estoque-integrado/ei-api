<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
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
     * Criar item no carrinho
     *
     * Cria um item no carrinho
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam produto_id integer required ID do produto
     * @bodyParam quantidade integer required Quantidade de produtos
     * @bodyParam cor_id integer ID da cor
     * @bodyParam tamanho_id integer ID da tamanho
     *
     * @group Carrinho
     * @athenticated
     *
     * @response {
     *      "id":1,
     *      "user_id": 3,
     *      "empresa_id": 2,
     *      "produto_id": 2313,
     *      "cor_id": null,
     *      "tamanho_id": 645,
     *      "quantidade": 1,
     *      "valor_produto": 199.88,
     *      "subtotal": 199.88
     * }
     */
    public function addCartItem(Request $request)
    {
        $loggedUser = Auth::user();
        $request['user_id'] = $loggedUser->id;
        $request['empresa_id'] = $request->company->id;

        $this->validate(
            $request,
            Cart::getValidationRules(),
            Cart::getValidationMessages()
        );

        try {

            $product = Product::where([
                'id' => $request->produto_id,
                'empresa_id' => $request->empresa_id
            ])->first();

            if (!$product)
                return response(['message' => 'Produto não encontrado!'], 404);

            // Verifica se ja existe esse produto no carrinho
            $carrinho = Cart::where(['user_id' => $loggedUser->id, 'produto_id' => $product->id])->first();

            $request['valor_produto'] = $product->getSaleValue($request->tamanho_id, $request->cor_id);

            if ($carrinho) {
                $carrinho->quantidade += $request->quantidade;
                $carrinho->subtotal = $product->getSaleValue($request->tamanho_id, $request->cor_id) * $carrinho->quantidade;
                $carrinho->save();

                return $carrinho;
            } else {
                $request['subtotal'] = $product->getSaleValue($request->tamanho_id, $request->cor_id) * $request->quantidade;
                return Cart::create($request->except('api_token', 'dominio'));
            }

        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Aumentar quantidade item carrinho
     *
     * Soma 1 ao valor da quantidade do item do carrinho
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam product_id integer required ID do produto
     * @bodyParam cor_id integer ID da cor
     * @bodyParam tamanho_id integer ID da tamanho
     *
     * @group Carrinho
     * @authenticated
     *
     * @response {
     *      "id":1,
     *      "user_id": 3,
     *      "empresa_id": 2,
     *      "produto_id": 2313,
     *      "cor_id": null,
     *      "tamanho_id": 645,
     *      "quantidade": 1,
     *      "valor_produto": 199.88,
     *      "subtotal": 199.88
     * }
     */
    public function sumCartItem(Request $request)
    {
        $carrinho = Cart::where([
            'user_id' => Auth::user()->id,
            'produto_id' => $request->produto_id,
            'cor_id' => $request->cor_id,
            'tamanho_id' => $request->tamanho_id,
        ])->first();

        if (!$carrinho) return response(['message' => 'Carrinho não encontrado!'], 404);

        $carrinho->quantidade++;
        $carrinho->subtotal = $carrinho->valor_produto * $carrinho->quantidade;
        $carrinho->save();
        return $carrinho;
    }

    /**
     * Diminuir quantidade item carrinho
     *
     * reduz 1 do valor da quantidade do item do carrinho
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam product_id integer required ID do produto
     * @bodyParam cor_id integer ID da cor
     * @bodyParam tamanho_id integer ID da tamanho
     *
     * @group Carrinho
     * @authenticated
     *
     * @response {
     *      "id":1,
     *      "user_id": 3,
     *      "empresa_id": 2,
     *      "produto_id": 2313,
     *      "cor_id": null,
     *      "tamanho_id": 645,
     *      "quantidade": 1,
     *      "valor_produto": 199.88,
     *      "subtotal": 199.88
     * }
     */
    public function reduceCartItem(Request $request)
    {
        $carrinho = Cart::where([
            'user_id' => Auth::user()->id,
            'produto_id' => $request->produto_id,
            'cor_id' => $request->cor_id,
            'tamanho_id' => $request->tamanho_id,
        ])->first();

        if (!$carrinho) return response(['message' => 'Carrinho não encontrado!'], 404);

        $carrinho->quantidade--;
        $carrinho->subtotal = $carrinho->valor_produto * $carrinho->quantidade;
        $carrinho->save();
        return $carrinho;
    }

    /**
     * Deletar item do carrinho
     *
     * Deleta um item do carrinho
     *
     * @urlParam id integer required ID do carrinho
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Carrinho
     * @authenticated
     *
     * @response {
     *      "message":"Produto deletado do carrinho!",
     * }
     */
    public function deleteCartItem(Request $request, $id)
    {
        try {

            // Verifica se ja existe esse produto no carrinho
            $carrinho = Cart::where(['user_id' => Auth::user()->id, 'id' => $id])->first();

            if (!$carrinho) return response(['message' => 'Carrinho não encontrado!'], 404);

            $carrinho->delete();

            return response(['message' => 'Item deletado!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
