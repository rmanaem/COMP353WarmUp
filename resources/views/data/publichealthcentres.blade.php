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
                <th scope="col">Number of Health Workers</th>
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
                <td><input type="text" class="form-control form-control-sm" name="numberofhealthworkers" placeholder="Number of Health Workers" value="<?= $_GET["numberofhealthworkers"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="phonenumber" placeholder="Phone Number" value="<?= $_GET["phonenumber"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="website" placeholder="Website" value="<?= $_GET["website"] ?? '' ?>" /></td>
                <td>
                    <select class="form-control form-control-sm" name='type' value="<?= $_GET["type"] ?? '' ?>">
                        <option value=''>N/A</option>
                        <option value='c'>Clinic</option>
                        <option value='h'>Hospital</option>
                        <option value='s'>Special</option>
                    </select>
                </td>
                <td>
                    <select class="form-control form-control-sm" name='drivethrough' value="<?= $_GET["drivethrough"] ?? '' ?>">
                        <option value=''>N/A</option>
                        <option value='0'>No</option>
                        <option value='1'>Yes</option>
                    </select>
                </td>
                <td>
                    <select class="form-control form-control-sm" name='appointmenttype' value="<?= $_GET["appointmenttype"] ?? '' ?>">
                        <option value=''>N/A</option>
                        <option value='0'>Appointment only</option>
                        <option value='1'>Walk-in</option>
                        <option value='2'>Appointment and walk-in</option>
                    </select>
                </td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <?php foreach($publichealthcentres as $publichealthcentre) : ?>
            <tr id="publichealthcentre_<?= $publichealthcentre->ID ?>">
                <td scope="row"><?= $publichealthcentre->Name ?></td>
                <td><?= $publichealthcentre->Address ?></td>
                <td><?= $publichealthcentre->NumberOfHealthWorkers ?? 0 ?></td>
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