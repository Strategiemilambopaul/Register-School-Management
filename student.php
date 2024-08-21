<?php

if(session_status() === PHP_SESSION_NONE) session_start();

 
require "Controller/MainController.php";
   
    $request = new MainController();

    $documents = [];

    
    if(isset($_GET) and isset($_GET['eleve'])){
        $id = (int)$_GET['eleve'];
        $eleve = $request->eleveInformation($id);
        
       $documents = $request->getDocument($id);
    }
    else{
        header('Location: dashboard.php');
    }
    if(isset($_POST) and isset($_POST['id']))
    {
        $id=(int)$_POST['id'];
        $result=$request->AdmireEleve($_POST['id']);
    }
    if(isset($_POST) and isset($_POST['del']))
    {
        $id=(int)$_POST['del'];
        $resultDelete=$request->DeleteEleve($_POST['del']);
    }
    

    if(!$eleve){

        header('Location: dashboard.php');
    }
    require "Layourt/header.php";
   
   
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
                    <h1 class="display-4 text-white animated zoomIn">Panel Utilisateur</h1>
                    <a href="index.php" class="h5 text-white">Acceuil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Utilisateur</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <?php if(isset($result) and $result="valide"):?>
       <center>
       <span class=" btn btn-success py-2 px-2 w-50 text-white text-center fw-bold mb-2">
            L'élève a été admis avec succès!😊
        </span>
       </center>
    <?php endif ?>
    <?php if(isset($resultDelete) and $resultDelete="annuler"):?>
       <center>
       <span class=" btn btn-danger py-2 px-2 w-50 text-white text-center fw-bold mb-2">
            L'élève n'a pas  été admis au sein de l'établissement!😥
        </span>
       </center>
    <?php endif ?>

  
                        
                            <div class="bg-primary">
                            <p class=" d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                                INFORMATION SUR L'ELEVE VEUILLEZ CONSULTER LES DIFFERENTS DOCUMENTS FOURNIS.
                               <center> <hr class="w-50 text-center text-light"></center>
                            </p>
                        
                        
                        <center>
                        <p class=" d-flex align-items-center text-light text-small justify-content-center rounded py-3">
                                Les documnents word ne seront pas directement lus dans le site, Veuillez le télécharger premièrement pour ainsi le traiter en local.
                                Mais pour le document Pdf, vous pouviez directement le consulter dans le site.
                            </p>
                        </center>
                        </div>
                        <?php if(is_null($eleve['inscription'])):?>
                        <div>
                            <center>
                            <a href="#" class='bg-success text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalInfo"> Valide <i class="fa fa-check text-white"></i></a>  
                            <a href="#" class='bg-danger text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalDelete"> Annuler <i class="fa fa-trash text-white"></i></a>  
                            </center>
                        </div>
                        <?php else :?>
                            <center>
                                <span class="bg-warning text-white rounded fw-bold py-1 px-1"> L'inscription de l'élève a déjà été <span class="text-dark fw-bold"><?= $eleve['inscription']?></span></span>

                            </center>
                        <?php endif?>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Information de la validation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Avant de valider cette inscription rassurez-vous que toutes les informations sur l'élève sont correctes ainsi qu'il a eu à fournir tous les documents possibles.
                                    D'où L'élève <span class="text-dark fw-bold"><?=$eleve['nom']?></span> est admis en classe de <span class="text-dark fw-bold"><?= $eleve['classe']?></span>
                                </div>
                                <div class="modal-footer">
                                <a href="student.php?eleve=<?=$eleve['id']?>" class='bg-warning text-white rounded fw-bold py-2 px-2'>Revoir  <i class="far fa-eye text-white px-2"></i></a>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?=$eleve['id']?>">
                                        <button type="submit" class="btn btn-primary">Admettre</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Information Sur L'annulation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    En annulant cette inscription, l'élève ne poura pas être admis au sein de votre établissemnt. Voulez-vous annuler l'inscription
                                    de l'élève <span class="text-dark fw-bold"><?=$eleve['nom']?></span> dans la classe de <span class="text-dark fw-bold"><?= $eleve['classe']?></span> ?
                                </div>
                                <div class="modal-footer">
                                <a href="student.php?eleve=<?=$eleve['id']?>" class='bg-warning text-white rounded fw-bold py-2 px-2'>Revoir  <i class="far fa-eye text-white px-2"></i></a>
                                    <form action="" method="POST">
                                        
                                        <input type="hidden" name="del" value="<?=$eleve['id']?>">
                                        <button type="submit" class="btn btn-danger">Annuler</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="section-title section-title-sm position-relative pb-3 ">
                                    <h3 class="mb-0">Documents Fournis</h3>
                                </div>
                    <div class="g-5">
                    <?php

                        $ext = substr($eleve['certificat'], -3);

                        if($ext=="pdf"):?>
                            <p class="text-primary fw-bold my-2">Certificat Fournis</p>

                        <iframe src="<?=$eleve['certificat']?>" width="600" height="400" type="application/pdf"></iframe>

                        <?php else:?>
                        
                            <p class="text-primary fw-bold my-2">Certificat Fournis</p>
                            <a href="<?=$eleve['certificat']?>" class="btn btn-warning mb-2 mt-2"> <i class="fa fa-download text-primary"></i>  <?=$eleve['certificat']?></a>
                        <?php endif?>
                        <?php foreach($documents as $document):?>
                        <div class="col-md-12 wow slideInUp" data-wow-delay="0.1s">
                            <!-- <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="img/blog-1.jpg" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                                </div>
                                <div class="p-4">

                                </div>
                            </div> -->
                            <hr>
                           <?php

                            $ex = substr($document['doc_path'], -3);

                            if($ex=="pdf"):?>
                                <p class="text-primary fw-bold">Bulletins Pdf, à télécharger pour la lecture</p>
                           
                            <iframe src="<?=$document['doc_path']?>" width="600" height="400" type="application/pdf"></iframe>
                            
                            <?php else:?>
                               
                                <p class="text-primary fw-bold">Bulletins Word, à télécharger pour la lecture</p>
                                <a href="<?=$document['doc_path']?>" class="btn btn-warning mb-2 mt-2"> <i class="fa fa-download text-primary"></i>  <?=$document['doc_path']?></a>
                            <?php endif?>
                        </div>

                        <?php endforeach?>
                        
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                   
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Informations sur l'élève</h3>
                        </div>
                      

                        <div class="link-animated d-flex flex-column justify-content-start">

                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Nom: <?= $eleve['nom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Post Nom: <?= $eleve['postnom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pre Nom: <?= $eleve['prenom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Date de Naissance : <?= $eleve['date_nais']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Lieu de Naissance<?= $eleve['lieu_nais']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Adresse : <?= $eleve['adresse']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Nationalité: <?= $eleve['nationalite']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Numéro: <?= $eleve['tel']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Responsable : <?= $eleve['responsable']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Option : <?= $eleve['options']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Promotion : <?= $eleve['classe']?> Année</a>
                           
                        </div>
                    </div>
                    <!-- Category End -->
    
    
                  
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


   

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>