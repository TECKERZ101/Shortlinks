<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
        exit;
    }
    ?>
    <title>Redirecting...</title>
    <script>
        // Set your link here
        const redirectUrl = "https://www.example.com";
        // Redirect after 2 seconds
        window.onload = () => {
            setTimeout(() => {
                window.location.href = redirectUrl;
            }, 1000);
        };
    </script>
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

        .link-btn {
            padding: 1em 2em;
            background: #3b4b7c;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
            margin-top: 1em;
        }

        .link-btn:hover {
            background: #0078d4;
        }
    </style>
</head>

<body>
    <button class="link-btn" onclick="window.location.href=redirectUrl">Click Here