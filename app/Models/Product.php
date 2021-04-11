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
        'sku',
        'descricao_curta',
        'descricao_completa',
        // 'estoque',
        //preços
        'preco_custo',
        'preco_venda',
        'preco_promocional',
        //entrega
        'peso',
        'diametro',
        'altura',
        'largura',
        'comprimento',
        //seo
        'titulo_seo',
        'descricao_seo',
        'tags_seo',
        //produto destaque
        'destaque',
        'status',
        'ativo',
        'variacao_preco_cor',
        'variacao_preco_tamanho',
    ];

//    protected $appends = ['valor', 'imagemDestaque', 'store'];

//    protected $with = ['imagens', 'cores', 'tamanhos'];


    /**
     * Regras de validação do produto
     */
    public static function getValidationRules($id = null)
    {
        return [
            'empresa_id' => 'required|integer|min:1|exists:empresas,id',
            'categoria_id' => 'required|integer|min:1|exists:categorias,id',
            'nome' => 'required|string|max:191',
            'slug' => array('required_if:slug_auto,false,id,null', "unique:produtos,slug,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
            'sku' => array('required', "unique:produtos,sku,{$id},id", 'regex:/^[a-zA-Z0-9_-]*$/'),
            'descricao_curta' => 'string|max:255',
            'descricao_completa' => 'string',
            'preco_custo' => 'numeric',
            'preco_venda' => 'required|numeric',
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
     * FUNÇÔES
     *
     */
    /**
     * Retorna somente os tamanhos que tenham pelo menos 1 variação cadastrada
     * pois se não tem variação, não existe um preço
     */
    public function tamanhosQueTenhamVariacoes()
    {
        return $this->tamanhos->whereHas('variacoes');
    }


    /**
     * Retorna o valor do produto lenvando as seguintes considerações
     *
     * 1- Verifica se o produto ta incluso em algum desconto geral na empresa
     * 2- Verifica se o produto tem variação, se tiver verifica se foi passado um tamanho e/ou cor
     * se foi passado, busca menor valor
     * 3- se tem desconto geral, verifica se é em percentual ou em valor real
     * 4- Verifica se o produto está com valor promocional
     */
    public function getValorComDesconto($formatoPtBr = true, $tamanhoID = null, $corID = null)
    {
        /**
         * TODO
         * Melhorar essa função
         */
//        $temDesconto = session()->has('modelCupomDesconto');
//        $valor = $this->preco_promocional > 0 ? $this->preco_promocional : $this->preco_venda;
//
//        // Verifica se existe algum desconto tipo "GERAL" (TODOS OS PRODUTOS)
//        $descontoGeral = Desconto::where(
//            [
//                ['empresa_id', $this->empresa_id],
//                ['tipo_desconto', 'geral'],
//                ['data_inicio', '<=', Carbon::now()],
//                ['data_fim', '>=', Carbon::now()],
//            ]
//        )->first();
//
//        // vereifica se o preço tem variação
//        if ($this->variacao_preco_cor || $this->variacao_preco_tamanho) {
//            // Buscar o menor valor
//            $valor = $this->variacao->min('valor_venda');
//            $valorSemDesconto = $valor < 0 ? 0 : $valor;
//
//            if ($descontoGeral) {
//                // Verifica se é desconto em % ou em R$
//                if ($descontoGeral->percentual) {
//                    $valorReal = $valorSemDesconto - (($valorSemDesconto * $descontoGeral->valor) / 100);
//                    $valorReal = $valorReal < 0 ? 0 : $valorReal;
//                    return $formatoPtBr ? number_format($valorReal, 2, ',', '.') : $valorReal;
//                } else {
//                    $valorReal = $valorSemDesconto - $descontoGeral->valor;
//                    $valorReal = $valorReal < 0 ? 0 : $valorReal;
//                    return $formatoPtBr ? number_format($valorReal, 2, ',', '.') : $valorReal;
//                }
//            } else {
//                return $formatoPtBr ? number_format($valor, 2, ',', '.') : $valor;
//            }
//
//        }
//
//        if ($descontoGeral) {
//            // Verifica se é desconto em % ou em R$
//            if ($descontoGeral->percentual) {
//                $valorReal = $valor - (($valor * $descontoGeral->valor) / 100);
//                $valorReal = $valorReal < 0 ? 0 : $valorReal;
//                return $formatoPtBr ? number_format($valorReal, 2, ',', '.') : $valorReal;
//            } else {
//                $valorReal = $valor - $descontoGeral->valor;
//                $valorReal = $valorReal < 0 ? 0 : $valorReal;
//                return $formatoPtBr ? number_format($valorReal, 2, ',', '.') : $valorReal;
//            }
//        }
//
//        if ($temDesconto) {
//            $desconto = session()->get('modelCupomDesconto');
//
//            if ($desconto->percentual) {
//                $valor = $this->preco_venda - ($this->preco_venda * ($desconto->valor / 100));
//            } else {
//                $valor = $this->preco_venda - $desconto->valor;
//            }
//        }
//
//        // Verifica se está em valor promocional
//        if ($this->preco_promocional && $this->preco_promocional != 0 && $this->preco_promocional < $valor) {
//            return $formatoPtBr ? number_format($this->preco_promocional, 2, ',', '.') : $this->preco_promocional;
//        } else {
//            $valor = $valor < 0 ? 0 : $valor;
//            return $formatoPtBr ? number_format($valor, 2, ',', '.') : $valor;
//        }
    }

    public function getValorSemDesconto()
    {
        // vereifica se o preço tem variação
        if ($this->variacao_preco_cor || $this->variacao_preco_tamanho) {
            // Buscar o menor valor
            $valor = $this->variacao->min('valor_venda');
            return number_format($valor, 2, ',', '.');
        }

        return number_format($this->preco_venda, 2, ',', '.');
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
//        $desconto = session()->has('modelCupomDesconto');
//
//        if ($this->variacao_preco_cor || $this->variacao_preco_tamanho) {
//            $variacao = $this->variacao->where('valor_venda', $this->variacao->min('valor_venda'))->first();
//
//            if (!$variacao) {
//                return $this->preco_venda;
//            }
//
//            return $desconto || ($variacao->preco_promocional != 0 && $variacao->preco_promocional);
//        } else {
//            return $desconto || ($this->preco_promocional != 0 && $this->preco_promocional);
//        }
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
     * Retorna o Valor da variação de um produto de acordo com o tamanho e cor
     *
     * @param Integer $tamanhoID
     * @param Integer $corID
     *
     * @return Float
     */
    public function getValorTamanhoCor($tamanhoID = null, $corID = null) : float
    {
        $variacao = VariacaoPreco::where('produto_id', $this->id)->with('tamanhos', 'cores');

        if ($tamanhoID) {
            $variacao->whereHas('tamanhos', function ($qt) use ($tamanhoID) {
                $qt->where('tamanho_id', $tamanhoID);
            });
        }

        if ($corID && $this->variacao_valor_cor) {
            $variacao->whereHas('cores', function ($qt) use ($corID) {
                $qt->where('cor_id', $corID);
            });
        }

        $variacao = $variacao->first();

        return $variacao ? $variacao->valor_venda : $this->getValorComDesconto(false);
    }

    /**
     * Retorna um array de IDS com todos os tamanhos que tem
     * pelo menos 1 variação cadastrada, pois se não tem variação não tem preço
     *
     */
    public function getArrayTamanhosId()
    {
        $tamanhosID = [];

        foreach ($this->variacao as $variacao) {
            $tamanhosTemp = $variacao->tamanhos()->pluck('tamanho_id')->toArray();

            foreach ($tamanhosTemp as $t) {
                array_push($tamanhosID, $t);
            }
        }

        return array_unique($tamanhosID);
    }

    /**
     * Relações
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
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
        return $this->belongsToMany('App\Models\Tamanho', 'produto_tamanhos');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Cor', 'produto_cor');
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

        return $this->hasMany('App\Models\Estoque')->where($dados);
    }

    // Variação preço
    public function variacao($var1 = '', $var2 = '')
    {
        return $this->hasMany('App\Models\VariacaoPreco');
    }
}
