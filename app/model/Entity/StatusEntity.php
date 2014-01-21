<?php
namespace Model\Entity;
use LeanMapper,
	DateTime;

/**
 * @property int $id (ID)
 * @property Company $company m:hasOne (ID_COMPANY:TPP_COMPANY) 
 * @property int $id_spool (ID_SPOOL)
 * @property DateTime|null $dateIn (ID_DATE_IN)
 * @property DocType|null $docType m:hasOne (ID_DOC_TYPE:TPP_DOC_TYPE) 
 * @property StatusType|null $statusType m:hasOne (ID_STATUS_DOC:TPP_STATUS_TYPE) 
 * @property int|null $totalAmountPages (ID_TOTAL_AMOUNT_PAGES)
 * @property int|null $totalAmountEnvelop (ID_TOTAL_AMOUNT_ENVELOP)
 * @property int|null $totalAmountBanner (ID_TOTAL_AMOUNT_BANNER)
 * @property int|null $totalAmountBW (ID_TOTAL_AMOUNT_BW)
 * @property int|null $totalAmountColor (ID_TOTAL_AMOUNT_COLOR)
 * @property int|null $totalCoverSheet (ID_TOTAL_COVER_SHEET)
 * @property int|null $totalSheets (ID_TOTAL_SHEETS)
 * @property int|null $totalAddressAd (ID_TOTAL_ADRES_ADD)
 * @property int|null $totalNonAddressAd (ID_TOTAL_NONADRES_ADD)
 * @property int|null $totalEleDoc (ID_TOTAL_ELE_DOC)
 * @property int|null $totalSlip (ID_TOTAL_SLIP)
 * @property float|null $totalPostFee (ID_TOTAL_POST_FEE)
 * @property DateTime|null $dateProcess (ID_DATE_PROCESS)
 * @property DateTime|null $datePrint (ID_DATE_PRINT)
 * @property DateTime|null $dateOut (ID_DATE_OUT)
 * 


 */
class Status extends AEntity
{
}
