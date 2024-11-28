document.getElementById('redefinicao-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let token = document.getElementById('token').value;
    let newPassword = document.getElementById('new_password').value;

    fetch('http://localhost:80/personalize_atelie/server/processar-redefinicao.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${token}&new_password=${newPassword}`,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes('Senha redefinida com sucesso')) {
            window.location.href = '../login.html'; // Redireciona para login
        }
    })
    .catch(error => console.error('Erro ao redefinir senha:', error));
});
