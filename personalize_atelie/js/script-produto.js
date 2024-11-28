document.addEventListener('DOMContentLoaded', function() {
    let urlParams = new URLSearchParams(window.location.search);
    let productId = urlParams.get('id');

    if (productId) {
        fetch(`http://localhost:80/personalize_atelie/server/buscar-produto.php?id=${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('product-name').textContent = data.name;
                    document.getElementById('product-description').textContent = data.description;
                    document.getElementById('product-price').textContent = `R$ ${data.price}`;
                }
            })
            .catch(error => console.error('Erro ao buscar produto:', error));
    }
});
