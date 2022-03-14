<?php  
session_start();  
if(isset($_SESSION["login"]))  
{  
     if((time() - $_SESSION['last_login_timestamp']) > 900)
     {  
          header("location:logout.php");  
     }  
     else  
     {  
          $_SESSION['last_login_timestamp'] = time();
          
     }  
}  
else  
{  
     header('location:login.php');  
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting App</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/voting.css">
    <link rel="stylesheet" href="css/media-queries.css" />
</head>
<body>    
    <div id="app">
        <div class="app-overlay"></div>
        
        <header>
            <div class="logo">
                <img src="images/star.svg">
                <h1>ELECTIONS</h1>
            </div>
        </header>
        <h2><?php
        require_once("connection.php");
        require_once("loginprocess.php");


        if(isset($_SESSION["login"]))
        {
            $np = "SELECT * FROM electeur";
            $result = mysqli_query($conn,$np) or die('erreur');
            while($row = mysqli_fetch_row($result))
            {

                $nom = $row[1];
                $prenom = $row[2];
                
                echo $nom;
                echo $prenom;
            };
                
        }
        ?>
    </h2>
    <h2><?php echo date('d/m/y h:i:s'); ?></h2>
        <h2><a href="logout.php" class="logout">Logout</a></h2>
        <main>
            <div class="cards">
                <div class="card">
                    <img class="card-image" src="images/cond1.jpg">
                    <div class="card-info">
                        <div class="condidate-info">
                        <span class="condidate-name">condidat 1</span>
                        <span class="condidate-party"><br>condidate party 1</span>
                        </div>
                    </div>
                    <button id="vote-button1" onclick="myOnClickFn()" class="card-btn btn-cond1">VOTE</button>
                </div>
            
                <div class="card">
                    <img class="card-image" src="images/cond2.jpg">
                    <div class="card-info">
                        <div class="condidate-info">
                        <span class="condidate-name">condidat 2</span>
                        <span class="condidate-party"><br>condidate party 2</span>
                        </div>
                    </div>
                    <button id="vote-button2" onclick="myOnClickFn()" class="card-btn btn-cond2">VOTE</button>
                </div>
        </main>
    </div>
</body>
<script src="validervote.js"></script>
</html>