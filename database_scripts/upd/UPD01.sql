DELIMITER $$
    DROP PROCEDURE IF EXISTS UPD01$$
    
    CREATE PROCEDURE UPD01()
    BEGIN
        IF NOT EXISTS (SELECT TABLE_NAME 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'sample'
                AND TABLE_NAME = 'users')
        THEN
                CREATE TABLE users(
                id INT PRIMARY KEY AUTO_INCREMENT, 
                first_name VARCHAR(255),
                last_name VARCHAR(255),
                username VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR (255)NOT NULL,  
                created_date DATETIME DEFAULT CURRENT_TIMESTAMP)
            ENGINE=INNODB CHARSET='utf8';
        END IF;
        
        IF NOT EXISTS (SELECT TABLE_NAME 
			FROM INFORMATION_SCHEMA.TABLES
                WHERE TABLE_SCHEMA = "sample" 
                AND TABLE_NAME = "roles")
        THEN 
            CREATE TABLE roles(
                id int PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255),
                created_date DATETIME DEFAULT CURRENT_TIMESTAMP
            )
            ENGINE=INNODB CHARSET=utf8;
        END IF;
    END$$
    

 

DELIMITER ;