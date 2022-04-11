window.onload = () => {
    listarUsuario();

}

async function listarUsuario() {
    const tabela = document.getElementById('tabela-usuarios-body');

    tabela.innerHTML = spinner();

    const usuarios  = await fetchUsuarios(server + 'usuarios.php', { method: 'GET' });

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

function fetchUsuarios(url, params) {
    return new Promise(async (res, rej) => {
        try {
            const response = await fetch(url, params);
            const usuarios = await response.json();

            res(usuarios);
        } catch (error) {
            rej(false);
        }
    });
}