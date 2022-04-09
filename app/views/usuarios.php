<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article>
                <div class="col-12">
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
            </article>
            <article>TABELA SETORES</article>
        </div>
    </main>

<?php 
    include_once './templates/footer.php';  
?>