<?php

namespace App\Domains\User\Jobs;

use Lucid\Foundation\Job;

class SearchUsersByNameJob extends Job
{
    private $query;
    private $limit;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($query, $limit = 25)
    {
        $this->query = $query;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(User $user)
    {
        return $user->where('name', $this->query)->take($this->limit)->get();
    }
}
