@extends('layouts.layout')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Messages
    </div>
    <div class="container">
        <a href="messages">Back to inbox</a>
        <h2><?= $message->Subject ?></h2>
        <h5>Sent: <?= date_format(date_create($message->date_time), 'Y-m-d') ?></h5>
        <p><?= $message->Text ?></p>
    </div>
</div>
@endsection