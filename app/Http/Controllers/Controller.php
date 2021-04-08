<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Lumen\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{

    /**
     * @param User $user
     * @param Empresa $empresa
     * @param string $viewTemplate
     * @param int $delay
     */
    public function createJobSendMail(User $user, Empresa $empresa, $viewTemplate = '', $delay = 10)
    {
        // Cria o JOB para enviar o email posteriormente
        $job = (new MailJob($empresa->user, $empresa, $viewTemplate))
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
        $idsCompanies = $user->getIdsMyCompanies();

        if (!in_array($companyId, $idsCompanies)) {
            return false;
        }

        return true;
    }
}
