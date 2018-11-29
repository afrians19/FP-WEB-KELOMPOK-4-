DECLARE @ProjectIds nvarchar(max)

SELECT @ProjectIds = coalesce(@ProjectIds, '') + cast(isnull(ProductID, '') as nvarchar)
FROM (
	SELECT content
	FROM menus
)Pid

SELECT @ProjectIds