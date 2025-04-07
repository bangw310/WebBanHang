$(document).ready(function () {
    fetchProducts();
});

function fetchProducts() {
    $.getJSON('/webbanhang/api/product', function (data) {
        const productList = $("#product-list");
        productList.empty(); // Xóa dữ liệu cũ

        data.forEach(product => {
            const productItem = `
                <div class="product-card">
                    <img src="${product.image_url}" alt="${product.name}" class="product-img">
                    <div class="product-info">
                        <h3><a href="/webbanhang/Product/show/${product.id}" class="product-name">${product.name}</a></h3>
                        <p class="product-description">${product.description}</p>
                        <p class="product-price"><strong>Giá:</strong> ${product.price} VND</p>
                        <p class="product-category"><em>Danh mục:</em> ${product.category_name || "Không rõ"}</p>
                        <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                    </div>
                </div>`;
            productList.append(productItem);
        });
    });
}

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        $.ajax({
            url: `/webbanhang/api/product/${id}`,
            type: 'DELETE',
            success: function (response) {
                if (response.message === 'Product deleted successfully') {
                    fetchProducts();
                } else {
                    alert('Xóa sản phẩm thất bại');
                }
            }
        });
    }
}
