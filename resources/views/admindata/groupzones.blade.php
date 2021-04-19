@extends('layouts.layout')

@section('content')
<pre><?php //echo var_dump($groupzones) ?></pre>
<div class="content">
    <div class="title m-b-md">
        Group Zones
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col" colspan=2>Actions</th>
            </tr>
        </thead>
        <form action="data/groupzones" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $_GET["name"] ?? '' ?>" /></td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <form action="data/groupzones/new" method="POST">
        @csrf
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" /></td>
                <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
            </tr>
        </form>
        <?php foreach($groupzones as $groupzone) : ?>
            <tr id="groupzone_<?= $groupzone->ID ?>">
                <td scope="row"><?= $groupzone->Name ?></td>
                <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $groupzone->ID ?>)">Edit</button></td>
                <td>
                    <button id="delete_<?= $groupzone->ID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $groupzone->ID ?>)">Delete</button>
                    <a id="confirm_<?= $groupzone->ID ?>" href="data/groupzones/delete/<?= $groupzone->ID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                </td>
            </tr>
            <form action="data/groupzones/edit" method="POST">
            @csrf
                <tr id="editing_<?= $groupzone->ID ?>" style="display:none">
                    <td scope="row">
                        <input type="hidden" name="id" value="<?= $groupzone->ID ?>" />
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $groupzone->Name ?>" />
                    </td>
                    <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $groupzone->ID ?>)">Cancel</button></td>
                    <td><button type="submit" class="btn btn-success btn-sm w-100">Save</button></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
</div>

<script>
function Edit(id) {
    $('#editing_' + id).show();
    $('#groupzone_' + id).hide();
}
function Cancel(id) {
    $('#editing_' + id).hide();
    $('#groupzone_' + id).show();
}
function Delete(id) {
    $('#delete_' + id).hide();
    $('#confirm_' + id).show();
}
</script>
@endsection