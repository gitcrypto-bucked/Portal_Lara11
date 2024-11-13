<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\DB;
use App\Policies\PermisionPolicy;

class NewsController extends Controller
{

    public function dashboard()
    {
        $perm = new \App\Policies\PermisionPolicy('news-list');
        $news = $this->getAllNews();
        return view('news')->with('news', $news)->with('perm', $perm);
    }

    protected function getAllNews()
    {
        $paginate = Config::get('pagination.NEWS');
        $model = new NewsModel();
        return $model->getAllNews(intval($paginate));
    }

    public function registerNews(Request $request)
    {

        $request->validate([
            'thumb' => 'required|mimes:jpg,png,webp|max:2048',
            'webrul' => 'required|url',
            'sinopse' => 'required|string|min:20',
            'title' => 'required|string|min:8',
        ]);

        if(parse_url($request->webrul, PHP_URL_SCHEME)==false |
            parse_url($request->webrul, PHP_URL_HOST)==false)
        {
            return redirect('/register-news')->with('error', 'A url informada não é valida.');
        }
        if ($request->file('thumb')->isValid())
        {
            $file = $request->file('thumb');
            $path = $request->file('thumb')->storeAs('public/thumb', $file->hashName());
        }
        else
        {
            return redirect('/register-news')->with('error', 'O arquivo de imagem tem que ser jpg, png, jpeg ou webp.');
        }
        $hora = time();
        $news = [
            'created_at'=>date('Y-m-d H:i:s', $hora),
            'thumb'=>$file->hashName(),
            'intro' => $request->sinopse,
            'active' => '1',
            'title' => $request->title,
            'url' => $request->webrul,
        ];
        $newsModel = new NewsModel();
        if($newsModel->insert($news))
        {
            event(new \App\Events\NewsPublished($news));

            return redirect('/register-news')->with('success', 'Noticia cadastrada com sucesso!');
        }
        return redirect('/register-news')->with('error', 'Houve um erro ao cadastrar a noticia!.');

    }


    /** função que desativa a noticia  */
    public function disableNews(Request $request)
    {
        $model = new NewsModel();
        if($model->remove($request->id))
        {
            return redirect('/list-news')->with('success', 'Noticia desativada com sucesso!');
        }
        return redirect('/list-news')->with('error', 'Houve um erro ao desativar a noticia!.');
    }

    public function add_News()
    {
        return view('add_news');
    }
}
