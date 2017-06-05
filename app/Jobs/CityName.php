<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;
use App\Models\Question;

class CityName implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $question_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        $this->question_id = $question->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $question = Question::where('id', $this->question_id)->first();
        if ($question) {
            $city = $this->getCity($question->ip);
            if (!empty($city)) {
                $question->area = $city;
                $question->save();
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


