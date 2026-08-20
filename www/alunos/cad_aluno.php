<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionando novo aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0">Adicionando novo estudante</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="processa.php">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="mb-3">
                                <label for="nascimento" class="form-label">Nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="curso" class="form-label">Curso</label>
                                <!-- 
                                        Os valores (1, 2, 3, etc.) representam os identificadores dos cursos cadastrados no banco de dados. Esses IDs serão armazenados na tabela relacionada como chave estrangeira, referenciando a chave primária da tabela de cursos.
                                        Nas próximas aulas, esse select será desenvolvido com informações vindas do banco de dados.
                                -->
                                <select class="form-select" id="curso" name="curso">
                                    <?php
                                        // Inclui o arquivo responsável pela conexão com o banco de dados
                                        require_once("../conecta.php");

                                        // Monta a consulta para buscar todos os cursos,
                                        // ordenando os resultados pelo nome em ordem alfabética
                                        $sql = "SELECT * FROM cursos ORDER BY nome ASC";

                                        // Executa a consulta no banco de dados
                                        $resultado = mysqli_query($conn, $sql);

                                        // Percorre todos os cursos retornados pela consulta
                                        while ($row = mysqli_fetch_array($resultado)) {

                                            // Cria uma opção (<option>) para cada curso encontrado
                                            // O value recebe o ID do curso e o texto exibido recebe o nome
                                            echo ("<option value=\"$row[id]\"> $row[nome]</option>");
                                        }
                                    ?>
                                </select>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Turno</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_m" name="turno" value="m">
                                    <label class="form-check-label" for="turno_m">Manhã</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_t" name="turno" value="t">
                                    <label class="form-check-label" for="turno_t">Tarde</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="turno_n" name="turno" value="n">
                                    <label class="form-check-label" for="turno_n">Noite</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label d-block">Áreas de interesse</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="programacao" name="interesses[]" value="programacao">
                                    <label class="form-check-label" for="programacao">
                                        Programação
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="banco_de_dados" name="interesses[]" value="banco_de_dados">
                                    <label class="form-check-label" for="banco_de_dados">
                                        Banco de dados
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="redes" name="interesses[]" value="redes">
                                    <label class="form-check-label" for="redes">
                                        Redes de computadores
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="engenharia_de_software" name="interesses[]" value="engenharia_de_software">
                                    <label class="form-check-label" for="engenharia_de_software">
                                        Engenharia de software
                                    </label>
                                </div>
                            </div>

                            <button type="submit" name="enviar" class="btn btn-primary w-100">
                                Cadastrar aluno
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>