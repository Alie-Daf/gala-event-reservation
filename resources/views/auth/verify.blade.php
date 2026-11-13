@extends('layouts.ui')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
body{
    background:
        linear-gradient(
            135deg,
            #111827 0%,
            #162544 45%,
            #0f255c 100%
        ) !important;

    min-height:100vh !important;
}

/* breeze wrapper fix */
#app,
main,
.py-4,
.container{
    background:transparent !important;
}

/* LOGIN CARD */
.card{
    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.06),
            rgba(27,47,94,0.30)
        ) !important;

    backdrop-filter:blur(10px);

    border:1px solid rgba(212,175,55,.20) !important;

    border-radius:30px !important;

    overflow:hidden;

    box-shadow:
        0 10px 40px rgba(0,0,0,.35) !important;

    margin-top:70px;
}

/* HEADER */
.card-header{
    background:transparent !important;

    color:#D4AF37 !important;

    border-bottom:none !important;

    font-size:.9rem !important;

    font-weight:700 !important;

    letter-spacing:.18em !important;

    text-transform:uppercase;

    padding:28px 32px 10px !important;
}

/* BODY */
.card-body{
    background:transparent !important;
    padding:30px !important;
}

/* LABELS */
label{
    color:rgba(255,255,255,.70) !important;

    font-size:.78rem !important;

    font-weight:700 !important;

    letter-spacing:.12em !important;

    text-transform:uppercase;
}

/* INPUT */
.form-control{
    background:#1a2c57 !important;

    border:1px solid rgba(212,175,55,.25) !important;

    border-radius:15px !important;

    color:white !important;

    height:46px !important;
}

.form-control:focus{
    background:#1d3366 !important;

    border-color:#D4AF37 !important;

    color:white !important;

    box-shadow:
        0 0 0 3px rgba(212,175,55,.08) !important;
}

/* BUTTON */
.btn-primary{
    background:
        linear-gradient(
            135deg,
            #C9A03D,
            #a67c2e
        ) !important;

    border:none !important;

    border-radius:12px !important;

    color:#0A1628 !important;

    font-weight:700 !important;
}
</style>