-- Categories
INSERT INTO categories (title, parent_id, created_at, updated_at) VALUES
('Groceries', NULL, NOW(), NOW()),
('Beverages', NULL, NOW(), NOW()),
('Pet Food', NULL, NOW(), NOW()),
('Fruits', NULL, NOW(), NOW()),
('Vegetables', NULL, NOW(), NOW()),
('Bakery', NULL, NOW(), NOW());

-- Products
INSERT INTO products (title, content, description, price, old_price, img, keywords, is_offer, category_id, created_at, updated_at) VALUES
('Fortune Sunflower Oil', 'Premium quality sunflower oil', 'Pure and healthy sunflower oil perfect for cooking', 7.99, 10.00, 'images/1.png', 'oil, sunflower, cooking', 1, 1, NOW(), NOW()),
('Basmati Rice (5 Kg)', 'Premium basmati rice', 'Long grain aromatic basmati rice from Himalayas', 11.99, 15.00, 'images/2.png', 'rice, basmati, grain', 1, 1, NOW(), NOW()),
('Pepsi Soft Drink (2 Ltr)', 'Refreshing soft drink', 'Classic Pepsi soft drink in 2 liter bottle', 8.00, 10.00, 'images/3.png', 'drink, pepsi, soft', 1, 2, NOW(), NOW()),
('Dogs Food (4 Kg)', 'Nutritious dog food', 'Complete and balanced nutrition for adult dogs', 9.00, 11.00, 'images/4.png', 'pet, dog, food', 1, 3, NOW(), NOW()),
('Fresh Apples', 'Fresh red apples', 'Crispy and sweet red apples from local farms', 4.99, NULL, 'images/1.jpg', 'fruit, apple, fresh', 0, 4, NOW(), NOW()),
('Organic Tomatoes', 'Fresh organic tomatoes', 'Ripe organic tomatoes perfect for salads', 3.49, NULL, 'images/2.jpg', 'vegetable, tomato, organic', 0, 5, NOW(), NOW()),
('Whole Wheat Bread', 'Healthy bread option', 'Freshly baked whole wheat bread rich in fiber', 2.99, NULL, 'images/1.jpg', 'bread, wheat, bakery', 0, 6, NOW(), NOW()),
('Orange Juice', 'Fresh orange juice', '100% pure orange juice without preservatives', 5.99, NULL, 'images/2.jpg', 'juice, orange, fresh', 0, 2, NOW(), NOW());
