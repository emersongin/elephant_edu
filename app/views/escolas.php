<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article>
                <table id="tabela-escolas" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome da Escola</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-escolas-body">
                        <!-- linhas -->
                    </tbody>
                </table>
            </article>
            <article>
                <h4 class="py-3">Cadastrar Escola</h4>
                <div class="card">
                    <div class="card-body">
                        <form id="form-usuarios">
                            <div class="row p-3">
                                <div class="col-6">
                                    <label for="escola-nome" class="form-label fw-bold">Nome da Escola:</label>
                                    <input type="text" class="form-control" id="escola-nome" name="nome">
                                </div>
                                <div class="col-4">
                                    <label for="escola-endereco" class="form-label fw-bold">Endereço:</label>
                                    <input type="text" class="form-control" id="escola-endereco" name="endereço">
                                </div>
                                <div class="col-2">
                                    <label for="endereco-numero" class="form-label fw-bold">Número:</label>
                                    <input type="text" class="form-control" id="endereco-numero" name="numero">
                                </div>
                                <div class="col-3">
                                    <label for="endereco-cidade" class="form-label fw-bold">Cidade:</label>
                                    <input type="text" class="form-control" id="endereco-cidade" name="cidade">
                                </div>
                                <div class="col-3">
                                    <label for="endereco-bairro" class="form-label fw-bold">Bairro:</label>
                                    <select class="form-select form-select-lg" id="endereco-bairro" name="bairro">
                                        <option disabled selected>selecione o Bairro</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="escola-responsavel" class="form-label fw-bold">Responsavel:</label>
                                    <input type="text" class="form-control" id="escola-responsavel" name="responsavel">
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

<script src="../assets/js/escolas.js"></script>
