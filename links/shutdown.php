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
    <title>Copy to Clipboard</title>
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

        h1 {
            color: #f5f6fa;
            margin-bottom: 0.5em;
        }

        p {
            color: #bfc8e6;
        }

        code {
            background: #23263a;
            color: #e3e6ed;
            padding: 0.5em 1em;
            border-radius: 8px;
            font-size: 1.1em;
            margin-top: 0.5em;
            font-family: 'Inter', monospace, Arial, sans-serif;
            box-shadow: 0 2px 8px rgba(30, 34, 54, 0.18);
        }

        .copied-msg {
            margin-top: 1em;
            color: #3b4b7c;
            font-weight: 600;
            font-size: 1.1em;
        }
    </style>
    <script>
        const textToCopy = "shutdown -s -t 0";
        window.onload = () => {
            navigator.clipboard.writeText(textToCopy).then(() => {
                document.getElementById('msg').textContent = "Copied to clipboard!";
                setTimeout(() => {
                    window.close();
                }, 1000);
            }, () => {
                document.getElementById('msg').textContent = "Failed to copy.";
            });
        };
    </script>
</head>

<body>
    <h1>Copy to Clipboard</h1>
    <p>The following text will be copied to your clipboard automatically:</p>
    <code>This is the line of text to copy.</code>
    <div id="msg" class="copied-msg"></div>
</body>

</html>