CREATE TABLE ZESPOLY
	(ID_ZESP int PRIMARY KEY,
	NAZWA varchar(20),
	ADRES varchar(20) );

CREATE TABLE ETATY
   ( NAZWA varchar(15) PRIMARY KEY,
	PLACA_OD float,
	PLACA_DO float);

CREATE TABLE PRACOWNICY
   (ID_PRAC int PRIMARY KEY,
	NAZWISKO varchar(15),
	IMIE varchar(20),
	ETAT varchar(20),
	ID_SZEFA int, 
	ZATRUDNIONY DATE,
	PLACA_POD float,
	PLACA_DOD float,
	ID_ZESP int );
  
INSERT INTO ZESPOLY VALUES (10,'ADMINISTRACJA',      'PIOTROWO 2');
INSERT INTO ZESPOLY VALUES (20,'SYSTEMY ROZPROSZONE','PIOTROWO 3A');
INSERT INTO ZESPOLY VALUES (30,'SYSTEMY EKSPERCKIE', 'STRZELECKA 14');
INSERT INTO ZESPOLY VALUES (40,'ALGORYTMY',          'WIENIAWSKIEGO 16');
INSERT INTO ZESPOLY VALUES (50,'BADANIA OPERACYJNE', 'MIELZYNSKIEGO 30');

INSERT INTO ETATY VALUES ('PROFESOR'  ,3000.00, 4000.00);
INSERT INTO ETATY VALUES ('ADIUNKT'   ,2510.00, 3000.00);
INSERT INTO ETATY VALUES ('ASYSTENT'  ,1500.00, 2100.00);
INSERT INTO ETATY VALUES ('DOKTORANT'  ,800.00, 1000.00);
INSERT INTO ETATY VALUES ('SEKRETARKA',1470.00, 1650.00);
INSERT INTO ETATY VALUES ('DYREKTOR' ,4280.00,5100.00);
 
INSERT INTO PRACOWNICY VALUES (100,'Marecki','Jan'    ,'DYREKTOR'  ,NULL,'1968-01-01',4730.00,980.50,10);
INSERT INTO PRACOWNICY VALUES (110,'Janicki','Karol'  ,'PROFESOR'  ,100 ,'1973-05-01',3350.00,610.00,40);
INSERT INTO PRACOWNICY VALUES (120,'Nowicki','Pawel'  ,'PROFESOR'  ,100 ,'1977-01-09',3070.00,  NULL,30);
INSERT INTO PRACOWNICY VALUES (130,'Nowak','Piotr' ,'PROFESOR'  ,100 ,'1968-07-01', 3960.00,  NULL,20);
INSERT INTO PRACOWNICY VALUES (140,'Kowalski','Krzysztof','PROFESOR'  ,130 ,'1975-09-15', 3230.00,805.00,20);
INSERT INTO PRACOWNICY VALUES (150,'Grzybowska','Maria','ADIUNKT'   ,130 ,'1977-09-01', 2845.50,  NULL,20);
INSERT INTO PRACOWNICY VALUES (160,'Krakowska','Joanna', 'SEKRETARKA'   ,130 ,'1985-03-01', 1590.00,  NULL,20);
INSERT INTO PRACOWNICY VALUES (170,'Opolski','Roman'  ,'ASYSTENT'  ,130 ,'1992-10-01', 1839.70, 480.50,20);
INSERT INTO PRACOWNICY VALUES (190,'Kotarski','Konrad', 'ASYSTENT'  ,140 ,'1993-09-01', 1971.00,  NULL,20);
INSERT INTO PRACOWNICY VALUES (180,'Makowski', 'Marek', 'ADIUNKT',100 ,'1985-02-20', 2610.20,  NULL,10);
INSERT INTO PRACOWNICY VALUES (200,'Przywarek','Leon' ,'DOKTORANT'  ,140 ,'1944-07-15', 900.00,  NULL,30);
INSERT INTO PRACOWNICY VALUES (210,'Kotlarczyk','Stefan','DOKTORANT'  ,130 ,'1993-10-15', 900.00,570.60,30);
INSERT INTO PRACOWNICY VALUES (220,'Siekierski', 'Mateusz','ASYSTENT'  ,110 ,'1993-10-01', 1889.00,  NULL,20);
INSERT INTO PRACOWNICY VALUES (230,'Dolny', 'Tomasz' ,'ASYSTENT'  ,120 ,'1992-09-01', 1850.00, 390.00,NULL);
 


