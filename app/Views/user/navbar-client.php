
<link
    href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
<link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico') ?>">


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
        <a href="<?= base_url('user/home') ?>" class="absolute"><img class="client"
                src="<?= base_url('public/img/acceuil/deco.svg') ?>" alt="" ></a>
    </div>
</header>

   <!-- HEADER FIN -->

   <!-- NAV DEBUT -->
    <nav>
        <ul>
            <li><a href=" <?= base_url('') ?>">Acceuil</a></li>
        <li><a href="<?= base_url('') ?>#prestations">Nos Prestations</a></li>
        <li><a href="<?= base_url('apropos') ?>">A Propos</a></li>
        <li><a href="<?= base_url('contact') ?>">Contact</a></li>
        </ul>
        <a href="#" class="demande">Créé une Demande</a>
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

            header .container img.account {

                background-color: #ffb342;
                width: 28px;
                height: 28px;

                padding: 7px;
                border-radius: 40%;
            }

            /* HEADER FIN */

            /* NAVBAR DEBUT */

            img.client {
             
                width: 35px;
                height: 35px;
            }
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