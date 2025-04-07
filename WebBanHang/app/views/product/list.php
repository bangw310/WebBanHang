<?php include 'app/views/shares/header.php'; ?>
<h1>Danh sách sản phẩm</h1>

<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/webbanhang/api/product')
            .then(response => response.json())
            .then(data => {
                const productList = document.getElementById('product-list');
                productList.innerHTML = ''; // Xóa danh sách cũ

                data.forEach(product => {
                    const productItem = document.createElement('li');
                    productItem.className = 'list-group-item product-card';
                    productItem.innerHTML = `
                        <div class="row">
                            <div class="col-md-3">
                                <img src="${product.image}" alt="${product.name}" class="product-img">
                            </div>
                            <div class="col-md-9">
                                <h2>
                                    <a href="/webbanhang/Product/show/${product.id}" class="product-name">
                                        ${product.name}
                                    </a>
                                </h2>
                                <p class="product-description">${product.description}</p>
                                <p class="product-price">Giá: ${product.price} VND</p>
                                <p class="product-category">Danh mục: ${product.category_name}</p>
                                <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                                <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                            </div>
                        </div>
                    `;
                    productList.appendChild(productItem);
                });
            });
    });

    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            fetch(`/webbanhang/api/product/${id}`, { method: 'DELETE' })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product deleted successfully') {
                        location.reload();
                    } else {
                        alert('Xóa sản phẩm thất bại');
                    }
                });
        }
    }
</script>

<style>
    .product-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        padding: 15px;
        margin-bottom: 10px;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .product-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .product-name {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: 0.3s;
    }

    .product-name:hover {
        color: #f39c12;
    }

    .product-description {
        font-size: 14px;
        color: #666;
        height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-price {
        font-size: 16px;
        font-weight: bold;
        color: #d68910;
    }

    .product-category {
        font-size: 14px;
        font-style: italic;
        color: #555;
    }
</style>
