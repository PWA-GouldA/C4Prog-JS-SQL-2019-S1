# SQL COMMANDS (MySQL)

## Create a Database
```mysql
CREATE DATABASE name;
```
For example:
```mysql
CREATE DATABASE 
    `ajg_animals_dev` /*!40100 COLLATE 'utf8mb4_general_ci' */;
```
Create a database if it does not exist:
```mysql
CREATE DATABASE IF NOT EXIST
    `ajg_animals_dev` /*!40100 COLLATE 'utf8mb4_general_ci' */;
```

## Deleting a Database
```mysql
DROP DATABASE name;
```
Only delete a DB if it exists:
```mysql
DROP DATABASE IF EXIST name;
```

# Create a user

## Create a new SuperUser
```mysql
CREATE USER 'ajg'@'localhost' IDENTIFIED BY 'Secret1';
```

## Give SuperUser full access
```mysql
GRANT   
    EXECUTE, PROCESS, SELECT, SHOW DATABASES, 
    SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, 
    CREATE ROUTINE, CREATE TABLESPACE, 
    CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, 
    DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER,
    UPDATE, CREATE USER, FILE, LOCK TABLES, RELOAD, 
    REPLICATION CLIENT, REPLICATION SLAVE, 
    SHUTDOWN, SUPER  
ON *.* TO 'username'@'host_address' 
WITH GRANT OPTION;
```
## Flushing (Applying) Privileges
```mysql
FLUSH PRIVILEGES;
```

## Create and grant privileges for a 'general user'

Create the user `ajg_animals_dev` that can access the
database from the same machine (`localhost`) as the
database server using a password of `Secret1`
```mysql
CREATE USER 'ajg_animals_dev'@'localhost' 
IDENTIFIED BY 'Secret1';
```
Give the user access to "all" databases, but not be able 
to read/change/etc any data.
```mysql
GRANT USAGE ON *.* TO 'ajg_animals_dev'@'localhost';
```
Give the user full access to the `ajg_animals_dev` 
database.
```mysql
GRANT
    SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE,
    CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES,
    CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT,
    REFERENCES, TRIGGER, UPDATE, LOCK TABLES
ON `ajg\_animals\_dev`.* 
TO 'ajg_animals_dev'@'localhost' 
WITH GRANT OPTION;
```
Now apply the privilege changes.
```mysql
FLUSH PRIVILEGES;
```
# Access the Database
This is needed so that you can work on the 
correct database.
```mysql
USE `ajg_animals_dev`;
```
# Creating Tables
Create a table with SQL:
```mysql
CREATE TABLE table_name ( field_name type, ...);
```
## Create the Animals Table
```mysql
CREATE TABLE `animals` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(64) NOT NULL DEFAULT '**ERROR**',
	`species` VARCHAR(128) NOT NULL DEFAULT '**ERROR**',
	`date_of_birth` DATE NOT NULL DEFAULT '1000-01-01',
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    PRIMARY KEY (`id`))
COMMENT='A table of animals, really it is!'
COLLATE='utf8mb4_general_ci';
```

# Alter the table structure
Change the field called `name` and its size and place after the field `id`
```mysql
ALTER TABLE animals
	CHANGE COLUMN `name` animal_name VARCHAR(32) 
		NOT NULL 
		DEFAULT '**ERROR**' 
		AFTER `id`;
```

# Insert data into a table
```mysql
INSERT INTO table(field1, field2...) VALUES (value1, value2,...);
```
## Inserting animals into the animals table
```mysql
INSERT INTO 
    ajg_animals_dev.animals (animal_name, species, date_of_birth)
VALUES 
    ('Ruff', 'Dog', '2018-01-06');
```
If already using the database, then this can be shortened:
```mysql
INSERT INTO 
    animals (animal_name, species, date_of_birth) 
VALUES 
    ('Meow', 'Cat', '2016-04-11');
```

Insert more than one animal at once:
```mysql
INSERT INTO 
    animals (animal_name, species, date_of_birth) 
VALUES 
    ('Squawk', 'Parrot', '2010-11-11'),
    ('Squeek', 'Mouse', '2019-01-01'),
    ('Chirpy', 'Parrot', '2017-07-22'),
    ('Squeel', 'Pig', '2018-09-30');
```

# Browsing Data from a table

To read all records in a table:
```mysql
SELECT * FROM tablename;
```

To read a SINGLE record with a known ID:
```mysql
SELECT * FROM tablename WHERE id=value;
```

To read all records with an ID between 1 and 5:
```mysql
SELECT * FROM tablename WHERE id >= 1 AND id <= 5;
```
or
```mysql
SELECT * FROM tablename WHERE id BETWEEN 1 AND 5;
```

Find an animal with a particular name:
```mysql
SELECT id, animal_name FROM animals 
	WHERE animal_name = "Squawk";
```
or
```mysql
SELECT id, animal_name FROM animals 
	WHERE animal_name LIKE "Squawk";
```

Find animals with a name starting with something like Dum:
```mysql
SELECT * FROM animals WHERE species LIKE "dum%";	
```
Find animals with a name ending with something like Dum:
```mysql
SELECT * FROM animals WHERE species LIKE "%dum";	
```
Find animals with a name containing something like Dum:
```mysql
SELECT * FROM animals WHERE species LIKE "%dum%";
```

# Update a record (eg correct a spelling error)
```mysql
UPDATE animals 
	SET animal_name='Speedy'
	WHERE id=8;
```
Update more than one column (field) of a record
```mysql
UPDATE animals 
	SET animal_name='Speedy',
		species='tortoise'
	WHERE id=9;
```


