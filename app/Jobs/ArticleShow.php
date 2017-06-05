<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;

use App\Http\Controllers\Frontend\ArticleController;
use App\Store\ArticleStore;

class ArticleShow implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $article_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article_id)
    {
        $this->article_id = $article_id;
        Log::info('Message:' . $article_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article_id = $this->article_id;
        $modelData = ArticleStore::getDataById($article_id);
        $descriptionExplode = explode('<hr style="page-break-after:always;" class="ke-pagebreak" />', $modelData->description);
        $total = count($descriptionExplode);

        for ($page = 1; $page <= $total; $page++) {
            $this->create($article_id, $page);
        }

    }

    public function create($article_id, $page)
    {
        $article = new ArticleController();
        $article->show($article_id, $page, false);
    }
}


