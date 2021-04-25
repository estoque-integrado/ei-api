<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{

    /**
     * @param User $user
     * @param Company $empresa
     * @param string $viewTemplate
     * @param int $delay
     */
    public function createJobSendMail($viewTemplate = '', $arrayVariables = [], $assunto = null, $delay = 10)
    {
        // Cria o JOB para enviar o email posteriormente
        $job = (new MailJob($viewTemplate, $arrayVariables, $assunto))
            ->delay(Carbon::now()->addSeconds($delay));
        $this->dispatch($job);
    }

    /**
     * Funções de USUARIO
     *
     * @param  array  $attributes
     * @return void
     */
    public function formatarCnpj($string, $somenteNumeros = false)
    {
        $cnpj = preg_replace('/(\D)/', '', $string);

        if ($somenteNumeros) return $cnpj;

        $cnpj = preg_replace('/(\d{2})\.(\d{3})\.(\d{3})\/(\d{3})\-(\d{2})/', '', $string);
        return $cnpj;
    }

    /**
     * Formatar data
     *
     * @param  array  $attributes
     * @return void
     */
    public function formatarData($string, $ptBR = true)
    {
        $isPtBR = preg_match('/^(\d{2})\/(\d{2})\/(\d{4})\s?(.*)?$/', $string);

        if ($isPtBR) {
            return preg_replace('/^(\d{2})\/(\d{2})\/(\d{4})\s?(\d{2})?\:?(\d{2})?\:?(\d{2})$/', '$3-$2-$1 $4:$5:$6', $string);
        }
    }

    /**
     * @param $string
     * @param bool $somenteNumeros
     * @return string|string[]|null
     */
    public function formatarTelefone($string, $somenteNumeros = false)
    {
        $telefone = preg_replace('/(\D)/', '', $string);

        if ($somenteNumeros) return $telefone;

        $telefone = preg_replace('/(\d{2})(\d{1})(\d{4})(\d{3,4})/', '($1) $2 $3-$4', $string);
        return $telefone;
    }

    /**
     * Valida se o usuário tem ligação com a empresa
     *
     * @param $companyId
     * @return bool
     */
    public function userCanEditCompany($companyId)
    {
        $user = Auth::user();

        if (!in_array($companyId, $user->getIdsMyCompanies())) {
            return false;
        }

        return true;
    }


    /**
     * Cria slugs
     * Se $model != null, instancia o model, e busca na tabela
     * do mesmo por slug igual, se achar, concatena +1
     */
    public function slugify($string, $model = null)
    {
        $string = $this->removerAcentos($string, true);
        $slug = strtolower($string);
        $slugTemp = $slug;

        if ($model) {
            $model = new $model();

            $i = 1;
            // Caso slug exista, vai somando o numero 1 ao final, ate achar um slug válido
            while($model->where('slug', $slugTemp)->first() != null) {
                $slugTemp = $slug . $i;
                $i++;
            }
            $slug = $slugTemp;
        }

        return $slug;

    }

    /**
     * Remove acentos e espaços em branco desnecessários
     *
     * @param String $string
     * @return String
     */
    public function removerAcentos($string, $substiturEspacoPorTraco = false)
    {
        $string = trim($string);

        $string = preg_replace(
            array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/(Ç)/"),
            explode(" ","a A e E i I o O u U n N c C"),
            $string
        );

        if ($substiturEspacoPorTraco) {
            $string = preg_replace('/\s/', '-', $string);
        }

        return $string;
    }

    /**
     * Formatar valor
     */
    public function formatarValor($valor, $ptBR = false)
    {
        if (!$valor || $valor == '') return null;

        $valor = preg_replace('/\D/', '', $valor);
        $formatoEn = preg_replace('/(\d{1,})(\d{2})/', '$1.$2', $valor);

        return $ptBR ?
            number_format((float) $valor, 2, ',', '.') :
            $formatoEn;
    }
}
