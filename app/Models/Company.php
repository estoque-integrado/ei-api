<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Company extends Model
{
    use SoftDeletes;

    protected $table = 'empresas';

    protected $fillable = [
        'nome',
        'user_id',
        'slug',
        'website',
        'dominio_personalizado',
        'razao_social',
        'cnpj',
        'telefone',
        'celular',
        'email',
        'logo',
        'logo_branca',
        'icone',
        'matriz',
        'bloqueado',
        'motivo_bloqueio',
        'ativo',
        'rede_pv',
        'rede_token',
        'plano',
        'modo_catalogo',
        'entrega_transportadora',
    ];

    protected $appends = [
//        'brand',
//        'urlPadrao',
    ];


    /**
     * Retorna todos os produtos válidos da empresa
     *
     * @param bool $active Somente produtos ativos ?
     * @param bool $showDeletedProducts Exibir produtos deletados ?
     * @param bool $stockBiggerZero Exibir produtos com estoque maior que 0
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getValidProducts($active = true, $showDeletedProducts = false, $stockBiggerZero = true)
    {
        $data = [
            'empresa_id' => $this->id,
            'ativo' => $active
        ];

        $products = Product::where($data);

        // Somente produtos com quantidade em estoque > 0
        if ($stockBiggerZero) {
            $products->with(['stock' => function ($query) {
                $query->where('quantidade', '>', 0);
            }]);
        }

        if ($showDeletedProducts) $products->withTrashed();

        // Remove a descrição completa dos produtos, reduz 99% do tamanho da requisição
        return $products->with('colors', 'sizes', 'images')->get()->makeHidden('descricao_completa');
    }

    /**
     * Regra de validação do cadastro de empresa
     *
     * @return array
     */
    public static function getValidationRules()
    {
        return [
            'nome' => 'required|string|max:255',
            'user_id' => 'required|numeric|exists:users,id',
            'cnpj' => array('string', 'unique:empresas,cnpj', 'regex:/(\d{2})\.?(\d{3})\.?(\d{3})\/?(\d{4})\-?(\d{2})/'),
            'telefone' => array('string', 'regex:/\(?(\d{2})\)?\s?(\d{1})\s?(\d{4})\-?(\d{4})?/', 'max:16'),
            'slug' => 'string|max:80|unique:empresas,slug',
            'razao_social' => 'string|max:255',
            'website' => 'string|max:255',
            'matriz' => 'boolean',
            'ativo' => 'boolean',
//            'bloqueado' => 'required|boolean',
        ];
    }

    /**
     * Mensagens de validação do cadastro de empresa
     *
     * @return array
     */
    public static function getMessageRules()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'string' => 'O campo :attribute deve ser texto!',
            'max' => 'O campo :attribute deve conter no máximo 255 caracteres!',
            'telefone.max' => 'O campo :attribute deve conter no máximo 16 caracteres!',
            'numeric' => 'O campo :attribute deve conter somente numeros!',
            'user_id.exists' => 'O ID deve ser de um usuário cadastrado e ativo!',
            'unique' => ':attribute ja cadastrado!',
            'regex' => ':attribute no formato inválido',
            'boolean' => 'O campo :attribute deve ser Boolean!',
            'matriz' => 'boolean',
            'ativo' => 'boolean',
//            'bloqueado' => 'required|boolean',
        ];
    }

    /**
     *
     * Pega logo da empresa ou retorna uma imagem padrão
     */
    public function getLogo($cor = 'padrao')
    {
//        $path = storage_path('app/public/' . $this->logo);
//
//        // return storage_path('app/public/' . $this->logo);
//
//        if (file_exists($path)) {
//            // usando apenas para a Fortune, por enquanto
//            if ($cor === 'branca') {
//                return asset('storage/' . $this->logo_branca);
//            } else {
//                return asset('storage/' . $this->logo);
//            }
//        }
//
//        return asset('images/logo-estoque-integrado@4x.png');
    }

    /**
     * @param null $posicao
     * @param null $visibilidade
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banners($posicao = null, $visibilidade = null)
    {
        $query = [];

        if ($posicao) {
            $query[] = ['posicao', $posicao];
        }

        if ($visibilidade) {
            $query[] = ['visibilidade', $visibilidade];
        }

        // Somente banners ativos
        $query[] = ['ativo', true];

        return $this->hasMany('App\Models\Banner')->where($query);
    }

//    public function getPagina($slug, $campo, $default = '')
//    {
//        if (!$slug || !$campo) {
//            return null;
//        }
//
//        $pagina = $this->paginas
//            ->where('slug', $slug)
//            ->where('empresa_id', $this->id)
//            ->first();
//
//        if ($pagina) {
//            return $campo === 'imagem' ? asset('storage/' . $pagina->{$campo}) : $pagina->{$campo};
//        }
//
//        return $default;
//    }

    // ===== RELAÇÔES
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'empresa_user', 'empresa_id', 'user_id');
    }

    // Produtos
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'produto_id')->where('ativo', true)->orderBy('nome');
    }

    // Produtos incluindo produtos removidos
    public function productsWithDeleted()
    {
        return $this->hasMany('App\Models\Product')
            ->where('ativo', true)->orderBy('nome')->withTrashed();
    }

    // Categorias
    public function categories()
    {
        return $this->hasMany('App\Models\Category')
            ->where('ativo', true)
            ->whereHas('produtos')
            ->orderBy('nome');
    }

    // Subategorias
//    public function subcategorias()
//    {
//        return $this->hasMany('App\Models\Subcategoria')->where('ativo', true)->orderBy('nome');
//    }

    // Tamanhos
    public function sizes()
    {
        return $this->hasMany('App\Models\Size', 'empresa_id');
    }

    // Cores
    public function colors()
    {
        return $this->hasMany('App\Models\Color', 'empresa_id');
    }

    // Redes sociais
//    public function redesSociais()
//    {
//        return $this->hasOne('App\Models\RedeSocial');
//    }

    // Configurações
    public function configuracoes()
    {
        return $this->hasOne('App\Models\Configuracao');
    }

    // Blog
//    public function posts()
//    {
//        return $this->hasMany('App\Models\Blog\Post');
//    }

    // Categorias
//    public function categoriasBlog()
//    {
//        return $this->hasMany('App\Models\Blog\CategoriaBlog');
//    }

    public function endereco()
    {
        return $this->hasOne('App\Models\Address');
    }

//    public function descontos()
//    {
//        return $this->hasMany('App\Models\Desconto');
//    }


//    public function paginas()
//    {
//        return $this->hasMany('App\Models\Pagina');
//    }
//
//    public function transportadoras()
//    {
//        return $this->hasMany('App\Models\Transportadora');
//    }
//
//
//    public function pagamentos()
//    {
//        return $this->hasMany('App\Models\Pagamento');
//    }
}
