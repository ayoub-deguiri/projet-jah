<?php
session_start();
if(!isset($_SESSION['Role']))
    {
        header("location:login.php");
    }
?>
<?php
    include ('../db/db.php');
	$pdo_statement = $pdo_conn->prepare("SELECT * FROM formation");
    
	$pdo_statement->execute();
	$mesformations = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

 
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Formations </title>
    <link rel="stylesheet" href="./assets/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  bootstrap links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- start  slide bar-->
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-dashboard icon'></i>
            <div class="logo_name">Ecole Jah Informatique </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul  class="nav-list">
            <li>
                <a href="acceuil.html">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Acceuil</span>
                </a>
                <span class="tooltip">Acceuil</span>
            </li>
            <li >
                <a href="inscription.html">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="links_name">Inscriptions</span>
                </a>
                <span class="tooltip">Inscriptions</span>
            </li>
            <li class="NavSelect">
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
                        <div class="name">Prem Shahi</div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>

    <!-- end slide bar-->

    <!-- start home section-->
    <section class="home-section">
        <div class="text">Bonjour Mr 
        <?php
            echo $_SESSION['Nom']." ".$_SESSION['Prenom'];
        ?> 
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 chit-chat-layer1-left">
                <div class="work-progres">
                    <div class="chit-chat-heading">Manage Formations</div>
                    <div class="filtrage">
                        <div class="select">
                            <label for="select"> Choisir Type </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom de Formation </th>
                                    <th>Type</th>
                                    <th colspan="2">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php
                                foreach($mesformations as $formation)
                                {
                                ?>
                                <tr>
                                    <td><?= $formation['Id'] ?></td>
                                    <td><?= $formation['Nom'] ?></td>
                                    <td><?= $formation['type'] ?></td>
                                    <td>
                                    
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>

                                    </tr>
                                <?php
                                            }
                                        ?>
                               <!-- <tr>
                                    <td>1</td>
                                    <td>Presse et Média الصحافة والاعلام</td>
                                    <td>formation</td>
                                    <td>
                                       
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Professeurs de l'Education Physique et Sportive (EPS) تكوين اساتذة التربية البدنية</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Préparateur Physique مـعــد بـدني</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Secourisme الاسعافات الاولية</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Engins de Chantiers الات الحفر والشحن والرافعات الشوكية</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Modéliste et Styliste مجال الازياء الفصالة والخياطة</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Pâtisserie Confiserie et Chocolaterie الحلويات</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>الحجامة العصرية والعلاج الناري</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>Langues Vivantes</td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 10 </td>
                                    <td>Cours Supplémentaires dans toutes les matières </td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 11 </td>
                                    <td>Gestion </td>
                                    <td>formation</td>
                                    <td>
                                        <button class="btn-actions"> <i class='bx bx-pencil' data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button class="btn-actions"><i class='bx bx-trash-alt' ></i></button>
                                        </i>
                                    </td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
    <!-- end  home section-->

    <!-- Modal
    -->
    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nom Formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-body02">
          <input type="text" id="Nom-formation">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">retour</button>
          <button type="button" class="btn btn-primary">modifier</button>
        </div>
      </div>
    </div>
  </div>

    <script src="./assets/script.js"></script>
</body>

</html>