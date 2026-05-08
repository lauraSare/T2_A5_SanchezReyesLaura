@extends('adminlte::master')

@section('adminlte_css_pre')
    <style>
        body { 
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #f9a8d4 100%) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 40px 35px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }
        .login-card h2 {
            font-size: 26px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
        }
        .login-card p.subtitle {
            color: #888;
            font-size: 13px;
            margin-bottom: 28px;
        }
        .input-group-custom {
            position: relative;
            margin-bottom: 16px;
        }
        .input-group-custom i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 16px;
        }
        .input-group-custom input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: none;
            border-radius: 12px;
            background: #f4f4f8;
            font-size: 14px;
            color: #333;
            outline: none;
            box-sizing: border-box;
        }
        .input-group-custom input:focus {
            background: #eeebff;
            box-shadow: 0 0 0 2px #a78bfa;
        }
        .btn-login {
            width: 100%;
            padding: 13px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn-login:hover { background: #6d28d9; }
        .forgot { 
            text-align: right; 
            margin-top: 10px;
        }
        .forgot a { 
            color: #7c3aed; 
            font-size: 13px; 
            text-decoration: none; 
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #888;
        }
        .register-link a { 
            color: #7c3aed; 
            font-weight: 600; 
            text-decoration: none; 
        }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            border-radius: 10px;
            color: #dc2626;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 16px;
        }
    </style>
@stop

@section('body')
<div style="min-height:100vh; display:flex; align-items:center; justify-content:center;">
    <div class="login-card">
        <h2>Bienvenido</h2>
        <p class="subtitle">Ingresa tus credenciales para continuar</p>

        @if($errors->any())
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group-custom">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Correo electrónico" 
                       value="{{ old('email') }}" required autofocus>
            </div>
            <div class="input-group-custom">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="forgot">
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
            </div>
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <div class="register-link">
            ¿No tienes cuenta? 
            <a href="{{ route('register') }}">Regístrate</a>
        </div>
    </div>
</div>
@stop