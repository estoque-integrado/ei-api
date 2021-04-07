<?php

namespace App\Jobs;

use App\Models\User;
use DB;
use Log;

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
