@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="title m-b-md">
                    Login
                </div>
            </div>
        </div>
        <div class="row">
            <form class="col-md-4" action="/login" method="post">     
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Medicare ID" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Date of Birth" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                    </div>
                </div>    
            </form>
        </div>
    </div>
@endsection