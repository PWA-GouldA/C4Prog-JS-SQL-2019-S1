# Exercises

1) Write the SQL commands to do the following:
    a)  Create a new 'owners' table in the animals database
        with the fields:
        
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
    
    b)  Create a new 'owner_animals' table with the following:
    ```text
    Field       Type        Size    Other
    id          INT         11      not null, auto increment
    owner_id    INT         11      not null, default 0
    animal_id   INT         11      not null, default 0
    ```
        and the primary key of `owner id` and `animal id`.
        
        
2)  Update the owner_animals table to include the two fields:
        ```text
            Field       Type    Size    Other
            created_at  DATETIME        default CURRENT TIMESTAMP
            updated_at  DATETIME        default CURRENT TIMESTAMP
                                        on update CURRENT TIMESTAMP
                                        ```               

) Insert the following data into the two tables:
        