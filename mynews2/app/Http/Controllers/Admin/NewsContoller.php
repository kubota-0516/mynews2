<?php
//NewsControllerはブログを投稿したり、
//編集・削除したりするためのControllerとして使用していきます。

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsContoller extends Controller
{
    //Routingは来たアクセスをControllerに渡しているのではなく、
    //Controllerの中のActionに渡している
    
    public function add()
    {
        return view('admin.news.create');
    }
}
