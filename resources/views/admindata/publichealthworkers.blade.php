@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Public Health Workers
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Medicare ID</th>
                </tr>
            </thead>
            <form action="/data/publichealthworkers" method="GET">
                <tr>
                    <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" value="<?= $_GET["firstname"] ?? '' ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" value="<?= $_GET["lastname"] ?? '' ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" value="<?= $_GET["dob"] ?? '' ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" value="<?= $_GET["medicare"] ?? '' ?>" /></td>
                    <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
                </tr>
            </form>
            <form action="/data/publichealthworkers/new" method="POST">
                @csrf
                <tr>
                    <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name"/></td>
                    <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" /></td>
                    <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
                </tr>
            </form>
            <?php foreach($publichealthworkers as $publichealthworker) : ?>
                <tr id="person_<?= $publichealthworker->PersonID ?>">
                    <td scope="row"><?= $publichealthworker->FirstName ?></td>
                    <td><?= $publichealthworker->LastName ?></td>
                    <td><?= $publichealthworker->DateOfBirth ?></td>
                    <td><?= $publichealthworker->MedicareID ?></td>
                    <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $publichealthworker->PersonID ?>)">Edit</button></td>
                    <td>
                        <button id="delete_<?= $publichealthworker->PersonID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $publichealthworker->PersonID ?>)">Delete</button>
                        <a id="confirm_<?= $publichealthworker->PersonID ?>" href="/data/publichealthworkers/delete/<?= $publichealthworker->PersonID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                    </td>
                </tr>
                <form action="/data/publichealthworkers/edit" method="POST">
                @csrf
                    <tr id="editing_<?= $publichealthworker->PersonID ?>" style="display:none">
                        <td scope="row">
                            <input type="hidden" name="id" value="<?= $publichealthworker->PersonID ?>" />
                            <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" value="<?= $publichealthworker->FirstName ?>" />
                        </td>
                        <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" value="<?= $publichealthworker->LastName ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" value="<?= $publichealthworker->DateOfBirth ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" value="<?= $publichealthworker->MedicareID ?>" /></td>
                        <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $publichealthworker->PersonID ?>)">Cancel</button></td>
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