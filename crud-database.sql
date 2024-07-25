CREATE TABLE users (
    id INT AUTO_INCREMENT  PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    profile ENUM('Administrator','Manager','Common') NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at datetime
) ENGINE=InnoDB;

INSERT INTO USERS(NAME, LAST_NAME, EMAIL, PROFILE) VALUES('Nicolas','Moraes', 'nicolas@gmail.com', 'Administrator');

