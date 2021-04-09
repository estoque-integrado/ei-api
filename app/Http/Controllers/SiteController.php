<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Produto;
use App\Models\Carrinho;
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
     * Index loja
     *
     * <aside>Retorna a loja de acordo com o domínio ou subdominio. <br>
     * Retorna dados, produtos, carrinho (se houver usuario logado) <br>
     * Ex: minhaempresa.estoqueintegrado.com.br
     * </aside>
     *
     * @group Site
     * @unauthenticated
     * @response {
     *      "id": 1,
     *      "nome":"Nome da empresa"
     *      "email":"email@estoqueintegrado.com",
     *      [...]
     *      "products": [
     *          {
     *              "id": 1,
     *              "nome":"Produto 1"
     *              "sku":"CAMISAM_2021",
     *              [...]
     *          },
     *          {
     *              "id": 2,
     *              "nome":"Produto 2"
     *              "sku":"BLUSAP321",
     *          }
     *      ],
     *      "cart": [
     *          {
     *              "id": 1,
     *              "produto_id":12
     *              "empresa_id":99,
     *              "quantidade":2,
     *              [...]
     *          }
     *      ]
     * }
     */
    public function index(Request $request)
    {
        $company = $request->company;

        // Verifica se existe usuário logado, se existir, verifica se esse tem itens no carrinho
        $loggedUser = Auth::user();
        if ($loggedUser) {
            $cart = Carrinho::where(['user_id' => $loggedUser->id, 'empresa_id' => $company->id])->get();
            $company->cart = $cart;
        }

        return $company;
    }
}
