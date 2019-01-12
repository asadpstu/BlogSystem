@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Register') }}

                <span style="float: right;color: green;" >
                    <strong>
                        
                        @if(Session::has('alert'))
                            
                            {{ Session::get('alert') }}
                            @php
                            Session::forget('alert');
                            @endphp
                            
                        @endif   
                        
                    </strong>
                </span>

            </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Who you are?') }}</label>

                            <div class="col-md-6" style="margin-top: 5px;">
                                <label style="margin-left: 10px;"><input type="radio" name="register_as" value="Salesman" 
                            onclick="myFunction('Salesman')">Sales Person</label>
                                <label style="margin-left: 10px;"><input type="radio" name="register_as" value="Customer" 
                            onclick="myFunction('Customer')" checked="">Customer</label>
                            </div>
                        </div>

                        <div class="form-group row"  >
                            <label id="salesman" style="display: none" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sales Id') }}</label>
                            <label id="customer" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('NRIC') }}</label>

                            <div class="col-md-6">
                                <input id="cid_nric" type="text" class="form-control{{ $errors->has('cid_nric') ? ' is-invalid' : '' }}" name="cid_nric" required placeholder="Your Company Provided ID" value="{{ old('cid_nric') }}">
                                @if ($errors->has('cid_nric'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cid_nric') }}</strong>
                                    </span>
                                @endif    
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function myFunction(value)
    {
     if(value == "Salesman")
     {
       $('#salesman').show(1000);
       $('#customer').hide(1000);
       $('#customer').css('display','none');
     }
     if(value == "Customer")
     {
       $('#salesman').hide(1000);
       $('#salesman').css('display','none');
       $('#customer').show(1000);
     }
    }
</script>