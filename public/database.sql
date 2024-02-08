USE tutorial
CREATE TABLE consumers (
    id int(255) auto_increment not null,
    name varchar(255) not null,
    last_name varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    created_at date not null,
    CONSTRAINT pk_consumers PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;
CREATE TABLE notes (
    id int(255) auto_increment not null,
    consumer_id int(255) not null,
    title varchar(255) not null,
    description MEDIUMTEXT,
    created_at date not null,

    CONSTRAINT PK_notes PRIMARY KEY(id),
    CONSTRAINT fk_notes_consumers FOREIGN KEY(consumer_id) REFERENCES consumers(id)
)ENGINE=InnoDB;