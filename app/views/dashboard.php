<?php 
    include_once './app/views/templates/header.php';

?>
    <main>
        <div class="col-12">
            <div>
                <form action="">
                    formulário
                </form>                        
            </div>
            <div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data de Visita</th>
                            <th>Colégio/Universidade</th>
                            <th colspan="2" style="text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>João Marcos</td>
                            <td>15/03/2022</td>
                            <td>Diocesano</td>
                            <td><button class="btn btn-primary">Alterar</button></td>
                            <td><button class="btn btn-danger">Deletar</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>José Mateus</td>
                            <td>22/02/2022</td>
                            <td>Alternativo</td>
                            <td><button class="btn btn-primary">Alterar</button></td>
                            <td><button class="btn btn-danger">Deletar</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alice Maria</td>
                            <td>03/01/2022</td>
                            <td>Uninassau</td>
                            <td><button class="btn btn-primary">Alterar</button></td>
                            <td><button class="btn btn-danger">Deletar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<?php 
    include_once './app/views/templates/footer.php';
    
?>