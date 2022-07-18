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

---DATE NOW---

create table daty(
    daty time default null
);

insert into daty (daty) values (null);
update daty set daty='10:00:00';

---insert into daty (daty) values ('2022-07-17 12:00:00');

--porte feuille client---
create table portefeuille(
    id int primary key auto_increment,
    idclient int,
    montant decimal(10,2) default 0.0,
    foreign key (idclient) references client(id)
);

create table detailportefeuille(
    id int primary key auto_increment,
    daty TIMESTAMP DEFAULT now(),
    idclient int,
    inserer decimal(10,2),
    etat varchar(150) default 'non valider',
    foreign key (idclient) references client(id)
);

--Place---
create table place(
    id int primary key auto_increment,
    lieu varchar(150),
    etat varchar(50) default 'Libre'
);


create table tarif(
    id int primary key auto_increment,
    tarif varchar(150),
    temp time,
    prix decimal(10,2)
);

---Amende---
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

----Parking----
create table parking(
    id int primary key auto_increment,
    idtarif int,
    idplace int,
    idclient int,
    arrive time,
    duree time,
    fin time ,
    voiture varchar(100),
    parti int default 0, 
    foreign key (idtarif) references tarif(id),
    foreign key (idplace) references place(id),
    foreign key (idclient) references client(id)
);

/*create table parkingamende(
    id int, 
    idparking int,
    duree decimal(10,2),
    prix decimal(10,2),
    foreign key (idparking) references parking(id)   
);*/

---Payement
create table paiement(
    id int primary key auto_increment,
    idclient int,
    daty time,
    voiture varchar(50),
    montant decimal(10,2),
    estpaye int,
    foreign key (idclient) references client(id)    
);

-------------------VIEW----------------------
create or replace view _portefeuille as
    select p.*,c.nom,c.prenom,c.mail,a.daty,a.id as iddetail,a.inserer,a.etat 
        from portefeuille p
            join client c on p.idclient=c.id
                join detailportefeuille a on p.idclient=a.idclient;

create or replace view _detailparking as
    select pl.*,pa.idclient,min(pa.arrive) as debutarrive,max(pa.fin) as dernierfin,SEC_TO_TIME(SUM(TIME_TO_SEC(pa.duree))) as sommeduree,pa.voiture,pa.parti
        from place pl
            join parking pa on pl.id=pa.idplace where pa.parti=0 group by pa.idclient,pa.idplace;

create or replace view _place as
    select p.*,d.idclient,d.debutarrive,d.dernierfin,d.sommeduree,d.voiture,d.parti, 
        from place p 
            left join _detailparking d on p.id=d.id; 


create or replace view _placeparking as
    select parking.*,tarif.tarif,tarif.temp,tarif.prix, place.lieu,place.etat
        from parking parking 
            join tarif tarif on parking.idtarif=tarif.id
            join place place on parking.idplace=place.id;

create or replace view _utilisation as
    select id,count(*) as effectif from _placeparking group by id;

create or replace view _dernierparking as
    select idplace,max(id) as id from parking group by idplace;



---Procedure----
--------------------
------------
/*DELIMITER |
create procedure pr_arriveDuree(arrive varchar(50),duree varchar(50))
begin 
    select STR_TO_DATE(STR_TO_DATE(arrive,'%h%i%s') + STR_TO_DATE(duree,'%h%i%s'),'%h%i%s') as somme;
End |
DELIMITER ;
  
select STR_TO_DATE(STR_TO_DATE('080000','%h%i%s') + STR_TO_DATE('001500','%h%i%s'),'%h%i%s') as somme;*/

SELECT TIMEDIFF('08:37:00', '08:15:00');
-------------------Donnee----------------
insert into admin (nom,prenom,mail,mdp) values ('Rakoto','Hery','rakotohery@gmail.com',sha1('123456'));

insert into client (nom,prenom,mail,mdp) values ('Minah','client','minahclient@gmail.com',sha1('1234'));

insert into daty (daty) values ('2022-07-17 11:26:43');

insert into tarif (tarif,temp,prix) values ('tsara','1:00:00','1000');

insert into portefeuille (idclient,montant) values (1,100);

insert into detailportefeuille (idclient,inserer) values (5,2000);

insert into place (lieu) values ('andoram');

insert into amende (prix_amende) values (10000);

insert into parking (idtarif,idplace,idclient,arrive,duree,voiture,parti) values (1,1,1,'2022-07-17 10:00:00','0:15:00','1234TAA',1);
insert into parking (idtarif,idplace,idclient,arrive,duree,voiture,parti) values (1,2,1,'2022-07-17 10:20:00','0:15:00','1234TAA',1);
insert into parking (idtarif,idplace,idclient,arrive,duree,voiture) values (1,1,1,'2022-07-17 11:26:43','1:00:00','1234TAA');
insert into parking (idtarif,idplace,idclient,arrive,duree,voiture) values (1,1,1,'2022-07-17 12:00:00','1:00:00','1234TAA');
insert into parking (idtarif,idplace,idclient,arrive,duree,voiture) values (1,2,2,'2022-07-17 11:26:00','1:00:00','1034TAA');
insert into parking (idtarif,idplace,idclient,arrive,duree,voiture) values (1,2,2,'2022-07-17 12:10:00','1:00:00','1054TAA');

select SEC_TO_TIME(SUM(TIME_TO_SEC(duree))) as sommeduree,min(arrive) as arrive from parking where parti=0 group by idclient,idplace ;

update daty set daty=null;
select IFNULL(daty,NOW()) from daty;





