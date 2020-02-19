<?php

namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Response;
use App\Domains\User\Jobs\GetUsersJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Http\Jobs\RespondWithViewJob;

class ListUsersFeature extends Feature
{
    public function handle(Request $request)
    {
        $users = $this->run(GetUsersJob::class);

        return $this->run(new RespondWithJsonJob($users));
       //return $this->run(new RespondWithViewJob('api::list', ['users' => $users]));
    }
}
