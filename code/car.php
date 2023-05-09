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
        background-color: rgb(255 ,240 ,245);}
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交通方式推薦</title>
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
    <h1 align="center">交通方式推薦</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}
    </style>

    <div>
        <form action="litart_nnn.php" method="get">
            <table class="table" border="1">
                
                <thead>
                    <tr>
                        <th>上車站牌</th>
                        <th>上車地址</th>
                        <th>公車號</th>
                        <th>距離</th>
                        
                    </tr>
                </thead>

                <tbody>

                
<?php


    $link = mysqli_connect("localhost", "dk0508", "yo109354022", "final_project");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    $lo_name=$_GET["lo_name"];

    $result = $link->query("SELECT s.`stop_Cname` , s.`address` ,r.`routeCname` ,n.`distance` 
                            FROM nearby_station n , station s ,  route r ,stop p
                            Where n.`stopID` = s.`stopID` and p.`stopID` = s.`stopID`  and p.`routeID` = r.`routeID` and `lo_name` = '$lo_name'
                            order by `distance` asc
                            limit 50");

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row["stop_Cname"] . "</td>" ;
        echo "<td>" . $row["address"] . "</td>" ;
        echo "<td>" . $row["routeCname"]  . "</td>" ;
        echo "<td>" . sprintf("%.2f", $row["distance"] ) ."km". "</td>";
        echo "<tr>";
     }

?>

</tbody>

</table>
<br>
<center><button value="返回" id="bt"><a href="litart.php">返回</a></button></center>
</form>
<marquee direction="left" behavior="alternate" scrollamount="8" ><img src="image/bus.png" alt="" width="60" height="60" ></marquee>
<body style="background-image: url(image/road1.png); background-repeat: no-repeat; background-position: bottom;background-size:auto 100px;">
</div>
</body>

</html>