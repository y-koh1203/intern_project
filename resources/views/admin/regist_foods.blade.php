@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/regist/foods/insert" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        {{--成功時のメッセージ--}}
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        {{-- エラーメッセージ --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('name','料理名', ['class' => 'control-label']) !!}
                            {!! Form::text('name') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('restaurant_id','店舗名', ['class' => 'control-label']) !!}
                            <select name="restaurant_id" id="">
                                @foreach ($data as $datum)
                                    <option value="" selected></option>
                                    <option value="{{$datum->id}}">{{$datum->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('genre', 'ジャンル', ['class' => 'control-label']) !!}
                            <select name="genre" id="">
                                    <option value="" selected></option>
                                    <option value="1">和</option>
                                    <option value="2">洋</option>
                                    <option value="3">中</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>{!! Form::label('body','説明', ['class' => 'control-label']) !!}</p>
                            {!! Form::textarea('body') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price','価格', ['class' => 'control-label']) !!}
                            {!! Form::text('price') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('file[]', '画像アップロード', ['class' => 'control-label']) !!}
                            <input type="file" name="file[]" id="" multiple>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('登録', ['class' => 'btn btn-default']) !!}
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
