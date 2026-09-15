<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Marvel Comics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700;800;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #111111;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 50% 20%, rgba(230, 36, 41, 0.12) 0%, transparent 60%),
                radial-gradient(circle at 10% 80%, rgba(20, 20, 20, 0.9) 0%, transparent 50%),
                url("https://wallpapers.com/images/featured/marvel-comic-strip-010419h08jffu0n5.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(10, 10, 10, 0.88);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 0;
        }
        .marvel-auth-container {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .marvel-auth-card {
            width: 100%;
            max-width: 460px;
            background-color: #1a1a1a;
            border: 1px solid #333333;
            border-radius: 6px;
            padding: 2.5rem 2rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85);
            position: relative;
        }
        .marvel-auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #e62429, #ff5e62);
        }
        .marvel-brand-badge {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .marvel-brand-badge img {
            height: 48px;
            width: auto;
            background-color: #e62429;
            padding: 0 14px;
        }
        .marvel-auth-title {
            font-family: 'Roboto Condensed', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 0.25rem;
            color: #ffffff;
        }
        .marvel-auth-subtitle {
            text-align: center;
            font-size: 13px;
            color: #888888;
            margin-bottom: 1.75rem;
        }
        .form-label {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #bbbbbb;
            margin-bottom: 6px;
        }
        .marvel-input {
            background-color: #242424;
            border: 1px solid #3d3d3d;
            border-radius: 4px;
            color: #ffffff;
            padding: 12px 14px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s, background-color 0.2s;
        }
        .marvel-input:focus {
            background-color: #2a2a2a;
            border-color: #e62429;
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(230, 36, 41, 0.25);
            outline: none;
        }
        .marvel-input::placeholder {
            color: #666666;
            font-size: 13px;
        }
        .marvel-btn-submit {
            background-color: #e62429;
            color: #ffffff;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 12px 24px;
            width: 100%;
            border: none;
            cursor: pointer;
            clip-path: polygon(8px 0, 100% 0, 100% calc(100% - 8px), calc(100% - 8px) 100%, 0 100%, 0 8px);
            transition: background-color 0.2s, transform 0.15s, box-shadow 0.2s;
            margin-top: 1rem;
        }
        .marvel-btn-submit:hover {
            background-color: #b51a1e;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(230, 36, 41, 0.5);
            color: #ffffff;
        }
        .marvel-footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 13px;
            color: #888888;
        }
        .marvel-footer-text a {
            color: #e62429;
            text-decoration: none;
            font-weight: 700;
            font-family: 'Roboto Condensed', sans-serif;
            letter-spacing: 0.5px;
        }
        .marvel-footer-text a:hover {
            text-decoration: underline;
        }
        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #888888;
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: color 0.2s;
        }
        .back-home:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="marvel-auth-container">
    <div class="marvel-auth-card">
        <a href="{{ route('home') }}" class="back-home">
            <i class="fa-solid fa-arrow-left"></i> KEMBALI KE BERANDA
        </a>

        <div class="marvel-brand-badge">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/marvel-logo.svg') }}" alt="Marvel">
            </a>
        </div>

        <h1 class="marvel-auth-title">BUAT AKUN MARVEL</h1>
        <p class="marvel-auth-subtitle">Gabung dan nikmati ribuan komik dan cerita epik Marvel</p>

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger py-2 px-3 mb-3 text-white bg-danger border-0 rounded-1" style="font-size: 13px;">
                <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control marvel-input @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Peter Parker" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-control marvel-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="nama@marvel.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control marvel-input @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control marvel-input" placeholder="Ulangi kata sandi" required>
            </div>

            <button type="submit" class="marvel-btn-submit">
                DAFTAR SEKARANG <i class="fa-solid fa-user-plus ms-1"></i>
            </button>
        </form>

        <div class="marvel-footer-text">
            Sudah punya akun? <a href="{{ route('login') }}">MASUK DI SINI</a>
        </div>
    </div>
</div>

</body>
</html>
