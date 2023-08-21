@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Register/View Vendors</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Register/View Vendors</a></li>
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
                    <form class="row" method="post" action="{{route('admin-users.store')}}">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">First Name</label>
                                        <input type="text" class="form-control rounded" name="first_name" placeholder="First name" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Last Name</label>
                                        <input type="text" class="form-control rounded" name="last_name" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Email</label>
                                        <input type="email" class="form-control rounded" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Phone</label>
                                        <input type="text" class="form-control rounded" name="phone" placeholder="phone" required>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium"> Type of Business</label>
                                        <select name="business_type"  class="custom-select rounded" required>
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

                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Next of Kin</label>
                                        <input type="text" name="kin" class="form-control rounded" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
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
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">State</label>
                                        <select name="state"  class="custom-select rounded" required>
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
                                        <input type="text" name="address" class="form-control rounded" placeholder="#10 Marke Juger, SBI Road" required>
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

<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">View Coworkers</h1>
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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Business</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Parent Owner</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($users)
                            @foreach($users as $user)
                            <tr>
                                <td>#{{$user->id}}</td>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->business_type ? $user->business_type : 'N/A'}}</td>
                                <td>{{$user->phone ? $user->phone : 'N/A'}}</td>
                                <td>{{$user->parent ? $user->parent->first_name : 'No' }}</td>
                                <td>{{$user->created_at }}</td>
                                <td>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm text-light rounded theme-bg">Delete</button>
                                    </div>
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
