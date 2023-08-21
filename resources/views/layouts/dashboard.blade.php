@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
@include('partials.dashboard._nav')
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ======================= dashboard Detail ======================== -->

<div class="dashboard-wrap bg-light">
    
    
    @include('partials.dashboard._menu') 

    <div class="dashboard-content">
        @yield('dashboard-content')
        
        <!-- footer -->
        <!-- <div class="row">
            <div class="col-md-12">
                <div>© 2022 Unilag Portal. Designed By Spatre Media.</div>
            </div>
        </div> -->

    </div>
    
</div>
<!-- ======================= dashboard Detail End ======================== -->

@endsection