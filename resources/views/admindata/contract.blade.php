@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <?=$person->FirstName . ' ' . $person->LastName?> Contracts
        </div>
        <a class="btn btn-md" href="data/publichealthworkers/">Back</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Public Health Centre Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Schedule</th>
                </tr>
            </thead>
            <form action="data/publichealthworkers/contract/<?= $person->PublicHealthWorkerID ?>/new" method="POST">
                @csrf
                <tr>
                    <td scope="row"><input type="text" class="form-control form-control-sm" name="publichealthcentre" placeholder="Public Health Centre"></td>
                    <td><input type="text" class="form-control form-control-sm" name="startdate" placeholder="Start Date"></td>
                    <td><input type="text" class="form-control form-control-sm" name="enddate" placeholder="End Date"></td>
                    <td><input type="text" class="form-control form-control-sm" name="schedule" placeholder="Schedule"></td>
                    <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
                </tr>
            </form>
            <?php foreach($contracts as $contract) : ?>
                <tr id="publichealthworker_<?= $contract->EmploymentContractID ?>">
                    <td scope="row"><?= $contract->Name ?></td>
                    <td><?= $contract->StartDate ?></td>
                    <td><?= $contract->EndDate ?></td>
                    <td><?= $contract->Schedule ?></td>
                <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $contract->EmploymentContractID  ?>)">Edit</button></td>
                    <td>
                        <button id="delete_<?= $contract->EmploymentContractID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $contract->EmploymentContractID ?>)">Delete</button>
                        <a id="confirm_<?= $contract->EmploymentContractID ?>" href="data/publichealthworkers/contract/<?= $person->PublicHealthWorkerID ?>/delete/<?= $contract->EmploymentContractID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                    </td>
                </tr>
                <form action="data/publichealthworkers/contract/<?= $person->PublicHealthWorkerID ?>/edit" method="POST">
                @csrf
                    <tr id="editing_<?= $contract->EmploymentContractID ?>" style="display:none">
                        <td scope="row">
                            <input type="hidden" name="id" value="<?= $contract->EmploymentContractID ?>" />
                            <input type="text" class="form-control form-control-sm" name="publichealthcentre" placeholder="Public Health Centre" value="<?= $contract->PublicHealthCentreID ?>" />
                        </td>
                        <td><input type="text" class="form-control form-control-sm" name="startdate" placeholder="Start Date" value="<?= $contract->StartDate ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="enddate" placeholder="End Date" value="<?= $contract->EndDate ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="schedule" placeholder="Schedule" value="<?= $contract->Schedule ?>" /></td>
                        <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $contract->EmploymentContractID ?>)">Cancel</button></td>
                        <td><button type="submit" class="btn btn-success btn-sm w-100">Save</a></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </table>
    </div>
<script>
function Edit(id) {
    $('#editing_' + id).show();
    $('#publichealthworker_' + id).hide();
}

function Cancel(id) {
    $('#editing_' + id).hide();
    $('#publichealthworker_' + id).show();
}

function Delete(id) {
    $('#delete_' + id).hide();
    $('#confirm_' + id).show();
}
</script>
@endsection