<?php
    
	
    session_start();

if(!isset($_SESSION['interface']) and !isset($_POST['go']))
     header("location:../index.php");

    include("../connect.php"); 

if(isset($_SESSION['interface'])){
    if($_SESSION['interface']=='enseignant')
        header('location: ../teacher/ensei_confirme.php'); 
       else  if($_SESSION['interface']=='departement')
        header('location: ../departement/depa_confirme.php');    
}

if (isset($_POST['go'])) {
    $matricule=$_POST["matt_etu"];
    $password_etu=$_POST["pass_etu"];

//  echo " $matricule $password_etu";
    

    $query_info="
            select * from etudiant
            where matricule_etu='$matricule' and password_etu='$password_etu' ";

    $result_info=mysqli_query($connect,$query_info);
    $etudiant=mysqli_fetch_array($result_info);
    if($etudiant[0]==''){
        header("location: ../index.php?content=etudiant&falt=1");
    }   else {  
    $_SESSION['interface']='etudiant';
    $_SESSION['matt_etu']=$matricule;
    $_SESSION['pass_etu']=$password_etu;

    $_SESSION['nom']=$etudiant[2];
    $_SESSION['prenom']=$etudiant[3];
    $_SESSION['id_group']=$etudiant[4];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="student.css">
    <link rel="shortcut icon" href="../logo.png" />
    <script src='../jquery.js' ></script>
    <script src='student.js'></script>
    <title> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?> </title>
</head>
<body>
    <div class="header"> 
        <div id='s_name' > <h2> Bien Venu: <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h2></div>

        <div id="s_matri" >
        <p><strong><?php echo $_SESSION['matt_etu']; ?></strong></p></div>
         <div id="config"> 
            • Configuration •<hr/>     
            <div id="config_slide">
            <input type='button' value='Settings' class='messages_top' onclick='settings()' />
            <form action="logout.php" method="post" >
            <input type='submit' value='LogOut' class='messages_top' />
            </form>
         </div> 
         </div>

        

    </div>
 <!--        * * * * * * * * * * * * * * * * * * *    Les Moule     * * * * * * * * * * * * * * * *   -->
    <div class="module">
        <h2>Les Module </h2>
            <hr>
            <form action='etu_confirme.php' method=post> 
                        <input  type='submit' name='Module' value='ALL' id='module_all' />
                    </form>
                <hr>    
        <?php 
            $matricule=$_SESSION['matt_etu'];
            $query_module="select m.id_module, m.nom_module 
                        from groupe g
                        join etudiant e
                        on g.id_groupe=e.id_groupe
                        join annee a
                        on a.id_annee=g.id_annee
                        join module m
                        on m.id_annee=a.id_annee
                        where e.matricule_etu='$matricule'";
            $result_module=mysqli_query($connect,$query_module);
            while($module=mysqli_fetch_array($result_module)){
                echo "
                        <input type='button' name='Module' value='$module[1]' class='module_button' onclick='Module($module[0])' />
                    ";
            }
         ?>
        <hr>
    </div>
<!--          * * * * * * * * * * * * * * * * * * * * *  Les Content * * * * * * * * * * * * * * * * * *    -->
    <div class="content">
        <?php 
            $matricule=$_SESSION['matt_etu'];

            // -------------------------------  All Mudule  ----------------------------------
            if(!isset($_POST['Module']) || (isset($_POST['Module']) && $_POST['Module']=='ALL')){
            $query_note="select m.nom_module, n.td, n.tp, n.examen, n.moyenne, m.type
                from note n
                join module m
                on n.id_module=m.id_module
                join etudiant e
                on n.matricule_etu=e.matricule_etu
                where e.matricule_etu='$matricule' 
                order by m.type ";
            $result_note=mysqli_query($connect,$query_note);
            while($note=mysqli_fetch_array($result_note)){
                echo "
                    <div class='module_form' >
                        <center><legend> - $note[0] - </legend></center>
                        <table>
                            <tr>"; 
                            if($note[5]==1 || $note[5]==2)
                                echo "<th>  TD: </th>";
                            if($note[5]==1 || $note[5]==3)
                                echo"<th>  TP: </th> ";
                            echo "
                                <th>  EX: </th>
                                <th>  MOY: </th>  
                            </tr>
                            <tr>";
                            if($note[5]==1 || $note[5]==2)
                               echo "<td> <input type=text value='$note[1]' class='input_module' disabled/></td>";
                            if($note[5]==1 || $note[5]==3)
                                echo "<td> <input type=text value='$note[2]' class='input_module' disabled/></td>";

                 echo "               
                                <td> <input type=text value='$note[3]' class='input_module' disabled/></td>
                                <td> <input type=text value='$note[4]' class='input_module' disabled/></td>
                            </tr>
                        </table>

                    </div>
                    
                ";
             } 

              $sql="select sum(n.moyenne * m.coefficient) from note n, etudiant e, module m
                            where m.id_module=n.id_module and n.matricule_etu=e.matricule_etu and e.matricule_etu='$matricule'";
            $nbrcoef="select sum(coefficient) from module where id_annee='1'";
               $moy_gen=mysqli_fetch_array(mysqli_query($connect,$sql));
               $nombre=mysqli_fetch_array(mysqli_query($connect,$nbrcoef));
               $af_moy=number_format($moy_gen[0]/$nombre[0],2);             
             echo " <center> <div class='module_form'>
                    <h4> - Moyenne Générale - </h4>
                <input type=text value='$af_moy' class='by_module_head' disabled/>
             
                 </div> </center>";
          }  
         ?>
    </div>
 <!--             * * * * * * * * * * * * * * *     Les Message     * * * * * * * * * * *    -->
             <?php include("message.php"); ?>
    <div class="footer"> <h4>Merci pour la consultation!</h4> </div>    
</body>
</html>