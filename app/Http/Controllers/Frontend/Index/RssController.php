<?php
namespace App\Http\Controllers\Frontend\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Http\Requests;
use Rss;

class RssController extends FrontendController
{
    public function index()
    {
        $channel = [
            'title' => 'title',
            'link'  => 'http://www.lieqiong.com',
            'description' => 'description',
            'category' => [
                'value' => 'html',
                'attr' => [
                    'domain' => 'http://www.lieqiong.com'
                ]
            ]
        ];

        $rss = Rss::channel($channel);

        $items = [];
        for($i = 0; $i < 2; $i++) {
            $item = [
                'title' => "title".$i,
                'description' => 'description',
                'source' => [
                    'value' => 'www.lieqiong.com',
                    'attr' => [
                        'url' => 'http://www.lieqiong.com'
                    ]
                ]
            ];
            $items[] = $item;
            $rss->item($item);
        }

        return response($rss, 200, ['Content-Type' => 'text/xml']);

        //Other acquisition methods
//        return response($rss->build()->asXML(), 200, ['Content-Type' => 'text/xml']);

//        return response($rss->fastBuild($channel, $items)->asXML(), 200, ['Content-Type' => 'text/xml']);

//        return response($rss->channel($channel)->items($items)->build()->asXML(), 200, ['Content-Type' => 'text/xml']);

    }
}