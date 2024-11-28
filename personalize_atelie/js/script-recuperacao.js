document.getElementById('recuperacao-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;

    fetch('http://localhost:80/personalize_atelie/server/processar-recuperacao.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `email=${email}`,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => console.error('Erro ao recuperar senha:', error));
});
