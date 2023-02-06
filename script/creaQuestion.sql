drop table QUESTION, TYPEQUESTION;

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

INSERT INTO TYPEQUESTION VALUES
(1, 'text'),
(2, 'radio');

insert into QUESTION values 
("ultime", 1, "Quelle est la réponse à la question ultime de la vie?",null, "42", 4.2),
("cheval", 2, "Quelle est la couleur du cheval blanc d'Henry IV ?", "bleu, blanc, rouge", "blanc", 2.0);
