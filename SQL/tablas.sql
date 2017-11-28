CREATE TABLE p_conversation (id_conversation INT auto_increment NOT NULL UNIQUE,
                                                                         datec datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
                                                                                                                  typeof enum('grupo','normal') NOT NULL,
                                                                                                                                                PRIMARY key(id_conversation));


CREATE TABLE p_users (id_user INT auto_increment NOT NULL UNIQUE,
                                                          name varchar(15) NOT NULL,
                                                                           lname varchar(20) NOT NULL,
                                                                                             lname2 varchar(20),
                                                                                                    birthdate date NOT NULL,
                                                                                                                   gender enum('F','M'),
                                                                                                                          photo BOOLEAN DEFAULT 0,
                                                                                                                                                email varchar(60) NOT NULL,
                                                                                                                                                                  password varchar(20) NOT NULL,
                                                                                                                                                                                       rdate datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
                                                                                                                                                                                                                                username varchar(40) NOT NULL UNIQUE,
                                                                                                                                                                                                                                                              TYPE enum('admin','user'),
                                                                                                                                                                                                                                                                   privacy BOOLEAN DEFAULT 0,
                                                                                                                                                                                                                                                                                           SEARCH BOOLEAN DEFAULT 0,
                                                                                                                                                                                                                                                                                                                  PRIMARY key(id_user));


CREATE TABLE p_participants
  (id_user INT NOT NULL REFERENCES p_users(id_user) ON DELETE CASCADE,
                                                              id_conversation INT NOT NULL REFERENCES p_conversation(id_conversation) ON DELETE CASCADE,
                                                                                                                                                administrator BOOLEAN DEFAULT 0,
                                                                                                                                                                              accept BOOLEAN NOT NULL DEFAULT 0);

-- 00->No se ha borrado; 01->Borrar para mi; 10->Borrar para todos;

CREATE TABLE p_cu
  (id_message Int auto_increment NOT NULL UNIQUE,
                                          message varchar(250) NOT NULL,
                                                               sent BOOLEAN DEFAULT 0,
                                                                                    delivered BOOLEAN DEFAULT 0,
                                                                                                              readm BOOLEAN DEFAULT 0,
                                                                                                                                    deleted enum('00','01','10'),
                                                                                                                                            mdate datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
                                                                                                                                                                                     id_user INT NOT NULL REFERENCES p_users(id_user) ON DELETE CASCADE,
                                                                                                                                                                                                                                                id_conversation INT NOT NULL REFERENCES p_conversation(id_conversation) ON DELETE CASCADE,
                                                                                                                                                                                                                                                                                                                                  PRIMARY key(id_message));


CREATE TABLE p_sessions
  (id_session Int auto_increment NOT NULL UNIQUE,
                                          ipaddress varchar(20) NOT NULL,
                                                                id_user INT NOT NULL REFERENCES p_users(id_user) ON DELETE CASCADE,
                                                                                                                           sdate datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
                                                                                                                                                                    status BOOLEAN DEFAULT 0,
                                                                                                                                                                                           PRIMARY key(id_session));

