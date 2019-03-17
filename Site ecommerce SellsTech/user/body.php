<?php
      require_once '../assets/php/DBHelper.php';
      $helper = new DBHelper;

      if(!isset($_SESSION["email"]) ){
         $_SESSION["id_client"] = 0;
      }

    //  echo $_SESSION["id_client"];

      if(isset($_POST["submit"])){
        $GLOBALS['page']  = $_POST["number"];
      }else {
        $GLOBALS['page'] = '0';
      }




        if(isset($_GET['search'])){

            $dataAll = $helper -> Search('article',['*'],['nom_article','prix_article','marque'],
            [$_GET['search'],$_GET['search'],$_GET['search']],'group by id ');
            $pages = $helper -> pagination(6,$dataAll,$GLOBALS['page']  );

            $data = $helper -> Search('article',['*'],['nom_article','prix_article','marque'],
            [$_GET['search'],$_GET['search'],$_GET['search']],'group by id asc  limit '.$pages.'');

        }else if(!isset($_GET['categ'])){
            $dataAll = $helper -> GetData('article',['*'],[''],[''],'group by id asc ');
            $pages = $helper -> pagination(6,$dataAll,$GLOBALS['page']);

            $data = $helper -> GetData('article',['*'],[''],[''],'group by id asc  limit '.$pages.'');

        }else if(isset($_GET['categ'])  && $_GET['categ']=="all" ){
            $dataAll = $helper -> GetData('article',['*'],[''],[''],'group by id asc  ');
            $pages = $helper -> pagination(6,$dataAll,$GLOBALS['page']);

            $data = $helper -> GetData('article',['*'],[''],[''],'group by id asc  limit '.$pages.' ');

        } else{
            $dataAll = $helper -> GetData('article',['*'],['categ'],[$_GET['categ']],'group by id asc  ');
            $pages = $helper -> pagination(6,$dataAll,$GLOBALS['page']);
            $allRow = mysqli_num_rows($dataAll);

            $data = $helper -> GetData('article',['*'],['categ'],[$_GET['categ']],'group by id asc limit '.$pages.'   ');

        }



 ?>


<div class="boxes">
</body>

      <div class="container-fluid bg-3 text-center">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <?php
          echo '  <input style="display:none" id="id_client" type="text"  value="'.$_SESSION["id_client"].'"> ';



            while ($row = mysqli_fetch_assoc($data) ) {



                echo '    <div class="col-sm-2">
                      <div class="card">
                        <img src="../assets/pic/'.$row['image'].'" class="img-responsive"  alt="Image">
                        <div class="card-body">

                  <h5  >'.$row['nom_article'].'  '.$row['marque'].' </h5>
                  <h5 >prix : '.$row['prix_article'].'('.$row['vendus'].') </h5>

                        <input style="display:none" id="prix'.$row['id'].'" type="text" value="'.$row['prix_article'].'">

                        '; for ($i=0; $i < $row['rate'] ; $i++) {
                        echo '   <span class="fa fa-star checked"></span>' ;
                      }for ($i=$row['rate']; $i <5 ; $i++) {
                        echo '   <span class="fa fa-star "></span>' ;
                      }



                         echo'
                <button id="Panierbtn"  type="button " class="btn btn-danger" onclick="addCart('.$row['id'].' )" ><span class="glyphicon glyphicon-shopping-cart"></span> </button>
                      </div>

                    </div>
                  </div>';

            }




             ?>


             <form style="display:none" action="" method="post">
               <input id="p1" type="text" name="number" value="0">
               <input id="submit" type="submit" name="submit" >
             </form>


            </div>
          </div>
  </div>
</div>

<script>

  function getPage(page){


    document.getElementById("p1").value = page;
    document.getElementById("submit").click();


    console.log(page);

  }

</script>
<style media="screen">

</style>
