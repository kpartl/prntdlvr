/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2005                    */
/* Created on:     19.12.2013 17:07:58                          */
/*==============================================================*/


if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('Davka') and o.name = 'FK_DAVKA_SPOLECNOS_SPOLECNO')
alter table Davka
   drop constraint FK_DAVKA_SPOLECNOS_SPOLECNO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('Dokument') and o.name = 'FK_DOKUMENT_DAVKA_DOK_DAVKA')
alter table Dokument
   drop constraint FK_DOKUMENT_DAVKA_DOK_DAVKA
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Davka')
            and   type = 'U')
   drop table Davka
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Dokument')
            and   type = 'U')
   drop table Dokument
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Spolecnost')
            and   type = 'U')
   drop table Spolecnost
go

/*==============================================================*/
/* Table: Davka                                                 */
/*==============================================================*/
create table Davka (
   ID                   bigint               not null,
   Spolecnost_ID        bigint               null,
   Cislo                bigint               null,
   Pocet_stran          int                  null,
   Pocet_dokumentu      int                  null,
   Prijato              datetime             null,
   Odeslano             datetime             null,
   Kryci_listy          bit                  null,
   Slozenky             bit                  null,
   Typ_davky            varchar(50)          null,
   Postovne             float                null,
   Obalek               float                null,
   constraint PK_DAVKA primary key (ID)
)
go

/*==============================================================*/
/* Table: Dokument                                              */
/*==============================================================*/
create table Dokument (
   ID                   bigint               not null,
   Davka_ID             bigint               null,
   Cislo                bigint               null,
   Variabilni_symbol    bigint               null,
   Stat                 varchar(50)          null,
   Adresa               varchar(255)         null,
   Bankovni_ucet        varchar(20)          null,
   Pocet_stran          int                  null,
   Pocet_listu          int                  null,
   Cesta_k_dokumentu    varchar(Max)         null,
   constraint PK_DOKUMENT primary key (ID)
)
go

/*==============================================================*/
/* Table: Spolecnost                                            */
/*==============================================================*/
create table Spolecnost (
   ID                   bigint               not null,
   Nazev                varchar(255)         null,
   constraint PK_SPOLECNOST primary key (ID)
)
go

alter table Davka
   add constraint FK_DAVKA_SPOLECNOS_SPOLECNO foreign key (Spolecnost_ID)
      references Spolecnost (ID)
go

alter table Dokument
   add constraint FK_DOKUMENT_DAVKA_DOK_DAVKA foreign key (Davka_ID)
      references Davka (ID)
go

