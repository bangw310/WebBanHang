<?php include 'app/views/shares/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container mt-5">
    <h1 class="text-center">🛒 Giỏ hàng của bạn</h1>

    <?php if (!empty($cart)): ?>
        <table class="table table-bordered text-center align-middle mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($item['name']); ?></strong></td>
                        <td>
                            <?php if ($item['image']): ?>
                                <img src="/webbanhang/<?php echo $item['image']; ?>" alt="ProductImage" class="product-image">
                            <?php endif; ?>
                        </td>
                        <td><?php echo number_format($item['price']); ?> VND</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-danger quantity-btn" data-id="<?php echo $id; ?>" data-action="decrease">−</button>
                                <input type="number" min="1" value="<?php echo $item['quantity']; ?>"
                                       data-price="<?php echo $item['price']; ?>" 
                                       data-id="<?php echo $id; ?>" 
                                       class="form-control quantity-input mx-2">
                                <button class="btn btn-sm btn-success quantity-btn" data-id="<?php echo $id; ?>" data-action="increase">+</button>
                            </div>
                        </td>
                        <td><span id="subtotal-<?php echo $id; ?>"><?php echo number_format($subtotal); ?></span> VND</td>
                        <td><button class="btn btn-sm btn-outline-danger remove-item" data-id="<?php echo $id; ?>">🗑 Xóa</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3 class="text-end mt-3">Tổng tiền: <strong><span id="total-price"><?php echo number_format($total); ?></span> VND</strong></h3>

        <div class="text-center mt-4">
            <a href="/webbanhang/Product" class="btn btn-outline-primary">🛍 Tiếp tục mua sắm</a>
            <a href="/webbanhang/Product/checkout" class="btn btn-success">💳 Thanh Toán</a>
        </div>

    <?php else: ?>
        <p class="text-center mt-5">🚀 Giỏ hàng của bạn đang trống. <a href="/webbanhang/Product">Mua ngay!</a></p>
    <?php endif; ?>
</div>

<style>
    .product-image {
        max-width: 80px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    .quantity-input {
        width: 60px;
        text-align: center;
    }
    .quantity-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    .remove-item {
        font-size: 14px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const totalPriceElement = document.getElementById('total-price');

    document.querySelectorAll('.quantity-btn, .quantity-input').forEach(element => {
        element.addEventListener('click', updateCart);
        element.addEventListener('input', updateCart);
    });

    function updateCart(event) {
        let target = event.target;
        let action = target.getAttribute('data-action');
        let id = target.getAttribute('data-id');
        let inputField = document.querySelector(`.quantity-input[data-id='${id}']`);
        let quantity = parseInt(inputField.value);
        let price = parseFloat(inputField.getAttribute('data-price'));

        if (action === "increase") quantity++;
        if (action === "decrease" && quantity > 1) quantity--;

        inputField.value = quantity;

        // Cập nhật tổng tiền sản phẩm
        let subtotalElement = document.getElementById(`subtotal-${id}`);
        let newSubtotal = price * quantity;
        subtotalElement.innerText = newSubtotal.toLocaleString() + " VND";

        // Cập nhật tổng tiền giỏ hàng
        let newTotal = 0;
        document.querySelectorAll('.quantity-input').forEach(input => {
            let itemPrice = parseFloat(input.getAttribute('data-price'));
            let itemQuantity = parseInt(input.value);
            newTotal += itemPrice * itemQuantity;
        });

        totalPriceElement.innerText = newTotal.toLocaleString() + " VND";
    }

    // Xóa sản phẩm khỏi giỏ hàng (Chỉ cập nhật giao diện, chưa cập nhật session)
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            document.querySelector(`tr:has([data-id='${id}'])`).remove();
            
            // Cập nhật tổng tiền sau khi xóa
            let newTotal = 0;
            document.querySelectorAll('.quantity-input').forEach(input => {
                let itemPrice = parseFloat(input.getAttribute('data-price'));
                let itemQuantity = parseInt(input.value);
                newTotal += itemPrice * itemQuantity;
            });

            totalPriceElement.innerText = newTotal.toLocaleString() + " VND";
        });
    });
});
</script>

<?php include 'app/views/shares/footer.php'; ?>


<?php include 'app/views/shares/footer.php'; ?>
