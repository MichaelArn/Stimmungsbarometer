
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stimmungsbarometer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style2.css" rel="stylesheet">
        <link href="normalize.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body>
        <div id="page">
            <nav>
                <div>
                    <ul>
                        <li><a href="index.php">Stimmungsbarometer</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="auswertung.php">Auswertung</a></li>
                    </ul>
                </div>
            </nav>
        </div>
            <div id="hauptelement">
                <div id="frame">
                    <img src="images/blj.png" alt="BLJ" id="picture">
                </div>
                <div id="box">

                    <form method='post'>
                    <input value='' name='box1' type='submit' class="content-box" id="content-box1">
                    
                    <input value='' name='box2' type='submit' class="content-box" id="content-box2">
                    
                    <input value='' name='box3' type='submit' class="content-box" id="content-box3">
                    
                    <input value='' name='box4' type='submit' class="content-box" id="content-box4">
                    
                    <input value='' name='box5' type='submit' class="content-box" id="content-box5">
                    
                    </form>

                </div>
            </div>
            <?php
                error_reporting(0);
                include_once("functions.php");  
                
                $box1 = $_POST['box1'];
                $box2 = $_POST['box2'];
                $box3 = $_POST['box3'];
                $box4 = $_POST['box4'];
                $box5 = $_POST['box5'];

                if(isset($box1)){
                    clickBox1();
                    setIpDb();
                }
                if(isset($box2)){
                    clickBox2();
                    setIpDb();
                }
                if(isset($box3)){
                    clickBox3();
                    setIpDb();
                }
                if(isset($box4)){
                    clickBox4();
                    setIpDb();
                }
                if(isset($box5)){
                    clickBox5();
                    setIpDb();
                }
            ?>
            <?php

                function setIpDb()
                {
                    $ip = ($_SERVER['REMOTE_ADDR']);
                    $time = microtime(true);

                    mysql_close($db);
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('stimmungsbarometer');

                    $values = mysql_query("SELECT * FROM ip;");

                    $i = mysql_num_rows($values);
                    

                    mysql_query("INSERT INTO ip VALUES (null, '".$ip."','.$time.')");

                    $lastsource = mysql_query("SELECT * FROM ip ORDER BY id DESC LIMIT 1");
                    $templastarray = mysql_fetch_array($lastsource);
                    $lastid = $templastarray['id'];

                    $firstsource = mysql_query("SELECT * FROM ip ORDER BY id ASC LIMIT 1");
                    $tempfirstarray = mysql_fetch_array($firstsource);
                    $firstid = $tempfirstarray['id'];

                    $i = $firstid;
                    $tempbool = false;

                    while ($i <= $lastid) {
                        $tempsource = mysql_query("SELECT * FROM ip WHERE id='".$i."'");
                        $temparray = mysql_fetch_array($tempsource);
                        if ($ip == $temparray['IpAdresse']) {
                            if ($tempbool == false) {   
                                $tempbool = true;
                            }
                            else {  
                                mysql_query("DELETE FROM ip WHERE id='".$i."'");
                            }
                            
                        }
                        $i++;
                    }
                }

            ?>
    </body>
</html>

