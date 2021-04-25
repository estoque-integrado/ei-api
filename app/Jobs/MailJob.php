<?php

namespace App\Jobs;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;

class MailJob extends Job
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Company
     */
    private $empresa;
    /**
     * @var null
     */
    private $viewTemplate;
    /**
     * @var null
     */
    private $assunto;
    /**
     * @var null
     */
    private $dados;

    /**
     * MailJob constructor.
     * @param User $user
     * @param Company $empresa
     * @param STRING $viewTemplate
     */
    public function __construct($viewTemplate = null, $args = [], $assunto = null)
    {
        $this->viewTemplate = $viewTemplate;
        $this->assunto = $assunto;

        foreach ($args as $key => $value) {
            $this->dados[$key] = $value;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dados = $this->dados;
        $assunto = $this->assunto ?: 'Contato Estoqueintegrado.com';

        Log::debug("Enviando email para ". json_encode($this->dados['user']->email));

        Mail::send($this->viewTemplate, $this->dados,
            function ($mail) use ($dados, $assunto) {
                $mail->from('no-reply@estoqueintegrado.com.br', $dados['empresa']->nome);
                $mail->to($dados['user']->email, $dados['user']->name)->subject($assunto . ' 😎');
            }
        );
    }
}
