drop table if exist QUESTION, TYPEQUESTION;

create table QUESTION(
    nom varchar(20) primary key,
    idType int,
    textQuestion text,
    choix varchar(255),
    reponse varchar(100),
    score float
);

create table TYPEQUESTION(
    idType int primary key,
    nomType varchar(100)
);

ALTER TABLE QUESTION ADD FOREIGN KEY (idType) REFERENCES TYPEQUESTION(idType);