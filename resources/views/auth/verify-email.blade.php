<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>
                <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Email verifikasi telah dikirim, silahkan klik link untuk memverifikasinya') }}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>