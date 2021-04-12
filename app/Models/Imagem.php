<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Imagem extends Model
{
    /**
     * OBS: Antes de criar uma função verifique se a mesma ja existe.
     *
     * FUNÇÔES EXISTENTES:
     * salvarImagem() -> salva uma imagem na galeria da empresa especificada
     *
     */

    protected $table = 'imagens';

    protected $fillable = [
        'id',
        'nome',
        'nome_usuario',
        'alt',
        'url',
        'produto_id',
        'destaque',
    ];

    protected $appends = ['urlCompleta'];

    public function getUrlCompletaAttribute()
    {
        return $this->getUrlThumb();
    }

    // FUNÇÔES
    public function getUrlThumb()
    {
        // Returna miniatura
        // $thumb = '/imagens/produtos/' . $this->produto_id . '/' . $this->nome . '/400';
        // return $thumb;
        // $path  = public_path() . '/' . $thumb;

        // dd($thumb);

        // if (file_exists($this->url . '/400')) {
//            return asset($this->url . '/400');
        // }

//        return asset('images/Placeholder.png');

        // Retorna imagem original
        // $image = 'images/produtos/' . $this->produto->id . '/' . $this->nome;
        // $path  = public_path() . '/' . $image;

        // if (file_exists($path))
        //     return asset($image);

        // Retorna Placeholder
        // return asset('images/Placeholder.png');
    }

    public static function salvarImagem($image, $produtoId, $type, $size, $salvar = false, $destaque = false)
    {
        // Deu erro ao enviar múltiplas imagens no mac e resolvi assim
        ini_set('memory_limit','256M');

        if (!is_null($image)) {
            $file = $image;

            // Tamanho original da imagem
            $originalWidth = Image::make($file)->width();

            // Dados da imagem. nome, diretorio, diretorio thumbs
            $extension          = $image->getClientOriginalExtension();
            $originalName       = $image->getClientOriginalName();
            $fileName           = time() . random_int(100, 999) .'.' . $extension;
            $destinationPath    = public_path('images/'.$type.'/'. $produtoId .'/');
            $url                = '//'.$_SERVER['HTTP_HOST'].'/imagens/'.$type.'/'. $produtoId .'/'. $fileName;
            $fullPath           = $destinationPath . $fileName;

            // Cria Primeiro nível do diretorio (Empresa), caso não exista
            if (!file_exists(public_path('images/empresa/'))) {
                File::makeDirectory(public_path('images/empresa/', 0775));
            }

            // Cria Primeiro nível do diretorio ($type), caso não exista
            if (!file_exists(public_path('images/' . $type . '/'))) {
                File::makeDirectory(public_path('images/' . $type . '/', 0775));
            }


            // Cria segundo nivel do diretorio ($produtoId), caso não exista
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }

            // Cria diretorio dos thumbs
            if (!file_exists($destinationPath . '/thumbs/')) {
                File::makeDirectory($destinationPath . '/thumbs/', 0775);
            }


            // Redimensiona a imagem !
            // ->resize = tamanho, altura, callback=function(){}
            // Salva imagem com tamanho máximo de 1200px, se Produto
            // Ou salva a imagem com tamanho max de 2000px, se Banner
            $maxPixels = $type == 'empresa/banners' ? 2000 : 1200;

            if ($originalWidth > $maxPixels) :
                $image = Image::make($file)
                    ->resize($maxPixels, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            else :
                $image = Image::make($file)
                    ->resize($originalWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            endif;

            // Orientação da imagem
            $image->orientate();

            $image->save($fullPath, 60); // caminho, qualidade

            // chown($fullPath, 'ronierison');


            // Salva imagem no banco de dados
            if ($salvar) :
                $imagem = Imagem::create(['nome' => $fileName, 'nome_usuario' => $originalName, 'url' => $url, 'produto_id' => $produtoId, 'destaque' => $destaque]);
            endif;

            // Retorna a imagem ou o nome da imagem
            return $salvar ? $imagem : $fileName;
        } else {
            return '//' . $_SERVER['HTTP_HOST'] . '/images/' . $type . '/placeholder300x300.jpg';
        }
    }



    public static function salvarBannerMobile($image, $empresaID, $type, $size)
    {
        // Deu erro ao enviar múltiplas imagens no mac e resolvi assim
        ini_set('memory_limit','256M');

        if (!is_null($image)) {
            $file = $image;

            // Tamanho original da imagem
            $originalWidth = Image::make($file)->width();

            // Dados da imagem. nome, diretorio, diretorio thumbs
            $extension          = $image->getClientOriginalExtension();
            $fileName           = time() . random_int(100, 999) . '.' . $extension;
            $destinationPath    = public_path('images/'.$type.'/'. $empresaID .'/mobile/');
            $url                = '//'.$_SERVER['HTTP_HOST'].'/imagens/'.$type.'/'. $empresaID .'/'. $fileName;
            $fullPath           = $destinationPath . $fileName;

            // Cria Primeiro nível do diretorio (Empresa), caso não exista
            if (!file_exists(public_path('images/empresa/'))) {
                File::makeDirectory(public_path('images/empresa/', 0775));
            }

            // Segundo nivel de diretorio (banners)
            if (!file_exists(public_path('images/empresa/banners/'))) {
                File::makeDirectory(public_path('images/empresa/banners/', 0775));
            }

            // Terceiro nivel do diretorio (empresaID)
            if (!file_exists(public_path('images/empresa/banners/'. $empresaID .'/'))) {
                File::makeDirectory(public_path('images/empresa/banners/'. $empresaID .'/', 0775));
            }

            // Quarto nivel do diretorio (mobile)
            if (!file_exists(public_path('images/empresa/banners/'. $empresaID .'/mobile/'))) {
                File::makeDirectory(public_path('images/empresa/banners/'. $empresaID .'/mobile/', 0775));
            }

            // Apaga todas as imagens da pasta mobile
            // $imagensPasta = glob(public_path('images/empresa/banners/'. $empresaID .'/mobile/*'));

            // foreach ($imagensPasta as $imagemTemp) {
            //     if (file_exists($imagemTemp)) {
            //         unlink($imagemTemp);
            //     }
            // }

            // Redimensiona a imagem !
            // ->resize = tamanho, altura, callback=function(){}
            // Salva imagem com tamanho máximo de 1200px, se Produto
            // Ou salva a imagem com tamanho max de 2000px, se Banner
            $maxPixels = 1200;

            if ($originalWidth > $maxPixels) :
                $image = Image::make($file)
                    ->resize($maxPixels, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            else :
                $image = Image::make($file)
                    ->resize($originalWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            endif;

            // Orientação da imagem
            $image->orientate();

            $image->save($fullPath, 60); // caminho, qualidade

            // Retorna a imagem ou o nome da imagem
            return $fileName;
        } else {
            return '//' . $_SERVER['HTTP_HOST'] . '/images/' . $type . '/placeholder300x300.jpg';
        }
    }


    /**
     * Função para gerar THUMBS de uma imagem
     *
     * @param
     */
    public static function cortarImagem($id, $nomeImagemOriginal, $largura = null, $altura = null, $qualidade = 60)
    {
        // Retorna se não for passsado um caminho
        if (!$nomeImagemOriginal) return 'caminho-nao-informado';

        // Cria o caminho da imagem
        $caminhoOriginal = public_path() . "/images/produtos/$id/$nomeImagemOriginal";

        // verifica se é arquivo ou pasta
        if (is_file($caminhoOriginal)) {
            // Busca a imagem, a largura e a altura
            $imagem         = Image::make($caminhoOriginal);
            $originalWidth  = $imagem->width();
            $originalHeight = $imagem->height();
            // $originalSize   = $imagem->filesize();

            // Pasta da imagem adicionando THUMB
            $pastaImagem    = $imagem->dirname . '/';

            // Se não for passado uma largura retorna a imagem no tamanho original
            if ($largura != null) {
                $pastaImagem = $imagem->dirname . '/thumbs/';

                // Cria o nome da imagem com as dimensões
                $thumbName      = $imagem->filename . '_' . $largura . 'x' . $altura . '.' . $imagem->extension;

                // Cria o caminho completo
                $nomeCompleto   = $pastaImagem . $thumbName;
            } else {
                $nomeCompleto   = $pastaImagem . $imagem->filename . '.' . $imagem->extension;
            }

            // Se a imagem ja existir nas dimensões passadas, retorna a imagem, se não cria o thumb
            if (is_file($nomeCompleto)) {
                return \Intervention\Image\Facades\Image::make($nomeCompleto)->response();
            }

            // Define uma largura máxima para corte
            $larguraMaximaPraCorte = $originalWidth > $largura ? $largura : $originalWidth;

            /**
             *  Se passado uma altura pra Corte ultiliza a função
             *  para cortar a imagem sem manter a proporção.
             *  Se não for passado, recorta a imagem mantendo a proporção (->aspectRatio())
             */
            if ($altura && $altura > 0) {
                $image = \Intervention\Image\Facades\Image::make($caminhoOriginal)
                    ->fit($larguraMaximaPraCorte, $altura, function ($constraint) {
                        $constraint->upSize();
                    })
                    ->encode('jpg');
            } else {
                $image = \Intervention\Image\Facades\Image::make($caminhoOriginal)
                    ->resize($larguraMaximaPraCorte, $larguraMaximaPraCorte, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            }

            // Mantem a orientação da imagem
            $image->orientate();

            // Salva a imagem no caminho específico
            $image->save($nomeCompleto, $qualidade);

            return $image->response();
        }
    }

    /**
     * Função para gerar THUMBS de uma imagem
     *
     * @param
     */
    public static function cortarImagemCategorias($capaOuMiniatura, $id, $imagemOriginal, $largura, $altura = null, $qualidade = 60, $empresaID = null)
    {
        // Retorna se não for passsado um caminho
        if (!$imagemOriginal) return 'imagem-nao-informada';

        $categoria = \App\Models\Categoria::find($id);

        if (!$empresaID) {
            $empresaID = $categoria->empresa->id;
        }


        // Cria o caminho da imagem
        $pastaEmpresa = public_path() . "/images/empresa/$empresaID";
        $pastaImagem = public_path() . "/images/empresa/$empresaID/categorias/$id";


        // Se não existir o diretorio da categoria, cria o mesmo
        if (!is_dir($pastaEmpresa)) {
            File::makeDirectory($pastaEmpresa);
            // Cria o diretório de categorias
            File::makeDirectory($pastaEmpresa . '/categorias');
        }

        // Se não existir o diretorio da categoria, cria o mesmo
        if (!is_dir($pastaImagem)) {
            File::makeDirectory($pastaImagem);
        }


        // verifica se é arquivo ou pasta
        if (is_dir($pastaImagem)) {
            // Busca a imagem, a largura e a altura
            if (is_string($imagemOriginal)) {
                $imagem = Image::make($pastaImagem . '/' . $imagemOriginal);
                $imagemOriginal = $pastaImagem . '/' . $imagemOriginal;
            } else {
                $imagem = Image::make($imagemOriginal);
            }
            $originalWidth  = $imagem->width();
            $originalHeight = $imagem->height();
            // $originalSize   = $imagem->filesize();

            // Pasta da imagem adicionando THUMB
            $pastaThumb    = $pastaImagem . '/thumbs/';

            // Cria a pasta das THUMBS caso não exista
            if (!is_dir($pastaThumb)) {
                File::makeDirectory($pastaThumb);
            }

            // Verifica se a imagem ja tem uma extension
            if (!$imagem->extension) {
                if ($imagem->mime == 'image/jpeg')
                    $imagem->extension = 'jpg';
                elseif ($imagem->mime == 'image/png')
                    $imagem->extension = 'png';
                elseif ($imagem->mime == 'image/gif')
                    $imagem->extension = 'gif';
                else
                    dd('extensao não suportada');
            }

            // Busca a categoria
            // $categoria = Categoria::find($id);

            $imagemOuMiniatura = $capaOuMiniatura == 'capa' ? 'imagem' : 'miniatura';

            $uniqName   = uniqid();
            $arrayDoNome = explode('.', $categoria->{$imagemOuMiniatura});

            // Cria o nome da imagem com as dimensões
            $nomeUnico  = $uniqName . '.' . $imagem->extension;
            $nomeImagem = $uniqName . '_' . $largura . 'x' . $altura . '.' . $imagem->extension;
            $nomeThumb  = ($categoria->{$imagemOuMiniatura} ? $arrayDoNome[0] : $uniqName) . '_' . $largura . 'x' . $altura . '.' . $imagem->extension;

            // Cria o caminho completo
            $caminhoCompletoThumb   = $pastaThumb . $nomeThumb;
            $caminhoCompletoimagem  = $pastaImagem . '/' . $nomeImagem;

            // Verifica se a imagem requisitada é da capa ou miniatura
            if ($capaOuMiniatura == 'capa') {
                // Verifica se foi passado uma largura, se sim, procura nos thumbs, se não pega a imagem em tamanho normal
                if ($largura) {
                    $arrayNome       = $categoria->imagem ? explode('.', $categoria->imagem) : explode('.', $nomeUnico);
                    $nome            = $arrayNome[0] . '_' . $largura . 'x' . $altura . '.' . $imagem->extension;
                    $caminhoCompleto = $pastaThumb . $nome;

                    // dd($categoria->imagem);
                    // Retorna a THUMB
                    if (is_file($caminhoCompleto)) {
                        return \Intervention\Image\Facades\Image::make($caminhoCompleto)->response();
                    }
                } else {
                    // Retorna a imagem no tamanho original
                    if (is_file($pastaImagem . '/' . $categoria->imagem)) {
                        $caminhoCompleto = $pastaImagem . '/' . $categoria->imagem;

                        return \Intervention\Image\Facades\Image::make($caminhoCompleto)->response();
                    }
                }

                // $categoria->imagem = $categoria->imagem ? $categoria->imagem : $nomeUnico;
                // $categoria->save();
            } elseif ($capaOuMiniatura == 'miniatura') {
                // Verifica se foi passado uma largura, se sim, procura nos thumbs, se não pega a imagem em tamanho normal
                if ($largura) {
                    $arrayNome       = $categoria->miniatura ? explode('.', $categoria->miniatura) : explode('.', $nomeUnico);
                    $nome            = $arrayNome[0] . '_' . $largura . 'x' . $altura . '.' . $imagem->extension;
                    $caminhoCompleto = $pastaThumb . $nome;

                    if (is_file($caminhoCompleto)) {
                        return \Intervention\Image\Facades\Image::make($caminhoCompleto)->response();
                    }
                // Retorna a imagem no tamanho original
                } else {
                    if (is_file($pastaImagem . '/' . $categoria->miniatura)) {
                        $caminhoCompleto = $pastaImagem . '/' . $categoria->miniatura;

                        return \Intervention\Image\Facades\Image::make($caminhoCompleto)->response();
                    }
                }

                // $categoria->miniatura = $nomeUnico;
                // $categoria->save();
            }

            // dump("Tamanho original: $originalSize");
            $larguraMaximaPraCorte = $originalWidth > $largura ? $largura : $originalWidth;

            /**
             *  Se passado uma altura pra Corte ultiliza a função
             *  para cortar a imagem sem manter a proporção.
             *  Se não for passado recorta a imagem mantendo a proporção (->aspectRatio())
             */

            if ($altura && $altura > 0) {
                $image = \Intervention\Image\Facades\Image::make($imagemOriginal)
                    ->fit($larguraMaximaPraCorte, $altura, function ($constraint) {
                        $constraint->upSize();
                    })
                    ->encode('jpg');
            } else {
                $image = \Intervention\Image\Facades\Image::make($imagemOriginal)
                    ->resize($larguraMaximaPraCorte, $larguraMaximaPraCorte, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
            }

            // Mantem a orientação da THUMB da imagem
            $image->orientate();

            // Salva a THUMB da imagem no caminho específico
            $image->save($caminhoCompletoThumb, $qualidade);


            // Salva a imagem em tamanho maior
            if ((!$categoria->imagem && $capaOuMiniatura == 'capa') || (!$categoria->miniatura && $capaOuMiniatura == 'miniatura')) {
                $larguraMaximaImagemOriginal = $originalWidth > 1200 ? 1200 : $originalWidth;

                $imagemMaior = \Intervention\Image\Facades\Image::make($imagemOriginal)
                    ->resize($larguraMaximaImagemOriginal, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');

                // Mantem a orientação da imagem
                $imagemMaior->orientate();

                $caminho = $pastaImagem . '/' . $nomeUnico;

                // Salva a imagem no caminho específico
                $imagemMaior->save($caminho, $qualidade);

                if ($capaOuMiniatura == 'capa') {
                    $categoria->imagem = $categoria->imagem ? $categoria->imagem : $nomeUnico;
                } elseif ($capaOuMiniatura == 'miniatura') {
                    $categoria->miniatura = $categoria->miniatura ? $categoria->miniatura : $nomeUnico;
                }

                $categoria->save();
            }

            return $image->response();
        }
    }

    // RELAÇÔES
    // Produto
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    // Usuarios
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'imagem_user', 'imagem_id', 'user_id');
    }
}
