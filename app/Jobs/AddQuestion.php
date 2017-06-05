<?php

namespace App\Jobs;

use App\Store\QuestionStore;
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

class AddQuestion implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $question_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($question_id)
    {
        $this->question_id = $question_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        QuestionStore::addById($this->question_id);
    }

}


