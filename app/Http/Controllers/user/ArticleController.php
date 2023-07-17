<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return response()->json($articles, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'article_title' => 'required',
            'text' => 'required',
            'foto_article' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $file = $request->file('foto_article');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $destination = 'fotoarticles';
        $file->move($destination, $file_name);

        $article = new Article();
        $article->article_title = $request->article_title;
        $article->text = $request->text;
        $article->foto_article = $destination . "/" . $file_name;
        $article->save();

        return response()->json($article, 200);
    }

    public function show($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($article, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'article_title' => 'required',
            'text' => 'required',
            'foto_article' => 'file|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!is_null($request->foto_article)) {
            $file = $request->file('foto_article');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $destination = 'fotoarticles';
            $file->move($destination, $file_name);
        }

        $article = Article::find($id);
        if (is_null($article)) {
            return response()->json('Data tidak ditemukan', 404);
        }

        $article->article_title = $request->article_title;
        $article->text = $request->text;
        if (!is_null($request->foto_article)) {
            $article->foto_article = $destination . "/" . $file_name;
        }
        $article->save();

        return response()->json($article, 200);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (!is_null($article)) {
            $article->delete();
        }

        return response()->json("Berhasil menghapus data", 200);
    }
}
