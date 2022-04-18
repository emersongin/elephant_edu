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
                    <!-- <img class="rounded mx-auto d-block" width="180px" height="140px" src="../assets/img/escola.png" alt="">     -->
                    <h4 class="py-3 text-left">Cadastrar escola</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="form-usuarios">
                            <div class="row p-3">
                                <div class="col-12">
                                    <label for="escola-nome" class="form-label fw-bold">Nome:</label>
                                    <input type="text" class="form-control w-full" id="escola-nome" name="nome">
                                </div>
                                <div class="col-12">
                                    <label for="escola-localidade" class="form-label fw-bold">Localidade / Setor:</label>
                                    <select class="form-select form-select-md" id="escola-localidade" name="id_localidade">
                                        <option disabled selected>selecione a localidade</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="escola-responsavel" class="form-label fw-bold">Responsavel:</label>
                                    <select class="form-select form-select-md" id="escola-responsavel" name="id_responsavel">
                                        <option disabled selected>selecione o responsável</option>
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

<script src="../assets/js/escolas.js"></script>

<?php 
    include_once './templates/end-footer.php'; 
?>
