drop table clienti;
/
drop table carti;
/

create table clienti(
    id int PRIMARY KEY NOT NULL,
    email varchar(100) not null unique,
    data_nastere DATE,
    nume VARCHAR(30),
    prenume VARCHAR(30),
    sex number(1),
    carti_citite int,
    autor number(1),
    cititor number(1),
    evaluator number(1)
);
/

create table carti(
    id int primary key not null,
    carte_titlu varchar(30),
    carte_autor varchar(30),
    carte_descriere varchar2(255)
);



ALTER TABLE carti
DROP COLUMN carte_titlu;

ALTER TABLE carti
ADD carte_titlu varchar(51);

ALTER TABLE carti
DROP COLUMN carte_autor;

ALTER TABLE carti
ADD carte_autor varchar(51);

ALTER TABLE carti
DROP COLUMN carte_descriere;

ALTER TABLE carti
ADD carte_descriere varchar2(612);