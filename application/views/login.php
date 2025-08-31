<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - MyApp</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 380px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #444;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 4px #2575fc66;
        }

        .error {
            color: #d9534f;
            background: #f8d7da;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        button {
            width: 100%;
            background-color: #2575fc;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #1e60d3;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php echo form_open('auth/login'); ?>

        <label for="username">Username</label>
        <input type="text" name="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <?php echo form_close(); ?>
    </div>

</body>

</html>