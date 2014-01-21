USE [dibi]
GO
/****** Object:  StoredProcedure [dbo].[PaginateTable]    Script Date: 01/17/2014 09:01:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[PaginateTable]
(
  -- deklarace vstupn�ch parametr� a nastaven� v�choz�ch hodnot
  @TableName VARCHAR(64),
  @PageSize INT = 30,
  @CurrentPageIndex INT = 0,
  @KeyField VARCHAR(32) = 'Id',
  @RowFilter VARCHAR(3128) = NULL
)
AS
  -- pomocn� prom�nn� pro celkov� po�et z�znam�
  DECLARE @ItemCount INT
  -- pomocn� prom�nn� pro po�et v�ech str�nek
  DECLARE @PageCount INT
  -- pomocn� prom�nn� pro SQL dotaz ur�uj�c� po�et v�ech z�znam�
  DECLARE @ItemCountSQL NVARCHAR(1024)
  -- pomocn� prom�nn� pro podm�nku v SQL dotazu p�i pou�it� podm�nky RowFilter
  DECLARE @WhereSQL VARCHAR(3128)
  -- pokud je zad�na vlastnost RowFilter, pak ji p�evezmeme do prom�nn� @WhereSQL
  IF (@RowFilter IS NOT NULL AND @RowFilter <> '')
    SET @WhereSQL = ' WHERE ' + @RowFilter
  ELSE
    SET @WhereSQL = ' '
  -- slo�it SQL dotaz pro v�po�et celkov�ho po�tu z�znam�, p�id�v�me jm�no tabulky a p��padn� omezuj�c� podm�nku @WhereSQL
  SET @ItemCountSQL = 'SELECT @ItemCount = COUNT(*) FROM ' + @TableName + @WhereSQL
  -- spustit p�ipraven� dotaz pomoc� sp_ExecuteSql, z�sk�me tak celkov� po�et z�znam� do prom�nn� @ItemCount
  EXEC sp_ExecuteSql @ItemCountSQL, N'@ItemCount INT OUT', @ItemCount OUT
  -- stanovit po�et str�nek pot�ebn�ch pro zobrazen� v�ech z�znam�
  SET @PageCount = CEILING(@ItemCount*1.0/@PageSize)
  -- p�ipravit prvn� sadu v�sledku s �daji VirtualItemCount, CurrentPageIndex (pokud nen� po�adov�na neexistuj�c� str�nka, jinak NULL), PageSize, PageCount
 /**** SELECT
    @ItemCount AS VirtualtemCount,
    CurrentPageIndex =
      CASE
        WHEN @CurrentPageIndex < @PageCount THEN @CurrentPageIndex
        ELSE NULL
      END,
    @PageSize AS PageSize, @PageCount AS PageCount
*/
  -- pomocn� prom�nn� pro odrolov�n� "za p�edchoz� z�znamy"
  DECLARE @ItemRollOut INT
  -- p�ed�vat v�sledek pouze, pokud je d�lka str�nky v�t�� ne� 0, jinak vra� NULL
  IF (@PageSize > 0)
    BEGIN
      -- p�ipravit po�et odrolov�van�ch z�znam� jako rozd�l v�ech a aktu�ln� str�nky vyn�soben� d�lkou str�nky
      SET @ItemRollOut = @ItemCount - @PageSize * @CurrentPageIndex
      -- pokud ji� nen� co odrolov�vat, vra� NULL
      IF (@ItemRollOut > 0)
        BEGIN
          -- nastavit omezen� po�tu vr�cen�ch ��dk� na po�et ��dk� na str�nce
          SET ROWCOUNT @PageSize
          -- pomocn� prom�nn� pro SQL dotaz vracej�c� odpov�daj�c� z�znamy str�nky
          DECLARE @ItemSQL VARCHAR(6144)
          -- sestavit vno�en� dotazy s pou�it�m n�zvu tabulky @TableName, sloupce pro t��d�n� @KeyField a p��padn� omezuj�c� podm�nky ulo�en� ve @WhereSQL
          SET @ItemSQL = 'SELECT * FROM (SELECT TOP ' + CAST(@ItemRollOut AS VARCHAR(10)) + ' * FROM ' + @TableName + @WhereSQL + 'ORDER BY ' + @KeyField + ' DESC) AS TMP1 ORDER BY ' + @KeyField + ' ASC'
          -- spustit dotaz, ��dky tabulky pro danou str�nku tak budou vr�ceny jako druh� sada
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

