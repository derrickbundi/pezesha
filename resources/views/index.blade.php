@extends('layouts.main')
@section('title', 'Home')
@section('body')
<div class="row">
    <div class="col-md-10 offset-md-1">

        <div class="row">
            @foreach ($data as $item)
            <?php $image = $item->thumbnail->path . '.' . $item->thumbnail->extension; ?>
                <div class="col-md-3">
                    <img src="{{ $image }}" class="img-fluid" style="height:150px;width:100%;" alt="{{ $item->name }}">
                    <br>
                    <h6>{{ $item->name }}</h6>
                    <p>{{ date('Y-m-d', strtotime($item->modified)) }}</p>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
@section('scripts')
@endsection