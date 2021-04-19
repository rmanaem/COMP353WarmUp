@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col" class=''>
                <div class="title m-b-md">
                    Recommendations
                </div>
            </div>
        </div>
        <table class="table">
            <form action="/recommendations/new" method="POST">
                @csrf
                    <tr>
                        <td scope="row"><input type="text" class="form-control form-control-sm" name="text" placeholder="text" /></td>
                        <td colspan=2><button type="submit" class="btn btn-success btn-sm w-100">Add New</a></td>
                    </tr>
            </form>
                @foreach ($recommendations as $recommendation)
                <tr id="recommendation_<?= $recommendation->ID ?>">
                    <td>
                        {!! html_entity_decode(nl2br(e($recommendation->Text))) !!}
                    </td>
                    <td><button class="btn btn-warning btn-sm w-100" onclick="Edit(<?= $recommendation->ID ?>)">Edit</button></td>
                    <td>
                        <button id="delete_<?= $recommendation->ID ?>" class="btn btn-danger btn-sm w-100" onClick="Delete(<?= $recommendation->ID ?>)">Delete</button>
                        <a id="confirm_<?= $recommendation->ID ?>" href="/recommendations/delete/<?= $recommendation->ID ?>" class="btn btn-danger btn-sm w-100" style="display:none">Are you sure?</a>
                    </td>
                </tr>
                <form action="/recommendations/edit" method="POST">
                @csrf
                    <tr id="editing_<?= $recommendation->ID ?>" style="display:none">
                        <td scope="row">
                            <input type="hidden" name="id" value="<?= $recommendation->ID ?>" />
                            <input type="text" class="form-control form-control-sm" name="text" placeholder="text" value="<?= $recommendation->Text ?>"/>
                        </td>
                        <td><button type="button" class="btn btn-warning btn-sm w-100" onclick="Cancel(<?= $recommendation->ID ?>)">Cancel</button></td>
                        <td><button type="submit" class="btn btn-success btn-sm w-100">Save</button></td>
                    </tr>
                </form>
                @endforeach
        </table>
    </div>

    <script>
        function Edit(id) {
            $('#editing_' + id).show();
            $('#recommendation_' + id).hide();
        }

        function Cancel(id) {
            $('#editing_' + id).hide();
            $('#recommendation_' + id).show();
        }

        function Delete(id) {
            $('#delete_' + id).hide();
            $('#confirm_' + id).show();
        }
    </script>
@endsection