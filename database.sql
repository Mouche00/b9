CREATE DATABASE IF NOT EXISTS b9;
USE b9;

-- Client Table
CREATE TABLE IF NOT EXISTS customer (
    id VARCHAR(50) PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    address VARCHAR(50)
);

-- Insurer Table
CREATE TABLE IF NOT EXISTS insurer (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(50),
    address VARCHAR(50)
);

-- CustomerOfInsurer Table
CREATE TABLE IF NOT EXISTS article (
    id VARCHAR(50) PRIMARY KEY,
    title VARCHAR(50),
    content VARCHAR(50),
    date DATE,
    customer_id VARCHAR(50),
    insurer_id VARCHAR(50),
    FOREIGN KEY (customer_id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS claim (
    id VARCHAR(50) PRIMARY KEY,
    description VARCHAR(50),
    date DATE,
    article_id VARCHAR(50),
    FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS refund (
    id VARCHAR(50) PRIMARY KEY,
    amount DOUBLE,
    date DATE,
    claim_id VARCHAR(50),
    FOREIGN KEY (claim_id) REFERENCES claim(id) ON DELETE CASCADE ON UPDATE CASCADE
)

