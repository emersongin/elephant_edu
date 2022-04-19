window.onload = () => {
    listarSetores();
    submitFormCadastro();
    submitFormAtualizar();

}

function submitFormCadastro() {
    const form = document.getElementById('form-cadastro-setor');
    const button = document.getElementById('btn-cadastro');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const cadastro = {
            descricao: formData.get('descricao')
        };

        button.disabled = true;

        const setor = await fetchCadastrarSetor(cadastro);

        if(setor) {
            listarSetores();
            form.reset();

        }

        button.disabled = false;

    });
}

function submitFormAtualizar() {
    const form = document.getElementById('form-editar-setor');
    const button = document.getElementById('btn-atualizar');
    const modal = new bootstrap.Modal(document.getElementById('modal-setores'));

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const atualizacao = {
            id: formData.get('id'),
            descricao: formData.get('descricao'),
        };

        button.disabled = true;

        const setor = await fetchAtualizarSetor(atualizacao);

        if(setor) {
            form.reset();
            modal.hide();
            listarSetores();

        }

        button.disabled = false;

    });
}

async function excluirSetor(setor) {
    if(confirm(`Deseja realmente excluir o setor: ${setor.ds_setor}`)) {
        const excluido = await fetchExcluirSetor(setor.id);

        if(excluido) { 
            listarSetores(); 
        }

    }
}

function editarSetor(setor) {
    const form = document.getElementById('form-editar-setor');

    form.reset();

    const inputID = document.querySelector('#form-editar-setor #setor-id');
    const inputDescricao = document.querySelector('#form-editar-setor #setor-descricao');

    inputID.value = setor.id;
    inputDescricao.value = setor.ds_setor;

}

async function listarSetores() {
    const tabela = document.getElementById('tabela-setores-body');

    tabela.innerHTML = spinner();

    const setores  = await fetchSetores();

    if(setores && setores.length) {
        let linhas = '';

        setores.forEach((setor, index) => {
            linhas += linhaSetor(setor, index + 1);
        });

        tabela.innerHTML = linhas;
    } else {
        tabela.innerHTML = '<tr><p class="mt-2">Nenhum setor foi encontrado.</p></tr>';
    }

}

function linhaSetor(setor, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${setor.ds_setor}</td>
            <td class="table-light text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning" title="editar setor" data-bs-toggle="modal" data-bs-target="#modal-setores" onclick='editarSetor(${JSON.stringify(setor)});'>
                        <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="excluir setor" onclick='excluirSetor(${JSON.stringify(setor)});'>
                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

function fetchSetores() {
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

function fetchCadastrarSetor(cadastro) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'setores.php', { 
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(cadastro)
            });
            const setor = await response.json();

            res(setor);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchAtualizarSetor(atualizacao) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'setores.php?' + new URLSearchParams({
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
            const setor = await response.json();

            res(setor);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchExcluirSetor(id) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'setores.php', { 
                method: "DELETE",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            });
            const setor = await response.json();

            res(setor);
        } catch (error) {
            rej(false);
            
        }
    });
}
