<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css">

    <title>Dashboard</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-3 bg-dark">
                    <a id="dashboard" href="#">
                        <div id="container-logo" class="d-flex justify-content-center" style="height: 10vh;">
                            <img id="img-fluid" src="assets/img/logo.png" alt="logo">
                            <p>Dashboard</p>
                        </div>
                    </a>

                    <div id="container-menu">
                      <ul>
                          <li><a href="#" class="btn">Inicio</a></li>
                          <li><a href="#" class="btn">Cadastro</a></li>
                          <li><a href="#" class="btn">Visitas</a></li>
                          <li><a href="#" class="btn">Relatório</a></li>
                      </ul>
                    </div>
                </div>

                <div class="col-9">
                    <div>
                        <form action="">
                            formulário
                        </form>                        
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Data de Visita</th>
                                    <th>Colégio/Universidade</th>
                                    <th colspan="2" style="text-align: center;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>João Marcos</td>
                                    <td>15/03/2022</td>
                                    <td>Diocesano</td>
                                    <td><button class="btn btn-primary">Alterar</button></td>
                                    <td><button class="btn btn-danger">Deletar</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>José Mateus</td>
                                    <td>22/02/2022</td>
                                    <td>Alternativo</td>
                                    <td><button class="btn btn-primary">Alterar</button></td>
                                    <td><button class="btn btn-danger">Deletar</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Alice Maria</td>
                                    <td>03/01/2022</td>
                                    <td>Uninassau</td>
                                    <td><button class="btn btn-primary">Alterar</button></td>
                                    <td><button class="btn btn-danger">Deletar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/lib/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>