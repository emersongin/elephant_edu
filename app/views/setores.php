<?php 
    include_once './templates/header.php';
?>

    <main class="container-fluid card border-primary">
        <div class="card-body h-screen">
            <article>
                <h4 class="py-3">Setores</h4>
                <table id="tabela-setores" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-setores-body">
                        <!-- linhas -->
                    </tbody>
                </table>
            </article>
            <article class="mt-5">
                <div>
                    <h4 class="py-3 text-left">Cadastrar setor</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="form-usuarios">
                            <div class="row p-3">
                                <div class="col-12">
                                    <label for="setor-descricao" class="form-label fw-bold">Descrição:</label>
                                    <input type="text" class="form-control w-full" id="setor-descricao" name="descricao">
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

<script src="../assets/js/setores.js"></script>

<?php 
    include_once './templates/end-footer.php'; 
?>
