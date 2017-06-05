<?php

namespace App\Http\Controllers\Frontend\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Pagination;
use Log;
use App\Library\Search;
use App\Elasticse\Houses;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = new Search();
        $houses = new Houses();

//        $body = [
//            'age'=>1,
//            'body'=>"yangcuiwang",
//            'combined'=>"翠旺",
//            'first_name'=>"杨",
//            'name'=>"翠旺",
//            'places'=>"北京",
//            'title'=>"第三置业",
//            'topics'=>"讨论学习",
//        ];
//
////        dd($houses->add($body));
//
//        dd($houses->query(['match'=>['name'=>'翠旺']]));

//        dd($houses->putMapping());
//        dd($houses->createIndex());
//        dd($search->deleteMapping('nndeal','houses'));
        dd($search->getMapping('nndeal'));
//        dd($search->getIndex('nndeal'));
//        dd($search->deleteIndex('nndeal'));
        die();

        for($i = 0; $i < 10; $i++) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'my_index',
                    '_type' => 'my_type',
                ]
            ];

            $params['body'][] = [
                'my_field' => 'my_value',
                'second_field' => 'some more values'
            ];
        }
        
        dd($params);



        $mappings = [
            'answer_id' => [ #这里是字段名
                'type' => 'string', #字段类型（不指定也行，elasticsearch 自己会猜）
                'index' => 'not_analyzed' #告诉 elasticsearch，本字段不需要被分词，需要完整的读写）
            ],
            'user_id' => ['type' => 'string', 'index' => 'not_analyzed'],
            'questions' => [
                'type' => 'nested',
                'properties' => [
                    'page_id' => [
                        'type' => 'string',
                        'index' => 'not_analyzed'
                    ],
                    'question_id' => ['type' => 'string', 'index' => 'not_analyzed'],
                    'question' => ['type' => 'string', 'index' => 'not_analyzed'],
                    'option' => ['type' => 'string', 'index' => 'not_analyzed']
                ]
            ],
            'start_at' => [
                'type' => 'date',
                'format' => 'yyyy-MM-dd HH:mm:ss'
            ],
            'ended_at' => ['type' => 'date', 'format' => 'yyyy-MM-dd HH:mm:ss']
        ];

        $setting = [
            'number_of_shards' => 2,
            'number_of_replicas' => 0
        ];
        var_dump($search->createIndex('answer',$setting));die();

        var_dump($search->existsIndex('article'));die();
        var_dump($search->deleteIndex('article'));die();


        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'article',
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        $response = $client->indices()->create($params);

        dd($response);


        $params = [
            'index' => 'customer',
            'type' => 'external',
            'body' => [
                'query' => [
                    'match' => [
                        'name' => 'JOhn'
                    ]
                ]
            ]
        ];

        $response = $client->search($params);

        dd($response);

        $params = [
            'index' => 'customer',
            'type' => 'external',
            'id' => '1'
        ];

        $response = $client->getSource($params);
        dd($response);

        $allData = [];
        $total = 0;
        $pageSize = config('common.page_size');
        $page = $request->get('page', '1');
        $offset = max(($page - 1), "0") * $pageSize;

        $word = clear_text($request->get('keywords', '人类健康网'));
        $allData['keywords'] = $word;

        /**
         * 判断是不是手机访问
         */

        $allData['total'] = $total;
        $allData['totalPage'] = ceil($total / $pageSize);


        $pages = new Pagination($total, $pageSize);
        $pageList = $pages->fpage(array(3, 4, 5, 6, 7));
        $allData['pagelist'] = $pageList;

        if ($this->is_mobile()) {
            return view('Frontend.Index.Web.Search.index', compact('allData'));
        } else {
            return view('Frontend.Index.Web.Search.index', compact('allData'));
        }
    }

    public function baidu(Request $request)
    {
        $allData = [];
        $word = clear_text($request->get('keywords', '人类健康网'));
        $allData['keywords'] = $word;

        /**
         * 本站推荐
         */
        $recommendData = ArticleStore::getRecommend([], 10, 'search');
        $allData['recommendData'] = $recommendData;

        if ($this->is_mobile()) {
            $isMobile = true;
        } else {
            $isMobile = false;
        }

        $allData['isMobile'] = $isMobile;
        return view('frontend.web.search.baidu', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
