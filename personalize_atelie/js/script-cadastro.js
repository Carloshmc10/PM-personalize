document.getElementById('cadastro-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    fetch('http://localhost:80/personalize_atelie/server/processar-cadastro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&email=${email}&password=${password}`,
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('Cadastro realizado com sucesso')) {
            alert('Cadastro realizado com sucesso!');
            window.location.href = 'http://localhost/personalize_atelie/login.html'; // Redireciona para login
        } else {
            alert('Erro no cadastro: ' + data);
        }
    })
    .catch(error => console.error('Erro no cadastro:', error));
});
