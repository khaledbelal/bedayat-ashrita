@extends('layouts.stack_login')

@section('title')
	Login
@endsection

@section('content')
<style>

.form-control:focus {
    border-color:#007DC6 !important;
}
.card{
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    transition: box-shadow 0.3s ease-in-out;
}
</style>
<section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  p-0">
        <div class="card border-grey border-lighten-3 mt-0">
            <div class="card-header no-border">
                <center>
                <div class="card-title text-xs-center">
                    <div class="p-1"><img width="250" src="{{ URL('/images/tape.png') }}" alt="branding logo"></div>
                </div>
                </center>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 "><span>Login with MA 1.0</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple"  method="POST" action="{{ route('login') }}" novalidate>
                        <fieldset class="form-group position-relative has-icon-left mb-0" >
                            <input  type="text" id="username" name="username" class="form-control form-control-lg input-lg"  placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="ft-user"></i>
                            </div>
                        </fieldset>
                        <fieldset style="margin-top:10px;" class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="password" id="password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="fa fa-key"></i>
                            </div>
                        </fieldset> 
                        <button style="background-color:#007DC6 !important;" type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection
