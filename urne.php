<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting App</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css1/urne.css">
    <link rel="stylesheet" href="css1/media-queries-urne.css" />
</head>
<body>
    <?php  
    session_start();  
    if(isset($_SESSION["login"]))  
    {  
         if((time() - $_SESSION['last_login_timestamp']) > 3)
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

    <div id="app">
        <div class="app-overlay"></div>
        
        <header>
            <div class="logo">
                <img src="images1/star.svg">
                <h1>ELECTIONS</h1>
            </div>
        </header>
     <h2><?php
        require_once("connection.php");
        require_once("loginprocess.php");

        if (isset($_POST['name']) && isset($_POST['pass']))
        {
            $uname = $_POST['name'] ;
            $upass = $_POST['pass'] ;
            $np = mysqli_query($conn,"select * from electeur where ElecteurID='$uname'and CIN='$upass' limit 1");
            $resultat=mysqli_fetch_array($np);
            if($np)
            {
                $num_rows = mysqli_num_rows($np);
                if ($num_rows>0) 
                {
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    setcookie("nom",$nom, time()+3600);
                    setcookie("prenom",$prenom, time()+3600);
                    
                    echo $_COOKIE['nom'];
                    echo $_COOKIE['prenom'];
                }
            }
        }
        ?>
    </h2>
    <h2><?php echo date('d/m/y h:i:s'); ?></h2>
        <h2><a href="logout.php" class="logout">Logout</a></h2>
        <main>
            <div class="cards">
                <div class="card">
                    <img class="card-image" src="images1/urne1.jpg">
                    <div class="card-info">
                        <div class="urne-info">
                        <span class="urne-name">urne 1</span>
                        </div>
                    </div>
                    <button id="urne-button1" onclick="myOnClick()" class="card-btn btn-urne1">OPEN VOTE</button>
                </div>
            
                <div class="card">
                    <img class="card-image" src="images1/urne2.jpg">
                    <div class="card-info">
                        <div class="urne-info">
                        <span class="urne-name">urne 2</span>
                        </div>
                    </div>
                    <button id="urne-button2" onclick="myOnClick()" class="card-btn btn-urne2">OPEN VOTE</button>
                </div>

                <div class="card">
                    <img class="card-image" src="images1/urne3.jpg">
                    <div class="card-info">
                        <div class="urne-info">
                            <span class="urne-name">urne 3</span>
                        </div>
                    </div>
                    <button id="urne-button3" onclick="myOnClick()" class="card-btn btn-urne3">OPEN VOTE</button>
                </div>
        </main>
    </div>
</body>
<script src="choisirurne.js"></script>
</html>