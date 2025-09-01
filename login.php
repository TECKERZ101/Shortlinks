<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = json_decode(file_get_contents("users.json"), true);

    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION["user"] = $username;
        header("Location: /");
        exit;
    } else {
        $error = "Invalid login details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.svg">
    <style>
        body {
            background: #16171a;
            color: #e3e6ed;
            font-family: 'Inter', Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            text-align: center;
            padding: 2em 3em;
            background: #23263a;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(30, 34, 54, 0.22);
        }
        h1 {
            margin-bottom: 0.5em;
            color: #f5f6fa;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1em;
            align-items: center;
        }
        input[type="text"],
        input[type="password"] {
            padding: 0.7em 1em;
            border: none;
            border-radius: 6px;
            background: #1a1b22;
            color: #e3e6ed;
            font-size: 1em;
            width: 220px;
            margin-bottom: 0.5em;
            outline: none;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            background: #23263a;
            border: 1px solid #3b4b7c;
        }
        button[type="submit"] {
            padding: 0.6em 1.2em;
            background: #3b4b7c;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0078d4;
        }
        .error {
            color: #ff6b81;
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    </div>
</body>
</html>
