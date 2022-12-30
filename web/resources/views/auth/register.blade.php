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
                    <!-- Registration form -->
                    <form method="POST" action="{{ url('master/data-pengguna/create-password') }}" class="flex-fill">
                        @csrf
                        <input type="hidden" name="id_pengguna" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <div class="col-md-4" style="margin:0 auto;">    
                                                <img src="{{asset('img/logo.png')}}" style="max-width:100%; max-height:100%">
                                            </div> 
                                            <h5 class="mb-0">PAUD SOKA INDAH</h5>
                                            <!-- <span class="d-block text-muted">Your credentials</span> -->
                                        </div>

                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="text" name="name" class="form-control" value="{{ $user->nama }}" readonly>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-right">                                                    
                                                    @if (isset($user->User))
                                                    <input type="hidden" name="update" value="1">
                                                    <input type="hidden" name="id_user" value="{{ $user->User->id }}">
                                                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->User->username }}" disabled>
                                                    @else
                                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                    @endif
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-plus text-muted"></i>
                                                    </div>                                                    
                                                </div>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                          
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-right">
                                                    @if (isset($user->User))
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->User->email }}" disabled>
                                                    @else
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @endif
                                                    <div class="form-control-feedback">
                                                        <i class="icon-mention text-muted"></i>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-right">
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="password" autofocus>
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-lock text-muted"></i>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-right">
                                                    <input type="password" name="confirm_password" class="form-control @error('password') is-invalid @enderror" placeholder="Konfirmasi password">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-lock text-muted"></i>
                                                    </div>
                                                </div>
                                                @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="card-footer bg-transparent text-right">
                                        <button type="submit" class="btn btn-teal btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /registration form -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
