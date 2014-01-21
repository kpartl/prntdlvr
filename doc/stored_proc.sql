USE [dibi]
GO
/****** Object:  StoredProcedure [dbo].[PaginateTable]    Script Date: 01/17/2014 09:01:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[PaginateTable]
(
  -- deklarace vstupních parametrù a nastavení výchozích hodnot
  @TableName VARCHAR(64),
  @PageSize INT = 30,
  @CurrentPageIndex INT = 0,
  @KeyField VARCHAR(32) = 'Id',
  @RowFilter VARCHAR(3128) = NULL
)
AS
  -- pomocná promìnná pro celkový poèet záznamù
  DECLARE @ItemCount INT
  -- pomocná promìnná pro poèet všech stránek
  DECLARE @PageCount INT
  -- pomocná promìnná pro SQL dotaz urèující poèet všech záznamù
  DECLARE @ItemCountSQL NVARCHAR(1024)
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
      SET @ItemRollOut = @ItemCount - @PageSize * @CurrentPageIndex
      -- pokud již není co odrolovávat, vra NULL
      IF (@ItemRollOut > 0)
        BEGIN
          -- nastavit omezení poètu vrácených øádkù na poèet øádkù na stránce
          SET ROWCOUNT @PageSize
          -- pomocná promìnná pro SQL dotaz vracející odpovídající záznamy stránky
          DECLARE @ItemSQL VARCHAR(6144)
          -- sestavit vnoøené dotazy s použitím názvu tabulky @TableName, sloupce pro tøídìní @KeyField a pøípadné omezující podmínky uložené ve @WhereSQL
          SET @ItemSQL = 'SELECT * FROM (SELECT TOP ' + CAST(@ItemRollOut AS VARCHAR(10)) + ' * FROM ' + @TableName + @WhereSQL + 'ORDER BY ' + @KeyField + ' DESC) AS TMP1 ORDER BY ' + @KeyField + ' ASC'
          -- spustit dotaz, øádky tabulky pro danou stránku tak budou vráceny jako druhá sada
          EXEC (@ItemSQL)
        END
      ELSE
        SELECT NULL
    END
    ELSE
      SELECT NULL


declare @i int
declare @p1 varchar(20)
declare @p2 varchar(20)

set @i = 1
while @i<100
begin
	set @p1 = 'Title ' + convert(varchar,@i);
	set @p2 = 'content '+ + convert(varchar,@i);
	insert into posts(title, [content]) values (@p1, @p2);
	set @i = @i + 1;
end

USE [dibi]
GO


DECLARE	@return_value int
EXEC	@return_value = [dbo].[PaginateTable]
		@TableName = N'posts',
		@PageSize = 10,
		@CurrentPageIndex = 5,
		@KeyField = N'id',
		@RowFilter = NULL

SELECT	'Return Value' = @return_value

GO

exec PaginateTable 'posts',10,5,'id';

go

