@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
{{-- <div class="header header-transparent dark-text">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="#">
					<img src="assets/img/logo-red.png" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>
				<div class="mobile_nav">
					<ul>
					<li>
						<a href="#" data-toggle="modal" data-target="#login" class="text-danger fs-lg">
							<i class="lni lni-user"></i>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-white bg-danger">
							<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Post Job</span>
						</a>
					</li>
					</ul>
				</div>
			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">
				<ul class="nav-menu">

					<li><a href="#">Home </a></li>

					<li><a href="javascript:void(0);">News</a>
						<ul class="nav-dropdown nav-submenu">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="about-us.html">Media</a></li>
						</ul>
					</li>

				</ul>

				<ul class="nav-menu nav-menu-social align-to-right">
					<li>
						<a href="#" data-toggle="modal" data-target="#login" class="ft-medium">
							<i class="lni lni-user mr-2"></i>Sign In
						</a>
					</li>
					<li class="add-listing bg-danger">
						<a href="#" data-toggle="modal" data-target="#register" class="ft-medium">
							<i class="lni lni-circle-plus mr-1"></i> Register
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div> --}}

<!-- Start Navigation -->
<div class="header header-transparent change-logo">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="#">
					<img src="assets/img/logo-red.png" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>
				<div class="mobile_nav">
					<ul>
					<li>
						<a href="#" data-toggle="modal" data-target="#login" class="text-danger fs-lg">
							<i class="lni lni-user"></i>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-white bg-danger">
							<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Post Job</span>
						</a>
					</li>
					</ul>
				</div>
			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">
				<ul class="nav-menu">

					<li><a href="#">Home </a></li>

					<li><a href="javascript:void(0);">News</a>
						<ul class="nav-dropdown nav-submenu">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="about-us.html">Media</a></li>
						</ul>
					</li>

				</ul>

				<ul class="nav-menu nav-menu-social align-to-right">
					<li>
						<a href="#" data-toggle="modal" data-target="#login" class="ft-medium">
							<i class="lni lni-user mr-2"></i>Sign In
						</a>
					</li>
					<li class="add-listing bg-danger">
						<a href="#" data-toggle="modal" data-target="#register" class="ft-medium">
							<i class="lni lni-circle-plus mr-1"></i> Register
						</a>
					</li>
				</ul>
			</div>
		</nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ======================= Home Banner ======================== -->
<div class="home-banner margin-bottom-0" style="background:#00ab46 url(assets/img/school6.jpeg) no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="banner_caption text-center mb-5">
                    <h1 class="banner_title ft-bold mb-1">Unilag Vendor Management System </h1>
                    <p class="fs-md ft-medium">The fastest way to automate your vendor transactions</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="imployer-explore">
    <div class="impl-thumb">
        <img src="assets/img/microsoft-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/paypal-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/serv-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/mothercare-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/xerox-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/yahoo-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/serv-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/mothercare-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/xerox-home.png" class="" alt="" />
    </div>
    <div class="impl-thumb">
        <img src="assets/img/yahoo-home.png" class="" alt="" />
    </div>
</div>
<!-- ======================= Home Banner ======================== -->

<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ======================= Home Banner ======================== -->
{{-- <div class="home-banner margin-bottom-0" style="background:#f6f7f9;">
	<div class="container">

		<div class="row align-items-center justify-content-between">
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="banner_caption text-left mb-4">
					<div class="d-block mb-2"><span class="px-3 py-1 medium bg-light-danger text-danger rounded">Unilag Vendpay</span></div>
					<h1 class="banner_title ft-bold mb-1">Explore a <br><span class="text-danger">20x</span> Transaction Automation</h1>
					<p class="fs-md ft-regular">A faster way to pay your vendorship dues</p>
				</div>
			</div>
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
				<div class="bnr_thumb">
					<img src="assets/img/school6.jpeg" class="img-fluid bnr_img" alt="" />
				</div>
			</div>
		</div>
	</div>
</div> --}}
<!-- ======================= Home Banner ======================== -->

<!-- ======================= Newsletter Start ============================ -->
<section class="space bg-cover" style="background:#ea2b33 url(assets/img/landing-bg.png) no-repeat;">
	<div class="container py-5">

		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="sec_title position-relative text-center mb-5">
					{{-- <h6 class="text-light mb-0">Subscribe Now</h6>
					<h2 class="ft-bold text-light">Get All Updates</h2> --}}
				</div>
			</div>
		</div>

		<div class="row align-items-center justify-content-center">
			<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
				<form class="bg-white rounded p-1">
					<div class="row no-gutters">
						<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
							{{-- <div class="form-group mb-0 position-relative">
								<input type="text" class="form-control lg left-ico" placeholder="Enter Your Email Address">
								<i class="bnc-ico lni lni-envelope"></i>
							</div> --}}
						</div>
						<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
							{{-- <div class="form-group mb-0 position-relative">
								<button class="btn full-width custom-height-lg bg-dark text-white fs-md" type="button">Subscribe</button>
							</div> --}}
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>
<!-- ======================= Newsletter Start ============================ -->


<!-- ============================ Footer Start ================================== -->
<footer class="light-footer light-dark-footer style-2">
	<div class="footer-middle">
		<div class="container">
			<div class="row">

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<div class="footer_widget">
						<img src="assets/img/logo-red.png" class="img-footer small mb-2" alt="" />

						<div class="address mt-2">
							University of Lagos, University Road, Akoka, Yaba Local Government, <br>Lagos, Nigeria.
						</div>
						<div class="address mt-3">
							+234 8021 23 4567 <br>info@unilag.edu.ng
						</div>
						<div class="address mt-2">
							<ul class="list-inline">
								<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-facebook-filled"></i></a></li>
								<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-twitter-filled"></i></a></li>
								<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-youtube"></i></a></li>
								<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-instagram-filled"></i></a></li>
								<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-linkedin-original"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						{{-- <h4 class="widget_title">For Employers</h4>
						<ul class="footer-menu">
							<li><a href="#">Explore Candidates</a></li>
							<li><a href="#">Job Pricing</a></li>
							<li><a href="#">Submit Job</a></li>
							<li><a href="#">Shortlisted</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul> --}}
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						{{-- <h4 class="widget_title">For Candidates</h4>
						<ul class="footer-menu">
							<li><a href="#">Explore All Jobs</a></li>
							<li><a href="#">Browse Categories</a></li>
							<li><a href="#">Saved Jobs</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul> --}}
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						{{-- <h4 class="widget_title">About Company</h4>
						<ul class="footer-menu">
							<li><a href="#">Who We'r?</a></li>
							<li><a href="#">Our Mission</a></li>
							<li><a href="#">Our team</a></li>
							<li><a href="#">Packages</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul> --}}
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						{{-- <h4 class="widget_title">Helpful Topics</h4>
						<ul class="footer-menu">
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">FAQ's Page</a></li>
							<li><a href="#">Privacy</a></li>
						</ul> --}}
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer-bottom br-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 text-center">
					<p class="mb-0">© 2023 Unilag. Designd By Ejiro.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- ============================ Footer End ================================== -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
	<div class="modal-dialog modal-xl login-pop-form" role="document">
		<div class="modal-content" id="loginmodal">
			<div class="modal-headers">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="ti-close"></span>
				</button>
				</div>

			<div class="modal-body p-5">
				<div class="text-center mb-4">
					<h2 class="m-0 ft-regular">Login</h2>
				</div>

				<form action="/login-user" method="post">
					@csrf
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" name="email" placeholder="Email *">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password*">
					</div>

					<div class="form-group">
						<div class="d-flex align-items-center justify-content-between">
							<div class="flex-1">
								<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
								<label for="dd" class="checkbox-custom-label">Remember Me</label>
							</div>
							<div class="eltio_k2">
								<a href="#" class="text-danger">Lost Your Password?</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-md full-width bg-danger text-light fs-md ft-medium">Login</button>
					</div>

					<div class="form-group text-center mb-0">
						<p class="extra">Not a member?<a href="#et-register-wrap" class="text-dark"> Register</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Register Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
	<div class="modal-dialog modal-xl register-pop-form" role="document">
		<div class="modal-content" id="registermodal">
			<div class="modal-headers">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="ti-close"></span>
				</button>
				</div>

			<div class="modal-body p-5">
				<div class="text-center mb-4">
					<h2 class="m-0 ft-regular">Register</h2>
				</div>

				<form action="/register-user" method="post">
					@csrf

					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="first_name" placeholder="First Name *">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="last_name" placeholder="Last Name *">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email *">
					</div>

                    <div class="form-group">
						<label>Gender</label>
                        <select name="gender"  class="custom-select rounded" required>
                            <option>Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
					</div>

					<div class="form-group">
						<label>Business Type</label>
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

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password*">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-md full-width bg-danger text-light fs-md ft-medium">Register</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

@endsection
