<?php

namespace App\Jobs;

use App\Models\Empresa;
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
     * @var Empresa
     */
    private $empresa;
    /**
     * @var null
     */
    private $viewTemplate;

    /**
     * MailJob constructor.
     * @param User $user
     * @param Empresa $empresa
     * @param STRING $viewTemplate
     */
    public function __construct(User $user, Empresa $empresa, $viewTemplate = null)
    {
        Log::debug("Adicionando Job");

        $this->user = $user;
        $this->empresa = $empresa;
        $this->viewTemplate = $viewTemplate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $empresa = $this->empresa;
        $user = $this->user;

        Log::debug("Executando Job");

        Mail::send($this->viewTemplate, ['user' => $this->user, 'empresa' => $this->empresa],
            function ($mail) use ($empresa, $user) {
                $mail->from('no-reply@estoqueintegrado.com.br', $empresa->nome);
                $mail->to($user->email, $user->name)->subject('Obrigado por se cadastrar em nosso site! 😎');
            }
        );
    }
}
