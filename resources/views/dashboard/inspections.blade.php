@extends('layouts.dashboard')

@section('dashboard-content')
<div class="dashboard-tlbar d-block mb-5">
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
            <h1 class="ft-medium">Process Inspection</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-cl">Process Inspection</a></li>
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
                    <form class="row" method="post" action="{{route('inspections.store')}}">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Do you clean your shop every morning?</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="clean_shop" id="clean_shop1" value="1">
                                            <label class="form-check-label" for="clean_shop1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="clean_shop" id="clean_shop2" value="0" checked>
                                            <label class="form-check-label" for="clean_shop2">
                                              No
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Are cars parked in front of your shop?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cars_parked_in_front" id="cars_parked_in_front1" value="1">
                                            <label class="form-check-label" for="cars_parked_in_front1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="cars_parked_in_front" id="cars_parked_in_front2" value="0" checked>
                                            <label class="form-check-label" for="cars_parked_in_front2">
                                              No
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Do you have a fire extinguisher</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fire_extinguisher" id="fire_extinguisher1" value="1">
                                            <label class="form-check-label" for="fire_extinguisher1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="fire_extinguisher" id="fire_extinguisher2" value="0" checked>
                                            <label class="form-check-label" for="fire_extinguisher2">
                                              No
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium"> Are the windows clean, tidy and in good condition?</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="windows_clean" id="windows_clean1" value="1">
                                            <label class="form-check-label" for="windows_clean1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="windows_clean" id="windows_clean2" value="0" checked>
                                            <label class="form-check-label" for="windows_clean2">
                                              No
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium"> Is the shop entrance clean and neat?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entrance_clean" id="entrance_clean1" value="1">
                                            <label class="form-check-label" for="entrance_clean1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="entrance_clean" id="entrance_clean2" value="0" checked>
                                            <label class="form-check-label" for="entrance_clean2">
                                              No
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Is the entrance clear of trip hazards?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip_hazard_clean" id="trip_hazard_clean1" value="1">
                                            <label class="form-check-label" for="trip_hazard_clean1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="trip_hazard_clean" id="trip_hazard_clean2" value="0" checked>
                                            <label class="form-check-label" for="trip_hazard_clean2">
                                              No
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Are all lights inside operational?</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="light_operational" id="light_operational1" value="1">
                                            <label class="form-check-label" for="light_operational1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="light_operational" id="light_operational2" value="0" checked>
                                            <label class="form-check-label" for="light_operational2">
                                              No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Are the door locks working properly</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="door_lock_working" id="door_lock_working1" value="1">
                                            <label class="form-check-label" for="door_lock_working1">
                                              Yes
                                            </label>
                                            <input class="form-check-input" type="radio" name="door_lock_working" id="door_lock_working2" value="0" checked>
                                            <label class="form-check-label" for="door_lock_working2">
                                              No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Others</label>
                                        <input type="text" name="others" class="form-control rounded" placeholder="There is no fire extinguisher" required>
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
@endsection
