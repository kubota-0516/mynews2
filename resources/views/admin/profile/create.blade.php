{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィールの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成2</h2>

                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

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
                            <textarea class="form-control" name="name" rows="20">{{ old('name') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md 2">趣味</label>
                        <div class="col-md-10">
                            <taxtarea class="form-control" name="hobby" rows="20">{{ old('hobby')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <lavel class="col-md 2">自己紹介欄</lavel>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
            </div>
            

        </div>
    </div>
@endsection