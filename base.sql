create database easypark;
use easypark;

--user
create table admin(
    id int primary key auto_increment,
    nom varchar(150),
    prenom varchar(150),
    mail varchar(100),
    mdp varchar(50)
);

create table client(
    id int primary key auto_increment,
    nom varchar(150),
    prenom varchar(150),
    mail varchar(100),
    mdp varchar(150)
);


create table portefeuille(
    id int primary key auto_increment,
    idclient int,
    montant decimal(10,2) default 0.0,
    foreign key (idclient) references client(id)
);

insert into portefeuille (idclient,montant) values (2,0);

create table detailportefeuille(
    id int primary key auto_increment,
    daty TIMESTAMP DEFAULT now(),
    idclient int,
    inserer decimal(10,2),
    etat varchar(150) default 'non valider',
    foreign key (idclient) references client(id)
);

--parking
create table place(
    id int primary key auto_increment,
    lieu varchar(150),
    reference varchar(150),
    etat varchar(50) default 'Libres'
);

create table tarif(
    id int primary key auto_increment,
    tarif varchar(150),
    temp decimal(10,2),
    prix decimal(10,2)
);

/*create table amende(
    id int primary key auto_increment,
    prix_amende decimal(10,2),
    minimum time,
    maximum time
);*/

create table amende(
    id int primary key auto_increment,
    prix_amende decimal(10,2)
);

create table parking(
    id int primary key auto_increment,
    idtarif int,
    idplace int,
    idclient int,
    debut datetime default now(),
    fin datetime,
    duree decimal(10,2),
    voiture varchar(100),
    rmq varchar(250), 
    foreign key (idtarif) references tarif(id),
    foreign key (idplace) references place(id),
    foreign key (idclient) references client(id)
);


create table parkingamende(
    id int, 
    idparking int,
    duree decimal(10,2),
    prix decimal(10,2),
    foreign key (idparking) references parking(id)   
);


create table paiement(
    id int primary key auto_increment;
    idparking int,
    montant decimal(10,2),
    estpaye 
);


ALTER TABLE place ADD CONSTRAINT uc_place UNIQUE (reference);
ALTER TABLE tarif ADD CONSTRAINT uc_tarif UNIQUE (tarif);
ALTER TABLE place MODIFY etat varchar(50) default "Libres"; 

UPDATE place SET etat="Occupe" where etat="1"; 
  

-------------------VIEW----------------------
create or replace view _portefeuille as
    select p.*,c.nom,c.prenom,c.mail,a.daty,a.id as iddetail,a.inserer,a.etat 
        from portefeuille p
            join client c on p.idclient=c.id
            join detailportefeuille a on p.idclient=a.idclient;

create or replace view _placeparking as
    select parking.*,tarif.tarif,tarif.temp,tarif.prix, place.lieu ,place.reference,place.etat,TIMESTAMPDIFF(MINUTE,parking.debut,now()) as diff
        from parking parking 
            join tarif tarif on parking.idtarif=tarif.id
            join place place on parking.idplace=place.id;

create or replace view _utilisation as
    select reference,count(*) as effectif from _placeparking group by idplace;

    select parking.*,client.nom,client.prenom 
        from parking parking
            join client client

            select p.*,NULLIF(t.tarif,'NULL'),t.temp,t.prix 
                from parking p
                 right join tarif t
                 on p.idtarif=t.id;
-------------------Donnee----------------
insert into admin (nom,prenom,mail,mdp) values ('Rakoto','Hery','rakotohery@gmail.com',sha1('123456'));

insert into client (nom,prenom,mail,mdp) values ('Minah','client','minahclient@gmail.com',sha1('1234'));

insert into portefeuille (idclient,montant) values (1,100);

insert into detailportefeuille (idclient,inserer) values (5,2000);

insert into amende (prix_amende) values (10000);




