<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Acceuil </title>
  <link rel="stylesheet" href="./assets/style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  bootstrap links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<body>

  <!-- start  slide bar-->
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-dashboard icon'></i>
      <div class="logo_name">Ecole Jah Informatique </div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li class="NavSelect">
        <a href="acceuil.html">
          <i class='bx bx-home'></i>
          <span class="links_name">Acceuil</span>
        </a>
        <span class="tooltip">Acceuil</span>
      </li>
      <li>
        <a href="inscription.html">
          <i class='bx bx-book-bookmark'></i>
          <span class="links_name">Inscriptions</span>
        </a>
        <span class="tooltip">Inscriptions</span>
      </li>
      <li>
        <a href="formation.html">
          <i class='bx bx-chat'></i>
          <span class="links_name">Formations</span>
        </a>
        <span class="tooltip">Formations</span>
      </li>
      <li>
        <a href="modifierNombres.html">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Modifier Nombres</span>
        </a>
        <span class="tooltip">Modifier Nombres</span>
      </li>
      <li>
        <a href="gererimages.html">
          <i class='bx bx-images'></i>
          <span class="links_name">Gestion Des Images</span>
        </a>
        <span class="tooltip">Gestion Des Images</span>
      </li>
      <li>
        <a href="gererComptes.html">
          <i class='bx bx-user'></i>
          <span class="links_name">Gestion Des Comptes</span>
        </a>
        <span class="tooltip">Gestion Des Comptes</span>
      </li>
      <li>
        <a href="modifierProfile.html">
          <i class='bx bx-cog'></i>
          <span class="links_name">Modifier Profile</span>
        </a>
        <span class="tooltip">Modifier Profile</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <img src="../images/homme-daffaire.png" alt="profileImg">
          <div class="name_job">
            <div class="name">Jamal Nouiti</div>
            <div class="job">Super Admin</div>
          </div>
        </div>
        <i class='bx bx-log-out' id="log_out"></i>
      </li>
    </ul>
  </div>

  <!-- end slide bar-->

  <!-- start home section-->
  <section class="home-section">
    <div class="text">Espace <?php echo $_SESSION["Role"]." : Bonjour ". $_SESSION['Nom'].' '.$_SESSION['Prenom']; ?> </div>
    <div class="row row-container">
      <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="row">
          <div class="col-md-8 market-update-left">
            <h3>13</h3>
            <h4>inscriptions  de ce mois</h4>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-eye"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
        </div>
      </div>
      <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
          <div class="row">
          <div class="col-md-8 market-update-left">
            <h3>3</h3>
            <h4>inscriptions quotidiens</h4>
            
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-eye"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 chit-chat-layer1-left">
        <div class="work-progres">
            <div class="chit-chat-heading"></div>
            <div class="filtrage">
                <div class="select">
                    <label for="select"> Type Formation</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="date">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" />
                </div>
            </div>

        <?php
                include('../db/db.php');
                $pdo_statement = $pdo_conn->prepare("select * from inscription");
                $pdo_statement->execute();
                $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($result))
                {
                        echo '
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Nom Complet</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Type De Choix </th>
                                    <th>Details</th>
                                    <th colspan="2">action</th>
                                </tr>
                            </thead>
                            <tbody>';
                  foreach($result as $row)
                          {
                              echo '<tr>
                                          <td>' .$row["Id"]. '</td>
                                          <td>' .$row["Id"]. '</td>
                                          <td>' .$row["NomComplete"]. '</td>
                                          <td>' .$row["Tele"]. '</td>
                                          <td>' .$row["Email"]. '</td>
                                          <td>' .$row["TypeFormation"]. '</td>
                                          <td>
                                              <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                  data-bs-target="#exampleModal">
                                                  details
                                              </button>
                                          </td>
                                          <td>
                                          <button class="btn-actions"> <i class="bx bxs-user-check"></i></button>
                                          </td>
                                          <td>
                                            <button class="btn-actions"><i class="bx bxs-trash-alt"></i></button>
                                          </td>
                                  </tr>';
                          }
                  echo '</tbody>
                  </table>
              </div>' ;
                }
        ?>
        </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  </section>
  <!-- end  home section-->
   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                      details d' inscription
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <table class="table table-hover">
                      <tbody>
                          <tr>
                              <th>Nom Complet</th>
                              <td>test test</td>
                          </tr>
                          <tr>
                              <th>CIN</th>
                              <td>ee670894</td>
                          </tr>
                          <tr>
                              <th>Adresse</th>
                              <td>loudaya city</td>
                          </tr>
                          <tr>
                              <th>Telephone</th>
                              <td>066578945</td>
                          </tr>
                          <tr>
                              <th>Email</th>
                              <td>vodka@gmail.com</td>
                          </tr>
                          <tr>
                              <th>Niveau Scolaire</th>
                              <td>bdoun</td>
                          </tr>
                          <tr>
                              <th>Type</th>
                              <td>formation</td>
                          </tr>
                          <tr>
                              <th>Le Choix</th>
                              <td>choix choix xhoix 1</td>
                          </tr>
                          <tr>
                              <th>Date</th>
                              <td>22/11/2002</td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="photos">
                      <img src="../images/diplome/LICENCE.jpg" alt="" id="img" />
                      <img src="../images/diplome/LICENCE.jpg" alt="" id="img" />
                      <img src="../images/diplome/LICENCE.jpg" alt="" id="img" />
                      <img src="../images/diplome/LICENCE.jpg" alt="" id="img" />
                      <img src="../images/diplome/LICENCE.jpg" alt="" id="img" />
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                    retour
                  </button>
              </div>
          </div>
      </div>
  </div>

  <script src="./assets/script.js"></script>

</body>

</html>