CREATE TABLE emprunts ( 
empnum  char(255), 
empdate  date , 
   empdateret  date, 
   empcodelivre char(255) , 
   empnumlect  char(255), 
   PRIMARY KEY  (empnum) 
) ; 



insert into lecteurs values ('216', 'Lamy', 'Elena', '7 rue du Paradis', 'Paris', '75012', 'Elena'); 
insert into lecteurs values ('221', 'Theos', 'Pablo', '3 passage Secret', 'Paris', '75004', 'Pablo'); 
insert into lecteurs values ('342', 'Camden', 'Nicolas', '24 av du Papillon', 'Paris', '75013', 'Nicolas'); 
insert into lecteurs values ('528', 'Line', 'Margo', '22 rue de la Liberté', 'Paris', '75005', 'Margo'); 




CREATE TABLE livres ( 
   livcode  char(255) , 
   livnomaut  char(255) , 
   livprenomaut char(255) , 
   livtitre  char(255) , 
   livcategorie  char(255) , 
   livISBN   char(255) , 
   livdejareserve  tinyint(1) NOT NULL default '0', 
   PRIMARY KEY  (livcode) 
); 




insert into livres values ('KaElRo58', 'Kazan', 'Elia', 'L’arrangement', 'Roman', '2234023858', 1); 
insert into livres values ('AsIsSc08', 'Asimov', 'Isaac', 'Fondation', 'Science-fiction', '2070415708', 1); 
insert into livres values ('DiPhSc43', 'Dick', 'Philip K.', 'Blade Runner', 'Science-fiction', '2290314943', 1); 
insert into livres values ('WaAlRo37', 'Walker', 'Alice', 'La couleur pourpre', 'Roman', '2290021237', 1); 
insert into livres values ('KuMiRo38', 'Kundera', 'Milan', 'La plaisanterie', 'Roman', '2070703738', 0); 
insert into livres values ('BaJaJu63', 'Barrie', 'James M.', 'Peter Pan', 'Junior', '2290333263', 0); 
insert into livres values ('VeJuRo22', 'Verne', 'Jules', 'L île mysterieuse', 'Roman', '0812966422', 0); 

