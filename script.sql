-- By Camilo Hernandez

CREATE TABLE countries(

    id_country INTEGER AUTO_INCREMENT,
    name_country VARCHAR(50) NOT NULL,
    CONSTRAINT pk_id_country PRIMARY KEY (id_country)

);

CREATE TABLE regions(

    id_region INTEGER AUTO_INCREMENT,
    name_region VARCHAR(50) NOT NULL,
    id_country INTEGER NOT NULL,
    CONSTRAINT pk_id_region PRIMARY KEY (id_region),
    CONSTRAINT fk_id_country FOREIGN KEY (id_country) REFERENCES countries(id_country)

);

CREATE TABLE cities(

    id_city INTEGER AUTO_INCREMENT,
    name_city VARCHAR(50) NOT NULL,
    id_region INTEGER NOT NULL,
    CONSTRAINT pk_id_city PRIMARY KEY (id_city),
    CONSTRAINT fk_id_region FOREIGN KEY (id_region) REFERENCES regions(id_region)

);

CREATE TABLE persons(

    id_person VARCHAR (20) NOT NULL,
    first_name_person VARCHAR(50) NOT NULL,
    lastname_person VARCHAR(50) NOT NULL,
    birthdate_person DATE,
    id_city INTEGER,
    CONSTRAINT pk_person PRIMARY KEY (id_person),
    CONSTRAINT fk_id_city FOREIGN KEY (id_city) REFERENCES cities(id_city)

);

CREATE TABLE housetype (

    id_housetype INTEGER AUTO_INCREMENT,
    name_housetype VARCHAR(50) NOT NULL,
    CONSTRAINT pk_typehohuse PRIMARY KEY (id_housetype)

); 

CREATE TABLE living_place(

    id_living INTEGER AUTO_INCREMENT,
    id_person VARCHAR(20) NOT NULL,
    id_city INTEGER NOT NULL,
    rooms_living INTEGER NOT NULL,
    bathrooms_living INTEGER NOT NULL,
    kitchen_living INTEGER NOT NULL,
    tvroom_living INTEGER NOT NULL,
    patio_living INTEGER NOT NULL,
    pool_living INTEGER NOT NULL,
    barbecue_living INTEGER NOT NULL,
    image_living VARCHAR(60),
    id_typehouse INTEGER,

    CONSTRAINT pk_id_living PRIMARY KEY (id_living),
    CONSTRAINT fk_id_person FOREIGN KEY (id_person) REFERENCES persons(id_person),
    CONSTRAINT fk_id_city FOREIGN KEY (id_city) REFERENCES cities(id_city),
    CONSTRAINT fk_id_typehouse FOREIGN KEY (id_typehouse) REFERENCES housetype(id_typehouse)

);