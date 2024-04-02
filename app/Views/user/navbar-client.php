<!-- HEADER DEBUT -->
<header>
    <div class="container">
        <img src="<?= base_url('public/img/acceuil/logo.svg') ?>" alt="" class="logo" id="logo">


        <div class="link">
            <img src="<?= base_url('public/img/acceuil/mail.svg') ?>" alt="">
            <div class="mail">
                <h1>Courriel</h1>
                <p>concrete.secu@contact.com</p>
            </div>
            <img src="<?= base_url('public/img/acceuil/tel.svg') ?>" alt="" class="space">
            <div class="call">
                <h1>Téléphone</h1>
                <p>+05 65 36 87 45</p>
            </div>
        </div>


        <!--    Information Compte Client -->
        <a href="<?php echo base_url('Infoclient') ?>" class="account">
            <img class="img-account" src="<?= base_url('public/img/acceuil/account.svg') ?>" alt="">
        </a>
        <!--    Information Compte Client -->

        <!--    Deconnexion Compte Client -->
        <a class="deco" href="<?php echo site_url('user/Userlogout') ?>">
            <img class="img-deco" src="<?= base_url('public/img/acceuil/deco.svg') ?>" alt="">
        </a>

        <!--    Deconnexion Compte Client -->

    </div>
</header>

<!-- HEADER FIN -->

<!-- NAV DEBUT -->
<nav>
    <ul>
        <li><a href=" <?php echo base_url('') ?>">Acceuil</a></li>
        <li><a href="<?php echo base_url('') ?>#prestations">Nos Prestations</a></li>
        <li><a href="<?php echo base_url('apropos') ?>">A Propos</a></li>
        <li><a href="<?php echo base_url('contact') ?>">Contact</a></li>
        <!--         <li><a href="<?php echo base_url('panelclient') ?>">Panel Client</a></li> -->
        <li class="vos-demandes"><a href="<?php echo base_url('panelclient') ?>">| Vos Demandes</a></li>
    </ul>
    <a href="<?php echo base_url('demandes') ?>" class="demande">Créé une Demande</a>
</nav>
<!-- NAVBAR FIN -->


<style>
    * {
        text-decoration: none;
        list-style: none;
        margin: 0;
        padding: 0;
        font-family: 'Mulish';

    }


    /* HEADER DEBUT */
    header {
        background-color: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    header .container {
        max-width: 980PX;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        margin: auto;
        margin-top: -20px;
        margin-bottom: 20px;
        width: 100%;
        height: 130px;
        background-color: white;
    }

    header .container .link {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .container img.logo {
        width: 24%;
        cursor: pointer;

    }


    header .container .link img {
        width: 23px;
        height: 23px;
        background-color: #ffb342;
        padding: 9px;
        border-radius: 40%;
    }

    header .container .link .space {
        margin-left: 65px;
    }

    header .container .link .mail,
    header .container .link .call {
        margin-left: 19px;
    }



    header .container .link h1 {
        color: #1C2752;
        font-weight: 700;
        font-size: 19px;
        line-height: 25px;
    }

    header .container .link p {
        margin-top: 2px;
        color: #7E7E7E;
        font-weight: 400;
        font-size: 15px;
        line-height: 22px;
    }

    header .container a {
        position: absolute;
        top: 22px;
        right: 40px;
    }

    a.account {
        margin-left: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        padding: 7px;
        border-radius: 40%;
        background-color: #ffb342;
        cursor: pointer;
        margin-right: 50px;
    }

    a.deco {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        padding: 7px;
        border-radius: 40%;
        background-color: #ffb342;
        cursor: pointer;
        margin-left: 50px;
    }

    .img-account {
        width: 28px;
        height: 28px;
    }

    .img-deco {
        width: 22px;
        height: 22px;
    }

    /* HEADER FIN */

    /* NAVBAR DEBUT */
    nav {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1;
        position: relative;
        top: -40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 1000px;
        height: 70px;
        margin: auto;
        background-color: #ffb342;
        transition: background-color 0.2s;
    }

    nav ul {
        margin-left: 20px;
        display: flex;
    }

    nav li {
        margin: 20px;
        transition: border-bottom 0.2s;
        position: relative;
    }

    nav li a {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 24px;
        cursor: pointer;
        color: #1c2752;
        text-decoration: none;
    }

    nav li a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 2.5px;
        bottom: -8px;
        border-radius: 50px;
        /* Déplacez le trait vers le bas */
        left: 0;
        background-color: transparent;
        transition: background-color 0.2s;
    }

    nav li:hover a::before {
        background-color: #1C2752;
    }

    nav a.demande {
        margin-right: 15px;
        color: white;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 24px;
        padding: 13px;
        background-color: #1c2752;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.2s;
    }

   



    /* NAVBAR FIN */
</style>
<script>
    document.getElementById('logo').onclick = function () {
        window.location.href = '<?= base_url() ?>';
    };

</script>