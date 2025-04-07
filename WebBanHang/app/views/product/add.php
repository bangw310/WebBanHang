<?php include 'app/views/shares/header.php'; ?>
<h1>Chỉnh sửa sản phẩm</h1>
<form id="edit-product-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API -->
        </select>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control">
        <img id="preview-image" src="" alt="Ảnh sản phẩm" class="img-thumbnail mt-2" style="max-width: 200px;">
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    <a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại</a>
</form>
<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const productId = new URLSearchParams(window.location.search).get("id");

        // Lấy thông tin sản phẩm
        fetch(`/webbanhang/api/product/${productId}`)
            .then(response => response.json())
            .then(product => {
                document.getElementById('name').value = product.name;
                document.getElementById('description').value = product.description;
                document.getElementById('price').value = product.price;
                document.getElementById('preview-image').src = product.image; // Hiển thị ảnh hiện tại

                fetch('/webbanhang/api/category')
                    .then(response => response.json())
                    .then(data => {
                        const categorySelect = document.getElementById('category_id');
                        data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category.id;
                            option.textContent = category.name;
                            if (category.id == product.category_id) {
                                option.selected = true;
                            }
                            categorySelect.appendChild(option);
                        });
                    });
            });

        // Xử lý chỉnh sửa sản phẩm
        document.getElementById('edit-product-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            formData.append('_method', 'PUT'); // Giả lập PUT request nếu backend cần

            fetch(`/webbanhang/api/product/${productId}`, {
                method: 'POST', // Nếu API hỗ trợ PUT thì đổi thành 'PUT'
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Product updated successfully') {
                    alert('Cập nhật thành công!');
                    location.href = '/webbanhang/Product';
                } else {
                    alert('Cập nhật thất bại!');
                }
            })
            .catch(error => console.error('Lỗi:', error));
        });

        // Xem trước ảnh khi chọn tệp
        document.getElementById('image').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<style>
    .img-thumbnail {
        border-radius: 8px;
        border: 1px solid #ddd;
    }
</style>
