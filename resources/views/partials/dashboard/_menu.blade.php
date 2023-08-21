<a class="mobNavigation" data-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
    <i class="fas fa-bars mr-2"></i>Dashboard Navigation
</a>
<div class="collapse" id="MobNav">
    <div class="dashboard-nav">
        <div class="dashboard-inner">

            @if(auth()->user()->role == 'User')
            <ul data-submenu-title="Main Navigation">
                <li class="active"><a href="{{route('dashboard.index')}}"><i class="lni lni-dashboard mr-2"></i>My Profile</a></li>
                <li><a href="{{route('payments.index')}}"><i class="lni lni-add-files mr-2"></i>Make Payment</a></li>
                {{-- <li><a href="{{route('transactions.index')}}"><i class="lni lni-files mr-2"></i>History</a></li> --}}
                <li><a href="{{route('inspections.index')}}"><i class="lni lni-add-files mr-2"></i>Inspection Form</a></li>
                <li><a href="{{route('apply.index')}}"><i class="lni lni-add-files mr-2"></i>Apply for Shop</a></li>
                <li><a href="{{route('coworkers.index')}}"><i class="lni lni-add-files mr-2"></i>Coworkers/Staff</a></li>
            </ul>
            <ul data-submenu-title="My Accounts">
                <li><a href="{{route('profile.index')}}"><i class="lni lni-user mr-2"></i>Update Profile </a></li>
                <li><a href="{{route('password.index')}}"><i class="lni lni-lock-alt mr-2"></i>Change Password</a></li>
                <li><a  class="dropdown-item" href="{{ route('logout') }}">
                        <i class="lni lni-power-switch mr-2"></i>Log Out
                    </a>
                </li>
            </ul>
            @endif

            @if(auth()->user()->role == 'Admin')

            <ul data-submenu-title="Admin Navigation">
                <li class="active"><a href="{{route('admin-dashboard.index')}}"><i class="lni lni-dashboard mr-2"></i>Payment Summary</a></li>
                <li><a href="{{route('admin-transactions.index')}}"><i class="lni lni-files mr-2"></i>Process Payments</a></li>
                <li><a href="{{route('admin-inspections.index')}}"><i class="lni lni-add-files mr-2"></i>Process Inspection</a></li>
                <li><a href="{{route('admin-users.index')}}"><i class="lni lni-add-files mr-2"></i>Register/View Vendors</a></li>
                <li><a href="{{route('admin-apply.index')}}"><i class="lni lni-add-files mr-2"></i>Apply for Shop</a></li>
            </ul>

            @endif
        </div>
    </div>
</div>
