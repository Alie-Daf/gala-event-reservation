@extends('layouts.ui')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="cardHeader">{{ __('Register') }}</div>

                <div class="card-body">
                    {{-- Admin-mode badge (hidden until code verified) --}}
                    <div id="adminModeBadge" class="admin-mode-badge" style="display:none;">
                        <i class="ti ti-shield-check"></i> ADMIN MODE ENABLED
                    </div>

                    {{--
                        IMPORTANT: action points to AdminAuthController@register
                        which handles BOTH regular and admin registrations.
                        The standard Laravel UI RegisterController is NOT used
                        because it does not handle is_admin.
                    --}}
                    <form method="POST" action="{{ route('admin.register.submit') }}" id="registerForm">
                        @csrf

                        {{-- Single is_admin hidden field, starts at 0, set to 1 by JS after code verify --}}
                        <input type="hidden" name="is_admin" id="is_admin" value="0">

                        {{-- Admin code carried through to server for re-validation --}}
                        <input type="hidden" name="admin_code" id="admin_code" value="">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"
                                       required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       required autocomplete="email">
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
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="register-actions">
                            <button type="submit" class="btn-register" id="submitBtn">
                                <i class="ti ti-user-plus"></i>
                                Register Account
                            </button>

                            <button type="button"
                                    onclick="openAdminCodeModal()"
                                    class="btn-admin-access"
                                    id="adminAccessBtn">
                                <i class="ti ti-shield-lock"></i>
                                Register as Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
body {
    background: linear-gradient(135deg, #111827 0%, #162544 45%, #0f255c 100%) !important;
    min-height: 100vh !important;
}

.register-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.btn-register,
.btn-admin-access {
    flex: 1;
    height: 48px;
    border: none;
    border-radius: 14px;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    transition: .25s ease;
    cursor: pointer;
}

.btn-register {
    background: linear-gradient(135deg, #C9A03D, #A67C2E);
    color: #0A1628;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(212,175,55,.25);
}

.btn-admin-access {
    background: transparent;
    border: 1.5px solid rgba(212,175,55,.35);
    color: #D4AF37;
}

.btn-admin-access:hover {
    background: rgba(212,175,55,.08);
    border-color: #D4AF37;
    transform: translateY(-2px);
}

#app, main, .py-4, .container {
    background: transparent !important;
}

.card {
    background: linear-gradient(135deg, rgba(255,255,255,0.06), rgba(27,47,94,0.30)) !important;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212,175,55,.20) !important;
    border-radius: 30px !important;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,.35) !important;
    margin-top: 70px;
}

.card-header {
    background: transparent !important;
    color: #D4AF37 !important;
    border-bottom: none !important;
    font-size: .9rem !important;
    font-weight: 700 !important;
    letter-spacing: .18em !important;
    text-transform: uppercase;
    padding: 28px 32px 10px !important;
}

.card-body {
    background: transparent !important;
    padding: 30px !important;
}

label {
    color: rgba(255,255,255,.70) !important;
    font-size: .78rem !important;
    font-weight: 700 !important;
    letter-spacing: .12em !important;
    text-transform: uppercase;
}

.form-control {
    background: #1a2c57 !important;
    border: 1px solid rgba(212,175,55,.25) !important;
    border-radius: 15px !important;
    color: white !important;
    height: 46px !important;
}

.form-control:focus {
    background: #1d3366 !important;
    border-color: #D4AF37 !important;
    color: white !important;
    box-shadow: 0 0 0 3px rgba(212,175,55,.08) !important;
}

.admin-mode-badge {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    background: rgba(124,157,124,.12);
    border: 1px solid rgba(124,157,124,.35);
    color: #9fd49f;
    border-radius: 14px;
    padding: .9rem 1rem;
    margin-bottom: 1.5rem;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    animation: fadeUp .35s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}
</style>

{{-- Admin Code Modal --}}
<div id="adminCodeModal" style="display:none; position:fixed; inset:0; z-index:9999;
     background:rgba(10,22,40,0.85); backdrop-filter:blur(6px);
     align-items:center; justify-content:center;">
    <div style="background:linear-gradient(145deg,rgba(255,255,255,0.1),rgba(255,255,255,0.03));
                border:1px solid rgba(212,175,55,0.3); border-radius:24px;
                padding:2rem; width:100%; max-width:380px; position:relative;
                animation:fadeUp 0.3s ease;">

        <div style="height:3px; background:linear-gradient(90deg,#C9A03D,#D4AF37,transparent);
                    margin:-2rem -2rem 2rem; border-radius:24px 24px 0 0;"></div>

        <div style="text-align:center; margin-bottom:1.5rem;">
            <div style="width:52px; height:52px; border-radius:50%;
                        background:rgba(212,175,55,0.15); border:1px solid rgba(212,175,55,0.3);
                        display:flex; align-items:center; justify-content:center;
                        margin:0 auto 1rem; font-size:1.5rem; color:#D4AF37;">
                <i class="ti ti-shield-lock"></i>
            </div>
            <h3 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700;
                       background:linear-gradient(135deg,#fff,#D4AF37); -webkit-background-clip:text;
                       background-clip:text; color:transparent; margin-bottom:0.25rem;">
                Admin Access
            </h3>
            <p style="font-size:0.78rem; color:rgba(255,255,255,0.5);">
                Enter the secret code to proceed
            </p>
        </div>

        <div style="margin-bottom:1rem;">
            <input type="password" id="adminCodeInput"
                   placeholder="Enter access code"
                   style="width:100%; font-family:'Inter',sans-serif; font-size:0.9rem;
                          color:#fff; background:rgba(16,32,66,0.7);
                          border:1px solid rgba(212,175,55,0.3); border-radius:12px;
                          padding:0.8rem 1rem; outline:none; text-align:center;
                          letter-spacing:0.2em; transition:border-color 0.2s;"
                   onkeydown="if(event.key==='Enter') submitAdminCode()"
                   oninput="clearCodeError()">
            <div id="codeError"
                 style="display:none; margin-top:0.5rem; font-size:0.72rem;
                        color:#C97B84; text-align:center;">
                <i class="ti ti-alert-circle"></i>
                <span id="codeErrorMsg">Invalid access code.</span>
            </div>
        </div>

        <div style="display:flex; gap:0.75rem;">
            <button onclick="closeAdminCodeModal()"
                    style="flex:1; padding:0.7rem; border-radius:40px; border:1.5px solid rgba(212,175,55,0.4);
                           background:transparent; color:#D4AF37; font-family:'Inter',sans-serif;
                           font-size:0.8rem; font-weight:600; text-transform:uppercase;
                           letter-spacing:0.05em; cursor:pointer; transition:all 0.2s;">
                Cancel
            </button>
            <button onclick="submitAdminCode()" id="codeSubmitBtn"
                    style="flex:2; padding:0.7rem; border-radius:40px; border:none;
                           background:linear-gradient(135deg,#C9A03D,#A67C2E); color:#0A1628;
                           font-family:'Inter',sans-serif; font-size:0.8rem; font-weight:700;
                           text-transform:uppercase; letter-spacing:0.05em; cursor:pointer;
                           transition:all 0.2s; display:flex; align-items:center;
                           justify-content:center; gap:0.4rem;">
                <i class="ti ti-arrow-right"></i>
                Proceed
            </button>
        </div>
    </div>
</div>

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
    document.getElementById('adminCodeInput').style.borderColor = 'rgba(212,175,55,0.3)';
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

    btn.innerHTML = '<i class="ti ti-loader" style="animation:spin 1s linear infinite"></i> Checking...';
    btn.disabled  = true;

    try {
        const response = await fetch('/admin/verify-code', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ code: code })
        });

        const data = await response.json();

        if (data.success) {
            // Set is_admin = 1 so the controller knows this is an admin registration
            document.getElementById('admin_code').value = code; 
            

            document.getElementById('is_admin').value = '1';

            closeAdminCodeModal();

            // Switch UI to admin mode
            document.getElementById('adminAccessBtn').style.display = 'none';
            document.getElementById('adminModeBadge').style.display = 'flex';

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="ti ti-shield-check"></i> Create Admin Account';
            submitBtn.style.background = 'linear-gradient(135deg,#7C9D7C,#5a7a5a)';
            submitBtn.style.color = '#fff';

            document.getElementById('cardHeader').textContent = 'Admin Registration';
        } else {
            showCodeError(data.message || 'Invalid access code.');
        }
    } catch (error) {
        console.error(error);
        showCodeError('Server error. Check console/network.');
    } finally {
        btn.innerHTML = '<i class="ti ti-arrow-right"></i> Proceed';
        btn.disabled  = false;
    }
}

// Close modal on backdrop click
document.getElementById('adminCodeModal').addEventListener('click', function(e) {
    if (e.target === this) closeAdminCodeModal();
});
</script>
