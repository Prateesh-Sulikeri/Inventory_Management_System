CREATE TABLE customer (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  age INT NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE employee (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  age INT NOT NULL,
  designation VARCHAR(255) NOT NULL,
  salary INT NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  stock_available INT NOT NULL,
  price INT NOT NULL,
  PRIMARY KEY (id),
  KEY type (type)
);

CREATE TABLE orders (
  id INT NOT NULL AUTO_INCREMENT,
  cust_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  quantity INT NOT NULL,
  price_per_piece INT NOT NULL,
  total_price INT NOT NULL,
  PRIMARY KEY (id)

);

CREATE TABLE suppliers (
  id INT NOT NULL AUTO_INCREMENT,
  sup_name VARCHAR(255) NOT NULL,
  prod_name VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  price INT NOT NULL,
  email VARCHAR(255) NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (id)
);



CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);


INSERT INTO `users`(`username`, `password`) VALUES ('admin','1234');

INSERT INTO `customer`(`name`, `password`) VALUES ('user','123');