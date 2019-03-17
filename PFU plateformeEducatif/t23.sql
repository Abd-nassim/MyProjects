describe databases;

describe departement;
describe employes;
describe grade;

CREATE TABLE DEPARTEMENT (
    ID_DEPARTEMENT NUMERIC(3) PRIMARY KEY,
    NOM_DEPARTEMENT VARCHAR(30) NOT NULL,
    LOCALISATION NUMERIC(4),
    ID_MANAGER NUMERIC(3)
); 


CREATE TABLE EMPLOYES ( 
ID_EMPLOYE NUMERIC(3)  NOT NULL PRIMARY KEY , 
NOM VARCHAR(30) NOT NULL, 
PRENOM VARCHAR(30) NOT NULL,
EMAIL VARCHAR(30) , 
TEL VARCHAR(30), 
DATE_NAISS  DATE , 
JOB VARCHAR(10), 
SALAIRE NUMERIC(5) ,
COMMISSION numeric (2,2), 
ID_DEPARTEMENT NUMERIC(3)
) ; 

select * from departement;
select * from employes;
select * from grade;

select id_departement, localisation from departement;

select nom from employes;

select employes.ID_EMPLOYE, employes.PRENOM , 
employes.id_departement,departement.id_departement,departement.localisation 
from employes,departement 
where employes.id_departement=departement.id_departement;

select e.id_employes grade 

select e.PRENOM, e.SALAIRE, 
from employes e, grade j 
where e.salaire between j.salire_min and j.salaire_max;




select id_departement, avg(salaire) as a
from employes
group by id_departement
having a<10000
order by avg(salaire);


SELECT e.*, d.Nom_departement
FROM employes e
NATURAL JOIN departement ;


describe departement;

select 