<?php
//NewsControllerはブログを投稿したり、
//編集・削除したりするためのControllerとして使用していきます。

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News; //News modelが扱えるようになる

class NewsController extends Controller
{
    //Routingは来たアクセスをControllerに渡しているのではなく、
    //Controllerの中のActionに渡している
    
    public function add()
    {
        return view('admin.news.create');
        //                      ^^^^^^ ファイル名 create.blade.php
        //           ^^^^^^^^^^ フォルダ名 admin/news/
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();

        //フォームから画像が来たら保存、$news->image_path に画像を保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }

        //フォームから来た_tokenを削除
        unset($form['_token']);
        //フォームから来たimageを削除
        unset($form['image']);

        //データベースに保存する
        $news->fill($form);
        $news->save();

        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = News::where('title', $cond_title)->get();
        } else {
            //それ以外は全てのニュースを取得する
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        //newsmodelからデータを取得する
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit', ['news_form' =>$news]);
    }

    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, News::$rules);
        //NewsModelからデータを取得する
        $news = News::find($request->id);
        //送信されてきたフォームデータを格納する
        $news_form = $request->all();

        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')){
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;
        }

        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);
        
        //データを上書き保存
        $news->fill($news_form)->save();

        return redirect('admin/news');
    }
}
