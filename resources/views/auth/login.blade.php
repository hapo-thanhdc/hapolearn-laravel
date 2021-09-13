<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
    <form class="login-form" method="POST" action="{{route('login')}}">
        @csrf
        <div class="form-group">
            <label for="inputUserNameLogin" class="form-group-title">Username:</label>
            <input type="email" class="form-control" id="inputUserNameLogin" name="username" value="{{ old('username') }}">
        </div>
        @error('username')
        <div class="validate">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group">
            <label for="inputPasswordLoign" class="form-group-title">Password:</label>
            <input type="password" class="form-control" id="inputPasswordLogin" name="password">
        </div>
        @error('password')
        <div class="validate">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="check" name="isRemember" >
            <label class="form-check-label" for="check">Remember me</label>
            <a href="#" class="forgot-pw-link">Forgot password</a>
        </div>
        <div class="button-login">
            <button type="submit" class="btn btn-primary login-button" id="login-btn">Login</button>
        </div>
        @if(count($errors) > 0)
            @foreach( $errors->all() as $error )
            <div class="validate" role="alert">
                <p class="errorLogin text-danger">{{ $error }}</p>
            </div>
            @endforeach
        @endif
        <div class="social-title">
            <div class="line">
                <span class="social-network-login-title">Login with</span>
            </div>
        </div>
        <div class="login-google">
            <a href="#" class="login-with-google"><i class="fab fa-google-plus-g"></i>&nbsp; Google</a>
        </div>
        <div class="login-facebook">
            <a href="#" class="login-with-facebook"><i class="fab fa-facebook-f"></i>&nbsp; Facebook</a>
        </div>
    </form>
</div>
