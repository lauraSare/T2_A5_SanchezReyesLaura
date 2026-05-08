@extends('adminlte::master')

@section('adminlte_css_pre')
    <style>
        body { 
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #f9a8d4 100%) !important;
            min-height: 100vh;
        }
        .forgot-card {
            background: white;
            border-radius: 24px;
            padding: 40px 35px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        .forgot-card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
            text-align: center;
        }
        .forgot-card p.subtitle {
            color: #888;
            font-size: 13px;
            margin-bottom: 28px;
            text-align: center;
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
        .btn-forgot {
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
        .btn-forgot:hover { background: #6d28d9; }
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #888;
        }
        .login-link a { 
            color: #7c3aed; 
            font-weight: 600; 
            text-decoration: none; 
        }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #86efac;
            border-radius: 10px;
            color: #16a34a;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 16px;
            text-align: center;
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
    <div class="forgot-card">
        <h2>¿Olvidaste tu contraseña?</h2>
        <p class="subtitle">Ingresa tu correo y te enviaremos un enlace para restablecerla</p>

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group-custom">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" 
                       placeholder="Correo electrónico"
                       value="{{ old('email') }}" required autofocus>
            </div>
            <button type="submit" class="btn-forgot">
                Enviar enlace de restablecimiento
            </button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}">← Volver al inicio de sesión</a>
        </div>
    </div>
</div>
@stop