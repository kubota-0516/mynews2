<?php
//NewsControllerはブログを投稿したり、
//編集・削除したりするためのControllerとして使用していきます。

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
}
