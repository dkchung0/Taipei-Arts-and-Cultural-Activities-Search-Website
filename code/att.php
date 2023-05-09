<!doctype html>
<html>
<style>
    html{-webkit-text-size-adjust: none;
        -ms-text-size-adjust: 100%;
        min-height: 100%;
        background: #f0f5fb;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(255, 248, 220);}
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>附近景點推薦</title>
    <div id="pic" style="OVERFLOW: hidden; width:1024">
            <table width="100%" border=0 cellpadding=0 bgcolor="" cellspace=0>
            <tr>
            <td id="pic1">
            <table>
            <tr>
            <td><img src="image/西門紅樓.png" height="150" border=0></td>
            <td><img src="image/西門町.png" height="150" border=0></td>
            <td><img src="image/自由廣場.png" height="150" border=0></td>
            <td><img src="image/櫻花.png" height="150" border=0></td>
            <td><img src="image/擎天崗.png" height="150" border=0></td>
            <td><img src="image/圓山大飯店.png" height="150" border=0></td>
            <td><img src="image/台北101.png" height="150" border=0></td>
            <td><img src="image/北投溫泉博物館.png" height="150" border=0></td>
            <td><img src="image/信義.png" height="150" border=0></td>
            </tr>
            </table>
            </td>
            <td id="pic2"></td>
            </tr>
            <script>
            var speed=30
            pic2.innerHTML=pic1.innerHTML
            pic.scrollLeft=pic.scrollWidth
            function Marquee(){
            if(pic.scrollLeft<=0)
            pic.scrollLeft+=pic2.offsetWidth
            else{
            pic.scrollLeft--
            }
            }
            var MyMar=setInterval(Marquee,speed)
            pic.onmouseover=function() {clearInterval(MyMar)}
            pic.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
            </script>
            </table>
            </div>
</head>

<link rel="stylesheet" type="text/css" href="css/person.css">
<style type="text/css">
    .table{
        position: relative;
        left:100px;
        width: 1200px;
    }
    a{
        text-decoration: none;
    }
    #bt{
        border: 1px solid #000000;
        border-bottom-color: #000000;
        border-radius: 5px;
    }
</style>

<body>
    <h1 align="center">附近景點推薦</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}

    </style>

    <div>
        <form action="litart_nnn.php" method="get">
            <table class="table" border="1">
                
                <thead>
                    <tr>
                        <th>景點名稱</th>

                        <th>類別</th>
                        
                        <th>地址</th>

                        <th>距離</th>
                    </tr>
                </thead>

                <tbody>

                
<?php
$link = mysqli_connect("localhost", "dk0508", "yo109354022", "final_project");
$link -> set_charset("UTF8"); // 設定語系避免亂碼

$lo_name = $_GET["lo_name"];

$result_2 = $link->query("SELECT `lo_name`, `surrounding_attraction`.`at_name`, `category`, `address`,`distance` FROM `surrounding_attraction`
                        inner join `attraction`
                        on `surrounding_attraction`.`at_name` = `attraction`.`at_name` 
                        where `lo_name` = '$lo_name' and `distance` < 10
                        order by `distance` asc 
                        limit 20
                        ");


while ($row = mysqli_fetch_array( $result_2 )) {
    echo "<tr>";
    echo "<td>" . $row["at_name"] . "</td>";
    echo "<td>" . $row["category"] . "</td>";
    echo "<td>" . $row["address"] ."</td>";
    echo "<td>" . sprintf("%.2f", $row["distance"] ) ."km". "</td>";
    echo "</tr>";
}
?>

</tbody>

</table>
<br>
<center><button value="回首頁" id="bt"><a href="litart.php">返回</a></button></center>
</form>
</div>
</body>

</html>