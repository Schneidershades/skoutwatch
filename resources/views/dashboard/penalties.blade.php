@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Process Penalties</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Penalties</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

{{-- <div class="dashboard-widg-bar d-block">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="_dashboard_content bg-white rounded mb-4">
                <div class="_dashboard_content_body py-3 px-3">
                    <form class="row" method="post" action="{{route('admin-transactions.store')}}">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Type</label>
                                        <select name="title" class="custom-select rounded" required>
                                            <option>Penalty</option>
                                            <option>Due</option>
                                            <option>Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Details</label>
                                        <input type="text" class="form-control rounded" name="details" placeholder="Details of Penalty" required>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Amount</label>
                                        <input type="number" class="form-control rounded" min="0" step="500" name="subtotal" placeholder="Amount" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Status</label>
                                        <select name="status" class="custom-select rounded" required>
                                            <option value = "Pending">Pending</option>
                                            <option value = "Paid">Paid</option>
                                            <option value = "Approved">Approved</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Process</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($transactions)
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>#{{$transaction->id}}</td>
                                <td>{{$transaction->title}}</td>
                                <td>{{$transaction->subtotal}}</td>
                                <td><span class="theme-cl">{{$transaction->status}}</span></td>
                                <td>
                                    <a href="{{route('transactions.show', $transaction->id)}}" type="submit" class="btn btn-sm text-light rounded theme-bg"> View </a>
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
