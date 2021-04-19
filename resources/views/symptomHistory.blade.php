@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Symptom History
        </div>
        
        <form class="col-md-4" action="symptomHistory" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="medicareID" id="medicareID">
                    <label for="medicareID">Medicare ID</label>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="date" name="date" id="date">
                    <label for="date">Date of Test</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Go</button>
                </div>
            </div>
        </form>

        <?php if (isset($history) && $history != null) : ?>
            <table class="table">
                <tr>
                    <td>Date</td>
                    <td>Temperature</td>
                    <td>Cough</td>
                    <td>Shortness of Breath</td>
                    <td>Loss of Taste</td>
                    <td>Loss of Smell</td>
                    <td>Nausea</td>
                    <td>Stomach Ache</td>
                    <td>Vomiting</td>
                    <td>Headache</td>
                    <td>Muscle Pain</td>
                    <td>Diarrhea</td>
                    <td>Sore Throat</td>
                    <td>Other</td>
                </tr>
                <?php foreach($history as $record) : ?>
                <tr>
                    <td><?= $record->Date ?></td>
                    <td style="color:<?= $record->Fever >= 38.1 ? 'red' : 'green' ?>"><?= $record->Fever ?></td>
                    <td><?= $record->Cough == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->ShortnessOfBreath == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->LossOfTaste == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->LossOfSmell == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->Nausea == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->StomachAche == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->Vomiting == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->Headache == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->MusclePain == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->Diarrhea == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->SoreThroat == 1 ? '&#10003;' : '&#10008;' ?></td>
                    <td><?= $record->Other ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
@endsection