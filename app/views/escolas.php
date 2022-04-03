<?php 
    include_once './app/views/templates/header.php';
?>

        <main>
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="card " style="width: 700px; height:700px; border: 3px solid #9Db4d8; border-radius: 10px;">
                        <div class="text-center">
                            <img src="assets/img/escola.png" class="rounded" alt="photo school" style="width: 193px; height: 166px;">
                            <h1 style="color: #153575; margin: 20px;"> Cadastrar Escola </h1> 
                        </div>  
                  
                        <form> <!--  Início do Form -->

                            <div class="form-row d-flex justify-content-center">
                                <div class="col-md-8">
                                    <label for="nameSchool" style="margin: 0 5px; color: #153575;">Nome da Escola</label>
                                    <input type="text" class="form-control" id="nameSchool" style="border: 2px solid #153575;" required>
                                </div>
                            </div>

                            <div class="form-row d-flex justify-content-center" >
                                <div class="col-md-7">
                                    <label for="validationAddress" style="margin: 0 5px; color: #153575;">Endereço</label>
                                    <input type="text" class="form-control" id="validationAddress" style="border: 2px solid #153575;" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="validationAddressN" style="margin: 0 5px; color: #153575;">N</label>
                                    <input type="text" class="form-control" id="validationAddressN" style="border: 2px solid #153575;" required>
                                </div>
                            </div>

                            <div class="form-row d-flex justify-content-center">
                                <div class="form-group col-md-4">
                                    <label for="inputCity" style="margin: 0 5px; color: #153575;">Localidade</label>
                                    <input type="text" class="form-control" id="inputCity" style="border: 2px solid #153575;">
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="inputState" style="margin: 0 5px; color: #153575;">Bairro</label>
                                    <select id="inputState" class="form-control">
                                        <option selected >Selecione o bairro</html:option>
                                        <option value="1">Universitário</option>
                                        <option value="2">Maurício de Nassau</option>
                                        <option value="3">Rendeiras</option>
                                        <option value="4">Salgado</option>
                                        <option value="5">Divinópolis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-center">
                                <div class="form-group col-md-6">
                                    <label for="inputState" style="margin: 0 5px; color: #153575;" >Responsável</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Selecione uma opção</option>
                                        <option value="1">Maria</option>
                                        <option value="2">José</option>
                                        <option value="3">Carolina</option>
                                        <option value="4">Pedro</option>
                                        <option value="5">Isadora</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                  <button type="button" class="btn btn-outline-primary">Cadastrar</button>
                            </div>
                        </form> <!--  Final do Form -->
                    </div>
                </div>
            </div>
        </main>
<?php 
    include_once './app/views/templates/footer.php';
?>