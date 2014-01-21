/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2005                    */
/* Created on:     15.1.2014 14:06:09                           */
/*==============================================================*/


if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_bi') and o.name = 'fk_tpp_bi_reference_tpp_stat')
alter table tpp_bi
   drop constraint fk_tpp_bi_reference_tpp_stat
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_document') and o.name = 'fk_tpp_docu_document__tpp_dist')
alter table tpp_document
   drop constraint fk_tpp_docu_document__tpp_dist
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_document') and o.name = 'fk_tpp_docu_document__tpp_oper')
alter table tpp_document
   drop constraint fk_tpp_docu_document__tpp_oper
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_document') and o.name = 'fk_tpp_docu_document__tpp_stat')
alter table tpp_document
   drop constraint fk_tpp_docu_document__tpp_stat
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_stat') and o.name = 'fk_tpp_stat_spool_sta_tpp_stat')
alter table tpp_stat
   drop constraint fk_tpp_stat_spool_sta_tpp_stat
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_status') and o.name = 'fk_tpp_stat_company_s_tpp_comp')
alter table tpp_status
   drop constraint fk_tpp_stat_company_s_tpp_comp
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_status') and o.name = 'fk_tpp_stat_spool_typ_tpp_doc_')
alter table tpp_status
   drop constraint fk_tpp_stat_spool_typ_tpp_doc_
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_status') and o.name = 'fk_tpp_stat_status_st_tpp_stat')
alter table tpp_status
   drop constraint fk_tpp_stat_status_st_tpp_stat
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_user') and o.name = 'fk_tpp_user_user_role_tpp_role')
alter table tpp_user
   drop constraint fk_tpp_user_user_role_tpp_role
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_user_company') and o.name = 'fk_tpp_user_user_comp_tpp_comp')
alter table tpp_user_company
   drop constraint fk_tpp_user_user_comp_tpp_comp
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('tpp_user_company') and o.name = 'fk_tpp_user_user_comp_tpp_user')
alter table tpp_user_company
   drop constraint fk_tpp_user_user_comp_tpp_user
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_bi')
            and   type = 'U')
   drop table tpp_bi
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_company')
            and   type = 'U')
   drop table tpp_company
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_dist_channel')
            and   type = 'U')
   drop table tpp_dist_channel
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_document')
            and   type = 'U')
   drop table tpp_document
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_doc_type')
            and   type = 'U')
   drop table tpp_doc_type
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_operator')
            and   type = 'U')
   drop table tpp_operator
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_role')
            and   type = 'U')
   drop table tpp_role
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_stat')
            and   type = 'U')
   drop table tpp_stat
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_status')
            and   type = 'U')
   drop table tpp_status
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_status_type')
            and   type = 'U')
   drop table tpp_status_type
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_user')
            and   type = 'U')
   drop table tpp_user
go

if exists (select 1
            from  sysobjects
           where  id = object_id('tpp_user_company')
            and   type = 'U')
   drop table tpp_user_company
go

/*==============================================================*/
/* Table: tpp_bi                                                */
/*==============================================================*/
create table tpp_bi (
   id_company           int                  not null,
   id_spool             int                  not null,
   bi_date              datetime             null,
   bi_post_fee          decimal              null,
   bi_total_env         int                  null,
   bi_total_pages       int                  null,
   bi_total_logo        int                  null,
   bi_total_white       int                  null,
   bi_total_slip        int                  null,
   bi_total_adres_add   int                  null,
   bi_total_nonadres_add int                  null,
   bi_total_ele_doc     int                  null,
   bi_total_ban         int                  null,
   bi_total_pages
   bi_total_pages int                  null,
   constraint pk_tpp_bi primary key nonclustered (id_company, id_spool)
)
go

/*==============================================================*/
/* Table: tpp_company                                           */
/*==============================================================*/
create table tpp_company (
   id                   int                  identity,
   company_name         varchar(255)         null,
   constraint pk_tpp_company primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_dist_channel                                      */
/*==============================================================*/
create table tpp_dist_channel (
   id                   int                  not null,
   name                 varchar(50)          not null,
   constraint pk_tpp_dist_channel primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_document                                          */
/*==============================================================*/
create table tpp_document (
   id_company           int                  not null,
   id_spool             int                  not null,
   doc_id_spool_envelop int                  null,
   doc_id_custommer     int                  null,
   doc_cust_name        varchar(50)          null,
   doc_cust_adr         varchar(255)         null,
   doc_cust_country     varchar(25)          null,
   doc_cust_doc_id      int                  null,
   id_doc_type          int                  null,
   doc_pages            int                  null,
   id_date_in           datetime             null,
   doc_proc_date        datetime             null,
   doc_print_date       datetime             null,
   doc_out_date         datetime             null,
   id_operator          int                  null,
   doc_dist_channel     int                  null,
   doc_custemail        varchar(255)         null,
   doc_archi_link       varchar(0)           null,
   doc_reprint          tinyint              null,
   doc_note             varchar(0)           null,
   constraint pk_tpp_document primary key nonclustered (id_company, id_spool)
)
go

declare @currentuser sysname
select @currentuser = user_name()
execute sp_addextendedproperty 'MS_Description', 
   'cislo obalky',
   'user', @currentuser, 'table', 'tpp_document', 'column', 'doc_id_spool_envelop'
go

/*==============================================================*/
/* Table: tpp_doc_type                                          */
/*==============================================================*/
create table tpp_doc_type (
   id                   int                  not null,
   name                 varchar(50)          null,
   constraint pk_tpp_doc_type primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_operator                                          */
/*==============================================================*/
create table tpp_operator (
   id                   int                  not null,
   name                 varchar(50)          null,
   constraint pk_tpp_operator primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_role                                              */
/*==============================================================*/
create table tpp_role (
   id                   int                  identity,
   name                 varchar(50)          null,
   constraint pk_tpp_role primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_stat                                              */
/*==============================================================*/
create table tpp_stat (
   id_company           int                  not null,
   id_spool             int                  not null,
   stat_stm             varchar(255)         null,
   stat_stf             varchar(255)         null,
   stat_psc             varchar(255)         null,
   stst_elf             varchar(255)         null,
   stat_bnr             varchar(255)         null,
   constraint pk_tpp_stat primary key nonclustered (id_company, id_spool)
)
go

/*==============================================================*/
/* Table: tpp_status                                            */
/*==============================================================*/
create table tpp_status (
   id_company           int                  not null,
   id_spool             int                  not null,
   id_date_in           datetime             null,
   id_doc_type          int                  null,
   id_status_doc        int                  null,
   id_total_amount_pages int                  null,
   id_total_amount_envelop int                  null,
   id_total_amout_banner int                  null,
   id_total_amount_bw   int                  null,
   id_total_amount_color int                  null,
   id_total_cover_sheet int                  null,
   id_total_sheets      int                  null,
   id_total_adres_add   int                  null,
   id_total_nonadres_add int                  null,
   id_total_ele_doc     int                  null,
   id_total_slip        int                  null,
   id_total_post_fee    decimal              null,
   id_date_process      datetime             null,
   id_date_print        datetime             null,
   id_date_out          datetime             null,
   constraint pk_tpp_status primary key nonclustered (id_company, id_spool)
)
go

/*==============================================================*/
/* Table: tpp_status_type                                       */
/*==============================================================*/
create table tpp_status_type (
   id                   int                  not null,
   name                 varchar(50)          null,
   constraint pk_tpp_status_type primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_user                                              */
/*==============================================================*/
create table tpp_user (
   id                   int                  identity,
   password             varchar(0)           not null,
   username             varchar(50)          not null,
   role                 int                  null,
   constraint pk_tpp_user primary key nonclustered (id)
)
go

/*==============================================================*/
/* Table: tpp_user_company                                      */
/*==============================================================*/
create table tpp_user_company (
   user_id              int                  not null,
   company_id           int                  not null,
   constraint pk_tpp_user_company primary key nonclustered (user_id, company_id)
)
go

alter table tpp_bi
   add constraint fk_tpp_bi_reference_tpp_stat foreign key (id_company, id_spool)
      references tpp_status (id_company, id_spool)
go

alter table tpp_document
   add constraint fk_tpp_docu_document__tpp_dist foreign key (doc_dist_channel)
      references tpp_dist_channel (id)
go

alter table tpp_document
   add constraint fk_tpp_docu_document__tpp_oper foreign key (id_operator)
      references tpp_operator (id)
go

alter table tpp_document
   add constraint fk_tpp_docu_document__tpp_stat foreign key (id_company, id_spool)
      references tpp_status (id_company, id_spool)
go

alter table tpp_stat
   add constraint fk_tpp_stat_spool_sta_tpp_stat foreign key (id_company, id_spool)
      references tpp_status (id_company, id_spool)
go

alter table tpp_status
   add constraint fk_tpp_stat_company_s_tpp_comp foreign key (id_company)
      references tpp_company (id)
go

alter table tpp_status
   add constraint fk_tpp_stat_spool_typ_tpp_doc_ foreign key (id_doc_type)
      references tpp_doc_type (id)
go

alter table tpp_status
   add constraint fk_tpp_stat_status_st_tpp_stat foreign key (id_status_doc)
      references tpp_status_type (id)
go

alter table tpp_user
   add constraint fk_tpp_user_user_role_tpp_role foreign key (role)
      references tpp_role (id)
go

alter table tpp_user_company
   add constraint fk_tpp_user_user_comp_tpp_comp foreign key (company_id)
      references tpp_company (id)
go

alter table tpp_user_company
   add constraint fk_tpp_user_user_comp_tpp_user foreign key (user_id)
      references tpp_user (id)
go

