<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>QTE</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Q</b>uote</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" style="display: none;">
            <ul class="nav navbar-nav">
          
                @if (Auth::user()->id!=1 AND Auth::validate(array('id' => Auth::user()->id,'password' => Auth::user()->email)))
                    <li><a href="{{ url('/user/changePass',Auth::user()->id ) }}">Change your password!!</a></li>
				@endif
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
							<?php $path = "img/".Auth::user()->name.".jpeg";?>
							@if (file_exists($path))
								<!--<img src="{{asset($path)}}" class="user-image" alt="User Image"/>-->
								<img src="{{asset('/img/logo.png')}}" class="user-image" alt="User Image"  style="display:none;"/>
							@else
								<img src="{{asset('/img/logo.png')}}" class="user-image" alt="User Image"  style="display:none;"/>
                            @endif
							<!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header" style="height:auto;">
								@if (file_exists($path) )
									<!--<img src="{{asset($path)}}" class="img-circle" alt="User Image" />-->
									<img src="{{asset('/img/logo.png')}}" class="img-circle" alt="User Image"  style="display:none;"/>
								@else
									<img src="{{asset('/img/logo.png')}}" class="img-circle" alt="User Image"  style="display:none;"/>
								@endif
                                <p>
                                    {{ Auth::user()->name }}
                                </p>
                            </li>
                            <!-- Menu Body -->
							<!--
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li> 
							-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/user/changePass',Auth::user()->id ) }}" class="btn btn-default btn-flat">Change Password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
               

                <!-- Control Sidebar Toggle Button -->
                <!--<li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>