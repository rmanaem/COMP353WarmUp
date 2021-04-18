@extends('layouts.layout')

@section('content')
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
                    <th scope="col">Citizenship</th>
                    <th scope="col">Email Address</th>
                    <th scope="col" colspan=2>Actions</th>
                </tr>
            </thead>
            <form action="" method="GET">
                <tr>
                    <td scope="row"><input type="text" class="form-control form-control-sm" name="firstname" placeholder="First name" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="lastname" placeholder="Last name" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="dob" placeholder="Date of Birth" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="medicare" placeholder="Medicare ID" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="postal" placeholder="Postal Code" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="city" placeholder="City" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="citizenship" placeholder="Citizenship" /></td>
                    <td><input type="text" class="form-control form-control-sm" name="email" placeholder="Email Address" /></td>
                    <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
                </tr>
            </form>
            <?php foreach($persons as $person) : ?>
            <form action="edit" method="POST">
                <tr>
                    <td scope="row"><input type="hidden" name="id" value="<?= $person->ID ?>" /><?= $person->FirstName ?></td>
                    <td><?= $person->LastName ?></td>
                    <td><?= $person->DateOfBirth ?></td>
                    <td><?= $person->MedicareID ?></td>
                    <td><?= $person->PhoneNumber ?></td>
                    <td><?= $person->Address ?></td>
                    <td><?= 'pending' ?></td>
                    <td><?= 'pending' ?></td>
                    <td><?= $person->Citizenship ?></td>
                    <td><?= $person->EmailAddress ?></td>
                    <td><button type="submit" class="btn btn-warning btn-sm w-100">Edit</button></td>
                    <td><a href="persons/delete/<?= $person->ID ?>" class="btn btn-danger btn-sm w-100">Delete</a></td>
                </tr>
            </form>
            <?php endforeach; ?>
    </div>
    <pre><?= $persons ?></pre>
@endsection