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
    }
    if(isset($box2)){
        clickBox2();
    }
    if(isset($box3)){
        clickBox3();
    }
    if(isset($box4)){
        clickBox4();
    }
    if(isset($box5)){
        clickBox5();
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stimmungsbarometer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style2.css" rel="stylesheet">
        <link href="normalize.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <script type="text/javascript">
        
            var ip = <?php echo("\"".$_SERVER['REMOTE_ADDR']."\";"); ?>;  //IP adresse wird ausgelesen und in Javascript variable geschrieben

            var d = new Date();
            var time = d.getTime(); //Rückgabewert der Zeit seit 1970/01/01 in millisekunden
        
        </script>

        

        <?php
            $ipneu = microtime(true);
            
        ?>
        
        

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
            $db = mysqli_connect("localhost", "root", "", "stimmungsbarometer");

            $statusResult = $db->query("SELECT status FROM status WHERE id = 1");
            $statusRow = mysqli_fetch_row($statusResult);
            $status = $statusRow[0];
          
            $array = $db->query("SELECT * from ip");

            foreach ($array as $temp ) 
            {
                foreach($temp as $temp2)
                {
                    if (!$temp2 == $ip)
                    {
                        $db = mysqli_connect("localhost", "root", "", "stimmungsbarometer"); 
                        $db->query("INSERT INTO ip VALUES (null, '".$ip."','".$time."' )");
                    }
                    
                    if (){

                    }

                }
            }

            echo "<script>
                    
                    </script>"


            // if ($status == 'deaktiviert')
            // {
            //     echo "
            //         <script>
            //             document.getElementById('box').style.display = 'none';
            //         </script>
            //     ";
            // }

            

            // else if ($status == 'aktiviert')
            // {
            //     echo "
            //         <script>
            //             document.getElementById('box').style.display = '';
            //         </script>
            //     ";
            // }
            ?>

        
    </body>
</html>

