window.onload = () => {
    listarEscolas();
    // listarLocalidades();
    // submitFormCadastro();
    // submitFormAtualizar();

}

function submitFormCadastro() {
    const form = document.getElementById('form-cadastro-escola');
    const button = document.getElementById('btn-cadastro');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const cadastro = {
            nome: formData.get('nome'),
            responsavel: formData.get('responsavel'),
            id_localidade: formData.get('id_localidade')
        };

        button.disabled = true;

        const escola = await fetchCadastrarEscola(cadastro);

        if(escola) {
            listarEscolas();
            form.reset();

        }

        button.disabled = false;

    });
}

function submitFormAtualizar() {
    const form = document.getElementById('form-editar-escola');
    const button = document.getElementById('btn-atualizar');
    const modal = new bootstrap.Modal(document.getElementById('modal-escolas'));

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const atualizacao = {
            id: formData.get('id'),
            nome: formData.get('nome'),
            responsavel: formData.get('responsavel'),
            id_localidade: formData.get('id_localidade')
        };

        button.disabled = true;

        const escola = await fetchAtualizarEscola(atualizacao);

        if(escola) {
            form.reset();
            modal.hide();
            listarEscolas();

        }

        button.disabled = false;

    });
}

async function excluirEscola(escola) {
    if(confirm(`Deseja realmente excluir a escola: ${escola.nome}`)) {
        const excluido = await fetchExcluirEscola(escola.id);

        if(excluido) { 
            listarEscolas(); 
        }

    }
}

function editarEscola(usuario) {
    const form = document.getElementById('form-editar-escola');

    form.reset();

    const inputID = document.querySelector('#form-editar-escola #escola-id');
    const inputNome = document.querySelector('#form-editar-escola #escola-nome');
    const inputResponsavel = document.querySelector('#form-editar-escola #escola-responsavel');
    const selectLocalidade = document.querySelector('#form-editar-escola #escola-localidade-editar');

    inputID.value = escola.id;
    inputNome.value = escola.nome;
    inputResponsavel.value = escola.cpf;
    selectLocalidade.value = escola.id_perfil;

}

async function listarEscolas() {
    const tabela = document.getElementById('tabela-escolas-body');

    tabela.innerHTML = spinner();

    const escolas  = await fetchEscolas();

    if(escolas && escolas.length) {
        let linhas = '';

        escolas.forEach((escola, index) => {
            linhas += linhaEscola(escola, index + 1);
        });

        tabela.innerHTML = linhas;
    } else {
        tabela.innerHTML = '<tr>Nenhuma escola foi encontrada.</tr>';
    }

}

function linhaEscola(escola, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${escola.nome}</td>
            <td class="table-light">${escola.localidade}</td>
            <td class="table-light d-none d-md-table-cell">${escola.responsavel}</td>
            <td class="table-light text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning" title="editar escola" data-bs-toggle="modal" data-bs-target="#modal-escolas" onclick='editarEscola(${JSON.stringify(escola)});'>
                        <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="excluir escola" onclick='excluirEscola(${JSON.stringify(escola)});'>
                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

async function listarLocalidades() {
    const selects = document.getElementsByClassName('escola-localidade');

    for (const select of selects) {
        select.disabled = true;
    }

    let opcoes = '<option disabled selected>selecione uma localidade</option>';

    const localidades  = await fetchLocalidades();

    if(localidades && localidades.length) {

        localidades.forEach((localidade, index) => {
            opcoes += `<option value="${localidade.id}">${localidade.descricao}</option>`;
        });

        for (const select of selects) {
            select.innerHTML = opcoes;
        }
        
    }

    for (const select of selects) {
        select.disabled = false;
    }

}

function fetchEscolas() {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'escolas.php', { method: 'GET' });
            const escolas = await response.json();

            res(escolas);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchCadastrarEscola(cadastro) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'escolas.php', { 
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(cadastro)
            });
            const escola = await response.json();

            res(escola);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchAtualizarEscola(atualizacao) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'escolas.php?' + new URLSearchParams({
                id: atualizacao.id
            }), { 
                method: "PUT",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(atualizacao)
            });
            const escola = await response.json();

            res(escola);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchExcluirEscola(id) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'escolas.php', { 
                method: "DELETE",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            });
            const escola = await response.json();

            res(escola);
        } catch (error) {
            rej(false);
            
        }
    });
}

function fetchLocalidades(url, params) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'localidades.php', { method: 'GET' });
            const localidades = await response.json();

            res(localidades);
        } catch (error) {
            rej(false);
        }
    });
}