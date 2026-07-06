<?php
    // Inicia a sessão para permitir o acesso às variáveis de sessão ($_SESSION).
    // A sessão precisa ser aberta antes de qualquer conteúdo ser enviado ao navegador.
    session_start();

    /*
     * Converte os valores armazenados no banco de dados para
     * uma representação mais amigável ao usuário.
     *
     * Valor 0  -> Não
     * Valor 1  -> Sim
     */
    function converterInteresse($valor) {

        if ($valor == 0)
            return "Não";

        return "Sim";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">

                <?php
                    // Verifica se existe uma mensagem armazenada na sessão.
                    // Se existir, o alerta do Bootstrap será exibido.
                    // Caso contrário, esse bloco HTML será ignorado.
                    if (isset($_SESSION["msg"])):
                ?>

                <div id="msg" class="alert <?= $_SESSION["class"] ?>" role="alert">
                  <?= $_SESSION["msg"] ?>
                </div>

                <?php
                    // Remove a variável da sessão para que a mensagem
                    // seja exibida apenas uma vez. Caso contrário,
                    // ela apareceria novamente ao atualizar a página.
                    unset($_SESSION["msg"]);

                    // encerra o if aberto acima
                    endif;
                ?>

                <script>
                    // Oculta a div que contém a mensagem de alerta.
                    // Em vez de removê-la da página, apenas altera
                    // sua propriedade display para "none".
                    function fecharMensagem() {
                        document.getElementById("msg").style.display = "none";
                    }

                    // Agenda a execução da função fecharMensagem()
                    // para ocorrer 5 segundos (5000 ms) após
                    // o carregamento da página.
                    setTimeout(fecharMensagem, 5000);

                </script>

                <div class="card shadow">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Alunos cadastrados</h3>

                        <a href="index.php" class="btn btn-primary">
                            Novo aluno
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <?php
                                /*
                                 * Realiza a conexão com o banco de dados.
                                 * Caso ocorra algum problema, a execução
                                 * do script será interrompida.
                                 */
                                try {
                                    $conn = mysqli_connect("mysql", "root", "1234", "prog_internet");
                                } catch (mysqli_sql_exception $e) {
                                    die ("Houve um erro ao conectar");
                                }

                                /*
                                 * Variável utilizada para contabilizar
                                 * quantos alunos foram exibidos na tabela.
                                 */
                                $qtd_alunos = 0;

                                /*
                                 * Consulta responsável por buscar todos os
                                 * alunos cadastrados, ordenados pelo nome.
                                 */
                                $sql = "SELECT * FROM alunos ORDER BY nome ASC";

                                /*
                                 * Executa a consulta SQL e armazena o resultado
                                 * para posterior processamento.
                                 */
                                $resultado = mysqli_query($conn, $sql);

                                /*
                                 * Verifica se a consulta retornou pelo menos
                                 * um registro.
                                 */
                                if (mysqli_num_rows($resultado) > 0) {

                                    /*
                                     * Cria a estrutura inicial da tabela que
                                     * será utilizada para exibir os dados.
                                     */
                                    echo ('<table class="table table-striped table-hover align-middle">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nascimento</th>
                                                <th>E-mail</th>
                                                <th>Curso</th>
                                                <th>Turno</th>
                                                <th>Prog.</th>
                                                <th>BD</th>
                                                <th>Redes</th>
                                                <th>Eng. Soft.</th>
                                                <th class="text-center text-nowrap">
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                    ');

                                    /*
                                     * Percorre todos os registros retornados
                                     * pela consulta, exibindo uma linha da
                                     * tabela para cada aluno encontrado.
                                     */
                                    while ($row = mysqli_fetch_array($resultado)){

                                        // Inicia uma nova linha da tabela.
                                        echo ("<tr>");

                                        // Exibe os dados básicos do aluno.
                                        echo ("<td>$row[nome]</td>");
                                        echo ("<td>$row[nascimento]</td>");
                                        echo ("<td>$row[email]</td>");
                                        echo ("<td>$row[curso]</td>");
                                        echo ("<td>$row[turno]</td>");

                                        /*
                                         * Exibe as áreas de interesse do aluno,
                                         * convertendo os valores numéricos para
                                         * os textos "Sim" ou "Não".
                                         */
                                        echo ("<td>" . converterInteresse($row["programacao"]) . "</td>");
                                        echo ("<td>" . converterInteresse($row["banco_dados"]) . "</td>");
                                        echo ("<td>" . converterInteresse($row["redes"]) . "</td>");
                                        echo ("<td>" . converterInteresse($row["eng_software"]) . "</td>");

                                        /*
                                         * Exibe os botões de ação associados
                                         * ao registro do aluno.
                                         * Atualização 6 de julho
                                         * Utilizamos aspas duplas para delimitar a string do echo.
                                         * Como o código HTML também utiliza aspas duplas em seus atributos (por exemplo, class="btn"), é necessário usar o caractere de escape (\") para indicar que essas aspas fazem parte do texto e não encerram a string.
                                         * Outra vantagem das aspas duplas é permitir a inserção de variáveis, como $row[id], diretamente dentro da string.
                                         */
                                        echo ("
                                            <td class=\"text-center text-nowrap\">
                                                <a
                                                   class=\"btn btn-outline-primary btn-sm\">
                                                    Editar
                                                </a>

                                                <a 
                                                   href=\"excluir.php?id=$row[id]\" class=\"btn btn-outline-danger btn-sm\">
                                                    Excluir
                                                </a>
                                            </td>
                                        ");

                                        // Finaliza a linha atual da tabela.
                                        echo ("</tr>");

                                        /*
                                         * Incrementa o contador de alunos
                                         * exibidos para uso no rodapé.
                                         */
                                        $qtd_alunos++;

                                    }

                                    /*
                                     * Finaliza a estrutura da tabela após
                                     * a exibição de todos os registros.
                                     */
                                    echo ("</tbody>
                                        </table>"
                                    );

                                } else {

                                    /*
                                     * Mensagem exibida quando não existem
                                     * alunos cadastrados no banco de dados.
                                     */
                                    echo ("Não há dados para serem exibidos");
                                }
                            ?>
                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <!--
                            Forma resumida de exibir uma variável PHP.
                            Equivale a: <?php echo $qtd_alunos; ?>
                        -->
                        Total de alunos cadastrados: <?= $qtd_alunos ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>