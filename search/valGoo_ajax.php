<?php
$cate1 = $_GET['cate1']; // 봉사 정보를 받아왐
$cate2 = $_GET['cate2'];//구 정보를 받아옴

$conn = mysqli_connect(
  'localhost', // 주소
  'root',
  '000000',
  'aptinfo'); // 데이터베이스 이름

  mysqli_set_charset($conn,"utf8");

// 구 카테고리에 따른 조건을 줌
if($cate2 != 'all'){// all 이 아니라면 == 선택했다면
    $condition = "aptname = '{$cate2}'";
}

// 아파트별, 캠프별에 따른 테이블명을 선택 
if($cate1 == "아파트 봉사활동거점"){ //아파트 봉사활동거점을 선택했다면
    $qry = "select * from aptinfo {$condition }";
}
else{ //  = 동자원봉사캠프라면 or 선택한게 없다면
    $qry =  "select * from aptinfo {$condition }";
}

$sql = $qry;
$result = mysqli_query($conn, $sql); // db 값이 들어 있음

 ?>
 
<? foreach($result as $key => $o):?>
<tr>
    <td><?= $key+1; ?></td>
    <td><?= $o["aptname"]?></td>
    <td><?= $o["address"]?></td>
    <td><?= $o["aptcode"]?></td>
    <?php if($cate1 == "동자원봉사캠프") : ?>
    <td><?= $o["wr_subject"]?></td>
    <?php endif ?>
</tr>
<? endforeach?>