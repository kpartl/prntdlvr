/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2005                    */
/* Created on:     21.1.2014 13:28:00                           */
/*==============================================================*/


IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_BI') AND O.NAME = 'FK_TPP_BI_BI_STATUS_TPP_STAT')
ALTER TABLE TPP_BI
   DROP CONSTRAINT FK_TPP_BI_BI_STATUS_TPP_STAT
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_DOCUMENT') AND O.NAME = 'FK_TPP_DOCU_DOCUMENT__TPP_DIST')
ALTER TABLE TPP_DOCUMENT
   DROP CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_DIST
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_DOCUMENT') AND O.NAME = 'FK_TPP_DOCU_DOCUMENT__TPP_OPER')
ALTER TABLE TPP_DOCUMENT
   DROP CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_OPER
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_DOCUMENT') AND O.NAME = 'FK_TPP_DOCU_DOCUMENT__TPP_STAT')
ALTER TABLE TPP_DOCUMENT
   DROP CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_STAT
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_STAT') AND O.NAME = 'FK_TPP_STAT_SPOOL_STA_TPP_STAT')
ALTER TABLE TPP_STAT
   DROP CONSTRAINT FK_TPP_STAT_SPOOL_STA_TPP_STAT
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_STATUS') AND O.NAME = 'FK_TPP_STAT_COMPANY_S_TPP_COMP')
ALTER TABLE TPP_STATUS
   DROP CONSTRAINT FK_TPP_STAT_COMPANY_S_TPP_COMP
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_STATUS') AND O.NAME = 'FK_TPP_STAT_SPOOL_TYP_TPP_DOC_')
ALTER TABLE TPP_STATUS
   DROP CONSTRAINT FK_TPP_STAT_SPOOL_TYP_TPP_DOC_
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_STATUS') AND O.NAME = 'FK_TPP_STAT_STATUS_ST_TPP_STAT')
ALTER TABLE TPP_STATUS
   DROP CONSTRAINT FK_TPP_STAT_STATUS_ST_TPP_STAT
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_USER') AND O.NAME = 'FK_TPP_USER_USER_ROLE_TPP_ROLE')
ALTER TABLE TPP_USER
   DROP CONSTRAINT FK_TPP_USER_USER_ROLE_TPP_ROLE
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_USER_COMPANY') AND O.NAME = 'FK_TPP_USER_USER_COMP_TPP_COMP')
ALTER TABLE TPP_USER_COMPANY
   DROP CONSTRAINT FK_TPP_USER_USER_COMP_TPP_COMP
go

IF EXISTS (SELECT 1
   FROM SYS.SYSREFERENCES R JOIN SYS.SYSOBJECTS O ON (O.ID = R.CONSTID AND O.TYPE = 'F')
   WHERE R.FKEYID = OBJECT_ID('TPP_USER_COMPANY') AND O.NAME = 'FK_TPP_USER_USER_COMP_TPP_USER')
ALTER TABLE TPP_USER_COMPANY
   DROP CONSTRAINT FK_TPP_USER_USER_COMP_TPP_USER
go

IF EXISTS (SELECT 1
            FROM  SYSINDEXES
           WHERE  ID    = OBJECT_ID('TPP_BI')
            AND   NAME  = 'COMPANY_SPOOL'
            AND   INDID > 0
            AND   INDID < 255)
   DROP INDEX TPP_BI.COMPANY_SPOOL
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_BI')
            AND   TYPE = 'U')
   DROP TABLE TPP_BI
go

IF EXISTS (SELECT 1
            FROM  SYSINDEXES
           WHERE  ID    = OBJECT_ID('TPP_COMPANY')
            AND   NAME  = 'COMPANY_NAME_UNIQ'
            AND   INDID > 0
            AND   INDID < 255)
   DROP INDEX TPP_COMPANY.COMPANY_NAME_UNIQ
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_COMPANY')
            AND   TYPE = 'U')
   DROP TABLE TPP_COMPANY
go

IF EXISTS (SELECT 1
            FROM  SYSINDEXES
           WHERE  ID    = OBJECT_ID('TPP_DIST_CHANNEL')
            AND   NAME  = 'DIST_CHANNEL_UNIQU'
            AND   INDID > 0
            AND   INDID < 255)
   DROP INDEX TPP_DIST_CHANNEL.DIST_CHANNEL_UNIQU
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_DIST_CHANNEL')
            AND   TYPE = 'U')
   DROP TABLE TPP_DIST_CHANNEL
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_DOCUMENT')
            AND   TYPE = 'U')
   DROP TABLE TPP_DOCUMENT
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_DOC_TYPE')
            AND   TYPE = 'U')
   DROP TABLE TPP_DOC_TYPE
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_OPERATOR')
            AND   TYPE = 'U')
   DROP TABLE TPP_OPERATOR
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_ROLE')
            AND   TYPE = 'U')
   DROP TABLE TPP_ROLE
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_STAT')
            AND   TYPE = 'U')
   DROP TABLE TPP_STAT
go

IF EXISTS (SELECT 1
            FROM  SYSINDEXES
           WHERE  ID    = OBJECT_ID('TPP_STATUS')
            AND   NAME  = 'SPOOL_ID_COMPANY_ID'
            AND   INDID > 0
            AND   INDID < 255)
   DROP INDEX TPP_STATUS.SPOOL_ID_COMPANY_ID
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_STATUS')
            AND   TYPE = 'U')
   DROP TABLE TPP_STATUS
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_STATUS_TYPE')
            AND   TYPE = 'U')
   DROP TABLE TPP_STATUS_TYPE
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_USER')
            AND   TYPE = 'U')
   DROP TABLE TPP_USER
go

IF EXISTS (SELECT 1
            FROM  SYSOBJECTS
           WHERE  ID = OBJECT_ID('TPP_USER_COMPANY')
            AND   TYPE = 'U')
   DROP TABLE TPP_USER_COMPANY
go

/*==============================================================*/
/* Table: TPP_BI                                                */
/*==============================================================*/
CREATE TABLE TPP_BI (
   ID                   INT                  IDENTITY,
   ID_COMPANY           INT                  NOT NULL,
   ID_SPOOL             INT                  NOT NULL,
   BI_DATE              DATETIME             NULL,
   BI_POST_FEE          DECIMAL              NULL,
   BI_TOTAL_ENV         INT                  NULL,
   BI_TOTAL_SHEETS      INT                  NULL,
   BI_TOTAL_LOGO        INT                  NULL,
   BI_TOTAL_WHITE       INT                  NULL,
   BI_TOTAL_SLIP        INT                  NULL,
   BI_TOTAL_ADRES_ADD   INT                  NULL,
   BI_TOTAL_NONADRES_ADD INT                  NULL,
   BI_TOTAL_ELE_DOC     INT                  NULL,
   BI_TOTAL_BAN         INT                  NULL,
   BI_TOTAL_PAGES       INT                  NULL,
   CONSTRAINT PK_TPP_BI PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Index: COMPANY_SPOOL                                         */
/*==============================================================*/
CREATE UNIQUE INDEX COMPANY_SPOOL ON TPP_BI (
ID_COMPANY ASC,
ID_SPOOL DESC
)
go

/*==============================================================*/
/* Table: TPP_COMPANY                                           */
/*==============================================================*/
CREATE TABLE TPP_COMPANY (
   ID                   INT                  NOT NULL,
   COMPANY_NAME         VARCHAR(255)         NOT NULL,
   CONSTRAINT PK_TPP_COMPANY PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Index: COMPANY_NAME_UNIQ                                     */
/*==============================================================*/
CREATE UNIQUE INDEX COMPANY_NAME_UNIQ ON TPP_COMPANY (
COMPANY_NAME ASC
)
go

/*==============================================================*/
/* Table: TPP_DIST_CHANNEL                                      */
/*==============================================================*/
CREATE TABLE TPP_DIST_CHANNEL (
   ID                   INT                  NOT NULL,
   NAME                 VARCHAR(50)          NOT NULL,
   CONSTRAINT PK_TPP_DIST_CHANNEL PRIMARY KEY NONCLUSTERED (ID)
)
go

/*==============================================================*/
/* Index: DIST_CHANNEL_UNIQU                                    */
/*==============================================================*/
CREATE UNIQUE INDEX DIST_CHANNEL_UNIQU ON TPP_DIST_CHANNEL (
NAME ASC
)
go

/*==============================================================*/
/* Table: TPP_DOCUMENT                                          */
/*==============================================================*/
CREATE TABLE TPP_DOCUMENT (
   ID                   INT                  IDENTITY,
   ID_COMPANY           INT                  NOT NULL,
   ID_SPOOL             INT                  NOT NULL,
   DOC_ID_SPOOL_ENVELOP INT                  NULL,
   DOC_ID_CUSTOMMER     INT                  NULL,
   DOC_CUST_NAME        VARCHAR(50)          NULL,
   DOC_CUST_ADR         VARCHAR(255)         NULL,
   DOC_CUST_COUNTRY     VARCHAR(25)          NULL,
   DOC_CUST_DOC_ID      INT                  NULL,
   ID_DOC_TYPE          INT                  NULL,
   DOC_PAGES            INT                  NULL,
   ID_DATE_IN           DATETIME             NULL,
   DOC_PROC_DATE        DATETIME             NULL,
   DOC_PRINT_DATE       DATETIME             NULL,
   DOC_OUT_DATE         DATETIME             NULL,
   ID_OPERATOR          INT                  NULL,
   DOC_DIST_CHANNEL     INT                  NULL,
   DOC_CUSTEMAIL        VARCHAR(255)         NULL,
   DOC_ARCHI_LINK       VARCHAR(255)         NULL,
   DOC_REPRINT          TINYINT              NULL,
   DOC_NOTE             VARCHAR(255)         NULL,
   CONSTRAINT PK_TPP_DOCUMENT PRIMARY KEY (ID)
)
go

DECLARE @CURRENTUSER SYSNAME
SELECT @CURRENTUSER = USER_NAME()
EXECUTE SP_ADDEXTENDEDPROPERTY 'MS_Description', 
   'cislo obalky',
   'user', @CURRENTUSER, 'table', 'TPP_DOCUMENT', 'column', 'DOC_ID_SPOOL_ENVELOP'
go

/*==============================================================*/
/* Table: TPP_DOC_TYPE                                          */
/*==============================================================*/
CREATE TABLE TPP_DOC_TYPE (
   ID                   INT                  NOT NULL,
   NAME                 VARCHAR(50)          NULL,
   CONSTRAINT PK_TPP_DOC_TYPE PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Table: TPP_OPERATOR                                          */
/*==============================================================*/
CREATE TABLE TPP_OPERATOR (
   ID                   INT                  NOT NULL,
   NAME                 VARCHAR(50)          NULL,
   CONSTRAINT PK_TPP_OPERATOR PRIMARY KEY NONCLUSTERED (ID)
)
go

/*==============================================================*/
/* Table: TPP_ROLE                                              */
/*==============================================================*/
CREATE TABLE TPP_ROLE (
   ID                   INT                  IDENTITY,
   NAME                 VARCHAR(50)          NULL,
   CONSTRAINT PK_TPP_ROLE PRIMARY KEY NONCLUSTERED (ID)
)
go

/*==============================================================*/
/* Table: TPP_STAT                                              */
/*==============================================================*/
CREATE TABLE TPP_STAT (
   ID                   INT                  IDENTITY,
   ID_COMPANY           INT                  NOT NULL,
   ID_SPOOL             INT                  NOT NULL,
   STAT_STM             VARCHAR(255)         NULL,
   STAT_STF             VARCHAR(255)         NULL,
   STAT_PSC             VARCHAR(255)         NULL,
   STST_ELF             VARCHAR(255)         NULL,
   STAT_BNR             VARCHAR(255)         NULL,
   CONSTRAINT PK_TPP_STAT PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Table: TPP_STATUS                                            */
/*==============================================================*/
CREATE TABLE TPP_STATUS (
   ID                   INT                  IDENTITY,
   ID_COMPANY           INT                  NOT NULL,
   ID_SPOOL             INT                  NOT NULL,
   ID_DATE_IN           DATETIME             NULL,
   ID_DOC_TYPE          INT                  NULL,
   ID_STATUS_DOC        INT                  NULL,
   ID_TOTAL_AMOUNT_PAGES INT                  NULL,
   ID_TOTAL_AMOUNT_ENVELOP INT                  NULL,
   ID_TOTAL_AMOUNT_BANNER INT                  NULL,
   ID_TOTAL_AMOUNT_BW   INT                  NULL,
   ID_TOTAL_AMOUNT_COLOR INT                  NULL,
   ID_TOTAL_COVER_SHEET INT                  NULL,
   ID_TOTAL_SHEETS      INT                  NULL,
   ID_TOTAL_ADRES_ADD   INT                  NULL,
   ID_TOTAL_NONADRES_ADD INT                  NULL,
   ID_TOTAL_ELE_DOC     INT                  NULL,
   ID_TOTAL_SLIP        INT                  NULL,
   ID_TOTAL_POST_FEE    DECIMAL              NULL,
   ID_DATE_PROCESS      DATETIME             NULL,
   ID_DATE_PRINT        DATETIME             NULL,
   ID_DATE_OUT          DATETIME             NULL,
   CONSTRAINT PK_TPP_STATUS PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Index: SPOOL_ID_COMPANY_ID                                   */
/*==============================================================*/
CREATE UNIQUE INDEX SPOOL_ID_COMPANY_ID ON TPP_STATUS (
ID_COMPANY ASC,
ID_SPOOL ASC
)
go

/*==============================================================*/
/* Table: TPP_STATUS_TYPE                                       */
/*==============================================================*/
CREATE TABLE TPP_STATUS_TYPE (
   ID                   INT                  NOT NULL,
   NAME                 VARCHAR(50)          NULL,
   CONSTRAINT PK_TPP_STATUS_TYPE PRIMARY KEY (ID)
)
go

/*==============================================================*/
/* Table: TPP_USER                                              */
/*==============================================================*/
CREATE TABLE TPP_USER (
   ID                   INT                  IDENTITY,
   PASSWORD             VARCHAR(255)         NOT NULL,
   USERNAME             VARCHAR(50)          NOT NULL,
   ROLE                 INT                  NULL,
   CONSTRAINT PK_TPP_USER PRIMARY KEY NONCLUSTERED (ID)
)
go

/*==============================================================*/
/* Table: TPP_USER_COMPANY                                      */
/*==============================================================*/
CREATE TABLE TPP_USER_COMPANY (
   USER_ID              INT                  NOT NULL,
   COMPANY_ID           INT                  NOT NULL,
   CONSTRAINT PK_TPP_USER_COMPANY PRIMARY KEY NONCLUSTERED (USER_ID, COMPANY_ID)
)
go

ALTER TABLE TPP_BI
   ADD CONSTRAINT FK_TPP_BI_BI_STATUS_TPP_STAT FOREIGN KEY (ID_COMPANY, ID_SPOOL)
      REFERENCES TPP_STATUS (ID_COMPANY, ID_SPOOL)
go

ALTER TABLE TPP_DOCUMENT
   ADD CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_DIST FOREIGN KEY (DOC_DIST_CHANNEL)
      REFERENCES TPP_DIST_CHANNEL (ID)
go

ALTER TABLE TPP_DOCUMENT
   ADD CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_OPER FOREIGN KEY (ID_OPERATOR)
      REFERENCES TPP_OPERATOR (ID)
go

ALTER TABLE TPP_DOCUMENT
   ADD CONSTRAINT FK_TPP_DOCU_DOCUMENT__TPP_STAT FOREIGN KEY (ID_COMPANY, ID_SPOOL)
      REFERENCES TPP_STATUS (ID_COMPANY, ID_SPOOL)
go

ALTER TABLE TPP_STAT
   ADD CONSTRAINT FK_TPP_STAT_SPOOL_STA_TPP_STAT FOREIGN KEY (ID_COMPANY, ID_SPOOL)
      REFERENCES TPP_STATUS (ID_COMPANY, ID_SPOOL)
go

ALTER TABLE TPP_STATUS
   ADD CONSTRAINT FK_TPP_STAT_COMPANY_S_TPP_COMP FOREIGN KEY (ID_COMPANY)
      REFERENCES TPP_COMPANY (ID)
go

ALTER TABLE TPP_STATUS
   ADD CONSTRAINT FK_TPP_STAT_SPOOL_TYP_TPP_DOC_ FOREIGN KEY (ID_DOC_TYPE)
      REFERENCES TPP_DOC_TYPE (ID)
go

ALTER TABLE TPP_STATUS
   ADD CONSTRAINT FK_TPP_STAT_STATUS_ST_TPP_STAT FOREIGN KEY (ID_STATUS_DOC)
      REFERENCES TPP_STATUS_TYPE (ID)
go

ALTER TABLE TPP_USER
   ADD CONSTRAINT FK_TPP_USER_USER_ROLE_TPP_ROLE FOREIGN KEY (ROLE)
      REFERENCES TPP_ROLE (ID)
go

ALTER TABLE TPP_USER_COMPANY
   ADD CONSTRAINT FK_TPP_USER_USER_COMP_TPP_COMP FOREIGN KEY (COMPANY_ID)
      REFERENCES TPP_COMPANY (ID)
go

ALTER TABLE TPP_USER_COMPANY
   ADD CONSTRAINT FK_TPP_USER_USER_COMP_TPP_USER FOREIGN KEY (USER_ID)
      REFERENCES TPP_USER (ID)
go

