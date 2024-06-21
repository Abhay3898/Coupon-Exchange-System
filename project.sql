DROP TABLE transactions;
DROP TABLE Currency;
DROP TABLE Coupon;
DROP TABLE Customer;
DROP TABLE Admin;

CREATE TABLE Admin
(
AdminID varchar(50) PRIMARY KEY,
Name varchar(50) NOT NULL,
PassWord varchar(50) NOT NULL UNIQUE
);

CREATE TABLE Customer
(
user_id varchar(50) PRIMARY KEY,
username varchar(50) NOT NULL,
email varchar(50) NOT NULL,
password varchar(50) NOT NULL,
points integer NOT NULL
);

CREATE TABLE Coupon
(
/*id SERIAL PRIMARY KEY,*/
coupon_name varchar(50) NOT NULL,
coupon_id INTEGER PRIMARY KEY,
discount varchar(11) NOT NULL,
validity DATE NOT NULL
);

CREATE TABLE Currency
(
points INTEGER PRIMARY KEY,
user_id varchar references Customer(user_id)
);


CREATE TABLE transactions
(
transaction_id SERIAL PRIMARY KEY,
user_id varchar(50) NOT NULL references Customer(user_id),
amount DECIMAL(10,2) NOT NULL,
timestamp TIMESTAMP NOT NULL
);

