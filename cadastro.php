<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css">

    <title>Cadastrar Usuário</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-3 bg-dark">
                    <a id="dashboard" href="#">
                        <div id="container-logo" class="d-flex justify-content-center">
                            <img id="logo-img" src="assets/img/logo.png" alt="logo">
                            <p>Dashboard</p>
                        </div>
                    </a>

                    <div id="container-menu">
                      <ul>
                          <li><a href="#" class="btn">Inicio</a></li>
                          <li><a href="#" class="btn">Cadastrar</a></li>
                          <li><a href="#" class="btn">Visitas</a></li>
                          <li><a href="#" class="btn">Relatório</a></li>
                      </ul>
                    </div>
                </div>

                <div class="col-9">
                    <div>
                        <h1>Cadastrar Usuário</h1>
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3">
                                    <div class="col-md-5">
                                        <label for="inputName4" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="inputName4">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputLastName4" class="form-label">Sobrenome</label>
                                        <input type="text" class="form-control" id="inputLastName4">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputEmailConfirm4" class="form-label">Confirmar Email</label>
                                        <input type="email" class="form-control" id="inputEmailConfirm4">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputPassword4" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputPasswordConfirm4" class="form-label">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="inputPasswordConfirm4">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputCPF" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="inputCPF" placeholder="123.456.789-00" maxlength="11">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputTel" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="inputTel" placeholder="11 4002-8922">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputPhone" class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="inputPhone" placeholder="81 99999-6666">
                                    </div>
                                    <div class="col-md-3">
                                        <select id="inputSelect" class="form-select">
                                            <option selected>Selecione</option>
                                            <option value="1">Coordenador (a)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">Confirmar cadastro</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/lib/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>