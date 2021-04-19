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
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col">Postal Code</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Citizenship</th>
                <th scope="col">Email Address</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <form action="data/persons" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" value="<?= $_GET["firstname"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" value="<?= $_GET["lastname"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" value="<?= $_GET["dob"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" value="<?= $_GET["phone"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="<?= $_GET["address"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="postal" placeholder="Postal Code" value="<?= $_GET["postal"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="city" placeholder="City" value="<?= $_GET["city"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $_GET["province"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="citizenship" placeholder="Citizenship" value="<?= $_GET["citizenship"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="email" placeholder="Email Address" value="<?= $_GET["email"] ?? '' ?>" /></td>
                <td><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <?php foreach($persons as $person) : ?>
            <tr id="person_<?= $person->PersonID ?>">
                <td scope="row"><?= $person->FirstName ?></td>
                <td><?= $person->LastName ?></td>
                <td><?= $person->DateOfBirth ?></td>
                <td><?= $person->PhoneNumber ?></td>
                <td><?= $person->Address ?></td>
                <td><?= $person->PostalCode ?></td>
                <td><?= $person->City ?></td>
                <td><?= $person->Province ?></td>
                <td><?= $person->Citizenship ?></td>
                <td><?= $person->EmailAddress ?></td>
            </tr>
        <?php endforeach; ?>
</div>
@endsection