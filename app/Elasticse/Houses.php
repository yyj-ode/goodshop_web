<?php

namespace App\Elasticse;

use App\Library\Search;

/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/5/4
 * Time: 下午4:35
 */
class Houses
{
    protected $index;
    protected $type;
    protected $search;


    function __construct()
    {
        $this->index = env('ELASTICSEARCH_INDEX');
        $this->type = "houses";
        $this->search = new Search();;
    }

    /**
     * 添加数据
     * @param $body
     * @return array|bool
     */
    public function add($body)
    {
        return $this->search->add($this->index, $this->type, $body);
    }

    public function query($body)
    {
        return $this->search->query($this->index, $this->type, $body);
    }

    public function createIndex()
    {
        $body = [
            'settings' => [
                'number_of_shards' => 1,
                'number_of_replicas' => 0,
                'analysis' => [
                    'filter' => [
                        'shingle' => [
                            'type' => 'shingle'
                        ]
                    ],
                    'char_filter' => [
                        'pre_negs' => [
                            'type' => 'pattern_replace',
                            'pattern' => '(\\w+)\\s+((?i:never|no|nothing|nowhere|noone|none|not|havent|hasnt|hadnt|cant|couldnt|shouldnt|wont|wouldnt|dont|doesnt|didnt|isnt|arent|aint))\\b',
                            'replacement' => '~$1 $2'
                        ],
                        'post_negs' => [
                            'type' => 'pattern_replace',
                            'pattern' => '\\b((?i:never|no|nothing|nowhere|noone|none|not|havent|hasnt|hadnt|cant|couldnt|shouldnt|wont|wouldnt|dont|doesnt|didnt|isnt|arent|aint))\\s+(\\w+)',
                            'replacement' => '$1 ~$2'
                        ]
                    ],
                    'analyzer' => [
                        'reuters' => [
                            'type' => 'custom',
                            'tokenizer' => 'ik_max_word',
                            'filter' => ['lowercase', 'stop', 'kstem']
                        ]
                    ]
                ]
            ],
            'mappings' => [
                $this->type => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [
                        'name' => [
                            'type' => 'text'
                        ],
                        'title' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word',
                            'term_vector' => 'yes',
                            'copy_to' => 'combined'
                        ],
                        'body' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word',
                            'term_vector' => 'yes',
                            'copy_to' => 'combined'
                        ],
                        'combined' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word',//ik_smart
                            'term_vector' => 'yes'
                        ],
                        'topics' => [
                            'type' => 'text',
                            'index' => 'not_analyzed'
                        ],
                        'places' => [
                            'type' => 'text',
                            'index' => 'not_analyzed'
                        ]
                    ]
                ]
            ]
        ];
        return $this->search->createIndex($this->index, $body);
    }

    /**
     * 添加 mapping
     * @param $body
     * @return array|bool
     */
    public function putMapping()
    {
        $body = [
            $this->type => [
                '_source' => [
                    'enabled' => true
                ],
                'properties' => [
                    'first_name' => [
                        'type' => 'string',
                        'analyzer' => 'standard'
                    ],
                    'age' => [
                        'type' => 'integer'
                    ],
                    'name' => [
                        'type' => 'text'
                    ],
                    'title' => [
                        'type' => 'text',
                        'analyzer' => 'reuters',
                        'term_vector' => 'yes',
                        'copy_to' => 'combined'
                    ],
                    'body' => [
                        'type' => 'text',
                        'analyzer' => 'reuters',
                        'term_vector' => 'yes',
                        'copy_to' => 'combined'
                    ],
                    'combined' => [
                        'type' => 'text',
                        'analyzer' => 'reuters',
                        'term_vector' => 'yes'
                    ],
                    'topics' => [
                        'type' => 'text',
                        'index' => 'not_analyzed'
                    ],
                    'places' => [
                        'type' => 'text',
                        'index' => 'not_analyzed'
                    ]
                ]
            ]
        ];
        return $this->search->putMapping($this->index, $this->type, $body);
    }
}