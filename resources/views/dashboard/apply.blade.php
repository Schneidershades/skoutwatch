@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Apply for Shop</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Apply for Shop</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="dashboard-widg-bar d-block">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="_dashboard_content bg-white rounded mb-4">
                <!-- <div class="_dashboard_content_header br-bottom py-3 px-3">
                    <div class="_dashboard__header_flex">
                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user mr-1 theme-cl fs-sm"></i></h4>
                    </div>
                </div> -->

                <div class="_dashboard_content_body py-3 px-3">
                    <form class="row" method="post" action="{{route('apply.store')}}">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">What do you want to Sell</label>
                                        <input type="text" class="form-control rounded" name="sell" placeholder="what do you want to sell" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Location</label>
                                        <select name="location"  class="custom-select rounded" required>
                                            <option value="">--Select Location--</option>
                                            <option id='Education'>Education</option>
                                            <option id='Sport center'>Sport center</option>
                                            <option id='Amphitheater '>Amphitheater </option>
                                            <option id='New hall'>New hall</option>
                                            <option id='FSS'>FSS</option>
                                            <option id='New hall shopping complex '>New hall shopping complex </option>
                                            <option id='CITS'>CITS</option>
                                            <option id='Mariere hall'>Mariere hall</option>
                                            <option id='Moremi car park'>Moremi car park</option>
                                            <option id='Jaja shopping complex '>Jaja shopping complex </option>
                                            <option id='Medical center'>Medical center</option>
                                            <option id='DLI'>DLI</option>
                                            <option id='Lagoon front'>Lagoon front</option>
                                            <option id='Faculty of Science '>Faculty of Science </option>
                                            <option id='Faculty of Law'>Faculty of Law</option>
                                            <option id='Faculty of Engineering '>Faculty of Engineering </option>
                                            <option id='Faculty of Management Science'>Faculty of Management Science</option>
                                            <option id='El kanemi shopping complex '>El kanemi shopping complex </option>
                                            <option id='Amina hall '>Amina hall </option>
                                            <option id='Enijoku hall'>Enijoku hall</option>
                                            <option id='Jaja hall'>Jaja hall</option>
                                            <option id='Honours hall '>Honours hall </option>
                                            <option id='ULWS'>ULWS</option>
                                            <option id='Shodeinde hall'>Shodeinde hall</option>
                                            <option id='Makama hall'>Makama hall</option>
                                            <option id='Madam Tinubu hall'>Madam Tinubu hall</option>
                                            <option id='Fagunwa hall'>Fagunwa hall</option>
                                            <option id='Biobaku hall'>Biobaku hall</option>
                                            <option id='2001 '>2001 </option>
                                            <option id='High rise'>High rise</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Apply</button>
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
                                <th scope="col">Sell</th>
                                <th scope="col">Location</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($shops->count() >0)
                            @foreach($shops as $shop)
                            <tr>
                                <td>#{{$shop->id}}</td>
                                <td>{{$shop->sell}}</td>
                                <td>{{$shop->location}}</td>
                                <td><span class="theme-cl">{{$shop->status}}</span></td>
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
