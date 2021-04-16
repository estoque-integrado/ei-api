<?php

namespace App\Models;

use App\Models\Desconto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Classe Product
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';

    protected $fillable = [
        'empresa_id',
        'categoria_id',
        'nome',
        'slug',
//        'sku',
        'descricao_curta',
        'descricao_completa',
        // 'estoque',
        //preços
//        'preco_custo',
//        'preco_venda',
//        'preco_promocional',
        //entrega
//        'peso',
//        'diametro',
//        'altura',
//        'largura',
//        'comprimento',
        //seo
        'titulo_seo',
        'descricao_seo',
        'tags_seo',
        //produto destaque
        'destaque',
        'ativo',
        'variacao_preco_cor',
        'variacao_preco_tamanho',
    ];

    protected $appends = ['valor_minimo'];
//    protected $appends = ['valor', 'imagemDestaque', 'store'];

//    protected $with = ['imagens', 'cores', 'tamanhos'];


    public function getValorMinimoAttribute()
    {
        return $this->stock->min('valor_venda');
    }

    /**
     * Retorna o valor de venda do produto
     * se houver um valor_promocional e esse valor
     * estiver dentro da data de validade, retorna valor_promocional
     * se não, retorna valor de venda
     *
     * descontos futuros devem ser aplicados nessa função
     */
    public function getSaleValue($sizeID = null, $colorID = null, $returnWithDiscount = true)
    {
        $stock = $this->stock($sizeID, $colorID)->first();

        if (!$stock) return response(['message' => 'Estoque não encontrado.'], 404);

        if (
            $stock->valor_promocional &&
            $stock->dt_inicio_promocao <= Carbon::now() &&
            $stock->dt_fim_promocao >= Carbon::now()
        ) {
            return $stock->valor_promocional;
        }

        return $stock->valor_venda;
    }


    /**
     * Regras de validação do produto
     */
    public static function getValidationRules($id = null)
    {
        return [
//            'empresa_id' => 'required|integer|min:1|exists:empresas,id',
            'categoria_id' => 'required_without:id|integer|min:1|exists:categorias,id',
            'nome' => 'required_without:id|string|max:191',
//            'slug' => array('required_if:slug_auto,false,id,null', "unique:produtos,slug,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
            'slug' => array('required_without:id', "unique:produtos,slug,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
//            'sku' => array('required', "unique:produtos,sku,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
            'descricao_curta' => 'string|max:255',
            'descricao_completa' => 'string',
            'preco_custo' => 'numeric',
//            'preco_venda' => 'required|numeric',
            'peso' => 'numeric',
            'altura' => 'numeric',
            'largura' => 'numeric',
            'diametro' => 'numeric',
            'comprimento' => 'numeric',
            'titulo_seo' => 'string',
            'descricao_seo' => 'string',
            'tags_seo' => 'string',
            'destaque' => 'boolean',
            'status' => 'boolean',
            'ativo' => 'boolean',

            // Imagens
            'imagens' => 'file',

            // Estoque
            'estoque' => 'array',
            'estoque.*.sku' => array("unique:estoque,sku,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
            'estoque.*.valor_venda' => 'required_without:estoque.*.id|numeric',
            'estoque.*.valor_custo' => 'numeric',
            'estoque.*.valor_promocional' => 'numeric',
//            'estoque.*.produto_id' => 'required|integer|exists:produtos,id',
            'estoque.*.quantidade' => 'required|integer|min:0',
            'estoque.*.cor_id' => 'integer|exists:cores,id',
            'estoque.*.dt_inicio_promocao' => 'date_format:"d/m/Y H:i:s"',
            'estoque.*.dt_fim_promocao' => 'date_format:"d/m/Y H:i:s"',
            'estoque.*.peso' => 'numeric',
            'estoque.*.altura' => 'numeric',
            'estoque.*.largura' => 'numeric',
            'estoque.*.comprimento' => 'numeric',
        ];
    }


    /**
     * Mensagens de validação do produto
     */
    public static function getValidationMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'max' => 'O campo :attribute deve conter no máximo 191 caracteres!',
            'descricao_curta.max' => 'O campo :attribute deve conter no máximo 255 caracteres!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'boolean' => 'O campo :attribute deve ser do tipo boolean!',
            'numeric' => 'O campo :attribute deve ser um numero com 2 casas decimais! Ex: 1500.00',
            'empresa_id.exists' => 'A Empresa deve estar cadastrada e ativa no banco de dados!',
            'categoria_id.exists' => 'A Categoria deve estar cadastrada e ativa no banco de dados!',
            'unique' => 'O campo :attribute ja existe no banco de dados!',
            'regex' => 'O :attribute não pode conter caracteres especiais, exceto "-" e "_"!',
            'date_format' => 'A data inicio/fim do valor promocional deve ser no formato: DD/MM/AAAA HH:MM:SS',
            'estoque.*.valor_venda.required_without' => 'O valor de venda é obrigatorio quando cadastrando um novo estoque.',
            'nome.required_without' => 'O nome do produto é obrigatório se não houver um ID de produto.',
            'slug.required_without' => 'O slug é obrigatório se não houver um ID de produto.',
            'categoria_id.required_without' => 'A categoria é obrigatória se não houver um ID de produto.',
        ];
    }

    /**
     * Retorna a URL do produto
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->empresa->urlPadrao . '/produto/' . $this->slug;
    }

    /**
     * Envia o produto pelo Whatsapp da empresa
     *
     * @return string
     */
    public function getWhatsappUrl()
    {
        $phone = '55' . $this->empresa->getCelular();
        $text = urlencode("Olá, tenho uma dúvida sobre o produto \"$this->nome\" que está no seu site");

        return "https://api.whatsapp.com/send?phone=$phone&text=$text";
    }

    /**
     * Retorna a imagem de destaque do produto
     *
     * @return mixed
     */
    public function getImagemDestaqueAttribute()
    {
        return $this->imagemDestaqueOrRandom();
    }


    public function imagemDestaqueOrRandom()
    {
        // Verifica se o produto tem uma imagem de destaque
        $imagem = $this->imagens->where('destaque', true)->first();

        if (!$imagem) {
            if ($this->imagens->count() > 0) {
                $imagem = $this->imagens->random();
            } else {
                return asset('images/Placeholder.png');
            }
        }

        return asset("https://app.estoqueintegrado.com.br/imagens/produtos/$imagem->produto_id/$imagem->nome/400");
    }



    /**
     * Retorna o valor do produto com R$
     *
     * @return string
     */
    public function getValorString()
    {
        $string = '';

        if ($this->preco_venda) {
            $precoVenda = number_format($this->preco_venda, 2, ',', '.');
            $string .= "De R$ $precoVenda por ";
        }

        $string .= "R$ " . $this->getValorComDesconto();

        return $string;
    }


    /**
     * Verifica se um produto tem desconto
     */
    public function hasDiscount()
    {

    }

    /**
     * Retorna a quantidade TOTAL de produtos válidos
     * Que tenha pelo menos 1 cor e quantidade cadastradas
     *
     * @return Integer
     */
    public function getTotalEstoque()
    {
//        $total = 0;
//
//        foreach ($this->estoque as $estoque) {
//            $total += $estoque->quantidade;
//        }
//
//        return $total;
    }

    /**
     * Retorna os tamanhos que tem quantidade maior que 0 em estoque
     *
     * @return Array
     */
    public function getTamanhos()
    {
        $tamanhos = $this->estoque->where('quantidade', '>', 0)->pluck('tamanho');

        return $tamanhos->first() == null ? [] : $tamanhos->unique();
    }

    public function getCores()
    {
        $cores = [];

        foreach ($this->cores as $cor) {
            foreach ($this->estoque as $estoque) {
                if ($estoque->quantidade > 0) {
                    $cores[] = $estoque->cor_id == $cor->id ? $cor : [];
                }
            }
        }

        return $cores;
    }



    /**
     * Relações
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Imagem', 'produto_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

//    public function subcategorias()
//    {
//        return $this->belongsToMany('App\Models\Subcategoria');
//    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'produto_tamanhos', 'produto_id', 'tamanho_id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'produto_cor', 'produto_id','cor_id');
    }

    public function stock($tamanhoID = null, $corID = null)
    {
        $dados = [];

        if ($tamanhoID) {
            $dados['tamanho_id'] = $tamanhoID;
        }

        if ($corID) {
            $dados['cor_id'] = $corID;
        }

        return $this->hasMany('App\Models\Stock', 'produto_id')->where($dados);
    }

    public function estoque_old()
    {
        return $this->hasMany('App\Models\Estoque', 'produto_id');
    }

    // Variação preço
    public function variacao($var1 = '', $var2 = '')
    {
        return $this->hasMany('App\Models\VariacaoPreco', 'produto_id');
    }
}
