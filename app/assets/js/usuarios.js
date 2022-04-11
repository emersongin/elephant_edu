window.onload = () => {
    listarUsuario();
    listarPerfis();

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
    }

}

function linhaUsuario(usuario, index) {
    return `
        <tr>
            <th class="table-light" scope="row">${index}</th>
            <td class="table-light">${usuario.nome}</td>
            <td class="table-light">${usuario.cpf}</td>
            <td class="table-light">${usuario.telefone}</td>
            <td class="table-light">${usuario.ds_perfil}</td>
            <td class="table-light">...</td>
        </tr>
    `;
}

async function listarPerfis() {
    const select = document.getElementById('usuario-perfil');

    select.disabled = true;

    let opcoes = '<option disabled selected>selecione um perfil</option>';

    const perfis  = await fetchPerfis();

    if(perfis && perfis.length) {

        perfis.forEach((perfil, index) => {
            opcoes += `<option value="${perfil.id}">${perfil.descricao}</option>`;
        });

        select.innerHTML = opcoes;
    }

    select.disabled = false;

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