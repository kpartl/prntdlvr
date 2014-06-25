
USE [trans]
GO

/****** Object:  StoredProcedure [dbo].[PaginateTable]    Script Date: 01/17/2014 09:01:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
DROP PROCEDURE [dbo].[PaginateTable]
GO
CREATE PROCEDURE [dbo].[PaginateTable]
(
  -- deklarace vstupních parametrů a nastavení výchozích hodnot
  @TableName VARCHAR(64),
  @PageSize INT = 30,
  @CurrentPageIndex INT = 0,
  @KeyField VARCHAR(32) = 'Id',
  @RowFilter VARCHAR(3128) = NULL,
  @AscOrDesc VARCHAR(4) = 'ASC'
)
AS
  -- pomocná proměnná pro celkový počet záznamů
  -- pomocná proměnná pro celkový počet záznamů
  DECLARE @ItemCount INT
  -- pomocná proměnná pro počet všech stránek
  DECLARE @PageCount INT
  -- pomocná proměnná pro SQL dotaz určující počet všech záznamů
  DECLARE @ItemCountSQL NVARCHAR(1024)
  DECLARE @tmp NVARCHAR(1024)
  -- pomocná proměnná pro podmínku v SQL dotazu při použití podmínky RowFilter
  DECLARE @WhereSQL VARCHAR(3128)
  -- pokud je zadána vlastnost RowFilter, pak ji převezmeme do proměnné @WhereSQL
  IF (@RowFilter IS NOT NULL AND @RowFilter <> '')
    SET @WhereSQL = ' WHERE ' + @RowFilter
  ELSE
    SET @WhereSQL = ' '
  -- složit SQL dotaz pro výpočet celkového počtu záznamů, přidáváme jméno tabulky a případně omezující podmínku @WhereSQL
  SET @ItemCountSQL = 'SELECT @ItemCount = COUNT(*) FROM ' + @TableName + @WhereSQL
  -- spustit připravený dotaz pomocí sp_ExecuteSql, získáme tak celkový počet záznamů do proměnné @ItemCount
  EXEC sp_ExecuteSql @ItemCountSQL, N'@ItemCount INT OUT', @ItemCount OUT
  -- stanovit počet stránek potřebných pro zobrazení všech záznamů
  SET @PageCount = CEILING(@ItemCount*1.0/@PageSize)
  -- připravit první sadu výsledku s údaji VirtualItemCount, CurrentPageIndex (pokud není požadována neexistující stránka, jinak NULL), PageSize, PageCount
 /**** SELECT
    @ItemCount AS VirtualtemCount,
    CurrentPageIndex =
      CASE
        WHEN @CurrentPageIndex < @PageCount THEN @CurrentPageIndex
        ELSE NULL
      END,
    @PageSize AS PageSize, @PageCount AS PageCount
*/
  -- pomocná proměnná pro odrolování "za předchozí záznamy"
  DECLARE @ItemRollOut INT
  -- předávat výsledek pouze, pokud je délka stránky větší než 0, jinak vrať NULL
  IF (@PageSize > 0)
    BEGIN
      -- připravit počet odrolovávaných záznamů jako rozdíl všech a aktuální stránky vynásobené délkou stránky
      --SET @ItemRollOut = @ItemCount - @PageSize * @CurrentPageIndex
	  SET @ItemRollOut = @ItemCount - @CurrentPageIndex
      -- pokud již není co odrolovávat, vrať NULL
      IF (@ItemRollOut > 0)
        BEGIN
          -- nastavit omezení počtu vrácených řádků na počet řádků na stránce
          SET ROWCOUNT @PageSize
          -- pomocná proměnná pro SQL dotaz vracející odpovídající záznamy stránky
          DECLARE @ItemSQL VARCHAR(6144)
		  
		  -- pripravit promenne pro razeni
		  DECLARE @AscOrDescNegativ VARCHAR(4)
		  
		  IF(@AscOrDesc = 'ASC') SET  @AscOrDescNegativ = 'DESC' 
		  ELSE SET @AscOrDescNegativ = 'ASC'
		  
          -- sestavit vnořené dotazy s použitím názvu tabulky @TableName, sloupce pro třídění @KeyField a případné omezující podmínky uložené ve @WhereSQL
          SET @ItemSQL = 'SELECT * FROM (SELECT TOP ' + CAST(@ItemRollOut AS VARCHAR(10)) + ' * FROM ' + @TableName + @WhereSQL + 'ORDER BY ' + @KeyField + ' ' + @AscOrDescNegativ  + ') AS TMP1 ORDER BY ' + @KeyField + ' ' + @AscOrDesc
          -- spustit dotaz, řádky tabulky pro danou stránku tak budou vráceny jako druhá sada
          EXEC (@ItemSQL)
        END
      ELSE BEGIN SET @tmp = 'SELECT * FROM ' + @TableName + ' WHERE ID <0'
        EXEC (@tmp) END
    END
    ELSE
      BEGIN SET @tmp = 'SELECT * FROM ' + @TableName + ' WHERE ID<0'
        EXEC (@tmp) END


GO

drop FUNCTION [dbo].[BannerFunction]
go

CREATE FUNCTION [dbo].[BannerFunction] (
@Date_from datetime,
@Date_to datetime)
RETURNS TABLE AS
RETURN (select ID, ID_SPOOL, NAME as TYPE, ID_DATE_OUT, B_NAME, 
	SUM(B1_SUM) as B1_SUM,B_PRICE_A,(SUM(B1_SUM)*B_PRICE_A) as B_TOTAL_PRICE_A,
	SUM(B2_SUM) as B2_SUM,B_PRICE_B,(SUM(B2_SUM)*B_PRICE_B) as B_TOTAL_PRICE_B,  
	SUM(B3_SUM) as B3_SUM,B_PRICE_C,(SUM(B3_SUM)*B_PRICE_C) as B_TOTAL_PRICE_C

from (
	select s.id as ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME as B_NAME, b.PRICE_A as B_PRICE_A, b.PRICE_B as B_PRICE_B, b.PRICE_C as B_PRICE_C,
		sum(d.BANNER_ID_1_AMOUNT) as B1_SUM, 0 as B2_SUM, 0 as B3_SUM
		from TPP_STATUS as s, TPP_DOCUMENT as d, TPP_BANNER_TYPE as b, TPP_DOC_TYPE as dt
		WHERE (s.ID_DATE_OUT BETWEEN @Date_from  AND @Date_to) AND d.ID_SPOOL = s.ID_SPOOL AND d.ID_COMPANY=s.ID_COMPANY 
			AND d.BANNER_ID_1_TYPE=b.ID AND s.ID_DOC_TYPE = dt.id
		GROUP BY s.ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME, b.PRICE_A, b.PRICE_B, b.PRICE_C

	union

	select s.id as ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME as B_NAME,b.PRICE_A as B_PRICE_A, b.PRICE_B as B_PRICE_B, b.PRICE_C as B_PRICE_C,
		0 as B1_SUM, sum(d.BANNER_ID_2_AMOUNT) as B2_SUM, 0 as B3_SUM 
		from TPP_STATUS as s, TPP_DOCUMENT as d, TPP_BANNER_TYPE as b, TPP_DOC_TYPE as dt
		WHERE (s.ID_DATE_OUT BETWEEN @Date_from  AND @Date_to) AND d.ID_SPOOL = s.ID_SPOOL AND d.ID_COMPANY=s.ID_COMPANY 
			AND d.BANNER_ID_2_TYPE=b.ID AND s.ID_DOC_TYPE = dt.id
		GROUP BY s.ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME, b.PRICE_A, b.PRICE_B, b.PRICE_C

	union

	select s.id as ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME as B_NAME, b.PRICE_A as B_PRICE_A, b.PRICE_B as B_PRICE_B, b.PRICE_C as B_PRICE_C,
		0 as B1_SUM, 0 as B2_SUM, sum(d.BANNER_ID_3_AMOUNT) as B3_SUM 
		from TPP_STATUS as s, TPP_DOCUMENT as d, TPP_BANNER_TYPE as b, TPP_DOC_TYPE as dt
		WHERE (s.ID_DATE_OUT BETWEEN @Date_from  AND @Date_to) AND d.ID_SPOOL = s.ID_SPOOL AND d.ID_COMPANY=s.ID_COMPANY 
			AND d.BANNER_ID_3_TYPE=b.ID AND s.ID_DOC_TYPE = dt.id
		GROUP BY s.ID, s.ID_SPOOL, dt.NAME, s.ID_DATE_OUT, b.NAME, b.PRICE_A, b.PRICE_B, b.PRICE_C
) as vnorenySelect GROUP BY B_NAME,ID, ID_SPOOL, NAME, ID_DATE_OUT, B_PRICE_A, B_PRICE_B, B_PRICE_C
)
GO

DROP PROCEDURE [dbo].[GetBannerStats]
go

CREATE PROCEDURE [dbo].[GetBannerStats]
(@Date_from varchar(255),
 @Date_to varchar(255),
 @KeyField VARCHAR(32) = 'ID_SPOOL',  
 @AscOrDesc VARCHAR(4) = 'ASC'
)
AS
EXEC('select * from BannerFunction('''+@Date_from+''', '''+ @Date_to+ ''') ORDER BY '+@KeyField +' '+ @AscOrDesc)
GO

DROP PROCEDURE [dbo].[GetTotalBannerStats]
go

CREATE PROCEDURE [dbo].[GetTotalBannerStats]
(@Date_from varchar(255),
 @Date_to varchar(255),
 @KeyField VARCHAR(32) = 'B_NAME',  
 @AscOrDesc VARCHAR(4) = 'ASC'
)
AS
EXEC('
select B_NAME,B_TOTAL_PRICE_A,B_TOTAL_PRICE_B,B_TOTAL_PRICE_C,B_TOTAL_PRICE_A+B_TOTAL_PRICE_B+B_TOTAL_PRICE_C as B_TOTAL_PRICE
from ( 
select B_NAME, SUM(B_TOTAL_PRICE_A) as B_TOTAL_PRICE_A, SUM(B_TOTAL_PRICE_B) as B_TOTAL_PRICE_B, SUM(B_TOTAL_PRICE_C) as B_TOTAL_PRICE_C
from BannerFunction('''+@Date_from+''', '''+ @Date_to+ ''') 
GROUP BY B_NAME ) as innerSelect  ORDER BY '+@KeyField +' '+ @AscOrDesc)
GO