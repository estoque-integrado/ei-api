<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

use Auth;

class SiteController extends Controller
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
     * Index da loja
     *
     * <aside>Retorna a loja de acordo com o domínio ou subdominio. <br>
     * Retorna dados, produtos, carrinho (se houver usuario logado) <br>
     * Ex: minhaempresa.estoqueintegrado.com.br
     * </aside>
     *
     * @bodyParam dominio string required Dominio da loja registrado no banco de dados. <br>
     * <i><small>Ex: minhaloja.estoqueintegrado.com.br | minhaloja.com.br | minhaloja</small>
     *
     * @group Site
     * @unauthenticated
     * @response {
     *      "id": 1,
     *      "nome":"Nome da empresa",
     *      "email":"email@estoqueintegrado.com",
     *      [...]
     *      "products": [
     *          {
     *              "id": 1,
     *              "nome":"Product 1",
     *              "sku":"CAMISAM_2021",
     *              [...]
     *          },
     *          {
     *              "id": 2,
     *              "nome":"Product 2",
     *              "sku":"BLUSAP321",
     *          }
     *      ],
     *      "cart": [
     *          {
     *              "id": 1,
     *              "produto_id":12,
     *              "empresa_id":99,
     *              "quantidade":2,
     *              [...]
     *          },
     *          [...]
     *      ]
     * }
     */
    public function index(Request $request)
    {
        $company = $request->company;
        $company->products = $company->getValidProducts();
//        $company->banners;

        // Verifica se existe usuário logado, se existir, verifica se esse tem itens no carrinho
        $loggedUser = Auth::user();
        if ($loggedUser) {
            $cart = Cart::where(['user_id' => $loggedUser->id, 'empresa_id' => $company->id])->get();
            $company->cart = $cart;
        }

        return $company;
    }


    /**
     * Detalhes do produto
     *
     * Retorna os detalhes de um produto
     *
     * @urlParam idOrSlug integer|string required ID ou slug do produto
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Site
     * @unauthenticated
     * @param Request $request
     */
    public function viewProduct(Request $request, $idOrSlug)
    {
        try {
            $isId = preg_match('/^(\d{1,})$/i', $idOrSlug) ? true : false;

            $data = [
                'empresa_id' => $request->company->id
            ];
            $data[$isId ? 'id' : 'slug'] = $idOrSlug;

            $product = Product::where($data)->first();

            if (!$product)
                return response(['message' => 'Produto não encontrado!'], 404);

            $request->company->product = $product;


            return $request->company;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
