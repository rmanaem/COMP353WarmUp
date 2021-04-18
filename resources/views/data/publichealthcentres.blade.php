@extends('layouts.layout')

@section('content')
<pre><?php //echo var_dump($persons) ?></pre>
<div class="content">
    <div class="title m-b-md">
        Public Health Centres
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Website</th>
                <th scope="col">Type</th>
                <th scope="col">Drive Through</th>
                <th scope="col">Appointment Type</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <form action="/data/publichealthcentres" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $_GET["name"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="<?= $_GET["address"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone Number" value="<?= $_GET["phonenumber"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="website" placeholder="Website" value="<?= $_GET["website"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="type" placeholder="Type" value="<?= $_GET["type"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="drivethrough" placeholder="Drive Through" value="<?= $_GET["drivethrough"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="appointmenttype" placeholder="Appointment Type" value="<?= $_GET["appointmenttype"] ?? '' ?>" /></td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <?php foreach($publichealthcentres as $publichealthcentre) : ?>
            <tr id="publichealthcentre_<?= $publichealthcentre->ID ?>">
                <td scope="row"><?= $publichealthcentre->Name ?></td>
                <td><?= $publichealthcentre->Address ?></td>
                <td><?= $publichealthcentre->PhoneNumber ?></td>
                <td><?= $publichealthcentre->Website ?></td>
                @if ($publichealthcentre->Type == 'c')
                <td>Clinic</td>
                @endif
                @if ($publichealthcentre->Type == 'h')
                <td>Hospital</td>
                @endif
                @if ($publichealthcentre->Type == 's')
                <td>Special</td>
                @endif
                @if ($publichealthcentre->DriveThrough == '0')
                <td>No</td>
                @endif
                @if ($publichealthcentre->DriveThrough == '1')
                <td>Yes</td>
                @endif
                @if ($publichealthcentre->AppointmentType == '0')
                <td>Appointment only</td>
                @endif
                @if ($publichealthcentre->AppointmentType == '1')
                <td>Walk-in</td>
                @endif
                @if ($publichealthcentre->AppointmentType == '2')
                <td>Appointment and walk-in</td>
                @endif
                <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $publichealthcentre->ID ?>)">Edit</button></td>
                <td>
                    <button id="delete_<?= $publichealthcentre->ID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $publichealthcentre->ID ?>)">Delete</button>
                    <a id="confirm_<?= $publichealthcentre->ID ?>" href="/data/publichealthcentres/delete/<?= $publichealthcentre->ID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
@endsection