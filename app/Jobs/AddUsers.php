<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;
use App\Models\User;
use App\Utils\Common;
use App\Store\UserStore;

class AddUsers implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::whereId($this->user_id)->first();
        if ($user == false) {
            $model = new User();
            $model->id = $this->user_id;
            $model->name = Common::hashidEncode($this->user_id);
            $model->save();
        }
        UserStore::addById($this->user_id);
    }

}


