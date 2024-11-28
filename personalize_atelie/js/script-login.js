document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    fetch('http://localhost:80/personalize_atelie/server/processar-login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `email=${email}&password=${password}`,
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('login')) {
            window.location.href = '../usuario.html'; // Redireciona para a página do usuário
        } else {
            alert(data);
        }
    })
    .catch(error => console.error('Erro ao fazer login:', error));
});
