<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
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
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
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
            $inputs['empresa_id'] = $request->company->id;
            $inputs['preco_venda'] = isset($inputs['preco_venda']) ? $this->formatarValor($inputs['preco_venda'], false) : null;
            $inputs['preco_promocional'] = isset($inputs['preco_promocional']) ? $this->formatarValor($inputs['preco_promocional'], false) : null;
            $inputs['preco_custo'] = isset($inputs['preco_custo']) ? $this->formatarValor($inputs['preco_custo'], false) : null;

            // Slug
            if ($request->input('slug_auto')) {
                // Cria o slug
                $inputs['slug'] = $this->slugify($request->input('nome'), '\App\Models\Product');
            }

            // Cria o produto
            $product = Product::create($inputs);

            // Estoque
            if ($request->input('estoque')) {
                foreach ($request->input('estoque') as $stock) {
                    $stock['dt_inicio_promocao'] = $this->formatarData($stock['dt_inicio_promocao']);
                    $stock['dt_fim_promocao'] = $this->formatarData($stock['dt_fim_promocao']);
                    $stock['produto_id'] = $product->id;
                    Stock::create($stock);
                }
            }
            $product->stock;

            // imagens
            if ($request->imagens) {
                /**
                 * @TODO Definir onde serão salvas as imagens, servidor ou s3
                 */
            }

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
     * @urlParam idOrSlug integer|string required ID ou slug do produto
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Produtos
     * @unauthenticated
     * @param Request $request
     */
    public function view(Request $request, $idOrSlug)
    {
        try {
//            if (!$this->userCanEditCompany($id))
//                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $idOrSlugString = preg_match('/^(\d{1,})$/', $idOrSlug) ? 'id' : 'slug';

            $data = [
                'empresa_id' => $request->company->id,
                $idOrSlugString => $idOrSlug
            ];

            $product = Product::where($data)->with('colors', 'sizes', 'images')->first();
            $product->company;

            if (!$product)
                return response(['message' => 'Produto não encontrado!'], 404);

            return $product;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


//     * @bodyParam sku string required Sku do produto <br><i><small>Ex: CAMPM20211013</i></small>
//     * @bodyParam preco_custo float Preço de custo do produto <br><i><small>Ex: 80.00</i></small>
//     * @bodyParam preco_venda float required Preço de venda do produto <br><i><small>Ex: 120.00</i></small>
//     * @bodyParam preco_promocional float Preço promocional do produto <br><i><small>Ex: 99.90</i></small>
//     * @bodyParam peso integer Peso do produto em Gramas <br><i><small>Ex: 100</i></small>
//     * @bodyParam altura integer Altura do produto em Cm <br><i><small>Ex: 80</i></small>
//     * @bodyParam largura integer Largura do produto em Cm <br><i><small>Ex: 50</i></small>
//     * @bodyParam diametro integer Diametro do produto
//     * @bodyParam comprimento integer Comprimento do produto
    /**
     * Atualizar produto
     *
     * Atualiza os dados de um produto
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam estoque array Array de estoque <br><i><small>
     * { <br>
     *      "sku":"sku-produto",<br>
     *      "quantidade":5,<br>
     *      "valor_venda":1899.90<br>
     *      "dt_inicio_promocao": "25/10/2021 15:00:00"<br>
     *      "dt_fim_promocao": "25/10/2021 15:00:00"<br>
     * }
     * </small></i>
     * @bodyParam categoria_id integer required ID da categoria cadastrada e ativa do produto
     * @bodyParam nome string required Nome do produto
     * @bodyParam imagens array Array de fotos do produto. <i><small>Maximo: 5 fotos</i></small>
     * @bodyParam slug string required Slug do produto <br><i><small>Ex: calca_preta_jeans</i></small>
     * @bodyParam descricao_curta string Descrição simples do produto
     * @bodyParam descricao_completa string Descrição detalhada do produto
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

        if (!Product::where(['id' => $id, 'empresa_id' => $request->company->id])->first())
            return response(['message' => 'Produto não encontrado!'], 404);

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        $inputs = $request->except('imagens', 'empresa_id', 'api_token', 'dominio', 'estoque');

        $inputs['preco_venda'] = isset($inputs['preco_venda']) ?
            $this->formatarValor($inputs['preco_venda'], false) : null;
        $inputs['preco_promocional'] = isset($inputs['preco_promocional']) ?
            $this->formatarValor($inputs['preco_promocional'], false) : null;
        $inputs['preco_custo'] = isset($inputs['preco_custo']) ?
            $this->formatarValor($inputs['preco_custo'], false) : null;


        // Estoque
        if ($request->input('estoque')) {
            foreach ($request->input('estoque') as $stock) {
                $stock['dt_inicio_promocao'] = isset($stock['dt_inicio_promocao']) ? $this->formatarData($stock['dt_inicio_promocao']) : null;
                $stock['dt_fim_promocao'] = isset($stock['dt_fim_promocao']) ? $this->formatarData($stock['dt_fim_promocao']) : null;
                $stock['produto_id'] = $id;
//                $stock['id'] = $stock['id'];
//                return $stock;
                Stock::updateOrCreate(['id' => $stock['id']], $stock);
            }
        }

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
     * @urlParam id integer required ID do produto
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Produtos
     * @authenticated
     * @param Request $request
     */
    public function delete(Request $request, $id)
    {
        $product = Product::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

        if (!$product)
            return response(['message' => 'Produto não encontrado!'], 404);

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        $product->delete();

        return response(['message' => 'Produto deletado!'], 200);
    }


}
