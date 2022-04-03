const server = "http://localhost/elephant_edu/app/controllers/";

window.onload = () => {

}

function logout() {
    let url = server + 'logout.php';

    fetch(url);
    window.location = 'login.php';
}