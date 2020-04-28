<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Carbone restaurant</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header" style="background-color: #588d9b">
      <div class="header-left">
        <a href="index-2.html" class="logo">
          <span>Carbone Restaurant</span>
        </a>
      </div>
      <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                      <span class="avatar">
                        <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
                      </span>
                      <div class="media-body">
                        <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                      </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                      <span class="avatar">V</span>
                      <div class="media-body">
                        <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                      </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                      <span class="avatar">L</span>
                      <div class="media-body">
                        <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                      </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                      <span class="avatar">G</span>
                      <div class="media-body">
                        <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                      </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                      <span class="avatar">V</span>
                      <div class="media-body">
                        <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                        <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                      </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
              <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
              <span class="status online"></span>
            </span>
            <span>Admin</span>
                    </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="">Mon Profil</a>
            <a class="dropdown-item" href="edit-profile.html">modifier votre profil</a>
            <a class="dropdown-item" href="settings.html">parametres</a>
            <a class="dropdown-item" href="index.php">se deconnecter</a>
          </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">Mon Profil</a>
                    <a class="dropdown-item" href="edit-profile.html">modifier Profil</a>
                    <a class="dropdown-item" href="settings.html">parametres</a>
                    <a class="dropdown-item" href="login.html">se deconnecter</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        
                        <li class="submenu">
                          <a href="#"><i class="fa fa-user"></i> <span> Clients </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="listeClient.php">liste client</a></li>
                            <li><a href="leaves.html">ajouter client</a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-product-hunt" ></i> <span> Produits </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="listeProd.php"> liste produit</a></li>
                            <li><a href="ajouterProduit.php">ajouter Produit</a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-cubes" ></i> <span> Categories </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="afficherCategorie.php">liste categories</a></li>
                            <li><a href="ajouterCategorie.php"> ajouter categorie </a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-book"></i> <span> Commandes </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="salary.html">liste commandes</a></li>
                            <li><a href="salary-view.html"> suivi commandes </a></li>
                          </ul>
                        </li>
                        <li class="submenu" id="promo">
                          <a href="#"><i class="fa fa-map" ></i><span class="promo"> Promotions </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="listePromo.php">liste promotions</a></li>
                            <li><a href="ajouterPromo.php"> ajouter promotion </a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-shopping-basket" ></i> <span> Panier </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="salary.html">liste panier</a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-money"></i> <span> Paiement </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="salary.html">liste paiement</a></li>
                            <li><a href="salary-view.html"> ajouter paiement </a></li>
                          </ul>
                        </li>
                        <li class="submenu">
                          <a href=""><i class="fa fa-commenting"></i><span> Reclamations </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="listeReclam.php">liste reclamations</a></li>
                          </ul>
                        </li>
                        <li>
                            <a href="chat.html"><i class="fa fa-comments"></i> <span>Chat</span></span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html">Nouveau Mail</a></li>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="mail-view.html">Mail View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                          <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li><a href="expense-reports.html"> Expense Report </a></li>
                            <li><a href="invoice-reports.html"> Invoice Report </a></li>
                          </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatables.html">Data Table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendrier</span></a>
                        </li>
                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="change-password2.html"> Change Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                                <li><a href="profile.html"> Profile </a></li>
                                <li><a href="gallery.html"> Gallery </a></li>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>



</html>