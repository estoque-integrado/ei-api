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
     * Criar produto
     *
     * Cria um produto
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam estoque array Array de estoque <br><i><small>
     * [{ <br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"sku":"sku-produto", <small>// obrigatório, exceto para atualizar</small><br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"quantidade":5, <small>// obrigatório</small><br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"valor_venda":1899.90, <small>// obrigatório</small><br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"valor_custo":1899.90<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"valor_promocional":1899.90<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"dt_inicio_promocao": "25/10/2021 15:00:00"<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"dt_fim_promocao": "26/10/2021 15:00:00"<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"cor_id":356<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"tamanho_id":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"peso":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"largura":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"altura":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"comprimento":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"diametro":199<br>
     * },<br>
     * {<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"sku":"sku-produto",<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;[...] <br>
     * }]
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
     *      "slug": "slug-do-produto",
     *      "estoque": [
     *          "id":1,
     *          "sku":"sku-produto",
     *          "quantidade":10,
     *          "tamanho_id":15,
     *          "cor_id":11,
     *      ]
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

            // Slug
            if ($request->input('slug_auto')) {
                // Cria o slug
                $inputs['slug'] = $this->slugify($request->input('nome'), '\App\Models\Product');
            }

            // Cria o produto
            $product = Product::create($inputs);

            // Salva o estoque
            if ($request->input('estoque')) {
                foreach ($request->input('estoque') as $stock) {
                    $stock['produto_id'] = $product->id;
                    $stock['valor_venda'] = $this->formatarValor($stock['valor_venda']);
                    $stock['valor_custo'] = $this->formatarValor($stock['valor_custo'] ?? null);
                    $stock['valor_promocional'] = $this->formatarValor($stock['valor_promocional'] ?? null);
                    $stock['dt_inicio_promocao'] = $this->formatarData($stock['dt_inicio_promocao'] ?? null);
                    $stock['dt_fim_promocao'] = $this->formatarData($stock['dt_fim_promocao'] ?? null);
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
     * [{ <br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"id":11,<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"sku":"sku-produto",<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"quantidade":5,<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"valor_venda":1899.90<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"cor_id":356<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"tamanho_id":199<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"dt_inicio_promocao": "25/10/2021 15:00:00"<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"dt_fim_promocao": "25/10/2021 15:00:00"<br>
     * },<br>
     * {<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"id":11,<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;"sku":"sku-produto",<br>
     *      &nbsp;&nbsp;&nbsp;&nbsp;[...] <br>
     * }]
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
     *      "slug": "slug-do-produto",
     *      "estoque": [
     *          "id":1,
     *          "sku":"sku-produto",
     *          "quantidade":10,
     *          "tamanho_id":15,
     *          "cor_id":11,
     *      ]
     *      [...]
     * }
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        $request['id'] = $request->route('id');

        $this->validate(
            $request,
            Product::getValidationRules($id),
            Product::getValidationMessages()
        );

        if (!Product::where(['id' => $id, 'empresa_id' => $request->company->id])->first())
            return response(['message' => 'Produto não encontrado!'], 404);

        if (!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        $inputs = $request->except('imagens', 'api_token', 'dominio', 'estoque');


        // Estoque
        if ($request->input('estoque')) {
            foreach ($request->input('estoque') as $stock) {
                $stock['produto_id'] = $id;
                $stock['valor_venda'] = $this->formatarValor($stock['valor_venda']);
                $stock['valor_custo'] = $this->formatarValor($stock['valor_custo'] ?? null);
                $stock['valor_promocional'] = $this->formatarValor($stock['valor_promocional'] ?? null);
                $stock['dt_inicio_promocao'] = $this->formatarData($stock['dt_inicio_promocao'] ?? null);
                $stock['dt_fim_promocao'] = $this->formatarData($stock['dt_fim_promocao'] ?? null);
                Stock::updateOrCreate(['id' => $stock['id'] ?? null], $stock);
            }
        }

        // imagens
        if ($request->imagens) {
            /**
             * @TODO Definir onde serão salvas as imagens, servidor ou s3
             */
        }

        Product::where('id', $id)->update($inputs);

        return Product::where('id', $id)->with('stock')->first();
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
