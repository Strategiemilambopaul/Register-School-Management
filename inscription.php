<?php
    require "Layourt/header.php";
?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Contact</a>
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


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+012 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email to get free quote</h5>
                            <h4 class="text-primary mb-0">info@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our office</h5>
                            <h4 class="text-primary mb-0">123 Street, NY, USA</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="bg-light rounded p-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">FORMULAIRE D'INSCRIPTION</h3>
                    </div>
                    <form class="row g-3" method="POST" action="">
                        <div class="bg-primary d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                            INFORMATION SUR L'ELEVE
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefault01" class="form-label">NOM</label>
                          <input type="text" class="form-control" name="nom" id="validationDefault01" placeholder="Nom" required>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefault02" class="form-label">POST-NOM</label>
                          <input type="text" class="form-control" id="validationDefault02" name="postnom" placeholder="Post Nom"  required>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefaultUsername" class="form-label">PRE-NOM</label>
                          <div class="input-group">
                            <!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
                            <input type="text" class="form-control" id="validationDefaultUsername" name="Prenom"  placeholder="Pre Nom" aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefault01" class="form-label">Lieu de naissance</label>
                          <input type="text" class="form-control" name="lieu_nais" id="validationDefault01" placeholder="Lieu de naissance" required>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefault02" class="form-label">Date de naissance</label>
                          <input type="date" class="form-control" id="validationDefault02" name="date_nais" placeholder="Date de naissance"  required>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefaultUsername" class="form-label">Nationalité</label>
                          <div class="input-group">
                            <!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
                            <input type="text" class="form-control" id="validationDefaultUsername" name="nationalite"  placeholder="Nationalité" aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefaultUsername" class="form-label mx-3">Genre : </label>

                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="genre" value="masculin" id="flexRadioDefault1" checked>
                                <label class="form-check-label" name="genre" for="flexRadioDefault1">
                                 Masculin
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="genre" value="féminin"  id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Féminin
                                </label>
                              </div>

                        </div>
                        <div class="bg-primary d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                            RESPONSABLE DE L'ELEVE
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefaultUsername" class="form-label mx-3">Responsable : </label>

                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" value="père" name="responsable" id="flexRadioDefault1" checked>
                                <label class="form-check-label" name="genre" for="flexRadioDefault1">
                                 Père
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="responsable" value="mère"   id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Mère
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="responsable" value="tuteur"  id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Tuteur
                                </label>
                              </div>

                        </div>
                        <div class="bg-primary d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                            INFORMATION SCOLAIRE D'INSCRIPTION
                        </div>
                        <div class="col-md-3">
                          <label for="validationDefault03" class="form-label">Classe</label>
                          <select class="form-select" id="validationDefault04" required>
                            <option selected disabled value="">Classe d'inscription</option>
                            <option>...</option>
                          </select>                        
                        </div>
                        <div class="col-md-3">
                          <label for="validationDefault04" class="form-label">Option</label>
                          <select class="form-select" id="validationDefault04" required>
                            <option selected disabled value="">Option choisie</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="validationDefault05" class="form-label">Ecole de provenance</label>
                          <input type="text" class="form-control" id="validationDefault05" name="ancienne_ecole" placeholder="Ancienne Ecole" required>
                        </div>
                        <div class="bg-primary d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                            DOCUMENTS A FOURNIR
                            
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault05" class="form-label">Certificat</label>
                            <input type="file" class="form-control" id="validationDefault05" name="certificat" placeholder="Certificat" required>
                        </div>
                       
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                              Agree to terms and conditions
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                      </form>
                </div>
                
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">AUTRES DOCUMENTS</h3>
                        </div>

                        <form class="row g-3">
                            <div class="bg-primary d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                                BULLETIN SCOLAIRES POUR LES CLASSES ANTERIEURES
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault01" class="form-label">7 ème</label>
                              <input type="file" class="form-control" id="validationDefault01" value="Mark" required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault02" class="form-label">8 ème</label>
                              <input type="file" class="form-control" id="validationDefault02" value="Otto" required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault01" class="form-label">1 ème</label>
                              <input type="file" class="form-control" id="validationDefault01" value="Mark" required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault02" class="form-label">2 ème</label>
                              <input type="file" class="form-control" id="validationDefault02" value="Otto" required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault01" class="form-label">3 ème</label>
                              <input type="file" class="form-control" id="validationDefault01" value="Mark" required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault02" class="form-label">4 ème</label>
                              <input type="file" class="form-control" id="validationDefault02" value="Otto" required>
                            </div>
                           
                            <div class="col-12">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                          </form>
                    </div>
                </div>
               

            </div>
        </div>
    </div>
    <!-- Contact End -->


   
    

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>