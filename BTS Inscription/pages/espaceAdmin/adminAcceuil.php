<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["adminID"])){
  header("location:adminlogin.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
  <?php include("../../components/adminheader.html") ?>
  <title>Administration</title>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include("../../components/adminnav.php") ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-2"><?=countCandidats()?></h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Candidats inscrits</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-2"><?=countAdmin()?></h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Admins/Rédacteurs</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-2"><?=countArticles()?></h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Articles soumis</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-2"><?php if($countDays>=0) echo $countDays; else echo "0" ?></h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Jours restants avant fin des candidatures</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Derniers Articles</h4>
                    <?php   $result=getArticles(); ?>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"><?=$row['titre']?></h6>
                        <p class="text-muted mb-0">Par <?=$row['nomComplet']?> <br> <?=$row['date']?></p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">
                            <?=($row['date']==1)? "Acceuil":"Anonces";?>
                        </h6>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Dernières Candidatures</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                        <?php $result =lastCandidatures();
                        while($row=mysqli_fetch_assoc($result)) { ?>
                          <div class="preview-item border-bottom">
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject"><?=$row['codeMassar']?> | <?=$row['nom']?> <?=$row['prenom']?></h6>
                                <p class="text-muted mb-0">Bac <?=$row['typeBac']?></p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted"><?=$row['date']?></p>
                                <p class="text-muted">Moyenne : <?=$row['moyenneBac']?></p>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <?php include("../../components/adminnav.php") ?>
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <?php include("../../components/credits.html")?>
          </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include("../../components/adminjs.html");?>
  </body>
</html>