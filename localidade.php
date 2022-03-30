<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <title>Localidades</title>
    </head>

    <body>
        <main class="container" style="height: 100vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card" style="height: 360px; width: 360px; border-radius: 10px; box-shadow: 1px 1px 5px rgb(15, 15, 15);" >

                    <div class="text-center">
                        <p></p>
                        <img src="assets/img/localidade.png" class="rounded" alt="..." style="width: 100px; height: 100px;">
                                      
                      <h2> Localidade </h2> 
                    </div>  
                  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon6">Descrição</span>
                        </div>
                        <input type="text" class="form-control"  aria-label="descrição" aria-describedby="basic-addon6">
                     </div>
                        
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputSelectSector">Setor</label>
                        </div>
                          <select class="custom-select" id="inputSelectSector">
                                <option value="">Selecione o setor</option>
                                <option value="1">Bloco A</option>
                                <option value="2">Bloco B</option>
                                <option value="3">Bloco C</option>
                                <option value="4">Bloco D</option>
                                <option value="5">Bloco E</option> 
                          </select>
                    </div>   

                    <div class="button d-flex justify-content-center ">
                        <div>
                            <a class="botão cadastro" href="#" style="float: right; border:1px solid; padding: 8px 16px; vertical-align: middle; 
                            background:#000000; color:white;border-radius:25px; font-size: 16px; font-family:helvetica, serif;text-decoration:none;">
                            Entrar</a>                    
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </body>
</html>>