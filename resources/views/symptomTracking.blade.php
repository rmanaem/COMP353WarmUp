@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="title m-b-md">
                    Symptom Tracking
                </div>
            </div>
        </div>
        <div class="row">
            <form class="col-md-4" action="/symptomTracking" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fever">Medicare ID</label>
                            <input type="text" class="form-control" id="medicareID" aria-describedby="medicareIDHelp">
                            <small id="medicareIDHelp" class="form-text text-muted">If you are an admin filling the form for someone else, please enter the patient's medicare ID</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fever">Temperature</label>
                            <input type="number" class="form-control" id="fever" aria-describedby="feverHelp" required>
                            <small id="feverHelp" class="form-text text-muted">Please enter your temperature in Celsius</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cough">
                            <label class="form-check-label" for="cough">
                                Cough
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="shortnessOfBreath">
                            <label class="form-check-label" for="shortnessOfBreath">
                                Short breath
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="lossOfTaste">
                            <label class="form-check-label" for="lossOfTase">
                                Loss of taste
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="lossOfSmell">
                            <label class="form-check-label" for="lossOfSmell">
                                Loss of smell
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="soreThroat">
                            <label class="form-check-label" for="soreThroat">
                                Sore throat
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="nausea">
                            <label class="form-check-label" for="nausea">
                                Nausea
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="stomachAche">
                            <label class="form-check-label" for="stomachAche">
                                Stomach ache
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="vomiting">
                            <label class="form-check-label" for="vomiting">
                                Vomiting
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="headache">
                            <label class="form-check-label" for="headache">
                                Headache
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="musclePain">
                            <label class="form-check-label" for="musclePain">
                                Muscle pain
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="diarrhea">
                            <label class="form-check-label" for="diarrhea">
                                Diarrhea
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="other">Other symptoms</label>
                            <textarea class="form-control" id="other" rows="3"></textarea>
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