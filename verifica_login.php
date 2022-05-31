<?php

use Database\Database;

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = null;
}

if (isset($_POST['password'])) {
    $pass = $_POST['password'];
} else {
    $pass = null;
}

////////////////////////////////////////////////////////

require_once "../techinterview/database/Database.php";
$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM usuarios WHERE email = '$email'; "
);

if (isset($resultDb[0])) {
    $emailDb = $resultDb[0]->email;
    $senhaDb = $resultDb[0]->password;
} else {
    $emailDb = null;
    $senhaDb = null;
}

//var_dump($resultDb[0]);

////////////////////////////////////////////////////////

if ($email != null && $pass != null) {
    if ($email == $emailDb && $pass == $senhaDb) : ?>
        <script>
            window.location.href = "vagas.html";
        </script>
    <?php else : ?>
        <script>
            alert("Email ou senha não conferem!");
            window.location.href = "login.html";
        </script>
<?php endif;
}

?>