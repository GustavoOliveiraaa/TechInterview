<?php

use Database\Database;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = null;
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = null;
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = null;
}

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
} else {
    $phone = null;
}

////////////////////////////////////////////////////////

require_once "../techinterview/database/Database.php";
$db = new Database();

$resultDb = $db->insert(
    "INSERT INTO `usuarios`(`email`, `password`, `name`, `phone`)
    VALUES ('$email','$password','$name','$phone') "
);


if ($resultDb) : ?>
    <script>
        alert("Usuário registrado!\nFaça o login.");
        window.location.href = "login.html";
    </script>
<?php else : ?>
    <script>
        alert("Erro no registro. Tente novamente.");
        window.location.href = "login.html";
    </script>
<?php endif;


?>