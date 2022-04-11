<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article class="mb-5">
                <h4 class="py-3">Usuários</h4>
                <table id="tabela-usuarios" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-usuarios-body">
                        <!-- linhas -->
                    </tbody>
                </table>
            </article>
            <article>
                <h4 class="py-3">Cadastrar usuário</h4>
                <div class="card">
                    <div class="card-body">
                    <form id="form-usuarios">
                        <div class="row p-3">
                            <div class="col-12">
                                <label for="usuario-nome" class="form-label fw-bold">Nome de usuário</label>
                                <input type="text" class="form-control" id="usuario-nome" name="nome">
                            </div>
                            <div class="col-12">
                                <label for="usuario-cpf" class="form-label fw-bold">CPF</label>
                                <input type="text" class="form-control" id="usuario-cpf" name="cpf">
                            </div>
                            <div class="col-12">
                                <label for="usuario-telefone" class="form-label fw-bold">Telefone</label>
                                <input type="text" class="form-control" id="usuario-telefone" name="telefone">
                            </div>
                            <div class="col-12">
                                <label for="usuario-senha" class="form-label fw-bold">Senha</label>
                                <input type="text" class="form-control" id="usuario-senha" name="senha">
                            </div>
                            <div class="col-12">
                                <label for="usuario-perfil" class="form-label fw-bold">Perfil</label>
                                <select class="form-select form-select-lg" id="usuario-perfil" name="perfil">
                                    <option disabled selected>selecione um perfil</option>
                                </select>
                            </div>
                            <div class="col-12 pt-5 offset-md-7 col-md-5">
                                <button type="button" class="btn btn-primary w-100">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </article>
        </div>
    </main>

<?php 
    include_once './templates/footer.php'; 
?>

<script src="../assets/js/usuarios.js"></script>

<?php 
    include_once './templates/end-footer.php'; 
?>