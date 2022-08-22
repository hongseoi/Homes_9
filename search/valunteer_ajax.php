<?php
  
  $cate1 = $_GET['cate1'];
  $cate2 = $_GET['cate2'];
  
$conn = mysqli_connect(
    'localhost', // 주소
    'root',
    '000000',
    'aptinfo'); // 데이터베이스 이름
  
    mysqli_set_charset($conn,"utf8");

// 구 카테고리에 따른 조건을 줌
if($cate2 != "all"){
    $condition = "where aptname='{$cate2}'";
}

if($cate1 == "아파트 봉사활동거점"){
    $qry = "select * from aptinfo {$condition}";
}
else{
    $qry = "select * from aptinfo {$condition}";
}
// 조건없으면 전체불러오고 조건있으면 해당 카테고리를 불러온다


$sql = $qry;
$result = mysqli_query($conn, $sql); // db 값이 들어 있음

?>

<? foreach($result as $key => $o):?>
<?php 
    $ad =  $o["aptname"];
    $name = $o["aptcode"];?>
<?= $ad?>|<?= $name?>|
<? endforeach?>