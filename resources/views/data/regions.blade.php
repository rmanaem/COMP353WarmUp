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
                <th scope="col" colspan=1>Actions</th>
            </tr>
        </thead>
        <form action="/data/regions" method="GET">
            <tr>
                <td scope="row"><input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="<?= $_GET["name"] ?? '' ?>" /></td>
                <td><input type="text" class="form-control form-control-sm" name="province" placeholder="Province" value="<?= $_GET["province"] ?? '' ?>" /></td>
                <td><input type="number" class="form-control form-control-sm" name="alert" placeholder="Alert Level" value="<?= $_GET["alert"] ?? '' ?>" /></td>
                <td colspan=1><button type="submit" class="btn btn-primary btn-sm w-100">Search</button></td>
            </tr>
        </form>
        <?php foreach($regions as $region) : ?>
            <tr id="region_<?= $region->ID ?>">
                <td scope="row"><?= $region->Name ?></td>
                <td><?= $region->Province ?></td>
                <td><?= $region->AlertLevelID ?></td>
            </tr>
        <?php endforeach; ?>
    </div>
    </div>
@endsection