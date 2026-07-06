<?php
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

                <div class="alert alert-danger" role="alert">
                  A simple primary alert—check it out!
                </div>

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
```
