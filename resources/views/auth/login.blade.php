<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Rekam Medis</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: #f4f4f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        .login-container {
            display: flex;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 850px;
            max-width: 100%;
        }
        .form-section, .welcome-section {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .welcome-section {
            background: linear-gradient(135deg, #5e60ce, #64dfdf);
            color: #fff;
            flex: 1;
            text-align: center;
        }
        .welcome-section h2 {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .welcome-section p {
            font-size: 16px;
            line-height: 1.5;
        }
        .form-section {
            flex: 1;
            background: #fff;
        }
        .form-section h4 {
            font-size: 24px;
            color: #333;
            margin-bottom: 5px;
            text-align: center;
        }
        .form-section h3 {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-section form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #5e60ce;
            box-shadow: 0 0 5px rgba(94, 96, 206, 0.5);
        }
        .btn {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #5e60ce, #64dfdf);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background: linear-gradient(135deg, #4e50a5, #4bbbbb);
            box-shadow: 0 5px 15px rgba(94, 96, 206, 0.5);
        }
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #666;
        }
        .form-footer label {
            cursor: pointer;
        }
        .form-footer a {
            color: #5e60ce;
            text-decoration: none;
            transition: 0.3s;
        }
        .form-footer a:hover {
            color: #4e50a5;
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 90%;
            }
            .welcome-section, .form-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2>Selamat Datang Kembali!</h2>
            <p>Akses sistem rekam medis Puskesmas Berseri<br>Pangkalan Kerinci dengan mudah.</p>
        </div>
        <!-- Form Section -->
        <div class="form-section">
            <h4>Login ke Akun Anda</h4>
            <h3>Silakan Masukkan Data</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-footer">
                    <div>
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat Saya</label>
                    </div>
                    <a href="#">Lupa Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
