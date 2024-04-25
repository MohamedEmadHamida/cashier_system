CREATE DATABASE IF NOT EXISTS CoffeeShopDB;

USE CoffeeShopDB;


CREATE TABLE IF NOT EXISTS FoodItems (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100),
description VARCHAR(100),
price DECIMAL(6, 2),
quantity INT
);

CREATE TABLE IF NOT EXISTS Drinks (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100),
description VARCHAR(100),
price DECIMAL(6, 2),
quantity_gram INT
);


INSERT INTO FoodItems (name, description, price, quantity)
VALUES ('Sandwich', 'Chicken Sandwich', 5.99, 10),
       ('Salad', 'Caesar Salad', 7.49, 15),
       ('Pizza', 'Margherita Pizza', 8.99, 8);

-- Insert sample data into Drinks table
INSERT INTO Drinks (name, description, price, quantity_gram)
VALUES ('Coffee', 'Espresso', 2.49, 250),
       ('Tea', 'Green Tea', 1.99, 200),
       ('Smoothie', 'Mixed Berry Smoothie', 4.99, 300);