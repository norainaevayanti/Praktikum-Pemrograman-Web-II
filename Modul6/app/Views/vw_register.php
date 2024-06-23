<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #121212;
            color: #ececec;
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
            opacity: 0.1;
            z-index: 1;
        }

        .welcome-message,
        .form-register {
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

        .form-register {
            width: 100%;
            max-width: 330px;
            padding: 20px;
            margin: auto;
            background: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .form-register h1 {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: normal;
            color: #00bfa5;
        }

        .form-register p {
            margin-bottom: 20px;
            font-size: 14px;
            color: #b0bec5;
        }

        .form-register input[type="text"],
        .form-register input[type="password"],
        .form-register input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #37474f;
            border-radius: 4px;
            background: #263238;
            color: #ececec;
            box-sizing: border-box;
        }

        .form-register input[type="text"]::placeholder,
        .form-register input[type="password"]::placeholder,
        .form-register input[type="email"]::placeholder {
            color: #90a4ae;
        }

        .form-register button {
            width: 100%;
            padding: 10px;
            background-color: #00bfa5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-register button:hover {
            background-color: #008e76;
        }

        .form-register .alert {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            color: #ffab40;
            background-color: rgba(255, 138, 101, 0.1);
            border: 1px solid #ffab40;
            display: none;
            position: relative;
        }

        .form-register .text-muted {
            color: #b0bec5;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="welcome-message">
        Form Pendaftaran
    </div>

    <main class="form-register">
        <!-- Alert untuk informasi saat halaman dimuat -->
        <div class="alert" id="initial-alert" style="display: block;">
            Isi form untuk mendaftar!
        </div>

        <!-- Alert untuk kesalahan register -->
        <div class="alert" style="display: <?php echo (session()->getFlashdata('error')) ? 'block' : 'none'; ?>;">
            <?= session()->getFlashdata('error'); ?>
        </div>

        <form method="post" action="<?= base_url(); ?>/register/process">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <p>Isi data di bawah untuk membuat akun baru</p>

            <input type="text" name="username" id="username" placeholder="Username" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="password_conf" id="password_conf" placeholder="Confirm Password" required>
            <input type="email" name="email" id="email" placeholder="Email" required>

            <button type="submit">Register</button>
        </form>
    </main>

</body>

</html>
