@extends('layouts.layout')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Messages
    </div>
    <table class="table">
        <?php foreach($messages as $message) : ?>
            <tr>
                <td scope="row">
                    <?php if($message->read == 0) : ?>
                        <h4><span style="color:red">&#33;</span></h4>
                    <?php endif; ?>
                </td>
                <td><a href="messages/view/<?= $message->id ?>"><?= $message->subject ?></a></td>
                <td><?= date_format(date_create($message->date_time), 'Y-m-d') ?></td>
                <td><a href="messages/delete/<?= $message->id ?>" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
@endsection