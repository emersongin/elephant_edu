<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article>
                <table id="tabela-visitas" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Nome da Escola</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-visitas-body">
                        <!-- linhas -->
                    </tbody>
                </table>
            </article>
            <article>
                <h4 class="py-3">Cadastrar Visita</h4>
                <div class="card">
                    <div class="card-body">
                        <form id="form-cadastro-visita" class="row p-3">
                            <div class="col-12">
                                <label for="visita-escola" class="form-label fw-bold">Escola</label>
                                <select class="form-select form-select-md visita-escola" id="visita-escola" form="form-cadastro-visita" name="id_escola" required>
                                    <option disabled selected>selecione a escola</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="visita-setor" class="form-label fw-bold">Setor</label>
                                <select class="form-select form-select-md visita-setor" id="visita-setor" form="form-cadastro-visita" name="id_setor" required>
                                    <option disabled selected>selecione o setor</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="visita-qtd-alunos" class="form-label fw-bold">Número de alunos</label>
                                <input type="number" min="0" max="99999" class="form-control" id="visita-qtd-alunos" name="qtd-alunos" required>
                            </div>
                            <div class="col-12">
                                <label for="visita-nome-professor" class="form-label fw-bold">Nome professor</label>
                                <input type="text" class="form-control" id="visita-nome-professor" name="nome-professor" required>
                            </div>
                            <div class="col-12">
                                <label for="visita-telefone" class="form-label fw-bold">Telefone para contato</label>
                                <input type="text" class="form-control" id="visita-telefone" name="telefone" required>
                            </div>
                            <div class="col-12">
                                <label for="visita-data-cadastro" class="form-label fw-bold">Data de visita</label>
                                <input type="date" class="form-control" id="visita-data-cadastro" name="data" required>
                            </div>
                            <div class="col-12">
                                <label for="conteudo" class="form-label fw-bold">Resumo de visita</label>
                                <textarea class="form-control" id="visita-conteudo" name="conteudo" rows="7"></textarea>
                            </div>
                            <div class="col-12 pt-5 offset-md-7 col-md-5">
                                <input id="btn-cadastro" type="submit" value="Cadastrar" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <article><!-- Modal -->
                <div class="modal fade" id="modal-visitas" tabindex="-1" aria-labelledby="modal-escolas" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editando escola</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form-editar-visita" class="row p-3">
                            <div class="modal-body">
                                <div class="col-12">
                                    <label for="visita-setor" class="form-label fw-bold">Setor</label>
                                    <select class="form-select form-select-md visita-setor" id="visita-setor-editar" form="form-editar-visita" name="id_setor" required>
                                        <option disabled selected>selecione o setor</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="visita-qtd-alunos" class="form-label fw-bold">Número de alunos</label>
                                    <input type="number" min="0" max="99999" class="form-control" id="visita-qtd-alunos" name="qtd-alunos" required>
                                </div>
                                <div class="col-12">
                                    <label for="visita-nome-professor" class="form-label fw-bold">Nome professor</label>
                                    <input type="text" class="form-control" id="visita-nome-professor" name="nome-professor" required>
                                </div>
                                <div class="col-12">
                                    <label for="visita-telefone" class="form-label fw-bold">Telefone para contato</label>
                                    <input type="text" class="form-control" id="visita-telefone" name="telefone" required>
                                </div>
                                <div class="col-12">
                                    <label for="visita-data" class="form-label fw-bold">Data de visita</label>
                                    <input type="date" class="form-control" id="visita-data" name="data" required>
                                </div>
                                <div class="col-12">
                                    <label for="conteudo" class="form-label fw-bold">Resumo de visita</label>
                                    <textarea class="form-control" id="visita-conteudo" name="conteudo" rows="7"></textarea>
                                </div>
                                <input type="hidden" id="visita-id" name="id">
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

<script src="../assets/js/visitas.js"></script>

<?php 
    include_once './templates/end-footer.php'; 
?>
