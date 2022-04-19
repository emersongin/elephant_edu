window.onload = () => {
    dataAtual();
    listarVisitas();
    listarEscolas();
    listarSetores();
    submitFormCadastro();
    submitFormAtualizar();

}

function dataAtual() {
    document.getElementById('visita-data-cadastro').valueAsDate = new Date();
}

function submitFormCadastro() {
    const form = document.getElementById('form-cadastro-visita');
    const button = document.getElementById('btn-cadastro');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const cadastro = {
            id_escola: formData.get('id_escola'),
            id_setor: formData.get('id_setor'),
            qtdAlunos: formData.get('qtd-alunos'),
            professor: formData.get('nome-professor'),
            telefone: formData.get('telefone'),
            data: formData.get('data'),
            conteudo: formData.get('conteudo'),
        };

        button.disabled = true;

        console.log(cadastro);

        const visita = await fetchCadastrarVisita(cadastro);

        if(visita) {
            listarVisitas();
            form.reset();

        }

        button.disabled = false;

    });
}

function submitFormAtualizar() {
    const form = document.getElementById('form-editar-visita');
    const button = document.getElementById('btn-atualizar');
    const modal = new bootstrap.Modal(document.getElementById('modal-visitas'));

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const atualizacao = {
            id: formData.get('id'),
            id_setor: formData.get('id_setor'),
            qtdAlunos: formData.get('qtd-alunos'),
            professor: formData.get('nome-professor'),
            telefone: formData.get('telefone'),
            data: formData.get('data'),
            conteudo: formData.get('conteudo'),
        };

        button.disabled = true;

        const visita = await fetchAtualizarVisita(atualizacao);

        if(visita) {
            form.reset();
            modal.hide();
            listarVisitas();

        }

        button.disabled = false;

    });
}

async function excluirVisita(visita) {
    if(confirm(`Deseja realmente excluir a visita: ${visita.data_visita_formatada} - ${visita.nm_escola}`)) {
        const excluido = await fetchexcluirVisita(visita.id);

        if(excluido) { 
            listarVisitas(); 
        }

    }
}

function editarVisita(visita) {
    const form = document.getElementById('form-editar-visita');

    form.reset();

    const inputID = document.querySelector('#form-editar-visita #visita-id');
    const selectSetor = document.querySelector('#form-editar-visita #visita-setor-editar');
    const inputQtaAlunos = document.querySelector('#form-editar-visita #visita-qtd-alunos');
    const inputProfessor = document.querySelector('#form-editar-visita #visita-nome-professor');
    const inputTelefone = document.querySelector('#form-editar-visita #visita-telefone');
    const inputData = document.querySelector('#form-editar-visita #visita-data');
    const inputConteudo = document.querySelector('#form-editar-visita #visita-conteudo');

    inputID.value = visita.id;
    selectSetor.value = visita.id_setor;
    inputQtaAlunos.value = visita.qtd_alunos;
    inputProfessor.value = visita.professor;
    inputTelefone.value = visita.telefone;
    inputData.value = visita.data_visita;
    inputConteudo.value = visita.conteudo;

}

async function listarVisitas() {
    const tabela = document.getElementById('tabela-visitas-body');

    tabela.innerHTML = spinner();

    const visitas  = await fetchVisitas();

    if(visitas && visitas.length) {
        let linhas = '';

        visitas.forEach((visita, index) => {
            linhas += linhaVisitas(visita, index + 1);
        });

        tabela.innerHTML = linhas;
    } else {
        tabela.innerHTML = '<tr><p class="mt-2">Nenhuma visita foi encontrada.</p></tr>';
    }

}

function linhaVisitas(visitas, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${visitas.data_visita_formatada}</td>
            <td class="table-light">${visitas.nm_escola}</td>
            <td class="table-light">${visitas.ds_setor_visita}</td>
            <td class="table-light text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning" title="editar visita" data-bs-toggle="modal" data-bs-target="#modal-visitas" onclick='editarVisita(${JSON.stringify(visitas)});'>
                        <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="excluir visita" onclick='excluirVisita(${JSON.stringify(visitas)});'>
                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

async function listarEscolas() {
    const selects = document.getElementsByClassName('visita-escola');

    for (const select of selects) {
        select.disabled = true;
    }

    let opcoes = '<option disabled selected>selecione uma escola</option>';

    const escolas  = await fetchEscolas();

    if(escolas && escolas.length) {

        escolas.forEach((escola, index) => {
            opcoes += `<option value="${escola.id}">${escola.nm_escola}</option>`;
        });

        for (const select of selects) {
            select.innerHTML = opcoes;
        }
        
    }

    for (const select of selects) {
        select.disabled = false;
    }

}

async function listarSetores() {
    const selects = document.getElementsByClassName('visita-setor');

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

function fetchVisitas() {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'visitas.php', { method: 'GET' });
            const visitas = await response.json();

            res(visitas);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchCadastrarVisita(cadastro) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'visitas.php', { 
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(cadastro)
            });
            const visitas = await response.json();

            console.log(visitas);

            res(visitas);
        } catch (error) {

            console.log(error);

            rej(false);
        }
    });
}

function fetchAtualizarVisita(atualizacao) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'visitas.php?' + new URLSearchParams({
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
            const visitas = await response.json();

            res(visitas);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchexcluirVisita(id) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'visitas.php', { 
                method: "DELETE",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            });
            const visitas = await response.json();

            res(visitas);
        } catch (error) {
            rej(false);
            
        }
    });
}

function fetchEscolas(url, params) {
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
