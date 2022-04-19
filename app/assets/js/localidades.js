window.onload = () => {
    listarLocalidades();
    listarSetores();
    submitFormCadastro();
    submitFormAtualizar();

}

function submitFormCadastro() {
    const form = document.getElementById('form-cadastro-localidade');
    const button = document.getElementById('btn-cadastro');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const cadastro = {
            descricao: formData.get('descricao'),
            id_setor: formData.get('id_setor'),
        };

        button.disabled = true;

        const localidade = await fetchCadastrarLocalidade(cadastro);

        if(localidade) {
            listarLocalidades();
            form.reset();

        }

        button.disabled = false;

    });
}

function submitFormAtualizar() {
    const form = document.getElementById('form-editar-localidade');
    const button = document.getElementById('btn-atualizar');
    const modal = new bootstrap.Modal(document.getElementById('modal-localidades'));

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const atualizacao = {
            id: formData.get('id'),
            descricao: formData.get('descricao'),
            id_setor: formData.get('id_setor'),
        };

        button.disabled = true;

        const localidade = await fetchAtualizarLocalidade(atualizacao);

        if(localidade) {
            form.reset();
            modal.hide();
            listarLocalidades();

        }

        button.disabled = false;

    });
}

async function excluirLocalidade(usuario) {
    if(confirm(`Deseja realmente excluir a localidade: ${usuario.ds_localidade}`)) {
        const excluido = await fetchExcluirLocalidade(usuario.id);

        if(excluido) { 
            listarLocalidades(); 
        }

    }
}

function editarLocalidade(localidade) {
    const form = document.getElementById('form-editar-localidade');

    form.reset();

    const inputID = document.querySelector('#form-editar-localidade #localidade-id');
    const inputDescricao = document.querySelector('#form-editar-localidade #localidade-descricao');
    const selectSetor = document.querySelector('#form-editar-localidade #localidade-setor-editar');

    inputID.value = localidade.id;
    inputDescricao.value = localidade.ds_localidade;
    selectSetor.value = localidade.id_setor;

}

async function listarLocalidades() {
    const tabela = document.getElementById('tabela-localidades-body');

    tabela.innerHTML = spinner();

    const localidades  = await fetchLocalidades();

    if(localidades && localidades.length) {
        let linhas = '';

        localidades.forEach((localidade, index) => {
            linhas += linhaLocalidades(localidade, index + 1);
        });

        tabela.innerHTML = linhas;
    } else {
        tabela.innerHTML = '<tr><p class="mt-2">Nenhuma localidade foi encontrada.</p></tr>';
    }

}

function linhaLocalidades(localidade, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${localidade.ds_localidade}</td>
            <td class="table-light">${localidade.ds_setor}</td>
            <td class="table-light text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning" title="editar localidade" data-bs-toggle="modal" data-bs-target="#modal-localidades" onclick='editarLocalidade(${JSON.stringify(localidade)});'>
                        <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="excluir localidade" onclick='excluirLocalidade(${JSON.stringify(localidade)});'>
                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

async function listarSetores() {
    const selects = document.getElementsByClassName('localidade-setor');

    for (const select of selects) {
        select.disabled = true;
    }

    let opcoes = '<option disabled selected>selecione um setor</option>';

    const setores  = await fetchSetores();

    if(setores && setores.length) {

        setores.forEach((setor, index) => {
            opcoes += `<option value="${setor.id}">${setor.ds_setor}</option>`;
        });

        for (const select of selects) {
            select.innerHTML = opcoes;
        }
        
    }

    for (const select of selects) {
        select.disabled = false;
    }

}

function fetchLocalidades() {
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

function fetchCadastrarLocalidade(cadastro) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'localidades.php', { 
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(cadastro)
            });
            const localidade = await response.json();

            res(localidade);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchAtualizarLocalidade(atualizacao) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'localidades.php?' + new URLSearchParams({
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
            const localidade = await response.json();

            res(localidade);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchExcluirLocalidade(id) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'localidades.php', { 
                method: "DELETE",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            });
            const localidade = await response.json();

            res(localidade);
        } catch (error) {
            rej(false);
            
        }
    });
}

function fetchSetores(url, params) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'setores.php', { method: 'GET' });
            const setores = await response.json();

            res(setores);
        } catch (error) {
            rej(false);
        }
    });
}