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
                            <?php if ($permissions == 2) : ?>
                                <input type="text" class="form-control" id="medicareID" aria-describedby="medicareIDHelp" name="medicareID">
                            <small id="medicareIDHelp" class="form-text text-muted">If you are a public health worker filling the form for someone else, please enter the patient's medicare ID</small>
                            <?php else : ?>
                                <input type="text" class="form-control" id="medicareID" aria-describedby="medicareIDHelp" value="<?= $medicare ?>" name="medicareID" readonly>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fever">Temperature</label>
                            <input type="number" class="form-control" id="fever" aria-describedby="feverHelp" name="fever" required>
                            <small id="feverHelp" class="form-text text-muted">Please enter your temperature in Celsius</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cough" name="cough">
                            <label class="form-check-label" for="cough">
                                Cough
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="shortnessOfBreath" name="shortnessOfBreath">
                            <label class="form-check-label" for="shortnessOfBreath">
                                Short breath
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="lossOfTaste" name="lossOfTaste">
                            <label class="form-check-label" for="lossOfTaste">
                                Loss of taste
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="lossOfSmell" name="lossOfSmell">
                            <label class="form-check-label" for="lossOfSmell">
                                Loss of smell
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="soreThroat" name="soreThroat">
                            <label class="form-check-label" for="soreThroat">
                                Sore throat
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="nausea" name="nausea">
                            <label class="form-check-label" for="nausea">
                                Nausea
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="stomachAche" name="stomachAche">
                            <label class="form-check-label" for="stomachAche">
                                Stomach ache
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="vomiting" name="vomiting">
                            <label class="form-check-label" for="vomiting">
                                Vomiting
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="headache" name="headache">
                            <label class="form-check-label" for="headache">
                                Headache
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="musclePain" name="musclePain">
                            <label class="form-check-label" for="musclePain">
                                Muscle pain
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="diarrhea" name="diarrhea">
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
                            <textarea class="form-control" id="other" rows="3" name="other"></textarea>
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