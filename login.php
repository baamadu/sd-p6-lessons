<?php
session_start();
include_once 'modules/database.php';
include_once 'modules/functions.php';


$errors = [];
$inputs = [];

const EMAIL_REQUIRED = 'Email invullen';
const EMAIL_INVALID = 'Geldig email adres invullem';
const PASSWORD_REQUIRED = 'Password invullen';
const CREDENTIALS_NOT_VALID = 'Verkeerde email en/of password';

if(isset($_POST['login'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ()
}






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>

<body>
    <div class="container-lg">
        <h4>Inloggen</h4>
        <?php if (!empty($errors['credentials'])): ?>
            <div class="alert alert-danger">
                <?= $errors['credentials'] ?? '' ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="nb-3 nt-3">
                <label for="mail" class="form-label">Email adress</label>
                <input type="email" class="form-control" name="email" id="value=" <?php echo $inputs['email'] ?? '' ?>">
                <div class="form-text tect-danger">
                    <?= $errors['email'] ?? '' ?>
                </div>
            </div>
          
            <div class="nb-3 nt-3"> 
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <div class="form-text text-danger">
                    <?=$errors['password'] ??''?>
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary mb-5">Login</button>
        </form>
    </div>


</body>

</html>