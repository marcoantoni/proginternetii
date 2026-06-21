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

                <div class="card shadow">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Alunos cadastrados</h3>

                        <a href="index.php" class="btn btn-primary">
                            Novo aluno
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-hover align-middle">

                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
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

                                    <tr>
                                        <td>1</td>
                                        <td>Gabriel Henrique Moreira da Silva</td>
                                        <td>15/03/2007</td>
                                        <td>gabriel.silva@email.com</td>
                                        <td>Técnico em Informática</td>
                                        <td>Noite</td>
                                        <td>Sim</td>
                                        <td>Não</td>
                                        <td>Sim</td>
                                        <td>Sim</td>

                                        <td class="text-center text-nowrap">
                                            <a 
                                               class="btn btn-outline-primary btn-sm">
                                                Editar
                                            </a>

                                            <a href="excluir.php?id=1"
                                               class="btn btn-outline-danger btn-sm">
                                                Excluir
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Ana Paula Souza</td>
                                        <td>10/08/2006</td>
                                        <td>ana.souza@email.com</td>
                                        <td>Técnico em Administração</td>
                                        <td>Manhã</td>
                                        <td>Não</td>
                                        <td>Sim</td>
                                        <td>Não</td>
                                        <td>Sim</td>

                                        <td class="text-center text-nowrap">
                                            <a 
                                               class="btn btn-outline-primary btn-sm">
                                                Editar
                                            </a>

                                            <a 
                                               class="btn btn-outline-danger btn-sm">
                                                Excluir
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        Total de alunos cadastrados: 2
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>