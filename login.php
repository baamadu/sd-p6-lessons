<?php
session_start();
include_once 'modules/database.php';
include_once 'modules/functions.php';

$errors = [];
$inputs = [];

const EMAIL_REQUIRED = 'Email invullen';
const EMAIL_INVALID = 'Geldig email adres invullen';
const PASSWORD_REQUIRED = 'Password invullen';
const CREDENTIALS_NOT_VALID = 'Verkeerde email en/of password';

if (isset($_POST['login'])) {
    $email = filter_input(type:INPUT_POST, var_name: 'email', filter: FILTER_VALIDATE_EMAIL);

    if ($email===false) {
        $errors['email'] = EMAIL_REQUIRED;
}else{
    $inputs['email'] = $email;
}

$password = filter_input(type: INPUT_POST, var_name:'password');

if (empty($password)) {
    $errors['password'] = PASSWORD_REQUIRED;
} else  {
    $inputs['password'] = $password;
}

if (count($errors) === 0) {
    $result = checkLogin($inputs);

    switch ($result) {
        case 'ADMIN':

            header(header: "Location: admin.php");
            break;

        case 'FAILURE':
            $errors['credentials']=CREDENTIALS_NOT_VALID;
            include_once "login.php";
            break;
    }
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-lg">
        <h4>Inloggen</h4>
        <?php if(!empty($errors['credentials'])): ?>
            <div class="alert alert-danger">
                <?= $errors['credentials'] ?? '' ?>
            </div>
        <?php endif;?>

   <form method="post">
        <div class="mb-3 mt-3">
            <label for="nail" class="form-label">Email adrress</label>
            <input type="email" class="form-control" name="email" id="mail" value="<?php echo $inputs['email'] ?? ''?>">
            <div class="form-text text-danger">
                <?= $errors['email'] ?? '' ?>
            </div>            
        </div>

    </div>
    
    <div class="mb-3 mt-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        <div class="form-text text danger">
            <?= $errors['password'] ?? '' ?>
        </div>
    </div>

    <button type="submit" name="login" class="btn btn-primary mb-5">Login</button>
</form> 

</body>
</html>
 