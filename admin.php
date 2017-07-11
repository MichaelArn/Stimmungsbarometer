<?php
session_start();
if ($_SESSION['login_user'] == 'admin')
{
    
}
else
{
    header('Location: falschespw.php'); 
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
            
            <div class="font" id="adminseite">
                <form method="post" >
                    <label for="nameUmfrage">Bitte geben Sie den Namen für die Umfrage ein:</label> <br> <br>
                    <input type="text" name="nameUmfrage" value="">
                    <br><br>
                    <p>Wählen Sie den gewünschten Status:</p>
                    <input type="radio" id="akiviert"name="status" value="aktiviert">
                    <label for="ak">aktiviert</label> <br>
                    <input type="radio" id="naktiviert"name="status" value="deaktiviert">
                    <label for="naktiviert">deaktiviert</label> <br>
                    <input type="submit" name="submit" value="Senden" id="adminsubmit">
                </form>           

            </div>        

<?php 


    if(isset($_POST['status'])){
        $status = $_POST['status'];
        $db = mysqli_connect("localhost", "root", "", "stimmungsbarometer");
        if ($status == "deaktiviert")
        {
            $db->query("UPDATE status SET status = 'deaktiviert' WHERE id= 1");
        }
        else
        {
            $db->query("UPDATE status SET status = 'aktiviert' WHERE id= 1");
        }
    }
?>
            
        
    </body>
</html>

