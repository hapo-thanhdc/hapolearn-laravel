<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
    <form class="register-form" method="POST" action="{{route('register')}}">
        @csrf
        <div class="form-group">
            <label for="inputUserName" class="form-group-title">Username:</label>
            <input type="text" class="form-control" id="inputUserName" name="name">
        </div>
        @error('name')
        <div class="validate">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="form-group-title">Email:</label>
            <input type="email" class="form-control" id="inputEmail" name='email'>
        </div>
        @error('email')
        <div class="validate">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group">
            <label for="inputPassword" class="form-group-title">Password:</label>
            <input type="password" class="form-control" id="inputPassword" name="password_register">
        </div>
        @error('password_register')
        <div class="validate validateregister">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group">
            <label for="inputRepeatPassword" class="form-group-title">Repeat Password:</label>
            <input type="password" class="form-control" id="inputRepeatPassword" name="password_confirmation">
        </div>
        @error('password_confirmation')
        <div class="validate">
            <p class="errorLogin text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="button-register">
            <button type="submit" class="btn btn-primary register-button" id="register-btn">Register</button>
        </div>
    </form>
</div>
