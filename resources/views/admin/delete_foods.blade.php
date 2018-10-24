@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">料理の削除</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/delete/foods/exec" method="post">

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

                        @if(count($data) > 0)
                        <div class="form-group">
                            {!! Form::label('name','料理名', ['class' => 'control-label']) !!}
                            @foreach($data as $datum)
                            <div>
                                <input type="checkbox" name="foods[]" value="{{$datum->id}}">{{$datum->name}}
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div>削除できるデータがありません。</div>
                        @endif

                        @if(count($data) > 0)
                        <div class="form-group">
                            {!! Form::submit('削除', ['class' => 'btn btn-default']) !!}
                        </div>
                        @endif
                     
                    </form>
                    <p><a href="/home">back to home</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
