drop table if exists  QUESTION, QUIZZ, TYPEQUESTION, USER;

create table QUIZZ(
    idQ int(100) primary key not null AUTO_INCREMENT,
    titreQ varchar(100),
    descriptionQ varchar(255)
);

create table QUESTION(
    nom varchar(20) primary key,
    idType int,
    idQ int,
    textQuestion text,
    choix varchar(255),
    reponse varchar(100),
    score float
);

create table TYPEQUESTION(
    idType int primary key,
    nomType varchar(100)
);

create table USER(
    idU int(100) primary key not null AUTO_INCREMENT,
    pseudo varchar(100),
    mdp varchar(100)
);

ALTER TABLE QUESTION ADD FOREIGN KEY (idType) REFERENCES TYPEQUESTION(idType);
ALTER TABLE QUESTION ADD FOREIGN KEY (idQ) REFERENCES QUIZZ(idQ);

insert into QUIZZ values 
(null, 'Quizz1', 'lol'),
(null, 'Quizz2', 'oui');

INSERT INTO TYPEQUESTION VALUES
(1, 'text'),
(2, 'radio');

insert into QUESTION values 
("ultime", 1, 1, "Quelle est la réponse à la question ultime de la vie?", null, "42", 4.2),
("cheval", 2, 1, "Quelle est la couleur du cheval blanc d'Henry IV ?", "bleu, blanc, rouge", "blanc", 2.0);
