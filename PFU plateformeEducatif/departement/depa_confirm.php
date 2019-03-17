<?php 

        session_start();

if(!isset($_SESSION['interface']) and !isset($_POST['go']))
     header("location:../index.php");


    include("../connect.php"); 

if(isset($_SESSION['interface'])){
    if($_SESSION['interface']=='etudiant')
        header('location: ../student/etu_confirme.php');      
    else if($_SESSION['interface']=='enseignant')
        header('location: ../teacher/ensei_confirme.php');   
}

if (isset($_POST['go'])) {
    $name_dep=$_POST["name_dep"];
    $pass_dep=$_POST["pass_dep"];

    $query_info="
            select * from departement
            where nom_dep='$name_dep' and pass_dep='$pass_dep' ";

    $result_info=mysqli_query($connect,$query_info);
    $departement=mysqli_fetch_array($result_info);
    if($departement[0]==''){
        header("location: ../index.php?content=departement&falt=1");
    } else {  
    $_SESSION['interface']='departement';
    $_SESSION['id_dep']=$departement[0];
    $_SESSION['name_dep']=$departement[1];
    $_SESSION['pass_dep']=$departement[2];
    }
}
 ?>

 <!DOCTYPE html>
 <html lang="en" />
 <head>
     <meta charset="UTF-8" />
     <link rel="stylesheet" href="departement.css" />
     <link rel="shortcut icon" href="../logo.png" />
     <script src='../jquery.js'></script>
     <script src='departement.js'></script>
     <title> <?php echo $_SESSION['name_dep']; ?> </title>
 </head>
 <body>
     <div class="header">
         <div class="dep_name"> Departement: <?php echo $_SESSION['name_dep']; ?> </div>
             <center  class='main' > Main  </center>
         <div id="config"> 
            • Configuration •<hr/>   
             <div id="config_slide">
            <input type='button' value='Settings' class='update_button' onclick='settings()' />
            <form action="logout.php" method="post" >
                <input type='submit' value='LogOut' class='update_button' />
            </form>
        </div>   
        </div>

     </div>
    
    <div class="nav">
        <center><h2>Ajouter</h2> <hr> </center> 
        <input class='ajouter_button' type="button" value='module' onclick='module()' />          
        <input class='ajouter_button' type="button" value='enseignant' onclick='enseignant()' />
        <input class='ajouter_button' type="button" value='etudiant' onclick='etudiant()' />       
    </div>
    
    <div class="content">
        Main things will happen here
    </div>
     <div class="footer"> <h4>Merci!</h4> </div>
 </body>
 </html>