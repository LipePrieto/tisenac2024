<?php
$servername = "localhost";
$username = "root"; // padrão do XAMPP
$password = ""; // padrão do XAMPP
$dbname = "login_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Proteger contra SQL injection
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // Consulta SQL para verificar usuário e senha
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login bem-sucedido
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Login Bem-Sucedido</title>';
        echo '<link rel="icon" href="favicon/favicon.ico" type="image/x-icon">';
        echo '<link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">';
        echo '<style>';
        echo 'body {';
        echo '    font-family: Arial, Helvetica, sans-serif;';
        echo '    background-image: linear-gradient(45deg, cyan, yellow);';
        echo '    display: flex;';
        echo '    justify-content: center;';
        echo '    align-items: center;';
        echo '    height: 100vh;';
        echo '    margin: 0;';
        echo '}';
        echo '.message-container {';
        echo '    background-color: rgba(0, 0, 0, 0.9);';
        echo '    padding: 20px;';
        echo '    border-radius: 15px;';
        echo '    color: #fff;';
        echo '    text-align: center;';
        echo '}';
        echo '.message-container h1 {';
        echo '    font-size: 24px;';
        echo '    margin-bottom: 20px;';
        echo '}';
        echo '.message-container span {';
        echo '    font-size: 18px;';
        echo '}';
        echo 'button {';
        echo '    background-color: dodgerblue;';
        echo '    border: none;';
        echo '    padding: 10px 20px;';
        echo '    border-radius: 5px;';
        echo '    color: black;';
        echo '    font-size: 16px;';
        echo '    text-decoration: none;';
        echo '    cursor: pointer;';
        echo '}';
        echo 'button:hover {';
        echo '    background-color: deepskyblue;';
        echo '}';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="message-container">';
        echo '<h1>Nunca cadastre seus dados em sites não confiáveis</h1>';
        echo '<br><br>';
        echo '<span>Obrigado, João e Felipe Senac TI 2024</span>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    } else {
        // Usuário ou senha incorretos
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Login Incorreto</title>';
        echo '<link rel="icon" href="favicon/favicon.ico" type="image/x-icon">';
        echo '<link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">';
        echo '<style>';
        echo 'body {';
        echo '    font-family: Arial, Helvetica, sans-serif;';
        echo '    background-image: linear-gradient(45deg, cyan, yellow);';
        echo '    display: flex;';
        echo '    justify-content: center;';
        echo '    align-items: center;';
        echo '    height: 100vh;';
        echo '    margin: 0;';
        echo '}';
        echo '.error-container {';
        echo '    background-color: rgba(0, 0, 0, 0.9);';
        echo '    padding: 20px;';
        echo '    border-radius: 15px;';
        echo '    color: #fff;';
        echo '    text-align: center;';
        echo '}';
        echo '.error-container h1 {';
        echo '    font-size: 24px;';
        echo '    margin-bottom: 20px;';
        echo '}';
        echo 'button {';
        echo '    background-color: dodgerblue;';
        echo '    border: none;';
        echo '    padding: 10px 20px;';
        echo '    border-radius: 5px;';
        echo '    color: black;';
        echo '    font-size: 16px;';
        echo '    text-decoration: none;';
        echo '    cursor: pointer;';
        echo '}';
        echo 'button:hover {';
        echo '    background-color: deepskyblue;';
        echo '}';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="error-container">';
        echo '<h1>Usuário ou senha incorretos</h1>';
        echo '<br><br>';
        echo '<a href="http://localhost/tela-de-login.html"><button>Voltar para página inicial de login</button></a>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
}

$conn->close();
?>
