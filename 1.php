
<?php
   $con=mysqli_connect("localhost", "root", "000000", "aptinfo") or die("MySQL 접속 실패");
 
   $sql = "SELECT * FROM aptinfo";
 
   $ret = mysqli_query($con, $sql);
 
   
 
 
    $arr = array();
 
    while($row = mysqli_fetch_array($ret)){
        array_push($arr, [(double)$row['x'], (double)$row['y'] ,$row['aptname']]);
     
 }

 mysqli_close($con);

 

?>


<html>
<head>
   <meta charset="utf-8">
   <title>다음 지도 API</title>
</head>
<body>
 
   <div id="map" style="width:100%;height:100vh;"></div>

   <script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=8877863071d042c1df8b61517275dbbf&libraries=clusterer"></script>
   <script>
        
      var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
          mapOption = {
              center: new kakao.maps.LatLng( 37.5006676,  126.9596386), // 지도의 중심좌표
              level: 3, // 지도의 확대 레벨
              mapTypeId : kakao.maps.MapTypeId.ROADMAP // 지도종류
          }; 

      // 지도를 생성한다 
      var map = new kakao.maps.Map(mapContainer, mapOption); 
      var positions = [];
     var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 
    
for (var i = 0; i < positions.length; i ++) {
    
    // 마커 이미지의 이미지 크기 입니다
    var imageSize = new kakao.maps.Size(24, 35); 
    
    // 마커 이미지를 생성합니다    
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
    
    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i].latlng, // 마커를 표시할 위치
        title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage // 마커 이미지 
    });
}
   </script>
</body>
</html>