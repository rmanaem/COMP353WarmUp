@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="title m-b-md">
                    PCR Test Result Entry
                </div>
            </div>
        </div>
        <div class="row">
            <form class="col-md-4" action="/pcrEntry" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fever">Medicare ID</label>
                            <input type="text" class="form-control" id="medicareID" aria-describedby="medicareIDHelp" name="medicareID">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fever">Date of Test</label>
                            <input type="date" class="form-control" id="date" aria-describedby="dateHelp" name="date" required>
                            <small id="dateHelp" class="form-text text-muted">Please enter the date the test was taken</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Test Result</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="result1" name="result" value="1">
                            <label class="form-check-label" for="result1">Positive</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="result2" name="result" value="0">
                            <label class="form-check-label" for="result2">Negative</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-md-3">
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection