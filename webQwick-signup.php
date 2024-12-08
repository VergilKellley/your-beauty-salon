<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>
    <title>Signup</title>
</head>

<body>
<?php
        require_once 'backend/db.php';
        require_once 'backend/display_header_image.php';
?>
<div
style="background-image: url('uploads/<?= $header_img; ?>'); width: 100vw; height: 100%; position:absolute; top: 0; left:0; background-position: center; background-size: cover; background-repeat: no-repeat; z-index: -1; overflowX:hidden">

    <div
        style="display:flex; flex-direction:column; position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%); border:1px solid #333; box-shadow: 0 4px 6px rgba(0, 0, 0, .5); padding:20px; border-radius:5px; background:#fff; opacity:.8">


        <form action="process-signup.php" method="post" id="signup" novalidate>
            <h1 style="margin-top: 0">Signup</h1>
            <div>
                <label for="name">Username</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <label for="password-confirmation">Repeat Password</label>
                <input type="password" id="password-confirmation" name="password-confirmation">
            </div>

            <div
                style="display:flex; gap: .5rem; flex-direction:column; width: 120px; justify-content: center; align-items:center; margin: 20px 0 10px 0">
            <button>Submit</button>
            or
            <a href="webQwick-login">Login</a>
            </div>
        </form>
    </div>
</div>
</body>

</html>