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
    <div class="row">
        <div class="col-md-8">
                <ul>
                @foreach ($recommendations as $recommendation)
                <li>
                    {!! html_entity_decode(nl2br(e($recommendation->text))) !!}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection