<?php
    include_once("functions.php");
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <title></title>
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
        <p id="keineUmfrage" style="display:none;">Es ist keine Umfrage vorhanden!</p>
        <article id="content-auswertung">
            <div id="box-auswertung">
                <h1>Auswertung des Stimmungsbarometer</h1>
            </div>
            <div id="balken-auswertung">

                <?php
                    //Stimmung 1
                    $stimmung1_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE stimmung = 1 AND datum = '".date('Y-m-d')."'");
                    $stimmung1_countRow = mysqli_fetch_row($stimmung1_countResult);
                    $stimmung1_count = $stimmung1_countRow[0];
                    echo "<p><b>Sehr schlecht (Stufe 1): {$stimmung1_count}</b></p>"; 

                    //Stimmung 2
                    $stimmung2_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE stimmung = 2 AND datum = '".date('Y-m-d')."'");
                    $stimmung2_countRow = mysqli_fetch_row($stimmung2_countResult);
                    $stimmung2_count = $stimmung2_countRow[0];
                    echo "<p><b>Schlecht (Stufe 2): {$stimmung2_count}</b></p>"; 

                    //Stimmung 3
                    $stimmung3_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE stimmung = 3 AND datum = '".date('Y-m-d')."'");
                    $stimmung3_countRow = mysqli_fetch_row($stimmung3_countResult);
                    $stimmung3_count = $stimmung3_countRow[0];
                    echo "<p><b>Geht (Stufe 3): {$stimmung3_count}</b></p>"; 

                    //Stimmung 4
                    $stimmung4_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE stimmung = 4 AND datum = '".date('Y-m-d')."'");
                    $stimmung4_countRow = mysqli_fetch_row($stimmung4_countResult);
                    $stimmung4_count = $stimmung4_countRow[0];
                    echo "<p><b>Gut (Stufe 4): {$stimmung4_count}</b></p>"; 

                    //Stimmung 5
                    $stimmung5_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE stimmung = 5 AND datum = '".date('Y-m-d')."'");
                    $stimmung5_countRow = mysqli_fetch_row($stimmung5_countResult);
                    $stimmung5_count = $stimmung5_countRow[0];
                    echo "<p><b>Sehr gut (Stufe 5): {$stimmung5_count}</b></p>";  

                    
                    //Durchschnitt ausrechnen
                    $stimmungSumme_sumResult = $db->query("SELECT SUM(Stimmung) FROM stimmung WHERE datum = '".date('Y-m-d')."'");
                    $stimmungSumme_sumRow = mysqli_fetch_row($stimmungSumme_sumResult);
                    $stimmungSumme_sum = $stimmungSumme_sumRow[0];

                    $stimmungAnzahl_countResult = $db->query("SELECT COUNT(*) FROM stimmung WHERE datum = '".date('Y-m-d')."'");
                    $stimmungAnzahl_countRow = mysqli_fetch_row($stimmungAnzahl_countResult);
                    $stimmungAnzahl_count = $stimmungAnzahl_countRow[0];

                    echo "<p>-------------------------------</p>";

                    echo "<p><b>Summe: {$stimmungSumme_sum}</b></p>";  
                    echo "<p><b>Anzahl: {$stimmungAnzahl_count}</b></p>";

                    if($stimmungSumme_sum > 0){

                        echo "<p>-------------------------------</p>";

                        $stimmungDurchschnitt = $stimmungSumme_sum / $stimmungAnzahl_count;
                        
                        echo "<p><b>Durchschnitt: {$stimmungDurchschnitt}</b></p>";

                        if($stimmungDurchschnitt >= 0 && $stimmungDurchschnitt <= 1){
                            echo "<img src='images/1.png' alt='Smiley 1' width='42' height='42'>";
                        }

                        if($stimmungDurchschnitt > 1 && $stimmungDurchschnitt <= 2){
                            echo "<img src='images/2.png' alt='Smiley 2' width='42' height='42'>";
                        }

                        if($stimmungDurchschnitt > 2 && $stimmungDurchschnitt <= 3){
                            echo "<img src='images/3.png' alt='Smiley 3' width='42' height='42'>";
                        }

                        if($stimmungDurchschnitt > 3 && $stimmungDurchschnitt <= 4){
                            echo "<img src='images/4.png' alt='Smiley 4' width='42' height='42'>";
                        }

                        if($stimmungDurchschnitt > 4 && $stimmungDurchschnitt <= 5){
                            echo "<img src='images/5.png' alt='Smiley 5' width='42' height='42'>";
                        }
                    }

                    else{
                        echo "<p><b>Durchschnitt: 0</b></p>";
                    }

                ?>


            <?php
                $db = mysqli_connect("localhost", "root", "", "stimmungsbarometer");

                $statusResult = $db->query("SELECT status FROM status WHERE id = 1");
                $statusRow = mysqli_fetch_row($statusResult);
                $status = $statusRow[0];
            
                if ($status == 'deaktiviert'){
                    echo "

                        <script>
                            document.getElementById('content-auswertung').style.display = 'none';
                            document.getElementById('keineUmfrage').style.display = '';
                        </script>
                    ";

                }

                else if ($status == 'aktiviert'){
                    echo "
                        <script>
                            document.getElementById('content-auswertung').style.display = '';
                        </script>
                    ";
                }
            ?>




            </div>
        </article>
        



    </body>
</html>
