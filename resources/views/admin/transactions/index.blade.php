@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Process Payment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Process Payment</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="dashboard-widg-bar d-block">
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
                                            <option value="Rent">Rent</option>
                                            <option value="Due">Due</option>
                                            <option value="Penalty">Penalty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Details</label>
                                        <input type="text" class="form-control rounded" name="details" placeholder="Details of type" required>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Amount</label>
                                        <input type="number" class="form-control rounded" min="500" name="total" placeholder="Amount" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">User</label>
                                        <select name="user_id" class="custom-select rounded" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                            @endforeach
                                        </select>
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
                                <th scope="col">Description</th>
                                <th scope="col">User</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transaction)
                            @foreach($transaction as $transaction)
                            <tr>
                                <td>#{{$transaction->id}}</td>
                                <td>{{$transaction->title}}</td>
                                <td>{{$transaction->details}}</td>
                                <td>{{$transaction?->user?->first_name}} {{$transaction?->user?->last_name}}</td>
                                <td>{{$transaction->total}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td><span class="theme-cl">{{$transaction->status}}</span></td>
                                <td>
                                    @if ($transaction->status === "Awaiting" || $transaction->status === "Pending" )
                                    <form class="row" method="post" action="{{route('admin-penalties.update', $transaction->id)}}">
                                        @csrf
			                            @method('PUT')
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Status</label>
                                            <select name="status" name="status" class="width:200px" class="custom-select rounded" required>
                                                <option value = "">Select Payment</option>
                                                <option value = "Paid">Paid</option>
                                                <option value = "Cancelled">Cancel</option>
                                                <option value = "Cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm text-light rounded theme-bg">Apply</button>
                                        </div>
                                    </form>
                                    @else
                                        <span class="theme-cl">{{$transaction->status}}</span>
                                    @endif
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
