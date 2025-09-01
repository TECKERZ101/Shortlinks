<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = json_decode(file_get_contents("users.json"), true);

    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION["user"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid login details.";
    }
}
?>

<form method="post">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>

<?php if (!empty($error)) echo "<p>$error</p>"; ?>
