<div class="header header-light dark-text head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="assets/img/dashboard-logo.png" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-dark gray">
                            <span class="embos_45"><i class="lni lni-power-switch mr-1 mr-1"></i>Logout</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li><a href="#">Home</a>
                        {{-- <ul class="nav-dropdown nav-submenu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="home-2.html">Home 2</a></li>
                            <li><a href="home-3.html">Home 3</a></li>
                            <li><a href="home-4.html">Home 4</a></li>
                            <li><a href="home-5.html">Home 5</a></li>
                            <li><a href="home-6.html">Home 6</a></li>
                            <li><a href="home-7.html">Home 7</a></li>
                            <li><a href="home-8.html">Home 8</a></li> --}}
                        </ul>
                    </li>

                    {{-- <li><a href="javascript:void(0);">Site</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="blog.html">Blog Style</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="docs.html">Docs</a></li>
                        </ul>
                    </li> --}}

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="add-listing gray">
                        <a href="{{ route('logout') }}" >
                            <i class="lni lni-power-switch mr-1"></i>Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
