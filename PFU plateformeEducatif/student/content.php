        <?php 
            session_start();

            $matricule=$_SESSION['matt_etu'];
            if(!isset($_GET['Module']) || (isset($_GET['Module']) && $_GET['Module']=='ALL')){
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
                    <form class='module_form' >
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
                    </form>
                    
                ";
             } 
          }  else {
            include('Module.php');
          }  
         ?>