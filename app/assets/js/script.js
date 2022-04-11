const server = "http://localhost/elephant_edu/app/controllers/";

window.onload = () => {

}

function spinner() {
    return `
        <div class="spinner-border m-3" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;
}

function logout() {
    let url = server + 'logout.php';

    fetch(url);
    window.location = 'login.php';
}