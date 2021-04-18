@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Regions
        </div>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Province</th>
                <th scope="col">Alert Level</th>
                <th scope="col" colspan=2>Actions</th>
            </tr>
        </thead>
        <form action="/data/regions" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $_GET["name"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $_GET["province"] ?? '' ?>" /></td>
                <td><input type="number" class="form-control form-control-sm" name="alert" placeholder="Alert Level" value="<?= $_GET["alert"] ?? '' ?>" /></td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <form action="/data/regions/new" method="POST">
        @csrf
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province"/></td>
                <td><input type="number" class="form-control form-control-sm" name="alert" placeholder="Alert Level" value=1 readonly/></td>
                <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
            </tr>
        </form>
        <?php foreach($regions as $region) : ?>
            <tr id="region_<?= $region->ID ?>">
                <td scope="row"><?= $region->Name ?></td>
                <td><?= $region->Province ?></td>
                <td><?= $region->AlertLevelID ?></td>
                <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $region->ID ?>)">Edit</button></td>
                <td>
                    <button id="delete_<?= $region->ID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $region->ID ?>)">Delete</button>
                    <a id="confirm_<?= $region->ID ?>" href="/data/regions/delete/<?= $region->ID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                </td>
            </tr>
            <form action="/data/regions/edit" method="POST">
            @csrf
                <tr id="editing_<?= $region->ID ?>" style="display:none">
                    <td scope="row">
                        <input type="hidden" name="id" value="<?= $region->ID ?>" />
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $region->Name ?>" />
                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $region->Province ?>" /></td>
                    <td><input type="number" class="form-control form-control-sm" name="alertlevel" placeholder="AlertLevel" value="<?= $region->AlertLevelID ?>" /></td>
                    <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $region->ID ?>)">Cancel</button></td>
                    <td><button type="submit" class="btn btn-success btn-sm w-100">Save</a></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </div>

<script>
function Edit(id) {
    $('#editing_' + id).show();
    $('#region_' + id).hide();
}

function Cancel(id) {
    $('#editing_' + id).hide();
    $('#region_' + id).show();
}

function Delete(id) {
    $('#delete_' + id).hide();
    $('#confirm_' + id).show();
}
</script>
@endsection