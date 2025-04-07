<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Đẳng Cấp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        
        /* Footer chính */
        .footer {
            background: linear-gradient(135deg, #1f1c2c, #928DAB);
            color: #fff;
            padding: 60px 0;
            position: relative;
            text-align: center;
            overflow: hidden;
        }

        .footer h5 {
            font-size: 20px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .footer p {
            font-size: 14px;
            color: #ccc;
        }

        .footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #f39c12;
        }

        /* Hiệu ứng icon mạng xã hội */
        .social-icons a {
            font-size: 24px;
            margin: 0 15px;
            display: inline-block;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #f39c12;
            text-shadow: 0 0 15px rgba(255, 165, 0, 0.8);
        }

        /* Hiệu ứng khi hover vào các cột */
        .footer .col-md-4:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        /* Footer bản quyền */
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>

  

    <!-- Footer chính -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Cột 1 -->
                <div class="col-md-4">
                    <h5>Về Chúng Tôi</h5>
                    <p>Chúng tôi cung cấp các giải pháp thiết kế web hiện đại, sáng tạo và chuyên nghiệp.</p>
                </div>
                
                <!-- Cột 2 -->
                <div class="col-md-4">
                    <h5>Liên Kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                
                <!-- Cột 3 -->
                <div class="col-md-4">
                    <h5>Kết Nối</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                &copy; 2025 Công ty TNHH XYZ | All Rights Reserved
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
