<?php
namespace Model\Entity;
use LeanMapper,
	DateTime;

/**
 * @property int $id (ID)
 * @property Company $company m:hasOne (ID_COMPANY:TPP_COMPANY) 
 * @property int $id_spool (ID_SPOOL)
 * @property int|null $spoolEnvelop (DOC_ID_SPOOL_ENVELOP)
 * @property Operator|null $operator m:hasOne (ID_OPERATOR:TPP_OPERATOR) 
 * @property DistChannel|null $distChannel m:hasOne (DOC_DIST_CHANNEL:TPP_DIST_CHANNEL) 
 * @property DocType|null $docType m:hasOne (ID_DOC_TYPE:TPP_DOC_TYPE) 
 * @property int|null $custommerNumber (DOC_ID_CUSTOMMER)
 * @property string|null $custommerName (DOC_CUST_NAME)
 * @property string|null $custommerAddr (DOC_CUST_ADR
 * @property string|null $custommerCountry (DOC_CUST_COUNTRY)
 * @property int|null $docNumber (DOC_CUST_DOC_ID)
 * @property int|null $docPages (DOC_PAGES)
 * @property DateTime|null $dateIn (ID_DATE_IN)
 * @property DateTime|null $dateProcess (DOC_PROC_DATE)
 * @property DateTime|null $datePrint (DOC_PRINT_DATE)
 * @property DateTime|null $dateOut (DOC_OUT_DATE)
 * @property string|null $custEmail (DOC_CUSTEMAIL)
 * @property string|null $archiveLink (DOC_ARCHI_LINK)
 * @property int|null $reprint (DOC_REPRINT)
 * @property string|null $docNote (DOC_NOTE)
 * 


 */
class Document extends AEntity
{
}
