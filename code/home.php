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
        background-color: rgb(240, 255, 240);}
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檔案管理介面</title>
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

<h1 align="center">檔案管理介面</h1>

<?php
    echo "--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"
?>

<body>
    <h1 align="center">新增活動</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}
    </style>

    <h3>請輸入欲新增活動資訊</h3>
    <div>
        <form action="create.php" method="post" name="formAdd" id="formAdd">
            
                
                <thead>
                    <tr>
                    請輸入UID:<input type="text" name="uid" id="uid" value=""><br/>
                    請輸入活動名稱:<input type="text" name="name" id="name" value=""><br/>
                    請輸入活動開始時間:<input type="text" name="startt" id="startt" value=""><br/>
                    請輸入活動結束時間:<input type="text" name="endt" id="endt" value=""><br/>
                    請輸入活動地點:<input type="text" name="locate" id="locate" value=""><br/>
                    <input type="hidden" name="action" value="add">
                    <input type="submit" name="button" value="新增">
                    </tr>
                </thead>

            
        </form>
</body>

<?php
    echo "--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"
?>

<body>
    <h1 align="center">更新活動</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}
    </style>

    <h3>請輸入欲更改活動資訊</h3>
    <div>
        <form action="update.php" method="post" name="formAdd" id="formAdd">
            
                
                <thead>
                    <tr>
                    請輸入UID:<input type="text" name="o_uid" id="o_uid" value=""><br/>
                    請輸入活動名稱:<input type="text" name="o_name" id="o_name" value=""><br/>
                    請輸入活動開始時間:<input type="text" name="o_startt" id="o_startt" value=""><br/>
                    請輸入活動結束時間:<input type="text" name="o_endt" id="o_endt" value=""><br/>
                    請輸入活動地點:<input type="text" name="o_locate" id="o_locate" value=""><br/>
                    </tr>
                </thead>
  
    <h3>請輸入更新資訊</h3>
    <div>
                <thead>
                    <tr>
                    請輸入UID:<input type="text" name="n_uid" id="n_uid" value=""><br/>
                    請輸入活動名稱:<input type="text" name="n_name" id="n_name" value=""><br/>
                    請輸入活動開始時間:<input type="text" name="n_startt" id="n_startt" value=""><br/>
                    請輸入活動結束時間:<input type="text" name="n_endt" id="n_endt" value=""><br/>
                    請輸入活動地點:<input type="text" name="n_locate" id="n_locate" value=""><br/>
                    <input type="hidden" name="action" value="modify">
                    <input type="submit" name="button" value="更新">
                    </tr>
                </thead>
        </form>
    </div>
</body>

<?php
    echo "--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"
?>

<body>
    <h1 align="center">刪除活動</h1>
    <style>
        body {font-size: 18px; font-family: "微軟正黑體",Arial, Helvetica, sans-serif,Verdana,Geneva; font-weight:300; font-size: 18px;}
    </style>

    <h3>請輸入欲刪除活動資訊</h3>
    <div>
        <form action="delete.php" method="post" name="formAdd" id="formAdd">
            
                
                <thead>
                    <tr>
                    請輸入UID:<input type="text" name="uid" id="uid" value=""><br/>
                    請輸入活動名稱:<input type="text" name="name" id="name" value=""><br/>
                    請輸入活動開始時間:<input type="text" name="startt" id="startt" value=""><br/>
                    請輸入活動結束時間:<input type="text" name="endt" id="endt" value=""><br/>
                    請輸入活動地點:<input type="text" name="locate" id="locate" value=""><br/>
                    <input type="hidden" name="action" value="del">
                    <input type="submit" name="button" value="刪除">
                    </tr>
                </thead>

            
        </form>
</body>