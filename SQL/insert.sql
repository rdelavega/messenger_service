-- p_conversation
INSERT INTO p_conversation(typeof)
VALUES ('normal');

INSERT INTO p_conversation(typeof)
VALUES ('normal');

INSERT INTO p_conversation(typeof)
VALUES ('grupo');

INSERT INTO p_conversation(typeof)
VALUES ('normal');

INSERT INTO p_conversation(typeof)
VALUES ('grupo');

INSERT INTO p_conversation(typeof)
VALUES ('normal');

-- p_users
INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Ricardo','De la Vega','Barrón','1997-06-27','M',0,'rdelavega63@gmail.com','Vortex3','rDelaVegaAdmin','admin',1,1);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Ángel','Rodríguez','Mendoza','1997-08-02','M',0,'angelrodmen8@gmail.com','Robin8&Y','angelRodAdmin','admin',1,1);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Rosa Reyna','Gonzalez','Torres','1997-10-16','F',0,'r.r97.gt@gmail.com','r.osa.97','rgt97','user',1,0);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Michelle','Allegretti','Rodríguez','1997-12-11','F',0,'m.allegretti@outlook.es','Equisd','Mich','user',1,0);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Sandra','Leon','Laguna','1998-01-05','F',0,'sasy.jvl@gmail.com','Ricardo123','Sandy','user',0,0);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Diana','Gonzalez','Torres','1998-10-22','F',0,'dianita1234587@gmail.com','donitascon','Dianis','user',1,1);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Miguel','Rodriguez','Mendoza','1999-10-19','M',0,'miguelangelw99@gmail.com','Tr3smigue14','Miguel_14','user',0,0);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Ángel','Rodríguez','Mendoza','1997-08-02','M',0,'angelrodmen8@gmail.com','Robin8&Y','angelRod','user',1,1);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Ricardo','De la Vega','Barrón','1997-06-27','M',0,'rdelavega63@gmail.com','Vortex3','rDelaVega','user',1,1);

INSERT INTO p_users(name,lname,lname2,birthdate,gender,photo,email,password,username,type,privacy,search)
VALUES ('Jorge Luis','Vasquez','Osorio','1997-05-14','M',0,'luis.vasquez.lv259@gmail.com','Abcd1234','JorgeVsz','user',0,0);

-- p_participants
INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(3,1,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(4,1,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(5,2,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(6,2,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(3,3,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(4,3,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(8,3,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(9,3,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(8,4,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(9,4,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(3,5,0,0);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(4,5,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(8,5,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(9,5,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(10,5,0,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(7,6,1,1);

INSERT INTO p_participants(id_user,id_conversation,administrator,accept)
VALUES(8,6,1,1);

-- p_cu
INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Adivina que me dijo Carlos.',1,1,1,'00',4,1);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Hola...',1,1,1,'00',8,4);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Ya estudiaron?',1,1,1,'00',3,5);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Ya estudiaron?',1,1,1,'00',3,3);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Chismeee',1,1,0,'00',5,2);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('No',1,1,1,'00',10,5);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Kheee?',1,1,1,'00',4,5);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Angelitooooo',1,1,0,'00',9,4);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Oyeeeeee...',1,1,1,'00',8,6);

INSERT INTO p_cu(message,sent,delivered,readM,deleted,id_user,id_conversation)
VALUES('Tell me more, tell me more',1,1,0,'00',3,1);
