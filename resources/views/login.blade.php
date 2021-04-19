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
            <form class="col-md-6" action="login" method="post">
                @csrf  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="user" type="text" class="form-control" placeholder="Medicare ID" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="pass" type="password" class="form-control" placeholder="Date of Birth" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                    </div>
                </div>    
            </form>
        </div>
    </div>
@endsection