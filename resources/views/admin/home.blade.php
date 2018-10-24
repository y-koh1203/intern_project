@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div>
                        <p>Add Restaurant</p>
                        <p><a href="/regist/restaurant">register</a></p>
                    </div>

                    <div>
                        <p>Add Cuisine</p>
                        <p><a href="/regist/foods">register</a></p>
                    </div>

                    <div>
                        <p>Delete Cuisine</p>
                        <p><a href="/delete/foods">delete</a></p>
                    </div>

                    <div>
                        <p>Delete Restaurant</p>
                        <p><a href="/delete/restaurants">delete</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
