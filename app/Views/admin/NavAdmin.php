<link
    href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
<link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/StyleAdmin.css') ?>">

<div class="nav-project">


    <div class="header-nav">
        <img src="<?= base_url('public/img/acceuil/logocr.png') ?>" alt="" class="logo" id="logo">
        <div class="border"></div>
        <h1> Bienvenue sur L'admin Panel , <?php echo $Name  ?> !</h1>
        <div href="useradminctrl/adminlogout" class="btn-logout">
            <i class="fa-solid fa-power-off"></i>
            <a class="navbar"><?php echo anchor('useradminctrl/adminlogout', 'Déconnexion') ?></a>
        </div>
        
        
    </div>

    <div class="nav">
        <div class="list-contrat">
            <?php echo anchor('admin/home','Acceuil'); ?>
        </div>
        <div class="list-contrat">
            <a class="navbar">Contrat</a>
            <div class="arrow"></div>
            <div class="contrat-menu">
                <?php echo anchor('admin/contrats/1/null','Contrats en Attente'); ?>
                <?php echo anchor('admin/contrats/2/null','Contrats Assignés'); ?>
                <?php echo anchor('admin/contrats/3/null','Contrats Terminés'); ?>
            </div>
        </div>
        <div class="list-contrat">
            <a href="demande" class="navbar">Demandes</a>
            <div class="arrow"></div>
            <div class="contrat-menu">
                <?php echo anchor('admin/demandes/1/null','Demandes en Attente'); ?>
                <?php echo anchor('admin/demandes/2/null','Demandes Refusées'); ?>
                <?php echo anchor('admin/demandes/3/null','Demandes Signées'); ?>
                <?php echo anchor('admin/demandes/4/null','Demandes Acceptée'); ?>
                <?php echo anchor('admin/demandes/5/null','Demandes En cours'); ?>
            </div>
        </div>
        <div class="list-contrat">
            <?php echo anchor('admin/employe','Employés'); ?>
        </div>
    </div>

</div>


<style>
       


</style>

<!-- <ul>
            <li><a href="#" class="navbar">Accueil</a></li>

            <li><a href="#" class="navbar">Contrat</a></li>
            <ul>  
                <li><a href="#" class="navbar">Contrat en Attente</a></li>
                <li><a href="#" class="navbar">Contrat Actif</a></li>
                <li><a href="#" class="navbar">Contrat Finis</a></li>
            </ul>
          
            <li><a href="#" class="navbar">Demandes</a></li>
            <li><a href="#" class="navbar">Employés</a></li>
        </ul> -->