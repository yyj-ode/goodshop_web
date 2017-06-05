<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Log;
use GuzzleHttp\Client;

class ArticleMain implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $category_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($category_id)
    {
        $this->category_id = $category_id;
        Log::info('Message:' . $category_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $category_id = $this->category_id;

        if (CategoryStore::checkByParentId($category_id)) {
            $this->mains($category_id);
        } else {
            $pageSize = config('common.page_size');
            $total = ArticleStore::countNumber($category_id);
            $pageCount = ceil($total / $pageSize);

            for ($page = 1; $page <= $pageCount; $page++) {
                $this->lists($category_id, $page);
            }
        }
    }

    public function mains($category_id)
    {
        $article = new ArticleController();
        $article->index($category_id, false);
    }

    public function lists($category_id, $page = 1)
    {
        $article = new ArticleController();
        $article->lists($category_id, $page, false);
    }
}


