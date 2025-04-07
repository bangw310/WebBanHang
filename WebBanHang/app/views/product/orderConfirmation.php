<?php include 'app/views/shares/header.php'; ?>

<div class="container text-center mt-5">
    <div class="order-confirmation">
        <h1 class="text-success">✅ Xác nhận đơn hàng</h1>
        <p class="lead">🎉 Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được xử lý thành công.</p>
        
        <div class="mt-4">
            <a href="/webbanhang/" class="btn btn-primary btn-lg me-2">🛍 Tiếp tục mua sắm</a>
            
        </div>
    </div>
</div>

<style>
    .order-confirmation {
        background: #f8f9fa;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }
    .btn-lg {
        padding: 12px 24px;
        font-size: 18px;
        border-radius: 8px;
        transition: 0.3s;
    }
    .btn-primary:hover {
        background: #0056b3;
        transform: scale(1.05);
    }
    .btn-outline-dark:hover {
        background: black;
        color: white;
        transform: scale(1.05);
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
