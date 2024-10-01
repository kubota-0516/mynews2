<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        //フォームから来た_tokenを削除
        unset($form['_token']);

        //データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        //profile modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' =>$profile]);
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
}