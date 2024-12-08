<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    require "backend/db.php";
    $mysqli = $conn; 
    // $mysqli = require __DIR__ . "backend/db.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: /");
            exit;

        }
    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>

<body>

    <?php
        require_once 'backend/db.php';
        require_once 'backend/display_header_image.php';
    ?>
    <div
        style="background-image: url('uploads/<?= $header_img; ?>'); width: 100vw; height: 100%; position:absolute; top: 0; left:0; background-position: center; background-size: cover; background-repeat: no-repeat; z-index: -1; overflowX:hidden">
    
    <?php if ($is_invalid): ?>
    <em>Invalid login</em>
    <?php endif; ?>

    <div style="display:flex; position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%); border:1px solid #333; box-shadow: 0 4px 6px rgba(0, 0, 0, .5); padding:20px; border-radius:5px; background:#fff; opacity:.8">
        <form method="post">
            <h1 style="margin-top:0">Login</h1>
            <label for="email">email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <div
                style="display:flex; gap: .5rem; flex-direction:column; width: 120px; justify-content: center; align-items:center; margin-top: 20px; margin: 20px 0 10px 0">
                <button>Log in</button> 
                <!--or-->
                <a href="webQwick-signup">Signup</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>