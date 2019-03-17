<?php


    $username='root';
    $password ='nas4';
    $host='localhost';
    $database='adwak';
    $GLOBALS['DB']= new mysqli($host,$username,$password,$database);
    if($DB->connect_error){
    die('Error 21');

    }

    class DBHelper {

      function e($value){

         echo htmlspecialchars($value , ENT_QUOTES, 'utf-8');

     }



     public function Inject($Table,$Col,$Value){
                     $Culs=null;
                     $DB = $GLOBALS['DB'];
                     $Cols='(';
                     $Values='(';
                       for ($i=0; $i < count($Col); $i++) {
                           if($i == (count($Col))-1){
                             $Cols .="`$Col[$i]`";
                             $Values .="'$Value[$i]'";
                     }  else {
                             $Cols .="`$Col[$i]`,";
                             $Values .="'$Value[$i]',";
                                                         }
                   }
                             $Cols.=')';
                             $Values.=')';
                 $sql = mysqli_prepare($DB,"INSERT INTO $Table $Cols Values $Values ");
                 $sql->execute();
                 echo json_encode($sql);

               }
     public function Update($Table,$Col,$Value,$colm,$val){

                   $Culs=null;
                   $DB = $GLOBALS['DB'];
                   $Cols='';
                   $conditions='';
                     for ($i=0; $i < count($Col); $i++) {
                         if($i == (count($Col))-1){
                           $Cols .="`$Col[$i]`='$Value[$i]'";
                         }else {
                             $Cols .="`$Col[$i]`='$Value[$i]', ";
                   }
                   }

                   for ($i=0; $i < count($colm); $i++) {
                     if($i == (count($colm)) -1){
                     $conditions.="`$colm[$i]`= '$val[$i]'";
                     }else{
                     $conditions.="`$colm[$i]`='$val[$i]' and ";

                     }

                   }

                $sql = mysqli_prepare($DB,"UPDATE `$Table` SET $Cols WHERE $conditions " );

                $sql->execute();

                 echo json_encode("UPDATE `$Table` SET $Cols WHERE $conditions");
             }
       public function delete($Table,$Col,$Value){

                   $Culs=null;
                   $DB = $GLOBALS['DB'];
                   $Condi='(';
                     for ($i=0; $i < count($Col); $i++) {
                         if($i == (count($Col))-1){
                           $Condi .="`$Col[$i]` = '$Value[$i]'";
                   }  else {
                           $Condi .="`$Col[$i]` = '$Value[$i]' and ";

                                                 }
                 }
                   $Condi.=')';
              $sql = mysqli_prepare($DB,"Delete from `$Table` where    $Condi ");
                $sql->execute();
                 }
     public function GetData($table,$col='',$condi='',$value='',$extra=''){

             $DB = $GLOBALS['DB'];
             $conditions='(';
             for ($i=0; $i <count($condi) ; $i++) {
                   if ($i == count($condi) - 1) {
                     $conditions.= "`$condi[$i]` = '$value[$i]'";
                   }else {
                     $conditions.= "`$condi[$i]` = '$value[$i]' and  ";
                 }    }

                 $colones=null;
                 for ($j=0; $j <count($col) ; $j++) {
                       if ($j == count($col) - 1) {
                         $colones.= "`$col[$j]`";
                       }else {
                         $colones.= "`$col[$j]` ,";
                       }
                 }



               $conditions.=')';
             if($conditions == "(`` = '')" ){
              $sql = mysqli_prepare($DB,"Select $colones  from  `$table`   $extra  ");
              //echo "Select $colones  from  `$table` ";
             }else {
               //echo "Select $colones  from  `$table` ";

               $sql = mysqli_prepare($DB,"Select $colones  from  `$table` where $conditions  $extra  ");
             }

              $sql->execute();
              return $sql->get_result();


       }
     public function joinTables($table,$col='',$condi='',$value=''){
       $DB = $GLOBALS['DB'];
     $tables='';
       for ($j=0; $j <count($table) ; $j++) {
             if ($j == count($table) - 1) {
               $tables.= "`$table[$j]`";
             }else {
               $tables.= "`$table[$j]` ,";
             }
       }

       $conditions='';
       for ($i=0; $i <count($condi) ; $i++) {
             if ($i == count($condi) - 1) {
               $conditions.= "$condi[$i] = $value[$i]";
             }else {
               $conditions.= "$condi[$i] = $value[$i] and " ;
           }    }

           $colones=null;
           for ($j=0; $j <count($col) ; $j++) {
                 if ($j == count($col) - 1) {
                   $colones.= "$col[$j]";
                 }else {
                   $colones.= "$col[$j] ,";
                 }
           }

         $sql = mysqli_prepare($DB,"Select $colones  from  $tables where $conditions  ");

        $sql->execute();
         return $sql->get_result();



     }


     public function statistic($option,$table,$colone,$col,$condi){
         $DB = $GLOBALS['DB'];
         $conditions='(';
         for ($i=0; $i <count($col) ; $i++) {
               if ($i == count($col) - 1) {
                 $conditions.= "`$col[$i]` = '$condi[$i]'";
               }else {
                 $conditions.= "`$col[$i]` = '$condi[$i]' and";
             }    }
         $conditions.=')';
         if($conditions == "(`` = '')" ){
           $sql = mysqli_prepare($DB,"Select $option($colone)   from  `$table`  ");
         }else {
           $sql = mysqli_prepare($DB,"Select $option($colone)   from  `$table` where  $conditions ");
         }
           $sql->execute();
           return $sql->get_result();
       }
       public function Search($table,$col='',$condi='',$value='',$extra=''){

               $DB = $GLOBALS['DB'];
               $conditions='(';
               for ($i=0; $i <count($condi) ; $i++) {
                     if ($i == count($condi) - 1) {
                       $conditions.= "`$condi[$i]` like '%$value[$i]%'";
                     }else {
                       $conditions.= "`$condi[$i]` like '%$value[$i]%' or  ";
                   }    }

                   $colones=null;
                   for ($j=0; $j <count($col) ; $j++) {
                         if ($j == count($col) - 1) {
                           $colones.= "`$col[$j]`";
                         }else {
                           $colones.= "`$col[$j]` ,";
                         }
                   }



                 $conditions.=')';
               if($conditions == "(`` = '')" ){
                $sql = mysqli_prepare($DB,"Select $colones  from  `$table`   $extra  ");
           //   echo "Select $colones  from  `$table` ";
               }else {
             //    echo "Select $colones  from  `$table` where $conditions  $extra ";

                 $sql = mysqli_prepare($DB,"Select $colones  from  `$table` where $conditions  $extra  ");
               }

                  $sql->execute();
                return $sql->get_result();


         } public function pagination($nbr,$dataAll,$GlobalPage){

               $pagination="0";
               $allRow = mysqli_num_rows($dataAll);
               $pages = round($allRow / $nbr);

               $pagination =  $GlobalPage * $nbr ;

                 echo ' <ul class="pagination pagination-lg">';
               for ($i=0; $i < $pages ; $i++) {
                 if($GlobalPage == $i){

                   echo '<li  onclick="getPage('.$i.')"  class="active"><a  >  '.$i.'</a> </li>';

                 }else{
                 echo '<li><a onclick="getPage('.$i.')"  >  '.$i.'</a> </li>';
                 }
               }
                 echo '  </ul>';


               return $pagination.",".$nbr;


         }



         public function table($data ){


               $numFilds = mysqli_num_fields($data);
               echo '<input id="maxfilds" style="display:none" type="text" value="'.$numFilds.'">';

               echo'<table class="table"><thead><tr>';
                  $i = 0;
               while ( $fieldsName = mysqli_fetch_field($data)) {
                   $colones =  (array) $fieldsName;
                   if ($colones['name'] == 'id' ) {
                     echo '<th style="display:">  '.$colones['name'].' </th>';
                     echo '<input id="colones'.$i.'" style="display:none" type="text" value="'.$colones['name'].'">';

                   }
               else{
                     echo '<th>  '.$colones['name'].' </th>';
                     echo '<input id="colones'.$i.'" style="display:none" type="text" value="'.$colones['name'].'">';


                     }
                     $i = $i + 1 ;

                 }
                 echo '<input id="table" style="display:none" type="text" value="'.$colones['table'].'">';

                     echo '<th> Options </th>';
                     echo "  </tr></thead><tbody>  " ;

               while ($row = mysqli_fetch_row($data) ) {


                     echo '<tr>';
                       for ($i = 0; $i < $numFilds ; $i++) {

                         if($i == 0){
                           echo ' <td style="display"> '.$row[0].' <input style="display:none" id="'.$row[0].'.'.$i.'"  class="form-control" type="text"  value="'.$row[$i].'"></td> ';

                         }

                           else  {
                         echo ' <td>  <input id="'.$row[0].'.'.$i.'" class="form-control" type="text"  value="'.$row[$i].'"></td> ';

                       }
                     }

                        if($i == $numFilds){

                     echo ' <td style="width:101px;">
                               <button class="btn btn-info btn-sm" onclick="UpdateRows('.$row[0].')">
                              <i class="fas fa-edit"></i>
                             </button>
                             <button class="btn btn-danger btn-sm" onclick="DeleteRow('.$row[0].')">
                            <i class="fas fa-times"></i>
                           </button>
                           </td> ';


                 }

               }            echo '</tr> ';




                     echo'</tbody> </table>';



     }public function simpleTable($data){
       $numFilds = mysqli_num_fields($data);

       echo'<table class="table"><thead><tr>';
          $i = 0;
       while ( $fieldsName = mysqli_fetch_field($data)) {
           $colones =  (array) $fieldsName;
           if ($colones['name'] == 'id' ) {
             echo '<th style="display:none">  '.$colones['name'].' </th>';
             echo '<input id="colones'.$i.'" style="display:none" type="text" value="'.$colones['name'].'">';

           }else{
             echo '<th>  '.$colones['name'].' </th>';


             }
             $i = $i + 1 ;

         }
         echo '<input id="table" style="display:none" type="text" value="'.$colones['table'].'">';

             echo '<th> Livraison </th>';
             echo "  </tr></thead><tbody>  " ;

       while ($row = mysqli_fetch_row($data) ) {


             echo '<tr>';
               for ($i = 0; $i < $numFilds ; $i++) {

                 if($i == 0){
                   echo ' <td style="display:none">  <input id="'.$row[0].'.'.$i.'"  type="text"  value="'.$row[$i].'"></td> ';

                   }

                   else  {


                 echo ' <td>'.$row[$i].'</td> ';

               }
       }
         if($i == $numFilds){

             echo ' <td style="width:101px;">

                     <button class="btn btn-success" onclick="Livraison('.$row[0].')">
                     <i class="glyphicon glyphicon-ok"></i>
                   </button>
                   </td> ';


         }

       }            echo '</tr> ';




             echo'</tbody> </table>';



                     }

             public function modalsInputs($data){
               $numFilds = mysqli_num_fields($data);
               echo '<input id="maxfilds" style="display:none" type="text" value="'.$numFilds.'">';

              $i = 0;

              while ( $fieldsName = mysqli_fetch_field($data)) {
               $colones =  (array) $fieldsName;

               if($colones['name'] == "id"){
               echo'  <input  type="text" style="display:none" class="form-control" id="'.$colones['name'].'" > ' ;
               echo '<input id="table" style="display:none" type="text" value="'.$colones['table'].'">';


               }
               else if($colones['name'] == "date_expiration"){
                     echo'
                     <div class="form-group">
                     <label for="">'.$colones['name'].'</label>
                     <input  type="date" class="form-control" id="'.$colones['name'].'" >
                     </div>';
                 }else if ($colones['name'] == "image") {
                   echo'<div class="form-group">
                   <label for="">'.$colones['name'].'</label>
                   <form method="post" action="" enctype="multipart/form-data">

                     <input  type="submit" style="display:none" name="addphoto"  id="addphoto" >
                     <input  type="file" class="form-control" name="file-upload"  id="file-upload" >
                   </form>
                   </div>';            }


                 else{
                     echo'<div class="form-group">
                     <label for="">'.$colones['name'].'</label>
                     <input  type="text" class="form-control" id="'.$colones['name'].'" >

                     </div>';

               }




                 $i = $i + 1;
             }



       }public static  function UploadImage($fileName){
           $target_dir = "../assets/pic/";
           $imageName = $_FILES[$fileName]["name"];
           $target_name = basename($imageName);
           $target_file = $target_dir."".$target_name ;
           $uploadOk = 1;
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           $check = getimagesize($_FILES["file-upload"]["tmp_name"]);

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                 && $imageFileType != "gif" ) {
                 echo json_encode( "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>");
               return  $uploadOk = 0;
           }    if ($uploadOk == 0) {
                 echo  json_encode("Sorry, your file was not uploaded.<br>");
             return  $uploadOk = 0;


             } else {
                 if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
                     echo json_encode( "The file ".$imageName. " has been uploaded.<br>");

                 return  $uploadOk = 1;

                 } else {
                   echo json_encode( "Sorry, there was an error uploading your file.<br>");
                 return  $uploadOk = 0;

                 }
       }
           echo $uploadOk ;

         }

         public function login(){

           $data = $GLOBALS['dbhelper']->GetData('client',['*'],['email','password'],[$email,$password],'');
           $row = mysqli_fetch_assoc($data);

            if ( mysqli_num_rows($data) > 0) {



         }else if (mysqli_num_rows($data) < 0) {
           echo '
           <script>
         alert("erreur de connxion ");

           </script>
               ';

         }

         }



 }
