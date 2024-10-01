{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成2')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成2</h2>
                <form action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">
                

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル2</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">本文入力画面</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">画像を追加する</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image"></input>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新する"></input>
                </form>

            </div>
        </div>
    </div>
@endsection