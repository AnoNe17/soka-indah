<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 14:37:32 GMT -->
<head>
    @include('temp.header')
</head>

<body class="bg-primary">
    <div class="page-content">
		<div class="content-wrapper">
			<div class="content-inner">
                <div class="content d-flex justify-content-center align-items-center">
                    <!-- Login card -->
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="col-md-5" style="margin:0 auto;">    
                                        <img src="{{asset('img/logo.png')}}" style="max-width:100%; max-height:100%">
                                    </div> 
                                    <h5 class="mb-0">PAUD SOKA INDAH</h5>
                                    <!-- <span class="d-block text-muted">Your credentials</span> -->
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>                                                                        
                                </div>
                                
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*******" required autocomplete="current-password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group d-flex align-items-center">                                                                        
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>                                
                            </div>
                        </div>
                    </form>
                    <!-- /login card -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
