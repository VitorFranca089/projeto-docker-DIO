<?php

// Configurações de conexão com o banco de dados
$servername = "db"; // Nome do serviço MySQL (definido no Docker Compose)
$username = "root";
$password = "rootpass";
$database = "testdb";

// Conectar ao banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Erro: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Novo registro adicionado ao Banco de Dados";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Consulta para obter todos os registros da tabela `users`
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - PHP Docker</title>
</head>
<body>

    <!-- Formulário HTML para registrar o usuário -->
    <h1>Registrar um novo usuário</h1>
    <form method="POST" action="">
        <label for="username">Nome de usuário:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Registrar">
    </form>

    <hr>

    <!-- Tabela para exibir todos os usuários registrados -->
    <h2>Usuários Registrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome de Usuário</th>
            <th>Email</th>
            <th>Data de Registro</th>
        </tr>

        <?php
        // Verifica se há resultados e exibe os dados na tabela
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["created_at"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Não encontrado...</td></tr>";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
        ?>
    </table>

</body>
</html>
