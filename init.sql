CREATE TABLE IF NOT EXISTS users (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS wallets (
                                       id INT AUTO_INCREMENT PRIMARY KEY,
                                       user_id INT NOT NULL,
                                       balance DECIMAL(10, 2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS transactions (
                                            id INT AUTO_INCREMENT PRIMARY KEY,
                                            user_id INT NOT NULL,
                                            amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    ) ENGINE=INNODB;
