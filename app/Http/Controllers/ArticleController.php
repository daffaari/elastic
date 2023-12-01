<?php

namespace App\Http\Controllers;

use App\Models\Article as ModelsArticle;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        $data = ModelsArticle::get();
        $count = ModelsArticle::count();
        return view('article', compact('data', 'count'));
    }

    public function find(Request $request)
    {

        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'articles_1701402590',
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $request->key,
                        'fields' => ['*'],
                    ],
                ],
                'sort' => [
                    '_score' => [ // ini berdasarkan skor relevansi dari ES
                        'order' => 'asc',
                    ],
                ],
            ],
        ];

        $responseData = $client->search($params);
        $data = json_decode($responseData->getBody(), true);

        // dd($data);

        return view('results', compact('data'));



    }

    public function save(Request $request)
    {
        $data = new ModelsArticle();
        $data->title = $request->title;
        $data->type = $request->type;
        $data->content = $request->content;
        // $data = ModelsArticle::search($request->key)->get();
        // $count = count($data);
        // dd($data);
        $data->save();
        return redirect(route('article'));
    }

    public function update(Request $request)
    {

        $data = ModelsArticle::find($_POST['data_id']);
        // $data = ModelsArticle::search($request->key)->get();
        // $count = count($data);
        $data->title = $_POST['title_edit'];
        $data->type = $_POST['type_edit'];
        $data->content = $_POST['content_edit'];
        $data->save();
        // dd($data);
        return redirect(route('article'));

    }

    public function delete(Request $request, $id)
    {

        $data = ModelsArticle::where('id', $id)->delete();

        return redirect(route('article'));
    }

}
