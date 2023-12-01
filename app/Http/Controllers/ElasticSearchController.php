<?php

namespace App\Http\Controllers;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class ElasticSearchController extends Controller
{
    private $elasticsearch;

    public function __construct()
    {
        $this->elasticsearch = ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_HOST') . ':' . env('ELASTICSEARCH_PORT')])
            ->build();
    }

    public function indexDocument($type, $data)
    {
        $params = [
            // 'index' => $index,
            'type' => $type,
            // 'id' => $id,
            'body' => $data,
        ];

        $response = $this->elasticsearch->index($params);

        return response()->json($response);
    }

    public function searchDocument($index, $query)
    {
        $params = [
            'index' => $index,
            'body' => [
                'query' => [
                    'match' => [
                        'field_name' => $query,
                    ],
                ],
            ],
        ];

        $response = $this->elasticsearch->search($params);

        return response()->json($response);
    }
}
