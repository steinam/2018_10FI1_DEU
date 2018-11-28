CREATE SCHEMA IF NOT EXISTS bookstore;
USE bookstore;

CREATE TABLE book(
  isbn CHAR(13) NOT NULL,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  stock SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  price FLOAT UNSIGNED
) ENGINE=InnoDb;

CREATE TABLE customer(
  id INT UNSIGNED NOT NULL,
  firstname VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  type ENUM('basic', 'premium')
) ENGINE=InnoDb;

ALTER TABLE book
  ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT 
  PRIMARY KEY FIRST;

ALTER TABLE customer
  MODIFY id INT UNSIGNED NOT NULL
  AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE borrowed_books(
  book_id INT UNSIGNED NOT NULL,
  customer_id INT UNSIGNED NOT NULL,
  start DATETIME NOT NULL,
  end DATETIME DEFAULT NULL,
  FOREIGN KEY (book_id) REFERENCES book(id),
  FOREIGN KEY (customer_id) REFERENCES customer(id)
) ENGINE=InnoDb;

CREATE TABLE sale(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customer_id INT UNSIGNED NOT NULL,
  date DATETIME NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES customer(id)
) ENGINE=InnoDb;

CREATE TABLE sale_book(
  sale_id INT UNSIGNED NOT NULL,
  book_id INT UNSIGNED NOT NULL,
  amount SMALLINT UNSIGNED NOT NULL DEFAULT 1,
  price FLOAT NOT NULL,
  FOREIGN KEY (sale_id) REFERENCES sale(id),
  FOREIGN KEY (book_id) REFERENCES book(id)
) ENGINE=InnoDb;

ALTER TABLE book ADD UNIQUE KEY (isbn);
ALTER TABLE customer ADD UNIQUE KEY (email);
ALTER TABLE book ADD INDEX (title);

INSERT INTO customer (firstname, surname, email, type)
  VALUES ("Han", "Solo", "han@tatooine.com", "premium");
INSERT INTO customer (firstname, surname, email, type)
  VALUES ("James", "Kirk", "enter@prise", "basic");

INSERT INTO book (isbn,title,author,stock,price) VALUES
  ("9780882339726","1984","George Orwell",12,7.50),
  ("9789724621081","1Q84","Haruki Murakami",9,9.75),
  ("9780736692427","Animal Farm","George Orwell",8,3.50),
  ("9780307350169","Dracula","Bram Stoker",30,10.15),
  ("9780753179246","19 minutes","Jodi Picoult",0,10);

INSERT INTO book (isbn,title,author,price) VALUES
  ("9781416500360", "Odyssey", "Homer", 4.23);

