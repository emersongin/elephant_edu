<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article class="mb-5">
                <h4 class="py-3">Usuários</h4>
                <table id="tabela-usuarios" class="table table-responsive table-sm table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th class="d-none d-md-table-cell" scope="col">Telefone</th>
                            <th class="d-none d-md-table-cell" scope="col">Perfil</th>
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
                        <form id="form-cadastro-usuario" class="row p-3">
                            <div class="col-12">
                                <label for="usuario-nome" class="form-label fw-bold">Nome de usuário</label>
                                <input type="text" class="form-control" id="usuario-nome" name="nome" required>
                            </div>
                            <div class="col-12">
                                <label for="usuario-cpf" class="form-label fw-bold">CPF</label>
                                <input type="text" class="form-control" id="usuario-cpf" name="cpf" required>
                            </div>
                            <div class="col-12">
                                <label for="usuario-telefone" class="form-label fw-bold">Telefone</label>
                                <input type="text" class="form-control" id="usuario-telefone" name="telefone" required>
                            </div>
                            <div class="col-12">
                                <label for="usuario-senha" class="form-label fw-bold">Senha</label>
                                <input type="text" class="form-control" id="usuario-senha" name="senha" required>
                            </div>
                            <div class="col-12">
                                <label for="usuario-perfil" class="form-label fw-bold">Perfil</label>
                                <select class="form-select form-select-md usuario-perfil" id="usuario-perfil-cadastro" form="form-cadastro-usuario" name="id_perfil" required>
                                    <option disabled selected>selecione um perfil</option>
                                </select>
                            </div>
                            <div class="col-12 pt-5 offset-md-7 col-md-5">
                                <input id="btn-cadastro" type="submit" value="Cadastrar" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <article><!-- Modal -->
                <div class="modal fade" id="modal-usuarios" tabindex="-1" aria-labelledby="modal-usuarios" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form-editar-usuario" class="row p-3">
                            <div class="modal-body">
                                <div class="col-12">
                                    <label for="usuario-nome" class="form-label fw-bold">Nome de usuário</label>
                                    <input type="text" class="form-control" id="usuario-nome" name="nome" required>
                                </div>
                                <div class="col-12">
                                    <label for="usuario-cpf" class="form-label fw-bold">CPF</label>
                                    <input type="text" class="form-control" id="usuario-cpf" name="cpf" required>
                                </div>
                                <div class="col-12">
                                    <label for="usuario-telefone" class="form-label fw-bold">Telefone</label>
                                    <input type="text" class="form-control" id="usuario-telefone" name="telefone" required>
                                </div>
                                <div class="col-12">
                                    <label for="usuario-perfil" class="form-label fw-bold">Perfil</label>
                                    <select class="form-select form-select-md usuario-perfil" id="usuario-perfil-editar" form="form-editar-usuario" name="id_perfil" required>
                                        <option disabled selected>selecione um perfil</option>
                                    </select>
                                </div>
                                <input type="hidden" id="usuario-id" name="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input id="btn-atualizar" type="submit" value="Atualizar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
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