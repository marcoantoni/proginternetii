<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
    <title>Document</title>
</head>
<body>
    <div id="login">
     <form method="POST" class = "card">
        <div class="card-header">
         <h2>Login</h2>
        </div>
        <div class="card-content">
          <div class="card-content-area">
           <label for="usuario">Usuário</label>
           <input type="text" id="usuario" name="usuario" autocomplete="off">
          </div>
            <div class="card-content-area">
             <label for="password">Senha</label>
             <input type="password" id="password" name="senha" autocomplete="off">
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value ="login" class="submit" name="submit">
            <a href="#" class="recuperar_senha">Esqueceu a senha?</a>
        </div>
        <?php
            if (isset($_POST["submit"])) {
                $usuario = $_POST["usuario"];
                $senha = $_POST["senha"];

                if (!empty($usuario) && !empty($senha)) {
                    // aqui fica lógica de testar se o usuario e a senha estão corretos 
                    include ("conecta.php");

                    // consulta sql para testar se o usuário e senha correspondem a uma entrada no bd
                    $sql = "SELECT * FROM usuarios WHERE login = '$usuario' and senha = '$senha'";

                    // executa a query
                    $resultado = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($resultado) == 1){
                        session_start();
                        $_SESSION["usuario"] = $usuario;
                        // faz o redirecionamento de página
                        header("location: atendimentos/mostrar.php");
                    } else {
                        echo ("Usuário ou senha incorretos");
                    }
                } else {
                    echo ("Preencha o usuario e a senha corretamente");
                }               
            }

        ?>
     </form>
    </div>
</body>
</html>