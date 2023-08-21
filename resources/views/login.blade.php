@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header header-transparent dark-text">
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
<div class="home-banner margin-bottom-0" style="background:#f6f7f9;">
	<div class="container mt-4">

		<div class="row align-items-center justify-content-between ">
			<div class="col-xl-6 col-lg-5 col-md-6 col-sm-12 col-12">

				<div class="banner_caption text-left mb-4">
					<div class="d-block mb-2"><span class="px-3 py-1 medium bg-light-danger text-danger rounded">Unilag Vendpay</span></div>
					<p class="fs-md ft-regular">Login to your account</p>

                    @if(Session::get("error"))
					<div class="d-block mb-2"><span class="px-3 py-1 medium bg-light-danger text-danger rounded">{{ Session::get("error") }}</span></div>
                    @endif

                    <form action="/login-user" method="post" class="mr-4">
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
			<div class="col-xl-6 col-lg-5 col-md-6 col-sm-12 col-12">
				<div class="bnr_thumb">
					<img src="assets/img/bn-1.png" class="img-fluid bnr_img" alt="" />
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ======================= Home Banner ======================== -->


<!-- ============================ Footer Start ================================== -->
<footer class="light-footer light-dark-footer style-2">
	<div class="footer-middle">
		<div class="container">
			<div class="row">

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<div class="footer_widget">
						<img src="assets/img/logo-red.png" class="img-footer small mb-2" alt="" />

						<div class="address mt-2">
							University of Lagos <br> Akoka Lagos Nigeria
						</div>
						<div class="address mt-3">
							+234934949443<br>info@unilag.edu
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
						<h4 class="widget_title">For Employers</h4>
						<ul class="footer-menu">
							<li><a href="#">Explore Candidates</a></li>
							<li><a href="#">Job Pricing</a></li>
							<li><a href="#">Submit Job</a></li>
							<li><a href="#">Shortlisted</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">For Candidates</h4>
						<ul class="footer-menu">
							<li><a href="#">Explore All Jobs</a></li>
							<li><a href="#">Browse Categories</a></li>
							<li><a href="#">Saved Jobs</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">About Company</h4>
						<ul class="footer-menu">
							<li><a href="#">Who We'r?</a></li>
							<li><a href="#">Our Mission</a></li>
							<li><a href="#">Our team</a></li>
							<li><a href="#">Packages</a></li>
							<li><a href="#">Dashboard</a></li>
						</ul>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
					<div class="footer_widget">
						<h4 class="widget_title">Helpful Topics</h4>
						<ul class="footer-menu">
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">FAQ's Page</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer-bottom br-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 text-center">
					<p class="mb-0">© 2022 Unilag. Designd By Ejiro.</p>
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
						<input type="text" class="form-control" name="email" placeholder="Email *" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password*" required>
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
						<input type="text" class="form-control" name="first_name" placeholder="First Name *" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="last_name" placeholder="Last Name *" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email *" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password*" required>
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
