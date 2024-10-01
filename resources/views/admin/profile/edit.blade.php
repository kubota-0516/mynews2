{{-- admin/news/createをコピペして編集した --}}

{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'プロフィール編集画面'を埋め込む --}}
@section('title', 'プロフィールの編集画面2')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集2</h2>
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ $profile_form->gender }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新する">
                </form>

            </div>
        </div>
    </div>
@endsection
