@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Process Payment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Process Payment</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="dashboard-widg-bar d-block">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="mb-4 tbl-lg rounded overflow-hidden">
                <div class="table-responsive bg-white">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Details</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Period</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transactions)
                            @foreach($transactions as $payment)
                            <tr>
                                <td>#{{$payment->identifier}}</td>
                                <td><a href="javascript:void(0);" class="theme-cl">{{$payment->title}}</a></td>
                                <td>{{$payment->details}}</td>
                                <td>{{$payment->total}}</td>
                                <td>{{$payment->period}}</td>
                                <td>{{$payment->status}}</td>
                                <td>
                                    <a href="{{route('transactions.show', $payment->id)}}" type="submit" class="btn btn-sm text-light rounded theme-bg"> View </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>No list Available</tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
