<?php
    $db = mysqli_connect('localhost','root','','stimmungsbarometer');
    $aktuellesDatum = date("Y-m-d");

    // function nichtMehrClicken(){

       
    //     echo "
    //         <script>
    //             document.getElementById('box').style.display = 'none';
    //         </script>
    //     ";
    // }

    function clickBox1(){
        
        global $aktuellesDatum;
        global $db;
        
        $db->query("INSERT INTO stimmung VALUES (null, '".$aktuellesDatum."',1 )");
        
        header ( 'Location: auswertung.php' ); 

        // echo "<script>document.getElementById('box').style.display = none;</script>"

    }

    
    function clickBox2(){
        global $aktuellesDatum;
        global $db;
        
        $db->query("INSERT INTO stimmung VALUES (null, '".$aktuellesDatum."',2 )");
        
        header ( 'Location: auswertung.php' );
    }
    
    function clickBox3(){
        global $aktuellesDatum;
        global $db;
        
        $db->query("INSERT INTO stimmung VALUES (null, '".$aktuellesDatum."',3 )");
       
        header ( 'Location: auswertung.php' );
    }
    
    function clickBox4(){
        global $aktuellesDatum;
        global $db;
        
        $db->query("INSERT INTO stimmung VALUES (null, '".$aktuellesDatum."',4 )");
        
        header ( 'Location: auswertung.php' );
    }
    
    function clickBox5(){
        global $aktuellesDatum;
        global $db;
        
        $db->query("INSERT INTO stimmung VALUES (null, '".$aktuellesDatum."',5 )");
        
        header ( 'Location: auswertung.php' );
    }



    function login($user,$pwd){
        if ($user == "admin" && $pwd == "BLJ4ever")
        {   
            session_start();
            $_SESSION['login_user'] = $user; 
            header('Location: admin.php');

        }
        else
        {
            echo "<script>";
                echo "document.getElementById('information').innerHTML = 'Dein Benutzername oder das Passwort stimmt nicht.';";
            echo "</script>";
        } 
    }

    


    
?>