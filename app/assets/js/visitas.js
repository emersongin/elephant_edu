window.onload = () => {
    listarUsuario();
    listarPerfis();
    submitFormCadastro();
    submitFormAtualizar();

}

function submitFormCadastro() {
    const form = document.getElementById('form-cadastro-usuario');
    const button = document.getElementById('btn-cadastro');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const cadastro = {
            nome: formData.get('nome'),
            cpf: formData.get('cpf'),
            telefone: formData.get('telefone'),
            senha: formData.get('senha'),
            id_perfil: formData.get('id_perfil')
        };

        button.disabled = true;

        const usuario = await fetchCadastrarUsuario(cadastro);

        if(usuario) {
            listarUsuario();
            form.reset();

        }

        button.disabled = false;

    });
}

function submitFormAtualizar() {
    const form = document.getElementById('form-editar-usuario');
    const button = document.getElementById('btn-atualizar');
    const modal = new bootstrap.Modal(document.getElementById('modal-usuarios'));

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const atualizacao = {
            id: formData.get('id'),
            nome: formData.get('nome'),
            cpf: formData.get('cpf'),
            telefone: formData.get('telefone'),
            id_perfil: formData.get('id_perfil')
        };

        button.disabled = true;

        const usuario = await fetchAtualizarUsuario(atualizacao);

        if(usuario) {
            form.reset();
            modal.hide();
            listarUsuario();

        }

        button.disabled = false;

    });
}

async function excluirUsuario(usuario) {
    if(confirm(`Deseja realmente excluir o usuário: ${usuario.nome}`)) {
        const excluido = await fetchExcluirUsuario(usuario.id);

        if(excluido) { 
            listarUsuario(); 
        }

    }
}

function editarUsuario(usuario) {
    const form = document.getElementById('form-editar-usuario');

    form.reset();

    const inputID = document.querySelector('#form-editar-usuario #usuario-id');
    const inputNome = document.querySelector('#form-editar-usuario #usuario-nome');
    const inputCPF = document.querySelector('#form-editar-usuario #usuario-cpf');
    const inputTelefone = document.querySelector('#form-editar-usuario #usuario-telefone');
    const selectPerfil = document.querySelector('#form-editar-usuario #usuario-perfil-editar');

    inputID.value = usuario.id;
    inputNome.value = usuario.nome;
    inputCPF.value = usuario.cpf;
    inputTelefone.value = usuario.telefone;
    selectPerfil.value = usuario.id_perfil;

}

async function listarUsuario() {
    const tabela = document.getElementById('tabela-usuarios-body');

    tabela.innerHTML = spinner();

    const usuarios  = await fetchUsuarios();

    if(usuarios && usuarios.length) {
        let linhas = '';

        usuarios.forEach((usuario, index) => {
            linhas += linhaUsuario(usuario, index + 1);
        });

        tabela.innerHTML = linhas;
    } else {
        tabela.innerHTML = '<tr>Nenhum usuário foi encontrado.</tr>';
    }

}

function linhaUsuario(usuario, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${usuario.nome}</td>
            <td class="table-light">${usuario.cpf}</td>
            <td class="table-light d-none d-md-table-cell">${usuario.telefone}</td>
            <td class="table-light d-none d-md-table-cell">${usuario.ds_perfil}</td>
            <td class="table-light text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning" title="editar usuário" data-bs-toggle="modal" data-bs-target="#modal-usuarios" onclick='editarUsuario(${JSON.stringify(usuario)});'>
                        <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="excluir usuário" onclick='excluirUsuario(${JSON.stringify(usuario)});'>
                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

async function listarPerfis() {
    const selects = document.getElementsByClassName('usuario-perfil');

    for (const select of selects) {
        select.disabled = true;
    }

    let opcoes = '<option disabled selected>selecione um perfil</option>';

    const perfis  = await fetchPerfis();

    if(perfis && perfis.length) {

        perfis.forEach((perfil, index) => {
            opcoes += `<option value="${perfil.id}">${perfil.descricao}</option>`;
        });

        for (const select of selects) {
            select.innerHTML = opcoes;
        }
        
    }

    for (const select of selects) {
        select.disabled = false;
    }

}

function fetchUsuarios() {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'usuarios.php', { method: 'GET' });
            const usuarios = await response.json();

            res(usuarios);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchCadastrarUsuario(cadastro) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'usuarios.php', { 
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(cadastro)
            });
            const usuario = await response.json();

            res(usuario);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchAtualizarUsuario(atualizacao) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'usuarios.php?' + new URLSearchParams({
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
            const usuario = await response.json();

            res(usuario);
        } catch (error) {
            rej(false);
        }
    });
}

function fetchExcluirUsuario(id) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'usuarios.php', { 
                method: "DELETE",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            });
            const usuario = await response.json();

            res(usuario);
        } catch (error) {
            rej(false);
            
        }
    });
}

function fetchPerfis(url, params) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(server + 'perfis.php', { method: 'GET' });
            const perfis = await response.json();

            res(perfis);
        } catch (error) {
            rej(false);
        }
    });
}