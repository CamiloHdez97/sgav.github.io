CREATE TABLE countries(

    id_country INTEGER AUTOINCREMENT,
    name_country VARCHAR(50) NOT NULL,
    CONSTRAINT pk_id_country PRIMARY KEY (id_country);

);

CREATE TABLE regions(

    id_region INTEGER AUTOINCREMENT,
    name_region VARCHAR(50) NOT NULL,
    id_country INTEGER NOT NULL,
    CONSTRAINT pk_id_region PRIMARY KEY (id_region);
    CONSTRAINT fk_id_country FOREIGN KEY (id_country) REFERENCES countries(id_region);

);

CREATE TABLE cities(

    id_city INTEGER AUTOINCREMENT,
    name_city VARCHAR(50) NOT NULL,
    id_region INTEGER NOT NULL,
    CONSTRAINT pk_id_city PRIMARY KEY (id_city);
    CONSTRAINT fk_id_region FOREIGN KEY (id_region) REFERENCES regions(id_country);

);

CREATE TABLES persons (

    id_person VARCHAR (20) NOT NULL,
    first_name_person VARCHAR (50),
    lastname_person VARCHAR (50),
    birthdate_person DATE,
    id_city INTEGER,
    CONSTRAINT pk_person PRIMARY KEY (id_person);
    CONSTRAINT fk_id_city FOREIGN KEY id_city REFERENCES cities(id_city)

);