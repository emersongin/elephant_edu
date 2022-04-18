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
                            <th scope="col">Nome da Escola</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Quantidade de Alunos</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Responsável pela Visita</th>
                            <th scope="col">Criado_em</th>
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
                                <label for="escola-nome" class="form-label fw-bold">Nome da Escola</label>
                                <input type="text" class="form-control" id="escola-nome" name="nome" required>
                            </div>
                            <div class="col-12">
                                <label for="professor-nome" class="form-label fw-bold">Nome do Professor</label>
                                <input type="text" class="form-control" id="professor-nome" name="n_professor" required>
                            </div>
                            <div class="col-12">
                                <label for="professor-telefone" class="form-label fw-bold">Telefone do Professor</label>
                                <input type="text" class="form-control" id="professor-telefone" name="telefone" required>
                            </div>
                            <div class="col-12">
                                <label for="qtd-alunos" class="form-label fw-bold">Quantidade de Alunos</label>
                                <input type="text" class="form-control" id="qtd-alunos" name="qtd_alunos" required>
                            </div>
                            <div class="col-12">
                                <label for="setor-visita" class="form-label fw-bold">Setor</label>
                                <select class="form-select form-select-md setor-visita" id="setor-visita" form="form-cadastro-visita" name="id_setor" required>
                                    <option disabled selected>selecione um Setor</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label style="margin-top: 5px" for="conteudo" class="form-label fw-bold">Relátorio da visita</label>
                                <textarea class="form-control" id="conteudo" rows="7"></textarea>
                            </div>
                            <div class="col-12 pt-5 offset-md-7 col-md-5">
                                <input id="btn-cadastro" type="submit" value="Cadastrar" class="btn btn-primary w-100">
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
