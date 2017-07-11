

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
                
                <div id="box">
                    <form method="post" >
                        <label for="username">Username</label>
                        <input type="text" name="username" value="">
                        <br><br>
                        <label for="passwort">&nbsp&nbspPasswort</label>
                        <input type="password" name="passwort" value="">
                        <input type="submit" name="submit" value="Senden">
                    </form>           

                </div>
                    <p id="information"></p>
            </div>

<?php
    include_once("functions.php");  
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        // md5($username); 
        $passwort = $_POST['passwort'];
        // md5($passwort);
        login($username, $passwort);
    }
    
?>
            
        
    </body>
</html>

