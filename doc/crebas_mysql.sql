/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     20.12.2013 9:55:41                           */
/*==============================================================*/


drop table if exists Davka;

drop table if exists Dokument;

drop table if exists Spolecnost;

/*==============================================================*/
/* Table: Davka                                                 */
/*==============================================================*/
create table Davka
(
   ID                   bigint not null,
   Spolecnost_ID        bigint,
   Cislo                bigint,
   Pocet_stran          int,
   Pocet_dokumentu      int,
   Prijato              datetime,
   Odeslano             datetime,
   Kryci_listy          bool,
   Slozenky             bool,
   Typ_davky            varchar(50),
   Postovne             float,
   Obalek               float,
   primary key (ID)
);

/*==============================================================*/
/* Table: Dokument                                              */
/*==============================================================*/
create table Dokument
(
   ID                   bigint not null,
   Davka_ID             bigint,
   Cislo                bigint,
   Variabilni_symbol    bigint,
   Stat                 varchar(50),
   Adresa               varchar(255),
   Bankovni_ucet        varchar(20),
   Pocet_stran          int,
   Pocet_listu          int,
   Cesta_k_dokumentu    longtext,
   primary key (ID)
);

/*==============================================================*/
/* Table: Spolecnost                                            */
/*==============================================================*/
create table Spolecnost
(
   ID                   bigint not null,
   Nazev                varchar(255),
   primary key (ID)
);

alter table Davka add constraint FK_Spolecnost_Davka foreign key (Spolecnost_ID)
      references Spolecnost (ID);

alter table Dokument add constraint FK_Davka_Dokument foreign key (Davka_ID)
      references Davka (ID);

