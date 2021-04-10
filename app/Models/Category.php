<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'imagem',
        'miniatura',
        'empresa_id',
        'ativo',
    ];

    /**
     * Retorna as regras de validação da categoria
     */
    public static function getValidationRules($id = null)
    {
        return [
//            'empresa_id' => 'required|integer|exists:empresas,id',
            'nome' => 'required|string|max:191',
            'slug' => array('required_if:slug_auto,false,id,null', "unique:categorias,slug,{$id},id", 'regex:/[a-zA-Z0-9\-\_]/'),
            'descricao' => 'string|max:191',
            'imagem' => 'file|max:191',
            'miniatura' => 'string|max:191',
            'ativo' => 'boolean',
        ];
    }

    /**
     * Mensagens de validação da categoria
     */
    public static function getValidationMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'max' => 'O campo :attribute deve conter no máximo 191 caracteres!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'boolean' => 'O campo :attribute deve ser do tipo boolean!',
            'empresa_id.exists' => 'A Empresa deve estar cadastrada e ativa no banco de dados!',
            'regex' => 'O slug não pode conter caracteres especiais, exceto "-" e "_"!',
            'unique' => 'Esse slug ja existe!',
            'exists' => 'Deve existir no banco!',
            'required_without' => 'Slug é obrigatório se slug_auto não estiver marcado!',
        ];
    }

//    public function getUrl()
//    {
//        return route('paginaCategoria', $this->slug);
//    }

//    public function getImagem($largura = null)
//    {
//        // $image = 'storage/' . $this->imagem;
//        $imagem = Request::root() . '/imagens/categorias/capa/' . $this->id . '/' . $this->imagem;
//
//        if ($largura) {
//            $imagem .= '/' . $largura;
//        }
//
//        // if (file_exists(public_path($image))) {
//        return $this->imagem ? asset($imagem) : '/images/background-tag.jpeg';
//        // }
//
//        return '/images/Placeholder.png';
//    }

    /**
     * Retorna a pasta da categoria onde contem as imagens
     */
//    public function getPasta()
//    {
//        return public_path() . '/images/empresa/' . $this->empresa_id . '/categorias/' . $this->id;
//    }
//
//    public function getMiniatura($largura = null)
//    {
//        // $image = 'storage/' . $this->imagem;
//        $miniatura = Request::root() . '/imagens/categorias/miniatura/' . $this->id . '/' . $this->miniatura;
//
//        if ($largura) {
//            $miniatura .= '/' . $largura;
//        }
//
//        // if (file_exists(public_path($image))) {
//        return $this->miniatura ? asset($miniatura) : '/images/background-tag.jpeg';
//        // }
//
//        return '/images/Placeholder.png';
//    }

    // ===== RELAÇÔES

    public function products($ativo = true)
    {
        return $this->hasMany('App\Models\Product')->where('ativo', $ativo);
    }

    // Empresa
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id');
    }

    // Subcategoria
//    public function subcategorias()
//    {
//        return $this->hasMany('App\Models\Subcategoria')->whereHas('produtos');
//    }
}
