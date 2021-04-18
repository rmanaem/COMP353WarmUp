@extends('layouts.layout')

@section('content')
<pre><?php //echo var_dump($persons) ?></pre>
<div class="content">
    <div class="title m-b-md">
        Persons
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Medicare ID</th>
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col">Postal Code</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Citizenship</th>
                <th scope="col">Email Address</th>
                <th scope="col" colspan=2>Actions</th>
            </tr>
        </thead>
        <form action="/data/persons" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" value="<?= $_GET["firstname"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" value="<?= $_GET["lastname"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" value="<?= $_GET["dob"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" value="<?= $_GET["medicare"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" value="<?= $_GET["phone"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="<?= $_GET["address"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="postal" placeholder="Postal Code" value="<?= $_GET["postal"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="city" placeholder="City" value="<?= $_GET["city"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $_GET["province"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="citizenship" placeholder="Citizenship" value="<?= $_GET["citizenship"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="email" placeholder="Email Address" value="<?= $_GET["email"] ?? '' ?>" /></td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <form action="/data/persons/new" method="POST">
        @csrf
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" /></td>
                <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name"/></td>
                <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" /></td>
                <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" /></td>
                <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" /></td>
                <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" /></td>
                <td><input type="text" class="form-control form-control-sm" name="postal" placeholder="Postal Code" /></td>
                <td><input type="text" class="form-control form-control-sm" name="city" placeholder="City" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" /></td>
                <td><input type="text" class="form-control form-control-sm" name="citizenship" placeholder="Citizenship" /></td>
                <td><input type="text" class="form-control form-control-sm" name="email" placeholder="Email Address" /></td>
                <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
            </tr>
        </form>
        <?php foreach($persons as $person) : ?>
            <tr id="person_<?= $person->PersonID ?>">
                <td scope="row"><?= $person->FirstName ?></td>
                <td><?= $person->LastName ?></td>
                <td><?= $person->DateOfBirth ?></td>
                <td><?= $person->MedicareID ?></td>
                <td><?= $person->PhoneNumber ?></td>
                <td><?= $person->Address ?></td>
                <td><?= $person->PostalCode ?></td>
                <td><?= $person->City ?></td>
                <td><?= $person->Province ?></td>
                <td><?= $person->Citizenship ?></td>
                <td><?= $person->EmailAddress ?></td>
                <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $person->PersonID ?>)">Edit</button></td>
                <td>
                    <button id="delete_<?= $person->PersonID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $person->PersonID ?>)">Delete</button>
                    <a id="confirm_<?= $person->PersonID ?>" href="/data/persons/delete/<?= $person->PersonID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                </td>
            </tr>
            <form action="/data/persons/edit" method="POST">
            @csrf
                <tr id="editing_<?= $person->PersonID ?>" style="display:none">
                    <td scope="row">
                        <input type="hidden" name="id" value="<?= $person->PersonID ?>" />
                        <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" value="<?= $person->FirstName ?>" />
                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" value="<?= $person->LastName ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" value="<?= $person->DateOfBirth ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" value="<?= $person->MedicareID ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" value="<?= $person->PhoneNumber ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="<?= $person->Address ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="postal" placeholder="Postal Code" value="<?= $person->PostalCode ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="city" placeholder="City" value="<?= $person->City ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $person->Province ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="citizenship" placeholder="Citizenship" value="<?= $person->Citizenship ?>" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="email" placeholder="Email Address" value="<?= $person->EmailAddress ?>" /></td>
                    <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $person->PersonID ?>)">Cancel</button></td>
                    <td><button type="submit" class="btn btn-success btn-sm w-100">Save</a></td>
                </tr>
            </form>
        <?php endforeach; ?>
</div>

<script>
function Edit(id) {
    $('#editing_' + id).show();
    $('#person_' + id).hide();
}

function Cancel(id) {
    $('#editing_' + id).hide();
    $('#person_' + id).show();
}

function Delete(id) {
    $('#delete_' + id).hide();
    $('#confirm_' + id).show();
}
</script>
@endsection