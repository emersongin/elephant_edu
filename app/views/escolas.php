<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article>
                <h4 class="py-3">Escolas</h4>
                <table id="tabela-escolas" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Localidade / Setor</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-escolas-body">
                        <!-- linhas -->
                    </tbody>
                </table>
            </article>
            <article class="mt-5">
                <div>
                    <h4 class="py-3 text-left">Cadastrar escola</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="form-cadastro-escola">
                            <div class="row p-3">
                                <div class="col-12 col-md-6">
                                    <label for="escola-nome" class="form-label fw-bold">Nome:</label>
                                    <input type="text" class="form-control w-full" id="escola-nome" name="nome" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="escola-responsavel" class="form-label fw-bold">Responsável:</label>
                                    <input type="text" class="form-control w-full" id="escola-responsavel" name="responsavel" required>
                                </div>
                                <div class="col-12">
                                    <label for="escola-localidade" class="form-label fw-bold">Localidade:</label>
                                    <select class="form-select form-select-md escola-localidade" id="escola-localidade" form="form-cadastro-escola" name="id_localidade" required>
                                        <option disabled selected>selecione a localidade</option>
                                    </select>
                                </div>
                                <div class="col-12 pt-5 offset-md-7 col-md-5">
                                    <button id="btn-cadastro" type="submit" class="btn btn-primary w-100">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <article><!-- Modal -->
                <div class="modal fade" id="modal-escolas" tabindex="-1" aria-labelledby="modal-escolas" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editando escola</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form-editar-escola" class="row p-3">
                            <div class="modal-body">
                                <div class="col-12 col-md-6">
                                    <label for="escola-nome" class="form-label fw-bold">Nome:</label>
                                    <input type="text" class="form-control w-full" id="escola-nome" name="nome" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="escola-responsavel" class="form-label fw-bold">Responsável:</label>
                                    <input type="text" class="form-control w-full" id="escola-responsavel" name="responsavel" required>
                                </div>
                                <div class="col-12">
                                    <label for="escola-localidade-editar" class="form-label fw-bold">Localidade:</label>
                                    <select class="form-select form-select-md escola-localidade" id="escola-localidade-editar" form="form-editar-escola" name="id_localidade" required>
                                        <option disabled selected>selecione a localidade e setor</option>
                                    </select>
                                </div>
                                <input type="hidden" id="escola-id" name="id">
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

<script src="../assets/js/escolas.js"></script>

<?php 
    include_once './templates/end-footer.php'; 
?>
