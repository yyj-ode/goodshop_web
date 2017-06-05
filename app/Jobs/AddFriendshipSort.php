<?php

namespace App\Jobs;

use App\Store\FriendshipSortStore;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;
use App\Models\User;
use App\Utils\Common;

class AddFriendshipSort implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FriendshipSortStore::addById($this->id);
    }

}


