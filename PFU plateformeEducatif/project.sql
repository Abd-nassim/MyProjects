drop database project;

create database project;

use project;

create table etudiant (
	matricule_etu	varchar (20) not null primary key,
	password_etu	varchar (30) not null,
	nom				varchar (100) not null,
	prenom			varchar (100) not null,
	id_groupe		numeric (3,0) not null,
	moyenne_general numeric (4,2)
);

create table enseignant (
	matricule_ens	varchar (30) not null primary key,
	password_ens	varchar (30) not null,
	nom				varchar (100) not null,
	prenom			varchar (100) not null,
	email 			varchar (100) not null,
	id_departement	numeric (3,0) not null
);

create table module (
	id_module 		int (11)  not null auto_increment ,
	nom_module		varchar (100) not null,
	coefficient     numeric (2,0) not null,
	credit			numeric (3,0) not null,
	matricule_ens	varchar (30)  not null,
	id_departement	numeric (2,0) not null,
	id_annee    	numeric (2,0) not null,
	type 			numeric (2,0) not null,
	id_evaluation   numeric (2,0),
	primary key (id_module)
);

create table type(
	type 			int (11) not null auto_increment,
	definition		varchar (100) not null,
	primary key (type)
);

insert into type values ('','TD+TP+EX');
insert into type values ('','TD+EX');
insert into type values ('','TP+EX');
insert into type values ('','EX');
insert into type values ('','TD');	
insert into type values ('','TP');

create table evaluation (
	id_evaluation   int (11) not null auto_increment primary key, 
	type_evaluation varchar(100) 
);	

create table note (
	matricule_etu	varchar (30) not null ,
	id_module 		numeric (3,0) not null,
	td				numeric (4,2),
	tp				numeric (4,2),
	examen 			numeric (4,2),
	moyenne 		numeric (4,2) not null,
	primary key (matricule_etu,id_module)
);

create table departement (
	id_departement	int (11) not null auto_increment primary key,
	nom_dep			varchar (100) not null,
	pass_dep		varchar (100) not null
);

create table reclam (
	id_reclam 		int (11) not null auto_increment ,
	matricule_etu	varchar (30) not null ,
	id_module 		numeric (2,0) not null ,
	reclam_date 	date not null,
	reclam_text 	text not null,
	view 			char DEFAULT 'N',
	primary key (id_reclam)
);

create table groupe (
	id_groupe		int (11) not null auto_increment primary key,	
	num_groupe      numeric (2,0),  
	id_annee 		numeric (2,0) not null,  
	id_departement	numeric (2,0) not null
);

create table annee (
	id_annee 		int (11) not null auto_increment primary key,
	nom_annee		varchar (30) not null,
	specialite		varchar (100)
);


 describe annee;
 describe deparetment;
 describe enseignant;
 describe etudiant;
 describe evaluation;
 describe groupe;
 describe module;
 describe note;
 describe type;
 describe reclam;

insert into  deparetment  values('','informatique','info');
insert into  annee values('','L2','');
insert into  annee values('','L3','ISIL');
insert into  annee values('','L3','SI');


insert into  groupe values('','1','1','1');
insert into  groupe values('','2','1','1');
insert into  groupe values('','3','1','1');
insert into  groupe values('','','2','1');
insert into  groupe values('','','3','1');

insert into etudiant values ('Q140091','Q140091','abderrahman','nassim','3','');
insert into etudiant values ('Q150091','Q150091','BOHRI','MAHDI','2','');
insert into etudiant values ('Q160091','Q160091','IDIR','TALEM','1','');
insert into etudiant values ('Q254566','Q254566','boudraf','youcef','4','');
insert into etudiant values ('Q254568','Q254568','hadouche','badrou','5','');
insert into etudiant values ('Q140026','Q140026','SEBAA','Aymen Moh Nabil','3','');
insert into etudiant values ('Q14T008','Q14T008','TELDJOUNE','Said','3','');
insert into etudiant values ('Q140118','Q140118','HAMICHE','MAGSEN','3','');

SELECT * FROM deparetment;
SELECT * FROM annee;
SELECT * FROM groupe;
SELECT matricule_etu,nom,prenom,id_group FROM etudiant;
SELECT specialite FROM annee where nom_annee='L3';
SELECT nom_annee FROM annee ;

SELECT e.nom, a.nom_annee, a.specialite
from etudiant e
join groupe g
on e.id_groupe=g.id_groupe
join annee a
on g.id_annee=a.id_annee
;

insert into evaluation values ('','66%/33%');
insert into evaluation values ('','50%/50%');

insert into type values ('','TD+TP+EX');
insert into type values ('','TD+EX');
insert into type values ('','TP+EX');
insert into type values ('','EX');
insert into type values ('','TD');	
insert into type values ('','TP');	

insert into enseignant values ('E160016','E160016','ABBAS','Nacira','abbas.university10@gmail.com','1');
insert into enseignant values ('E160017','E160017','BAL','Kamel','KamelBall@gmail.com','1');
insert into enseignant values ('E160018','E160018','BENNOUAR','Djamel','dbennouar@gmail.com','1');
insert into enseignant values ('E160019','E160019','BOUCETTA','Mohamed','BOUCETTAMohamed.gmail.com','1');

insert into enseignant values ('E160020','E160020','BOUDJELABA','Hakim','boudj.ens@gmail.com','1');
insert into enseignant values ('E160021','E160021','BRAHIMI','Farida','BRAHIMIFarida@gmail.com','1');
insert into enseignant values ('E160022','E160022','RAMDANI','Mohamed','m.ramdani@univ-bouira.dz','1');
insert into enseignant values ('E160023','E160023','RADJI','Nabila','RADJI.dzNabila','1');	


insert into module values ('','AJEL','1','5','E160016','1','1','2','1');
insert into module values ('','BDD','2','5','E160017','1','1','1','1');
insert into module values ('','RES','3','5','E160018','1','1','1','1');
insert into module values ('','TG','2','5','E160019','1','1','2','1');

insert into module values ('','SE','3','5','E160020','1','1','1','1');	
insert into module values ('','GL','2','5','E160021','1','1','2','1');
insert into module values ('','WEB','3','5','E160022','1','1','3','1');
insert into module values ('','EN','1','5','E160023','1','1','2','1');

insert into module values ('','BDA','3','5','E160022','1','2','1','2');	

select matricule_ens, nom, prenom from enseignant;
select id_module, nom_module, coefficient from module;

select m.id_module, m.nom_module, a.nom_annee
from module m
join enseignant e
on m.matricule_ens=e.matricule_ens
join annee a
on m.id_annee=a.id_annee
where e.matricule_ens='E160022'
;

select g.id_groupe, g.num_groupe, a.specialite
from annee a
join groupe g
on g.id_annee=a.id_annee
join module m
on m.id_annee=g.id_annee
where m.id_module="9";
;

select e.matricule_etu, e.nom, e.prenom, g.num_groupe
from annee a
join groupe g
on g.id_annee=a.id_annee
join module m
on m.id_annee=g.id_annee
join etudiant e
on e.id_groupe=g.id_groupe
where m.id_module="7"
;

select id_evaluation 
from module 
where id_module='7';

insert into note values ('Q140026','7','14','17','9','12');

select * from annee;	

select e.nom,n.moyenne
from etudiant e
join note n 
on e.matricule_etu=n.matricule_etu
join module m
on m.id_module=n.id_module
where e.matricule_etu='Q140026' and m.id_module='7' 

update note
set td='16', tp='16', examen='14', moyenne='15'
where matricule_etu='Q140026' and id_module='7'
;

select e.nom, e.prenom, e.id_groupe  from etudiant e
where e.matricule_etu='Q140026' and e.password_etu='Q140026'

select m.id_module, m.nom_module 
from groupe g
join etudiant e
on g.id_groupe=e.id_groupe
join annee a
on a.id_annee=g.id_annee
join module m
on m.id_annee=a.id_annee
where e.matricule_etu='Q140026'
;

select m.nom_module, n.td, n.tp, n.examen, n.moyenne, m.type
from note n
join module m
on n.id_module=m.id_module
join etudiant e
on n.matricule_etu=e.matricule_etu
where e.matricule_etu='Q140026'
order by m.type 
;

select m.nom_module, n.td, n.tp, n.examen, n.moyenne, m.type, e.nom,e.prenom, m.coefficient, m.credit
from note n
join module m
on m.id_module=n.id_module
join enseignant e
on e.matricule_ens=m.matricule_ens
join etudiant s
on s.matricule_etu=n.matricule_etu
where m.id_module='7' and s.matricule_etu='Q140026'
;

insert into reclam values ('','Q140026','7','2016/05/19','Sa7a Djamal','N');

select * from reclam where matricule_etu='Q140026';

select * from reclam where id_module='3';

insert into reclam value('','Q140026','3','2016/05/19','stuend','s');

select avg(n.moyenne) from note n, etudiant e
where n.matricule_etu=e.matricule_etu and e.matricule_etu='Q140026'
;

select m.id_module, m.nom_module, a.nom_annee
from module m
join enseignant e
on m.matricule_ens=e.matricule_ens
join annee a
on m.id_annee=a.id_annee
where e.matricule_ens='E160022';

select r.matricule_etu, r.reclam_date, r.id_reclam, r.id_module, r.view from reclam r,module m, enseignant e
where r.id_module=m.id_module and m.matricule_ens=e.matricule_ens and e.matricule_ens='E160016' 
and (view='S' or view='s');

select * from enseignant 
where id_departement='1';

update enseignant 
set  matricule_ens='E160016', password_ens='E160014', nom='ABBAS', prenom='Nacira', email='abbas.university10@gmail.com' 
where id_departement='1' and matricule_ens='E160016'
;

insert into enseignant values ('$matt','$pass','$nom','$prenom','$email','$id_dep');

select e.nom, e.prenom, a.nom_annee,a.specialite, g.num_groupe, e.matricule_etu, e.password_etu
from etudiant e, annee a, groupe g
where g.id_groupe=e.id_groupe
and g.id_annee=a.id_annee
;	

select m.nom_module, m.coefficient, m.credit, a.nom_annee,a.specialite, m.matricule_ens, e.nom, e.prenom , t.definition, ev.type_evaluation 
from module m, enseignant e, evaluation ev, annee a, type t
where m.matricule_ens=e.matricule_ens 
and m.id_evaluation=ev.id_evaluation
and m.id_annee=a.id_annee
and m.type=t.type
;


select * from etudiant_2;