<?php

//header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');


include('con_db.php');

//$sql = "select * from contacts";
$sql = "SELECT *,DATE_FORMAT(birth,'%d/%m/%Y') AS births,2560-YEAR(birth) AS ages ,DATE_FORMAT(birth,'%d/%m/%Y') AS birthday,CONCAT(' HAPPY BIRTHDAY ขอให้  ',NAME,'   มีความสุขมาก และมีสุขภาพแข็งแรงน่ะครับ ') AS happy 
 FROM contacts
   WHERE      MONTH(STR_TO_DATE(birth,'%Y-%m-%d'))= MONTH(NOW()) AND
 
                 DAY(STR_TO_DATE(birth,'%Y-%m-%d'))= DAY(NOW())   AND id_group=4  ";



$resource = mssql_query($sql);

$count_row = mssql_num_rows($resource);

if($count_row > 0) {
 while($result =mssql_fetch_array($resource)){
  $name = $result['name'];
  $birthday =$result['birthday'];
  $age = $result['age'];
  $happy = $result['happy'];
  $message = "Happy birthday  ".' '.$name.' '.' %E0%B8%82%E0%B8%AD%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%A1%E0%B8%B5%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AA%E0%B8%B8%E0%B8%82%20%E0%B9%80%E0%B8%88%E0%B8%A3%E0%B8%B4%E0%B8%8D%E0%B9%83%E0%B8%99%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%87%E0%B8%B2%E0%B8%99%20%E0%B8%A1%E0%B8%B5%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%A3%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A2%E0%B9%81%E0%B8%82%E0%B9%87%E0%B8%87%E0%B9%81%E0%B8%A3%E0%B8%87%20%20%E0%B8%84%E0%B8%B4%E0%B8%94%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3%E0%B8%81%E0%B9%87%E0%B8%82%E0%B8%AD%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%AA%E0%B8%A1%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9B%E0%B8%A3%E0%B8%B2%E0%B8%A3%E0%B8%96%E0%B8%99%E0%B8%B2%E0%B8%99%E0%B9%88%E0%B8%B0%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B8%9A';

 echo '<iframe src="birthday_api.php?message='.$message.'  "></iframe>';

 }




}else{
 //$results = '{"results":null}';
}


?>