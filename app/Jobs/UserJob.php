<?php

namespace App\Jobs;

use App\Models\User;
use DB;
use Log;

/**
 * Class UserJob
 *
 * Responsavel por fazer a limpesa do token do Usuário
 * a configuração do tempo é definida no arquivo .env TIME_TO_RESET_TOKEN
 *
 * @package App\Jobs
 *
 */
class UserJob extends Job
{
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->api_token = null;
        $this->user->save();
    }
}
