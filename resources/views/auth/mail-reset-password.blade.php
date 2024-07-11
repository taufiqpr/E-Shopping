<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .email-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-body {
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #aaa;
        }
        .btn-custom {
            background-color: #4285f4;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Reset Password Notification</h2>
        </div>
        <div class="email-body">
            <p>Hai, kamu ada permintaan reset password. Silahkan klik link dibawah ini untuk me-reset password kamu:</p>
            <br>
            <a href="{{ route('validasi-forgot-password', ['token' => $token])}}" class="btn btn-custom">Klik disini</a>
            <br><br>
            <p>If you did not request a password reset, no further action is required.</p>
        </div>
        <div class="email-footer">
            <p>Thanks,<br>{{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>

