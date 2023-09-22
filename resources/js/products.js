$(document).ready(function () {
    var currentIndex = 0; // Variable para rastrear el índice actual del producto

    $('#mostrarProducto').on('click', function () {
        if (currentIndex < products.length) {
            var product = products[currentIndex];

            // Crear una fila con los detalles del producto
            var newRow = `
                <tr>
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.rating}</td>
                    <td>${product.original_price}</td>
                    <td>${product.sale_price}</td>
                    <td>${product.quantity}</td>
                    <td>${product.size}</td>
                    <td>${product.color}</td>
                    <td>${product.image}</td>
                    <td>${product.category_id}</td>
                </tr>
            `;

            $('#tablaProductos').append(newRow);
            currentIndex++; // Incrementar el índice para el próximo producto
        } else {
            alert('Todos los productos se han mostrado.');
        }
    });
});
