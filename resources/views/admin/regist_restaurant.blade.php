@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">飲食店の登録</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/regist/restaurant/insert', 'method' => 'post']) !!}

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
                            {!! Form::label('name','店舗名', ['class' => 'control-label']) !!}
                            {!! Form::text('name') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('address','住所', ['class' => 'control-label']) !!}
                            {!! Form::text('address') !!}
                        </div>

                        <div class="form-group">
                            <p>{!! Form::label('body','説明', ['class' => 'control-label']) !!}</p>
                            {!! Form::textarea('body') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('url','URL', ['class' => 'control-label']) !!}
                            {!! Form::text('url') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('登録', ['class' => 'btn btn-default']) !!}
                        </div>

                       
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
