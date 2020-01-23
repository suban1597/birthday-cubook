<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server Tutorial</title>
</head>
<body>
<?php
$objConnect = mssql_connect("localhost","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");
$strSQL = "INSERT INTO contacts ";
$strSQL .="(id,name,position,email,mobile,telephones,id_position,birth,id_group,level) ";
$strSQL .="VALUES ";
$strSQL .="('1','นายสันติ สบายดี','ผู้บังคับบัญชากลุ่มงาน','aaa@gmail.com','089-999-9999','02-244-2000',1000,'2563-01-22',50,11)";

$objQuery = mssql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mssql_close($objConnect);
?>
</body>
</html>