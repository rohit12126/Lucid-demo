<?php

namespace App\Domains\User\Jobs;

use Lucid\Foundation\Job;

class GetUsersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return [
            ['name' => 'John','last_name' => 'Doe','email' => 'John@mailinator.com'],
            ['name' => 'Mark ','last_name' => 'Boucher','email' => 'Mark@mailinator.com'],
            ['name' => 'Julia','last_name' => 'Robert','email' => 'Juilia@mailinator.com'],
        ];
    }
}
