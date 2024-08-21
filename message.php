<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if(!isset($_SESSION['user']['nom']) || $_SESSION['user']['statut']=="user") 
    {
        header("Location: index.php");
    }  
   
    require "Controller/MainController.php";

    if(session_status() === PHP_SESSION_NONE) session_start();
 


    $request = new MainController();

    $contacts = $request->allContacts();

    if(isset($_GET) and isset($_GET['search']))
    {
        $contacts = $request->ContactBySearch($_GET['search']);
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
                    <h1 class="display-4 text-white animated zoomIn">Panel des controls</h1>
                    <a href="message.php" class="h5 text-white">Message</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="dashboard.php" class="h5 text-white">Dashboard</a>
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
                <h5 class="fw-bold text-primary text-uppercase">Tableau de bord des contacts</h5>
                <h1 class="mb-0">Le tableau de bord contients les différents préoccupations ayant été envoyées par les utilisateurs</h1>
            </div>

            <p class="text-white bg-primary text-center py-2 rounded fw-bold mb-2">Message Disponible : <span class="text-white bg-warning text-center py-2 px-2 rounded fw-bold mb-2"><?= count($contacts)?></span></p>

            <div>
                    <div class="mb-2 wow slideInUp" data-wow-delay="0.1s">
                    <form action="" method="GET">
                        <div class="input-group">
                           
                            <input type="search" class="form-control p-3" name="search"  placeholder="Rechercher un Message ..." style="max-width: 400px;">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                        </form>
                    </div>
        
                <table class="table table-striped rounded">
                    <thead class="bg-primary text-white">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Utilisateurs</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Message</th>
                       
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contacts as $k=>$contact):?>
                            
                        <tr>
                            <th scope="row"><?= $k + 1?></th>
                            <td><?= $contact['user']?></td>
                            <td><?= $contact['email']?></td>
                            <td><?= $contact['suject']?></td>
                            <td><?= $contact['content']?></td>
                            
                            
                        </tr>

                        
                               
                        <?php endforeach?>
                       
                        
                    </tbody>
                   
                </table>
                        <?php if(count($contacts)== 0):?>
                                <tr class="text-center mb-2">
                                    <center> 
                                        <span class="text-white bg-warning text-center py-2 px-2 rounded fw-bold mb-2">Aucun message n'a été trouvé 😥 </span>
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