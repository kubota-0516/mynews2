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
}
