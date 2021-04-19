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
                <th scope="col"></th>
            </tr>
        </thead>
        <form action="data/groupzones" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $_GET["name"] ?? '' ?>" /></td>
                <td colspan=2><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <?php foreach($groupzones as $groupzone) : ?>
            <tr id="groupzone_<?= $groupzone->ID ?>">
                <td scope="row"><?= $groupzone->Name ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
@endsection