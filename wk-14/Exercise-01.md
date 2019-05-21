# EXERCISES

## DATABASE DEFINITION LANGUAGE EXERCISES
These exercises concentrate on creating and updating tables.

We also do some data manipulation by inserting data into these tables.

Write the SQL commands to do the following:
### Exercise 1
Create a new 'owners' table in the animals database with the fields:
        
        ```text
            Field       Type    Size    Other
            id          INT     11      not null, auto increment
            given_name  VARCHAR 64      not null, default **ERROR**
            family_name VARCHAR 64      not null, default **ERROR**
            created_at  DATETIME        default CURRENT TIMESTAMP
            updated_at  DATETIME        default CURRENT TIMESTAMP
                                        on update CURRENT TIMESTAMP
                                        ```        

        and the primary key being the 'id'.                                        
### Exercsie 2
Create a new 'owner_animals' table with the following:

    ```text
    Field       Type        Size    Other
    id          INT         11      not null, auto increment
    owner_id    INT         11      not null, default 0
    animal_id   INT         11      not null, default 0
    ```
        and the primary key of `id`
       
### Exercsie 3       
Update the owner_animals table to include the two fields:

```text
            Field       Type    Size    Other
            created_at  DATETIME        default CURRENT TIMESTAMP
            updated_at  DATETIME        default CURRENT TIMESTAMP
                                        on update CURRENT TIMESTAMP
```

For example:
```mysql
    ALTER TABLE animals
    	ADD COLUMN owner_id INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER id,
 	    ADD COLUMN animal_id INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER owner_id;
```    

### Exercsie 4
Add a unique key for the owner_animals table of `owner id` and `animal id`.

```mysql
ALTER TABLE animals
	ADD UNIQUE INDEX owner_animals_index (owner_id, animal_id);
```

### Exercsie 5
Insert the following data into the Owners table
    
| ID | Full Name        |
|----|------------------|
| 1  | Eileen Dover     |
| 2  | Jaques d'Carre   |
| 3  | Newt Tonne       |
| 4  | Russell Leaves   |
| 5  | YOUR NAME        |
| 6  | Will Ng          |
    
### Exercsie 6    
Use the following commands on your animals table:

```mysql
TRUNCATE animals;
INSERT INTO 
    animals (id, animal_name, species, date_of_birth) 
VALUES 
    (1, 'Speedy', 'Tortoise', '2015-07-22'),
    (3, 'Squawk', 'Parrot', '2010-11-11'),
    (4, 'Scritch', 'Cat', '2012-07-22'),
    (8, 'Ruff', 'Dog', '2016-07-22'),
    (9, 'Squeaker', 'Mouse', '2019-01-01'),
    (null, 'Squeaky', 'Mouse', '2019-01-01'),
    (2, 'Trunky', 'Elephant', '2004-07-22'),
    (12, 'Chirpy', 'Parrot', '2012-07-22'),
    (6, 'Growl', 'Dog', '2017-09-22'),
    (5, 'Zoom', 'Tortoise', '2018-07-22'),
    (14, 'Meow', 'Cat', '2011-07-22'),
    (null, 'Hiss', 'Snake', '2014-07-22'),
    (null, 'Squeal', 'Pig', '2017-09-30');
```

What did the `truncate` command do?

### Exercsie 7
Now add the following owner animals    
    
    *Owner Animals table*
    
| Owner Name       | Animal Name        |
|------------------|--------------------|
| Jaques d'Carre   | Ruff               |
| Eileen Dover     | Squeaky            |
| Eileen Dover     | Zoom               |
| YOUR NAME        | Scritch            |
| Jaques d'Carre   | Growl              |
| Newt Tonne       | HAS NO ANIMALS     |
| Eileen Dover     | Squeaker           |
| Russell Leaves   | Meow               |
| YOUR NAME        | Hiss               |
| Will Ng          | Squeal             |
| Russell Leaves   | Chirpy             |

### Exercsie 8                
Now we have been told that some people have new pets.

Add the following people and their pets to the tables. Some of 
the people and pets are new.
    
| Owner Name       | Animal Name        | Animal        |
|------------------|--------------------|---------------|
| Jaques d'Carre   | Barky              | Cat           |
| Ivana Vin        |                    |               |
| Jaques d'Carre   | Speedy             | Tortoise      |
| Owen Allott      | Sleepy             | Mouse         |
| Owen Allott      | Slither            | Snake         |
| Russell Leaves   | Speedy             | Mouse         |    
| May Bee          | Hive               | Bee           |

### Exercsie 9
We now need to add a column to the animals table to say when
they have passed away.

Add the column `date_of_death` that is a `DATETIME` field, which **IS allowed** to be `NULL`. It has NO default value.  

### Exercsie 10
Update the following animals with their `date_of_death`:

| Animal name   | Date of Death |
|---------------|---------------|
| Trunky        | 2019-05-21    |
| Meow          | 2019-02-29    |
| Squeaky       | 2019-04-22    |

# QUESTIONING THE DATABASE EXERCISES
