
CREATE OR DROP TABLE utilPatient(
	idPatient       SERIAL NOT NULL ,
	mdp             VARCHAR (32) NOT NULL ,
	nom             VARCHAR (58) NOT NULL ,
	prenom          VARCHAR (50) NOT NULL ,
	dateDeNaiss     DATE  NOT NULL ,
	adresse         VARCHAR (190)  ,
	codePostal      CHAR (5)   ,
	email           VARCHAR (346)  ,
	num             CHAR (10)   ,
	numCarteVitale  CHAR (13)   ,
	lieuNaiss       VARCHAR (190) NOT NULL ,
	genre           VARCHAR (12)  ,
	codePostalNaiss CHAR (5)   ,
	taille          FLOAT  NOT NULL ,
	dateTaille      DATE  NOT NULL ,
	poids           FLOAT  NOT NULL ,
	datePoids       DATE  NOT NULL ,
	CONSTRAINT prk_constraint_utilPatient PRIMARY KEY (idPatient)
);


CREATE TABLE utilDoc(
	idDoc           SERIAL NOT NULL ,
	nom             VARCHAR (58) NOT NULL ,
	rpps            CHAR (11)  NOT NULL ,
	prenom          VARCHAR (50) NOT NULL ,
	typeDeMedecine  VARCHAR (64) NOT NULL ,
	adresseCabinetP VARCHAR (190)  ,
	codePostal      CHAR (5)   ,
	mdp             VARCHAR (32) NOT NULL ,
	am              CHAR (9)  NOT NULL ,
	finess          VARCHAR (9)  ,
	num             CHAR (10)   ,
	fax             CHAR (10)   ,
	CONSTRAINT prk_constraint_utilDoc PRIMARY KEY (idDoc)
);


CREATE TABLE pointCourbeCroissance(
	taille     FLOAT  NOT NULL ,
	dateTaille DATE  NOT NULL ,
	CONSTRAINT prk_constraint_pointCourbeCroissance PRIMARY KEY (taille,dateTaille)
);


CREATE TABLE courbePoids(
	poids     FLOAT  NOT NULL ,
	datePoids DATE  NOT NULL ,
	CONSTRAINT prk_constraint_courbePoids PRIMARY KEY (poids,datePoids)
);


CREATE TABLE vaccin(
	idVaccin    INT  NOT NULL ,
	nbRappel    INT2  NOT NULL ,
	numRappel   INT2  NOT NULL ,
	ageDebut    FLOAT   ,
	ageEcheance FLOAT   ,
	obligatoire BOOL   ,
	nom         VARCHAR (32) NOT NULL ,
	CONSTRAINT prk_constraint_vaccin PRIMARY KEY (idVaccin)
);


CREATE TABLE examen(
	idExamen     SERIAL NOT NULL ,
	typeExamen   VARCHAR (64) NOT NULL ,
	zoneCorporel VARCHAR (64)  ,
	CONSTRAINT prk_constraint_examen PRIMARY KEY (idExamen)
);


CREATE TABLE maladie(
	idMaladie     SERIAL NOT NULL ,
	nom           VARCHAR (64) NOT NULL ,
	estIncurrable BOOL   ,
	CONSTRAINT prk_constraint_maladie PRIMARY KEY (idMaladie)
);


CREATE TABLE docMedical(
	idDocMedical SERIAL NOT NULL ,
	typeDoc      VARCHAR (64)  ,
	dateReaDoc   DATE   ,
	url          VARCHAR (256)  ,
	CONSTRAINT prk_constraint_docMedical PRIMARY KEY (idDocMedical)
);


CREATE TABLE Diagnostic(
	descriptif     VARCHAR (2000)   ,
	dateDiagnostic DATE   ,
	idDiag         FLOAT  NOT NULL ,
	CONSTRAINT prk_constraint_Diagnostic PRIMARY KEY (idDiag)
);


CREATE TABLE aFaire(
	dateVaccination DATE  NOT NULL ,
	fait            BOOL  NOT NULL ,
	idPatient       INT  NOT NULL ,
	idVaccin        INT  NOT NULL ,
	CONSTRAINT prk_constraint_aFaire PRIMARY KEY (idPatient,idVaccin)
);


CREATE TABLE soigner(
	idPatient INT  NOT NULL ,
	idDoc     INT  NOT NULL ,
	CONSTRAINT prk_constraint_soigner PRIMARY KEY (idPatient,idDoc)
);


CREATE TABLE faireExamen(
	dateExamen   DATE   ,
	idPatient    INT  NOT NULL ,
	idExamen     INT  NOT NULL ,
	idDocMedical INT  NOT NULL ,
	idDoc        INT  NOT NULL ,
	CONSTRAINT prk_constraint_faireExamen PRIMARY KEY (idPatient,idExamen,idDocMedical,idDoc)
);


CREATE TABLE faireDiagnostic(
	idPatient    INT  NOT NULL ,
	idDiag       FLOAT  NOT NULL ,
	idDoc        INT  NOT NULL ,
	idExamen     INT  NOT NULL ,
	idDocMedical INT  NOT NULL ,
	idMaladie    INT  NOT NULL ,
	CONSTRAINT prk_constraint_faireDiagnostic PRIMARY KEY (idPatient,idDiag,idDoc,idExamen,idDocMedical,idMaladie)
);


CREATE TABLE avoir(
	idMaladie INT  NOT NULL ,
	idPatient INT  NOT NULL ,
	CONSTRAINT prk_constraint_avoir PRIMARY KEY (idMaladie,idPatient)
);


CREATE TABLE concerne(
	idVaccin  INT  NOT NULL ,
	idMaladie INT  NOT NULL ,
	CONSTRAINT prk_constraint_concerne PRIMARY KEY (idVaccin,idMaladie)
);



ALTER TABLE utilPatient ADD CONSTRAINT FK_utilPatient_taille FOREIGN KEY (taille) REFERENCES pointCourbeCroissance(taille);
ALTER TABLE utilPatient ADD CONSTRAINT FK_utilPatient_dateTaille FOREIGN KEY (dateTaille) REFERENCES pointCourbeCroissance(dateTaille);
ALTER TABLE utilPatient ADD CONSTRAINT FK_utilPatient_poids FOREIGN KEY (poids) REFERENCES courbePoids(poids);
ALTER TABLE utilPatient ADD CONSTRAINT FK_utilPatient_datePoids FOREIGN KEY (datePoids) REFERENCES courbePoids(datePoids);
ALTER TABLE aFaire ADD CONSTRAINT FK_aFaire_idPatient FOREIGN KEY (idPatient) REFERENCES utilPatient(idPatient);
ALTER TABLE aFaire ADD CONSTRAINT FK_aFaire_idVaccin FOREIGN KEY (idVaccin) REFERENCES vaccin(idVaccin);
ALTER TABLE soigner ADD CONSTRAINT FK_soigner_idPatient FOREIGN KEY (idPatient) REFERENCES utilPatient(idPatient);
ALTER TABLE soigner ADD CONSTRAINT FK_soigner_idDoc FOREIGN KEY (idDoc) REFERENCES public.utilDoc(idDoc);
ALTER TABLE faireExamen ADD CONSTRAINT FK_faireExamen_idPatient FOREIGN KEY (idPatient) REFERENCES utilPatient(idPatient);
ALTER TABLE faireExamen ADD CONSTRAINT FK_faireExamen_idExamen FOREIGN KEY (idExamen) REFERENCES examen(idExamen);
ALTER TABLE faireExamen ADD CONSTRAINT FK_faireExamen_idDocMedical FOREIGN KEY (idDocMedical) REFERENCES docMedical(idDocMedical);
ALTER TABLE faireExamen ADD CONSTRAINT FK_faireExamen_idDoc FOREIGN KEY (idDoc) REFERENCES utilDoc(idDoc);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idPatient FOREIGN KEY (idPatient) REFERENCES utilPatient(idPatient);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idDiag FOREIGN KEY (idDiag) REFERENCES Diagnostic(idDiag);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idDoc FOREIGN KEY (idDoc) REFERENCES public.utilDoc(idDoc);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idExamen FOREIGN KEY (idExamen) REFERENCES examen(idExamen);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idDocMedical FOREIGN KEY (idDocMedical) REFERENCES docMedical(idDocMedical);
ALTER TABLE faireDiagnostic ADD CONSTRAINT FK_faireDiagnostic_idMaladie FOREIGN KEY (idMaladie) REFERENCES maladie(idMaladie);
ALTER TABLE avoir ADD CONSTRAINT FK_avoir_idMaladie FOREIGN KEY (idMaladie) REFERENCES public.maladie(idMaladie);
ALTER TABLE avoir ADD CONSTRAINT FK_avoir_idPatient FOREIGN KEY (idPatient) REFERENCES utilPatient(idPatient);
ALTER TABLE concerne ADD CONSTRAINT FK_concerne_idVaccin FOREIGN KEY (idVaccin) REFERENCES vaccin(idVaccin);
ALTER TABLE concerne ADD CONSTRAINT FK_concerne_idMaladie FOREIGN KEY (idMaladie) REFERENCES maladie(idMaladie);
