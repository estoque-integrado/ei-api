<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
     * Criar produto
     *
     * Cria um produto
     *
     * @bodyParam empresa_id integer required ID da empresa proprietária do produto
     * @bodyParam categoria_id integer required ID da categoria cadastrada e ativa do produto
     * @bodyParam nome string required Nome do produto
     * @bodyParam imagens array Array de fotos do produto. <i><small>Maximo: 5 fotos</i></small>
     * @bodyParam slug string required Slug do produto <br><i><small>Ex: calca_preta_jeans</i></small>
     * @bodyParam sku string required Sku do produto <br><i><small>Ex: CAMPM20211013</i></small>
     * @bodyParam descricao_curta string Descrição simples do produto
     * @bodyParam descricao_completa string Descrição detalhada do produto
     * @bodyParam preco_custo float Preço de custo do produto <br><i><small>Ex: 80.00</i></small>
     * @bodyParam preco_venda float required Preço de venda do produto <br><i><small>Ex: 120.00</i></small>
     * @bodyParam preco_promocional float Preço promocional do produto <br><i><small>Ex: 99.90</i></small>
     * @bodyParam peso integer Peso do produto em Gramas <br><i><small>Ex: 100</i></small>
     * @bodyParam altura integer Altura do produto em Cm <br><i><small>Ex: 80</i></small>
     * @bodyParam largura integer Largura do produto em Cm <br><i><small>Ex: 50</i></small>
     * @bodyParam diametro integer Diametro do produto
     * @bodyParam comprimento integer Comprimento do produto
     * @bodyParam titulo_seo string Titiulo SEO do produto
     * @bodyParam tags_seo string Tags SEO do produto
     * @bodyParam descricao_seo string Descrição SEO do produto
     * @bodyParam ativo boolean Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</i></small>
     * @bodyParam destaque boolean Se o produto é destaque. <i><small>Default 0</i></small>
     * @bodyParam variacao_preco_cor boolean Se o valor do produto varia de acordo com a cor. Default 0
     * @bodyParam variacao_preco_tamanho boolean Se o valor do produto varia de acordo com o tamanho. Default 0
     *
     * @group Produtos
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "Nome produto",
     *      "preco_venda": "",
     *      "preco_promocional": ""
     *      [...]
     * }
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Product::getValidationRules(),
            Product::getValidationMessages()
        );

        try {
            if (!$this->userCanEditCompany($request->company->id))
                return response(['message' => 'Empresa não pertence ao usuário.'], 403);

            $inputs = $request->except('imagens', 'estoque');
            $inputs['preco_venda'] = isset($inputs['preco_venda']) ? $this->formatarValor($inputs['preco_venda'], false) : null;
            $inputs['preco_promocional'] = isset($inputs['preco_promocional']) ? $this->formatarValor($inputs['preco_promocional'], false) : null;
            $inputs['preco_custo'] = isset($inputs['preco_custo']) ? $this->formatarValor($inputs['preco_custo'], false) : null;

            // Slug
            if ($request->input('slug_auto')) {
                // Cria o slug
                $inputs['slug'] = $this->slugify($request->input('nome'), '\App\Models\Product');
            }

            // Estoque
            if ($inputs['estoque']) {

            }

            // imagens
            if ($request->imagens) {
                /**
                 * @TODO Definir onde serão salvas as imagens, servidor ou s3
                 */
            }

            $product = Product::create($inputs);

            return $product;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Detalhes do produto
     *
     * Retorna os detalhes de um produto
     *
     * @group Produtos
     * @unauthenticated
     * @urlParam id integer required ID do produto
     * @param Request $request
     */
    public function view(Request $request, $id)
    {
        try {
//            if (!$this->userCanEditCompany($id))
//                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $product = Product::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

            if (!$product)
                return response(['message' => 'Produto não encontrado!'], 404);

            return $product;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar produto
     *
     * Atualiza os dados de um produto
     *
     * @bodyParam categoria_id integer required ID da categoria cadastrada e ativa do produto
     * @bodyParam nome string required Nome do produto
     * @bodyParam imagens array Array de fotos do produto. <i><small>Maximo: 5 fotos</i></small>
     * @bodyParam slug string required Slug do produto <br><i><small>Ex: calca_preta_jeans</i></small>
     * @bodyParam sku string required Sku do produto <br><i><small>Ex: CAMPM20211013</i></small>
     * @bodyParam descricao_curta string Descrição simples do produto
     * @bodyParam descricao_completa string Descrição detalhada do produto
     * @bodyParam preco_custo float Preço de custo do produto <br><i><small>Ex: 80.00</i></small>
     * @bodyParam preco_venda float required Preço de venda do produto <br><i><small>Ex: 120.00</i></small>
     * @bodyParam preco_promocional float Preço promocional do produto <br><i><small>Ex: 99.90</i></small>
     * @bodyParam peso integer Peso do produto em Gramas <br><i><small>Ex: 100</i></small>
     * @bodyParam altura integer Altura do produto em Cm <br><i><small>Ex: 80</i></small>
     * @bodyParam largura integer Largura do produto em Cm <br><i><small>Ex: 50</i></small>
     * @bodyParam diametro integer Diametro do produto
     * @bodyParam comprimento integer Comprimento do produto
     * @bodyParam titulo_seo string Titiulo SEO do produto
     * @bodyParam tags_seo string Tags SEO do produto
     * @bodyParam descricao_seo string Descrição SEO do produto
     * @bodyParam ativo boolean Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</i></small>
     * @bodyParam destaque boolean Se o produto é destaque. <i><small>Default 0</i></small>
     * @bodyParam variacao_preco_cor boolean Se o valor do produto varia de acordo com a cor. Default 0
     * @bodyParam variacao_preco_tamanho boolean Se o valor do produto varia de acordo com o tamanho. Default 0
     *
     * @group Produtos
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "Nome produto",
     *      "preco_venda": "",
     *      "preco_promocional": ""
     *      [...]
     * }
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            Product::getValidationRules($id),
            Product::getValidationMessages()
        );

        if (!Product::find($id))
            return response(['message' => 'Produto não encontrado!'], 404);

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        $inputs = $request->except('imagens', 'empresa_id', 'api_token');

        $inputs['preco_venda'] = isset($inputs['preco_venda']) ?
            $this->formatarValor($inputs['preco_venda'], false) : null;
        $inputs['preco_promocional'] = isset($inputs['preco_promocional']) ?
            $this->formatarValor($inputs['preco_promocional'], false) : null;
        $inputs['preco_custo'] = isset($inputs['preco_custo']) ?
            $this->formatarValor($inputs['preco_custo'], false) : null;

        // imagens
        if ($request->imagens) {
            /**
             * @TODO Definir onde serão salvas as imagens, servidor ou s3
             */
        }

        Product::where('id', $id)->update($inputs);

        return Product::find($id);
    }

    /**
     * Deletar Produto
     *
     * Deleta um produto com softDeletes
     *
     * @group Produtos
     * @authenticated
     * @urlParam id integer required ID do produto
     * @param Request $request
     */
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product)
            return response(['message' => 'Produto não encontrado!'], 404);

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        $product->delete();

        return response(['message' => 'Produto deletado!'], 200);
    }


}
