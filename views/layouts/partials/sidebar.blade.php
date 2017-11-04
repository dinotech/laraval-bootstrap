<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (!Auth::guest())
            <div class="user-panel" style="height:50px;margin-bottom: 10px;">
                <div class="pull-left image" style="display:none;">
				<?php $path = "img/".Auth::user()->username.".jpeg";?>
				@if (file_exists($path))
					<!--<img src="{{asset($path)}}" class="img-circle" alt="User Image"/>-->
					<img src="{{asset('/img/logo.png')}}" class="img-circle" alt="User Image"/>
				@else
					<img src="{{asset('/img/logo.png')}}" class="img-circle" alt="User Image"/>
				@endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        
        <!-- /.search form -->
		<?php //echo $pageName; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>{{Auth::user()->id}}</li>
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->user_type =='SuperAdmin')
                @if($pageName=='All Posts')
                    <li class="active"><a href="{{ url('allposts') }}"><i class='fa fa-laptop'></i> <span>All Posts</span></a></li>
                @else
                    <li><a href="{{ url('allposts') }}"><i class='fa fa-laptop'></i> <span>All Posts</span></a></li>
                @endif
                @if($pageName=='Archived Posts')
                    <li class="active"><a href="{{ url('archivedposts') }}"><i class='fa fa-laptop'></i> <span>Archived Posts</span></a></li>
                @else
                    <li><a href="{{ url('archivedposts') }}"><i class='fa fa-laptop'></i> <span>Archived Posts</span></a></li>
                @endif
                @if($pageName=='User List')
                    <li class="active"><a href="{{ url('userlist') }}"><i class='fa fa-user'></i> <span>User List</span></a></li>
                @else
                    <li><a href="{{ url('userlist') }}"><i class='fa fa-user'></i> <span>User List</span></a></li>
                @endif
                @if($pageName=='Suplier List')
                    <li class="active"><a href="{{ url('suplierlist') }}"><i class='fa fa-user'></i> <span>Suplier List</span></a></li>
                @else
                    <li><a href="{{ url('suplierlist') }}"><i class='fa fa-user'></i> <span>Suplier List</span></a></li>
                @endif
                @if($pageName=='Supervisor List')
                    <li class="active"><a href="{{ url('supervisorlist') }}"><i class='fa fa-user'></i> <span>Supervisor List</span></a></li>
                @else
                    <li><a href="{{ url('supervisorlist') }}"><i class='fa fa-user'></i> <span>Supervisor List</span></a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class='fa fa-sign-out'></i> <span>Log Out</span></a></li>
            @endif

            @if (Auth::user()->user_type =='User')
                @if($pageName=='Post List')
                    <li class="active"><a href="{{ url('postlist') }}"><i class='fa fa-laptop'></i> <span>Post List</span></a></li>
                @else
                    <li><a href="{{ url('postlist') }}"><i class='fa fa-laptop'></i> <span>Post List</span></a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class='fa fa-sign-out'></i> <span>Log Out</span></a></li>
            @endif

            @if (Auth::user()->user_type =='Suplier')
                @if($pageName=='Post List')
                    <li class="active"><a href="{{ url('posts') }}"><i class='fa fa-laptop'></i> <span>Post List</span></a></li>
                @else
                    <li><a href="{{ url('posts') }}"><i class='fa fa-laptop'></i> <span>Post List</span></a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class='fa fa-sign-out'></i> <span>Log Out</span></a></li>
            @endif

            @if (Auth::user()->user_type =='Supervisor')
                @if($pageName=='New Post')
                    <li class="active"><a href="{{ url('newposts') }}"><i class='fa fa-laptop'></i> <span>New Post</span></a></li>
                @else
                    <li><a href="{{ url('newposts') }}"><i class='fa fa-laptop'></i> <span>New Post</span></a></li>
                @endif
                @if($pageName=='Archived Post')
                    <li class="active"><a href="{{ url('sarchivedposts') }}"><i class='fa fa-laptop'></i> <span>Archived Posts</span></a></li>
                @else
                    <li><a href="{{ url('sarchivedposts') }}"><i class='fa fa-laptop'></i> <span>Archived Posts</span></a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class='fa fa-sign-out'></i> <span>Log Out</span></a></li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
