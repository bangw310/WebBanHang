CREATE DATABASE banhang1;
USE banhang1;

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(id)
);category

INSERT INTO category (name, description) VALUES
    ('Electronics', 'Electronic devices and gadgets'),
    ('Clothing', 'Apparel for men and women'),
    ('Books', 'A wide range of books'),
    ('Home & Kitchen', 'Items for your home and kitchen'),
    ('Beauty & Personal Care', 'Beauty and personal care products');

INSERT INTO product (name, description, price, image, category_id) VALUES
    ('Laptop', 'High-performance laptop', 1200.00, 'uploads/laptop.avif', 1),
    ('Smartphone', 'Latest smartphone model', 800.00, 'uploads/dienthoai.jpg', 1),
    ('T-Shirt', 'Cotton t-shirt', 20.00, 'uploads/t-shirt.jpg', 2),
    ('Jeans', 'Denim jeans', 50.00, 'uploads/jeans.avif', 2);bbanhang1anghang1banghang1categoryproductbanhang1banhang1accountaccountbanhang1banhang1account