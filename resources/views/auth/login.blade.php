@extends('layouts.ui')

@php
    use Illuminate\Support\Facades\Route;
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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


<style>
@keyframes fadeUp {
    from { opacity:0; transform:translateY(20px); }
    to   { opacity:1; transform:translateY(0); }
}

.admin-mode-badge{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:.5rem;

    background:
        rgba(124,157,124,.12);

    border:
        1px solid rgba(124,157,124,.35);

    color:#9fd49f;

    border-radius:14px;

    padding:.9rem 1rem;

    margin-bottom:1.5rem;

    font-size:.78rem;

    font-weight:700;

    letter-spacing:.08em;

    text-transform:uppercase;

    animation:fadeUp .35s ease;
}

.btn-admin-access {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1.4rem;
    background: transparent;
    color: #D4AF37;
    border: 1.5px solid rgba(212,175,55,0.4);
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.25s ease;
}

.btn-admin-access:hover {
    background: rgba(212,175,55,0.1);
    border-color: #C9A03D;
    transform: translateY(-2px);
}
</style>

<script>
function openAdminCodeModal() {
    const modal = document.getElementById('adminCodeModal');
    modal.style.display = 'flex';
    setTimeout(() => document.getElementById('adminCodeInput').focus(), 100);
}

function closeAdminCodeModal() {
    document.getElementById('adminCodeModal').style.display = 'none';
    document.getElementById('adminCodeInput').value = '';
    clearCodeError();
}

function clearCodeError() {
    document.getElementById('codeError').style.display = 'none';
}

function showCodeError(msg) {
    const el = document.getElementById('codeError');
    document.getElementById('codeErrorMsg').textContent = msg;
    el.style.display = 'block';
    document.getElementById('adminCodeInput').style.borderColor = '#C97B84';
}
async function submitAdminCode() {

    const code = document.getElementById('adminCodeInput').value.trim();

    const btn  = document.getElementById('codeSubmitBtn');

    if (!code) {
        showCodeError('Please enter the access code.');
        return;
    }

    btn.innerHTML =
        '<i class="ti ti-loader" style="animation:spin 1s linear infinite"></i> Checking...';

    btn.disabled = true;

    try {

        const response = await fetch('/admin/verify-code', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN':
                    document.querySelector('meta[name="csrf-token"]').content
            },

            body: JSON.stringify({
                code: code
            })
        });

        const data = await response.json();

        if (data.success) {

        document.getElementById('is_admin').value = '1';

        closeAdminCodeModal();

        /*
        |--------------------------------------------------------------------------
        | SWITCH TO ADMIN MODE
        |--------------------------------------------------------------------------
        */

        // Hide admin verification button
        document.querySelector('.btn-admin-access').style.display = 'none';

        // Change main submit button
        const submitBtn = document.querySelector('.btn-register');

        submitBtn.innerHTML =
            '<i class="ti ti-shield-check"></i> Create Admin Account';

        submitBtn.style.background =
            'linear-gradient(135deg,#7C9D7C,#5a7a5a)';

        submitBtn.style.color = '#fff';

        // Change card title
        document.querySelector('.card-header').innerHTML =
            'Admin Registration';

        // Add admin badge
        const badge = document.createElement('div');

        badge.className = 'admin-mode-badge';

        badge.innerHTML =
            '<i class="ti ti-shield-check"></i> ADMIN MODE ENABLED';

        document.querySelector('.card-body')
            .prepend(badge);
        } else {

            showCodeError(
                data.message || 'Invalid access code.'
            );
        }

    } catch (error) {

        console.error(error);

        showCodeError(
            'Server error. Check console/network.'
        );

    } finally {

        btn.innerHTML =
            '<i class="ti ti-arrow-right"></i> Proceed';

        btn.disabled = false;
    }
}

// Close modal on backdrop click
document.getElementById('adminCodeModal').addEventListener('click', function(e) {
    if (e.target === this) closeAdminCodeModal();
});
</script>