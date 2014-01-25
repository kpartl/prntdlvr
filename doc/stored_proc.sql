
/*USE [trans]
GO
*/
/****** Object:  StoredProcedure [dbo].[PaginateTable]    Script Date: 01/17/2014 09:01:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
--DROP PROCEDURE [dbo].[PaginateTable]
--GO
CREATE PROCEDURE [dbo].[PaginateTable]
(
  -- deklarace vstupních parametrù a nastavení výchozích hodnot
  @TableName VARCHAR(64),
  @PageSize INT = 30,
  @CurrentPageIndex INT = 0,
  @KeyField VARCHAR(32) = 'Id',
  @RowFilter VARCHAR(3128) = NULL,
  @AscOrDesc VARCHAR(4) = 'ASC'
)
AS
  -- pomocná promìnná pro celkový poèet záznamù
  -- pomocná promìnná pro celkový poèet záznamù
  DECLARE @ItemCount INT
  -- pomocná promìnná pro poèet všech stránek
  DECLARE @PageCount INT
  -- pomocná promìnná pro SQL dotaz urèující poèet všech záznamù
  DECLARE @ItemCountSQL NVARCHAR(1024)
  DECLARE @tmp NVARCHAR(1024)
  -- pomocná promìnná pro podmínku v SQL dotazu pøi použití podmínky RowFilter
  DECLARE @WhereSQL VARCHAR(3128)
  -- pokud je zadána vlastnost RowFilter, pak ji pøevezmeme do promìnné @WhereSQL
  IF (@RowFilter IS NOT NULL AND @RowFilter <> '')
    SET @WhereSQL = ' WHERE ' + @RowFilter
  ELSE
    SET @WhereSQL = ' '
  -- složit SQL dotaz pro výpoèet celkového poètu záznamù, pøidáváme jméno tabulky a pøípadnì omezující podmínku @WhereSQL
  SET @ItemCountSQL = 'SELECT @ItemCount = COUNT(*) FROM ' + @TableName + @WhereSQL
  -- spustit pøipravený dotaz pomocí sp_ExecuteSql, získáme tak celkový poèet záznamù do promìnné @ItemCount
  EXEC sp_ExecuteSql @ItemCountSQL, N'@ItemCount INT OUT', @ItemCount OUT
  -- stanovit poèet stránek potøebných pro zobrazení všech záznamù
  SET @PageCount = CEILING(@ItemCount*1.0/@PageSize)
  -- pøipravit první sadu výsledku s údaji VirtualItemCount, CurrentPageIndex (pokud není požadována neexistující stránka, jinak NULL), PageSize, PageCount
 /**** SELECT
    @ItemCount AS VirtualtemCount,
    CurrentPageIndex =
      CASE
        WHEN @CurrentPageIndex < @PageCount THEN @CurrentPageIndex
        ELSE NULL
      END,
    @PageSize AS PageSize, @PageCount AS PageCount
*/
  -- pomocná promìnná pro odrolování "za pøedchozí záznamy"
  DECLARE @ItemRollOut INT
  -- pøedávat výsledek pouze, pokud je délka stránky vìtší než 0, jinak vra NULL
  IF (@PageSize > 0)
    BEGIN
      -- pøipravit poèet odrolovávaných záznamù jako rozdíl všech a aktuální stránky vynásobené délkou stránky
      --SET @ItemRollOut = @ItemCount - @PageSize * @CurrentPageIndex
	  SET @ItemRollOut = @ItemCount - @CurrentPageIndex
      -- pokud již není co odrolovávat, vra NULL
      IF (@ItemRollOut > 0)
        BEGIN
          -- nastavit omezení poètu vrácených øádkù na poèet øádkù na stránce
          SET ROWCOUNT @PageSize
          -- pomocná promìnná pro SQL dotaz vracející odpovídající záznamy stránky
          DECLARE @ItemSQL VARCHAR(6144)
		  
		  -- pripravit promenne pro razeni
		  DECLARE @AscOrDescNegativ VARCHAR(4)
		  
		  IF(@AscOrDesc = 'ASC') SET  @AscOrDescNegativ = 'DESC' 
		  ELSE SET @AscOrDescNegativ = 'ASC'
		  
          -- sestavit vnoøené dotazy s použitím názvu tabulky @TableName, sloupce pro tøídìní @KeyField a pøípadné omezující podmínky uložené ve @WhereSQL
          SET @ItemSQL = 'SELECT * FROM (SELECT TOP ' + CAST(@ItemRollOut AS VARCHAR(10)) + ' * FROM ' + @TableName + @WhereSQL + 'ORDER BY ' + @KeyField + ' ' + @AscOrDescNegativ  + ') AS TMP1 ORDER BY ' + @KeyField + ' ' + @AscOrDesc
          -- spustit dotaz, øádky tabulky pro danou stránku tak budou vráceny jako druhá sada
          EXEC (@ItemSQL)
        END
      ELSE BEGIN SET @tmp = 'SELECT * FROM ' + @TableName + ' WHERE ID <0'
        EXEC (@tmp) END
    END
    ELSE
      BEGIN SET @tmp = 'SELECT * FROM ' + @TableName + ' WHERE ID<0'
        EXEC (@tmp) END


GO
