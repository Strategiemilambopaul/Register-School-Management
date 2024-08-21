<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if(!isset($_SESSION) and !isset($_SESSION['user'])){
        header('Location: Auth/index.php');
    }
    require "Layourt/header.php";
    require "Controller/MainController.php";

  
    if(session_status() === PHP_SESSION_NONE) session_start();

    $request = new MainController();

    $id = $_SESSION['user']['id'];

    $eleves = $request->getInformationByParent($id);
    
    
?>
<style>
    .bg-header {
    background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url(img/el3.jpg) center center no-repeat;
    background-size: cover;
}
</style>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">A propos</h1>
                    <a href="index.php" class="h5 text-white">Acceuil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">Résultat</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

             <div class="bg-success">
                            <p class=" d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                                😊RESULTAT D'INSCRIPTION😊
                               <center> <hr class="w-50 text-center text-light"></center>
                            </p>
                        
                        
                        <center>
                            <p class=" d-flex align-items-center text-light text-small justify-content-center rounded py-3">
                                Merci, pour le choix que vous nous avez offert, pour les incriptions de vos différents enfants. 
                                Ainsi veuillez voir les élèves qui ont été admis au sein de l'établissement, et pour les non admins veuillez tenter l'année prochaine.
                            </p >
                        </center>
                        </div>
                         <center>
                    <div>
                        <table class="table table-striped rounded">
                         <thead class="bg-primary text-white">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Eleves</th>
                        <th scope="col">Post Nom</th>
                        <th scope="col">Classes</th>
                        <th scope="col">Options</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Nationalité</th>
                        <th scope="col">Information sur l'inscription</th>
                       
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($eleves as $k=>$eleve):?>
                            
                            <tr>
                                <th scope="row"><?= $k + 1?></th>
                                <td><?= $eleve['nom']?></td>
                                <td><?= $eleve['postnom']?></td>
                                <td><?= $eleve['classe']?></td>
                                <td><?= $eleve['options']?></td>
                                <td><?= $eleve['genre']?></td>
                                <td><?= $eleve['nationalite']?></td>
                                
                                <td>
                                    <?php if($eleve['inscription'] == "valider"):?>
                                        <span class='bg-success text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalInfo"> A été Admis <i class="fa fa-check text-white"></i></span>  

                                    <?php elseif($eleve['inscription'] =="Refuser"):?>

                                        <span class='bg-danger text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalDelete"> N'a pas été admis <i class="fa fa-trash text-white"></i></span>  
                                    <?php else:?>
                                        <span  class='bg-warning text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalDelete"> En attente ... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>  

                                    <?php endif?>
                                </td>
                                
                            
                                
                            </tr>
     
                        <?php endforeach?>
                       
                        
                    </tbody>
                   
                </table>
                        </div>
                        </center>

   

 


  
    

<?php
    require "Layourt/footer.php"
?>