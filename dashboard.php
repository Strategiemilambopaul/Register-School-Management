<?php
 if(session_status() === PHP_SESSION_NONE) session_start();
    if($_SESSION['user']['statut']=="user") 
    {
        header("Location: index.php");
    } 
    require "Layourt/header.php";

    require "Controller/MainController.php";

    if(session_status() === PHP_SESSION_NONE) session_start();


    $request = new MainController();

    $eleves = $request->allEleves();

    if(isset($_GET) and isset($_GET['search']))
    {
        $eleves = $request->ElevesBySearch($_GET['search']);
    }
    
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
                    <h1 class="display-4 text-white animated zoomIn">Panel des controls</h1>
                    <a href="message.php" class="h5 text-white">Messages</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->




    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

   
    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Tableau de bord des élèves</h5>
                <h1 class="mb-0">Le tableau de bord contients les différents élèves ayant été inscris aux systèmes</h1>
            </div>
            <!-- <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Best In Industry</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Award Winning</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Professional Staff</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>24/7 Support</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                    </div>
                </div>
            </div> -->  
            <p class="text-white bg-primary text-center py-2 rounded fw-bold mb-2">Eleves Disponible : <span class="text-white bg-warning text-center py-2 px-2 rounded fw-bold mb-2"><?= count($eleves)?></span></p>

            <div>
                    <div class="mb-2 wow slideInUp" data-wow-delay="0.1s">
                    <form action="" method="GET">
                        <div class="input-group">
                           
                            <input type="search" class="form-control p-3" name="search"  placeholder="Rechercher un élève ..." style="max-width: 400px;">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                        </form>
                    </div>
                <!-- <form action="" method="GET">
                  <div class="form-group mb-2">
                    <input type="search" class="form-control w-50 mb-2" name="search">
                    <input type="submit" value="search" class="btn btn-primary">
                  </div>
                </form> -->
                <table class="table table-striped rounded">
                    <thead class="bg-primary text-white">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Eleves</th>
                        <th scope="col">Tuteurs</th>
                        <th scope="col">Classes</th>
                        <th scope="col">Options</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Nationalité</th>
                        <th scope="col">Voir plus.</th>
                        <th scope="col">Etat de l'Inscription.</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($eleves as $k=>$eleve):?>
                            
                        <tr>
                            <th scope="row"><?= $k + 1?></th>
                            <td><?= $eleve['nom']?></td>
                            <td><?= $eleve['responsable']?></td>
                            <td><?= $eleve['classe']?></td>
                            <td><?= $eleve['options']?></td>
                            <td><?= $eleve['genre']?></td>
                            <td><?= $eleve['nationalite']?></td>
                            <td><a href="student.php?eleve=<?=$eleve['id']?>" class='bg-primary text-white rounded fw-bold'>  <i class="far fa-eye text-white px-2"></i></a></td>
                            
                            <td>
                                <?php if($eleve['inscription'] == "valider"):?>
                                    <span class='bg-success text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalInfo"> Valide <i class="fa fa-check text-white"></i></span>  

                                <?php elseif($eleve['inscription'] =="Refuser"):?>

                                    <span class='bg-danger text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalDelete"> Annuler <i class="fa fa-trash text-white"></i></span>  
                                <?php else:?>
                                    <span  class='bg-warning text-white rounded fw-bold py-1 px-1' data-bs-toggle="modal" data-bs-target="#exampleModalDelete"> En attente ... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>  

                                <?php endif?>
                            </td>
                            
                           
                            
                        </tr>

                        
                               
                        <?php endforeach?>
                       
                        
                    </tbody>
                   
                </table>
                        <?php if(count($eleves)== 0):?>
                                <tr class="text-center mb-2">
                                    <center> 
                                        <span class="text-white bg-warning text-center py-2 px-2 rounded fw-bold mb-2">Aucun elève n'a été trouvé après votre recherche 😥 disponible</span>
                                    </center>
                                </tr>
                        <?php endif?>
            </div>
        </div>
    </div>
    <!-- Features Start -->


   <!-- Button trigger modal -->



    

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>