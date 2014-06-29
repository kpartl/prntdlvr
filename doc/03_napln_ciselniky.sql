USE [trans]
GO

INSERT INTO TPP_DOC_TYPE VALUES (1, 'CRM');
INSERT INTO TPP_DOC_TYPE VALUES (2, 'FAKTURA');
INSERT INTO TPP_DOC_TYPE VALUES (3, 'DDPP');
INSERT INTO TPP_DOC_TYPE VALUES (4, 'UPOMÍNKA');

INSERT INTO TPP_STATUS_TYPE VALUES (1, 'Data došla');
INSERT INTO TPP_STATUS_TYPE VALUES (2, 'Zformátováno');
INSERT INTO TPP_STATUS_TYPE VALUES (3, 'Uloženo v DB');
INSERT INTO TPP_STATUS_TYPE VALUES (4, 'Vytištěno');
INSERT INTO TPP_STATUS_TYPE VALUES (5, 'Zaobálkováno');
INSERT INTO TPP_STATUS_TYPE VALUES (6, 'Ofrankováno');
INSERT INTO TPP_STATUS_TYPE VALUES (7, 'Zkompletováno');
INSERT INTO TPP_STATUS_TYPE VALUES (8, 'Předáno odesilateli');
INSERT INTO TPP_STATUS_TYPE VALUES (9, 'Nekompletní zpracování');

INSERT INTO TPP_DIST_CHANNEL VALUES (1, 'Tisk');
INSERT INTO TPP_DIST_CHANNEL VALUES (2, 'Elektronicky');
INSERT INTO TPP_DIST_CHANNEL VALUES (3, 'Vlastní roznos');
INSERT INTO TPP_DIST_CHANNEL VALUES (4, 'B2B');
INSERT INTO TPP_DIST_CHANNEL VALUES (5, 'B2C');
INSERT INTO TPP_DIST_CHANNEL VALUES (6, 'ELFA');

INSERT INTO TPP_ROLE VALUES (1,'Administrátor');
INSERT INTO TPP_ROLE VALUES (2,'Operátor');
INSERT INTO TPP_ROLE VALUES (3,'Uživatel');


INSERT INTO TPP_OPERATOR (ID,NAME) VALUES (1, 'CPOST');
INSERT INTO TPP_OPERATOR (ID,NAME) VALUES (2, 'Post mail');
INSERT INTO TPP_OPERATOR (ID,NAME) VALUES (3, 'Red mail');
INSERT INTO TPP_OPERATOR (ID,NAME) VALUES (4, 'Off mail');


INSERT INTO TPP_USER ([USERNAME], [PASSWORD], [ROLE]) VALUES ('admin',' $v3.dy73f6hI',1);
insert into tpp_user ([username],[password],[role]) values ('operator', 'op2EXru8MPdNY',2);
insert into tpp_user ([username],[password],[role]) values ('guest', 'guVeRgi5kAY4k',3);

INSERT INTO TPP_BANNER_TYPE ([ID],[NAME], [PRICE_A], [PRICE_B], [PRICE_C]) VALUES (1,'Buderus', 2.5, 5.5, 7.5);
INSERT INTO TPP_BANNER_TYPE ([ID],[NAME], [PRICE_A], [PRICE_B], [PRICE_C]) VALUES (2,'Siemens', 3.0, 4.55, 5.65);
INSERT INTO TPP_BANNER_TYPE ([ID],[NAME], [PRICE_A], [PRICE_B], [PRICE_C]) VALUES (3,'Jablotron', 2.99, 3.4, 4.5);