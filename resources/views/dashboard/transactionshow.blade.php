@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Transaction #{{ $transaction->identifier}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Transaction Details</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="dashboard-widg-bar d-block">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="_dashboard_content bg-white rounded mb-4">
                <div class="_dashboard_content_header br-bottom py-3 px-3">
                    <div class="_dashboard__header_flex">
                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user mr-1 theme-cl fs-sm"></i>My Account</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body py-3 px-3">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-dark ft-medium">ID</label>
                                {{$transaction->identifier}}
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-dark ft-medium">Title</label>
                                {{$transaction->title}}
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-dark ft-medium">Description</label>
                                {{$transaction->description}}
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-dark ft-medium">Total</label>
                                <h4>N {{$transaction->total}}</h4>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-dark ft-medium">Status</label>
                                {{$transaction->status}}
                            </div>
                        </div>

                        @if ($transaction->status == "Pending")
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">

                                <form class="row" id="paymentForm" action="#">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="email" id="email-address" hidden required value="ejiroodikpa@gmail.com"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" id="amount" hidden required value="{{$transaction->subtotal * 100}}" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="first-name" hidden value="Ejiro"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="last-name" hidden value="Ejiro" />
                                            <input type="text" id="ref" hidden value="{{$transaction->identifier}}" />
                                        </div>
                                    </div>
                                    <div class="form-submit">
                                        <button type="submit" class="btn btn-sm text-light rounded theme-bg" onclick="payWithPaystack()"> Pay </button>
                                    </div>
                                </form>

                                {{-- @section('scripts') --}}
                                <script>
                                    function payWithPaystack(e){
                                      var handler = PaystackPop.setup({
                                        key: "pk_test_682fab79f9048a515958b8efa167359043880d9c",
                                        email: 'info@unilsom.com',
                                        amount: {{$transaction->total * 100}},
                                        currency: "NGN",
                                        ref: {{$transaction->identifier}},
                                        callback: function(response){
                                            alert('success. transaction ref is ' + response.reference);
                                            window.location.href = "{{ route ('verify.show', $transaction->id) }}";
                                            // document.myform.submit();
                                        },
                                        onClose: function(){
                                            alert('window closed');
                                        }
                                      });

                                      handler.openIframe();

                                    }
                                  </script>

                                {{-- @endsection --}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
