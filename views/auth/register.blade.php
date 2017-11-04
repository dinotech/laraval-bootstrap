@extends('layouts.auth')

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
             <a href="{{ url('/home') }}"><img src="../public/img/qserv-logo.png"></a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{!! $error !!}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <form method="POST" action="{{ url('register') }}">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <select class="form-control" name='user_type'>
                        <option>Select Type</option>
                        <option value="User">User</option>
                        <option value="Suplier">Suplier</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Name" name="name"/>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email Id" name="email"/>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Street" name="street"/>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="City" name="city"/>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name='state'>
                        <option>Select State</option>
                        <option value="Western Cape">Western Cape</option>
                        <option value="Northern Cape">Northern Cape</option>
                        <option value="Eastern Cape">Eastern Cape</option>
                        <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                        <option value="Free State">Free State</option>
                        <option value="North West">North West</option>
                        <option value="Gauteng">Gauteng</option>
                        <option value="Mpumalanga">Mpumalanga</option>
                        <option value="Limpopo">Limpopo</option>
                    </select>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Phone" name="phone"/>
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <!--<div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>-->
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
                    </div><!-- /.col -->
                </div>
            </form>
<!--
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
            </div>

            <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>-->
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')
    
</body>

@endsection
