<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;
use App\Models\Answer;

class AnswerCity implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $answer_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer_id = $answer->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $answer = Answer::where('id', $this->answer_id)->first();
        if ($answer) {
            $city = $this->getCity($answer->ip);
            if (!empty($city)) {
                $answer->area = $city;
                $answer->save();
            }
        }
    }

    public function getCity($ip)
    {
        $cityData = getCityByIp($ip);
        $city = '';
        if (is_array($cityData) && isset($cityData['region']) && $cityData['city']) {
            $city = $cityData['region'] . $cityData['city'];
        }
        return $city;
    }
}


