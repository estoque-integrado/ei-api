<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
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
     * Criar categoria
     *
     * Cria uma categoria
     *
     * @bodyParam empresa_id integer required ID da empresa proprietária do produto
     * @bodyParam nome string required Nome da categoria
     * @bodyParam slug string required Slug do produto.
     * <br>Caracteres permitidos: número, texto, "-", "_" <br><i><small>Ex: casa-e-jardim | casa_e_jardim</small></i>
     * @bodyParam descricao string Descrição da categoria
     * @bodyParam imagem file Imagem da categoria
     * @bodyParam miniatura file Miniatura da imagem da categoria
     * @bodyParam ativo boolean Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</small></i>
     * @bodyParam slug_auto boolean Criar slug automaticamente; <br><i><small>Sim = 1, Não = 0</small></i>
     *
     * @group Categorias
     * @response {
     *      "id": 1,
     *      "nome": "Nome da categoria",
     *      "slug": "produtos-banho",
     *      "imagem": "caminho/da/imagem"
     *      [...]
     * }
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Category::getValidationRules(),
            Category::getValidationMessages()
        );

        if(!$this->userCanEditCompany($request->input('empresa_id')))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $inputs = $request->except('api_token', 'imagem');

            if ($request->input('slug_auto')) {
                // Cria o slug
                $inputs['slug'] = $this->slugify($request->input('nome'), '\App\Models\Category');
            }

            if ($request->file('imagem')) {
                /**
                 * @TODO Definir onde serão salvas as imagens, servidor ou s3
                 */
            }

            return Category::create($inputs);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Detalhes Categoria
     *
     * Retorna os detalhes da categoria
     *
     * @group Categorias
     * @urlParam id integer required ID da categoria
     * @param Request $request
     *
     * @response {
     *      "id": 1,
     *      "nome": "Nome da categoria",
     *      "slug": "produtos-beleza",
     *      "imagem": "caminho/da/imagem"
     *      [...]
     * }
     */
    public function view(Request $request, $id)
    {
        try {
            $category = Category::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

            if(!$category)
                return response(['message' => 'Categoria não encontrada!'], 404);

            if(!$this->userCanEditCompany($request->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            return $category;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar Categoria
     *
     * Atualiza os dados da categoria
     *
     * @group Categorias
     * @urlParam id integer required ID da categoria
     * @bodyParam nome string required Nome da categoria Ex: "Nome da categoria"
     * @bodyParam slug string Slug do produto Ex: calca_preta_jean
     * @bodyParam descricao string Descrição da categoria
     * @bodyParam imagem file Imagem da categoria
     * @bodyParam miniatura file Miniatura da imagem da categoria
     * @bodyParam ativo boolean Status do produto Ativo = 1, Desativado = 0. Default 1
     * @param Request $request
     *
     * @response {
     *      "id": 1,
     *      "nome": "Nome da categoria",
     *      "slug": "produtos-beleza",
     *      "imagem": "caminho/da/imagem"
     *      [...]
     * }
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            Category::getValidationRules($id),
            Category::getValidationMessages()
        );
        try {
            $category = Category::find($id);

            if(!$category)
                return response(['message' => 'Categoria não encontrada!'], 404);

            if(!$this->userCanEditCompany($category->empresa_id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            if ($request->file('imagem')) {
                /**
                 * @TODO Definir onde serão salvas as imagens, servidor ou s3
                 */
            }

            Category::where('id', $id)->update($request->except('api_token', 'empresa_id'));

            return Category::find($id);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Deletar Categoria
     *
     * Deleta a categoria
     *
     * @group Categorias
     * @urlParam id integer required ID da categoria
     *
     * @response scenario=success {
     *      "message": "Categoria deletada!",
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            $category = Category::find($id);

            if(!$category)
                return response(['message' => 'Categoria não encontrada!'], 404);

            if(!$this->userCanEditCompany($category->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $category->delete();

            return response(['message' => 'Categoria deletada!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
