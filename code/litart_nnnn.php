
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
        background-color: rgb(240, 247, 251);}
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>活動推薦</title>
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
    <h1 align="center">活動推薦</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}
    </style>

    <div>

            <table class="table" border="1">
                
                <thead>
                    <tr>
                        <th>活動名稱</th>
                        
                        <th>開始時間</th>
                        <th>結束時間</th>
                        
                        <th>活動地點</th>
                        <th>活動地點行政區</th>

                        <th>備註</th>
                
                    </tr>
                </thead>

                <tbody>

                
<?php
    $link = mysqli_connect("localhost", "dk0508", "yo109354022", "final_project");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

if (!empty($_GET["ev_city"])) {
    if (empty($_GET["ev_start_m"]) || empty($_GET["ev_end_m"])) {
                if (!empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
            
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where (`ac_name` like '%$_GET[eventname]%') 
                                            and
                                            (`activity`.`lo_name` like '%$_GET[eventsite]%')
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else if (!empty($_GET["eventname"]) && empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `ac_name` like '%$_GET[eventname]%'
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else if (empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `activity`.`lo_name` like '%$_GET[eventsite]%'
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else {
                    $result = $link->query("SELECT `ac_name`, `starttime`, `endtime`, `activity`.`lo_name`, `admin_district` FROM `activity`
                                        inner join `location`
                                        on `activity`.`lo_name` = `location`.`lo_name` 
                                        where `admin_district` = '$_GET[ev_city]'
                                        ");
                }
    }else{
                if (!empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
            
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where (`ac_name` like '%$_GET[eventname]%') 
                                            and
                                            (`activity`.`lo_name` like '%$_GET[eventsite]%')
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else if (!empty($_GET["eventname"]) && empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `ac_name` like '%$_GET[eventname]%'
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else if (empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `activity`.`lo_name` like '%$_GET[eventsite]%'
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
                
                } else {
                    
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            WHERE ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                            or
                                            (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                            or
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            and
                                            `admin_district` = '$_GET[ev_city]'
                                            ");
            
                }
    }
} else {
    if (empty($_GET["ev_start_m"]) || empty($_GET["ev_end_m"])) {
                if (!empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
            
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where (`ac_name` like '%$_GET[eventname]%') 
                                            and
                                            (`activity`.`lo_name` like '%$_GET[eventsite]%')
                                            ");
                
                } else if (!empty($_GET["eventname"]) && empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `ac_name` like '%$_GET[eventname]%'
                                            ");
                
                } else if (empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `activity`.`lo_name` like '%$_GET[eventsite]%'
                                            ");
                
                } else {
                    echo "<center>請輸入活動名稱、活動地點、活動日期其一資訊 <br></center><br>";
                    exit();
                }
    }else{
                if (!empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
            
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where (`ac_name` like '%$_GET[eventname]%') 
                                            and
                                            (`activity`.`lo_name` like '%$_GET[eventsite]%')
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            ");
                
                } else if (!empty($_GET["eventname"]) && empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `ac_name` like '%$_GET[eventname]%'
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            ");
                
                } else if (empty($_GET["eventname"]) && !empty($_GET["eventsite"])) {
                
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            where `activity`.`lo_name` like '%$_GET[eventsite]%'
                                            and
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                                or
                                                ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d'))))
                                            ");
                
                } else {
                    
                    $result = $link->query("SELECT * FROM `activity`
                                            inner join `location`
                                            on `activity`.`lo_name` = `location`.`lo_name` 
                                            WHERE (date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                            or
                                            (date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d') BETWEEN date_format('$_GET[ev_start_m]', '%Y%m%d') AND date_format('$_GET[ev_end_m]', '%Y%m%d'))
                                            or
                                            ((date_format(left(str_to_date(`starttime`, '%Y/%m/%d %H:%i'), 10), '%Y%m%d') <= date_format('$_GET[ev_start_m]', '%Y%m%d')) AND (date_format('$_GET[ev_end_m]', '%Y%m%d') <= date_format(left(str_to_date('endtime', '%Y/%m/%d %H:%i'), 10), '%Y%m%d')))
                                            ");
            
                }
    }
}

while ($row = mysqli_fetch_array( $result )) {
    echo "<tr>";
    echo "<td>" . $row["ac_name"] . "</td>";
    echo "<td>" . $row["starttime"] . "</td>";
    echo "<td>" . $row["endtime"] ."</td>";
    echo "<td>" . $row["lo_name"] . "</td>";
    echo "<td>" . $row["admin_district"] ."</td>";
    echo "<td><a href='car.php?lo_name=".$row["lo_name"] ."'>交通方式</a>/<a href='att.php?lo_name=".$row["lo_name"] ."'>附近20個景點</a></td>";
    echo "</tr>";
}
?>

</tr>
</tbody>

</table>
<br>
<center><button value="返回" id="bt"><a href="litart.php">返回</a></button></center>
</form>

</div>
</body>

</html>

