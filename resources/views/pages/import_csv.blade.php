@extends('layouts.main')
@section('title', 'Import Csv')
@section('body')
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('import_data') }}" class="form-inline" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" name="file" class="form-control" required>
                        <br>
                        <button class="btn btn-success" style="font-size:10px;">IMPORT DATA</button>
                    </div>
                </div>                    
            </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h6 style="font-size:10px;">IMPORTED DATA [FIRST 10 - RANDOMLY PICKED]</h6>
                <hr>
                <div class="table-responsive">
                <table class="table table-hover table-sm" style="font-size: 11px;">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Invoice Number</th>
                            <th scope="col">Stock Code</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($csvs as $item)
                            <tr>
                                <td>{{ $item->invoice_no }}</td>
                                <td>{{ $item->stock_code }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->invoice_date }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->customer_id }}</td>
                                <td>{{ $item->country }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
@endsection