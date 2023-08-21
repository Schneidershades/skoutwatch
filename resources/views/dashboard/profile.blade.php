@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Edit My Profile #{{ $user->identifier}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Edit My Profile</a></li>
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
                    <form class="row" method="post" action="#" enctype="multipart/form-data" accept=".png,.jpg,.jpeg">
                        @csrf
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <div class="custom-file avater_uploads">
                                @if($user->image)
                                <label class="custom-file-label" for="customFile"><img src="{{$user->image}}" alt="" width="200"></label>
                                @else
                                <label class="custom-file-label" for="customFile"><i class="fa fa-user"></i></label>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">First Name</label>
                                        <input type="text" name="first_name" class="form-control rounded" value="{{ $user->first_name}}" placeholder="First Name" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Last Name</label>
                                        <input type="text" name="last_name" class="form-control rounded" value="{{ $user->last_name}}" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Phone</label>
                                        <input type="text" name="phone" class="form-control rounded" value="{{ $user->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Email</label>
                                        <input type="email" name="email"  disabled class="form-control rounded" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium"> Type of Business</label>
                                        <select name="business_type"  class="custom-select rounded" required>
                                            @if($user->business_type)
                                                <option value="{{$user->business_type}}">{{$user->business_type}}</option>
                                            @endif
                                            <option>Choose Business Type</option>
                                            <option value="Tailor">Tailor</option>
                                            <option value="Business Center">Business Center</option>
                                            <option value="Fast food restaurant ">Fast food restaurant </option>
                                            <option value="Beauty salon">Beauty salon</option>
                                            <option value="Barbershop">Barbershop</option>
                                            <option value="Book store">Book store</option>
                                            <option value="Cafe">Cafe</option>
                                            <option value="Clothing store">Clothing store</option>
                                            <option value="Dry cleaner store">Dry cleaner store</option>
                                            <option value="Fashion boutique">Fashion boutique</option>
                                            <option value="Gift shop">Gift shop</option>
                                            <option value="Pharmacy/drug store">Pharmacy/drug store</option>
                                            <option value="Video game shop">Video game shop</option>
                                            <option value="Sport store">Sport store</option>
                                            <option value="Supermarket">Supermarket</option>
                                            <option value="Phone store">Phone store</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Next of Kin</label>
                                        <input type="text" name="kin" class="form-control rounded" value="{{ $user->kin }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Location</label>

                                        <select name="location"  class="custom-select rounded" required>
                                            @if($user->location)
                                                <option value="{{$user->location}}">{{$user->location}}</option>
                                            @endif
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
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">State</label>
                                        <select name="state"  class="custom-select rounded" required>
                                            @if($user->state)
                                                <option value="{{$user->state}}">{{$user->state}}</option>
                                            @endif
                                                <option value="">--Select State--</option>
                                                <option value="FCT">FCT</option>
                                                <option value="Abia">Abia</option>
                                                <option value="Adamawa">Adamawa</option>
                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                <option value="Anambra">Anambra</option>
                                                <option value="Bauchi">Bauchi</option>
                                                <option value="Bayelsa">Bayelsa</option>
                                                <option value="Benue">Benue</option>
                                                <option value="Borno">Borno</option>
                                                <option value="Cross River">Cross River</option>
                                                <option value="Delta">Delta</option>
                                                <option value="Ebonyi">Ebonyi</option>
                                                <option value="Edo">Edo</option>
                                                <option value="Ekiti">Ekiti</option>
                                                <option value="Enugu">Enugu</option>
                                                <option value="FCT">Federal Capital Territory</option>
                                                <option value="Gombe">Gombe</option>
                                                <option value="Imo">Imo</option>
                                                <option value="Jigawa">Jigawa</option>
                                                <option value="Kaduna">Kaduna</option>
                                                <option value="Kano">Kano</option>
                                                <option value="Katsina">Katsina</option>
                                                <option value="Kebbi">Kebbi</option>
                                                <option value="Kogi">Kogi</option>
                                                <option value="Kwara">Kwara</option>
                                                <option value="Lagos">Lagos</option>
                                                <option value="Nasarawa">Nasarawa</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Ogun">Ogun</option>
                                                <option value="Ondo">Ondo</option>
                                                <option value="Osun">Osun</option>
                                                <option value="Oyo">Oyo</option>
                                                <option value="Plateau">Plateau</option>
                                                <option value="Rivers">Rivers</option>
                                                <option value="Sokoto">Sokoto</option>
                                                <option value="Taraba">Taraba</option>
                                                <option value="Yobe">Yobe</option>
                                                <option value="Zamfara">Zamfara</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Full Address</label>
                                        <input type="text" name="address" class="form-control rounded" value="{{ $user->address }}" placeholder="#10 Marke Juger, SBI Road" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Image</label>
                                        <input type="file" name="image" class="form-control rounded">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Save Changes</button>
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
@endsection
