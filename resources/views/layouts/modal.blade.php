<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal-button"  data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">REGISTER</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                @include('auth.login')
                @include('auth.register')
            </div>
        </div>
    </div>
</div>
