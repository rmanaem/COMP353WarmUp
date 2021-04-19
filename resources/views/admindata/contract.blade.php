@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <?=$person->FirstName . ' ' . $person->LastName?> Contracts
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Public Health Centre Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Schedule</th>
                </tr>
            </thead>
            <form action="/data/publichealthworkers/contract/new" method="POST">
                @csrf
                <tr>
                    <td scope="row"><input type="text" class="form-control form-control-sm" name="publichealthcentrename" placeholder="Public Health Centre Name"></td>
                    <td><input type="text" class="form-control form-control-sm" name="startdate" placeholder="Start Date"></td>
                    <td><input type="text" class="form-control form-control-sm" name="enddate" placeholder="End Date"></td>
                    <td><input type="text" class="form-control form-control-sm" name="schedule" placeholder="Schedule"></td>
                    <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
                </tr>
            </form>
            <?php foreach($publichealthworkers as $publichealthworker) : ?>
                <tr id="publichealthcentre_<?= $publichealthworker->publichealthworkerid ?>">
                    <td scope="row"><?= $publichealthworker->StartDate ?></td>
                    <td><?= $publichealthworker->EndDate ?></td>
                    <td><?= $publichealthworker->Schedule ?></td>
                    <td><a class="btn btn-warning btn-sm w-100" href="/data/publichealthworkers/contract/<?= $publichealthworker->publichealthworkerid ?>">Edit</a></td>
                    <td>
                        <button id="delete_<?= $publichealthworker->publichealthworkerid ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $publichealthworker->publichealthworkerid ?>)">Delete</button>
                        <a id="confirm_<?= $publichealthworker->publichealthworkerid ?>" href="/data/publichealthworkers/contract/delete/<?= $publichealthworker->publichealthworkerid ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                    </td>
                </tr>
                <form action="/data/publichealthworkers/edit" method="POST">
                @csrf
                    <tr id="editing_<?= $publichealthworker->publichealthworkerid ?>" style="display:none">
                        <td scope="row">
                            <input type="hidden" name="id" value="<?= $publichealthworker->publichealthworkerid ?>" />
                            <input type="text" class="form-control form-control-sm" name="publichealthcentrename" placeholder="Public Health Centre Name" value="<?= $publichealthworker->publichealthworkerid ?>" />
                        </td>
                        <td><input type="text" class="form-control form-control-sm" name="startdate" placeholder="Start Date" value="<?= $publichealthworker->StartDate ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="enddate" placeholder="End Date" value="<?= $publichealthworker->EndDate ?>" /></td>
                        <td><input type="text" class="form-control form-control-sm" name="schedule" placeholder="Schedule" value="<?= $publichealthworker->Schedule ?>" /></td>
                        <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $publichealthworker->publichealthworkerid ?>)">Cancel</button></td>
                        <td><button type="submit" class="btn btn-success btn-sm w-100">Save</a></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </table>
    </div>
@endsection