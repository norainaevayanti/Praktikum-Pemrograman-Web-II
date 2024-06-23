<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ececec;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://iispsm.sch.id/new/wp-content/uploads/2021/06/library.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.1; /* Set the opacity to 20% */
            z-index: 1;
        }

        .welcome-message,
        .form-signin {
            z-index: 2;
            position: relative;
        }

        .welcome-message {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            background: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            color: #00bfa5;
            font-size: 24px;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 20px;
            margin: auto;
            background: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .form-signin img {
            margin-bottom: 20px;
        }

        .form-signin h1 {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: normal;
            color: #00bfa5;
        }

        .form-signin p {
            margin-bottom: 20px;
            font-size: 14px;
            color: #b0bec5;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #37474f;
            border-radius: 4px;
            background: #263238;
            color: #ececec;
            box-sizing: border-box;
        }

        .form-signin input[type="text"]::placeholder,
        .form-signin input[type="password"]::placeholder {
            color: #90a4ae;
        }

        .form-signin button {
            width: 100%;
            padding: 10px;
            background-color: #00bfa5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-signin button:hover {
            background-color: #008e76;
        }

        .form-signin .alert {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            color: #ffab40;
            background-color: rgba(255, 138, 101, 0.1); 
            border: 1px solid #ffab40;
            display: none; 
            position: relative;
        }

        .form-signin .text-muted {
            color: #b0bec5;
            margin-top: 20px;
        }

        .btn-register {
            display: block;
            width: 93%;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            background-color: #37474f;
            color: #00bfa5;
            border: 1px solid #00bfa5;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-register:hover {
            background-color: #00bfa5;
            color: #121212;
        }
    </style>
</head>

<body>

    <div class="welcome-message">
        Selamat Datang di Perpustakaan Bersama
    </div>

    <main class="form-signin">
        <!-- Alert untuk informasi saat halaman dimuat -->
        <div class="alert" id="initial-alert" style="display: block;">
            Login terlebih dahulu!
        </div>

        <!-- Alert untuk kesalahan login -->
        <div class="alert" style="display: <?php echo (session()->getFlashdata('error')) ? 'block' : 'none'; ?>;">
            <?= session()->getFlashdata('error'); ?>
        </div>

        <form method="post" action="<?= base_url(); ?>/login/process">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <p>Register dulu apabila belum memiliki akun</p>

            <input type="text" name="username" id="username" placeholder="Username" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
        <a class="btn-register" href="<?= base_url('register'); ?>">Register</a>
    </main>

</body>

</html>
