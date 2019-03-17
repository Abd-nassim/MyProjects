

insert into  deparetment  values('','informatique');
insert into  annee values('','L2','');
insert into  annee values('','L3','ISIL');
insert into  annee values('','L3','SI');
insert into  groupe values('','','1','1','1');
insert into  groupe values('','','2','1','1');
insert into  groupe values('','','3','1','1');
insert into  groupe values('','','','2','1');
insert into  groupe values('','','','3','1');
insert into etudiant values ('Q140091','Q140091','abderrahman','med nassim','3','');
insert into  etudiant values ('Q150091','Q150091','abderr','med nass','2','');
insert into  etudiant values ('Q160091','Q160091','ab','med sam','1','');
insert into  etudiant values ('Q254566','Q254566','ISIL','ISIL','4','');
insert into etudiant values ('Q254568','Q254568','etudiantSI','etudiantSI','5','');
	
 describe annee;
 describe deparetment;
 describe enseignant;
 describe etudiant;
 describe evaluation;
 describe groupe;
 describe module;
 describe note;
 describe reclam;	

 SELECT * FROM deparetment;
 SELECT * FROM annee;
 SELECT * FROM groupe;
SELECT matricule_etu,nom,prenom,id_group FROM etudiant;

select nom_modul from module
where id_ensaignet='rabmdani';

select * from groupe
where id_departement="module_departement" and id_annee="module_anne";

insert into note values ('$matricule_etu','$id_module',)  	

SELECT specialite FROM etudiant e,groupe g
where e.nom="badrou"
