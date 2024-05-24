<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConcreteSecurity</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/styles.css') ?>">
    <script src="<?= base_url('public/js/script.js') ?>"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico') ?>">

</head>

<body>

    <!-- MAIN DEBUT -->
    <main>
        <div class="container-main">
            <div class="top">
                <img src="<?= base_url('public/img/acceuil/settings.svg') ?>" alt="">
                <p>Votre tranquillité, notre mission primordiale </p>
            </div>
            <h1>Votre Agence de Sécurité Privée</h1>
            <a href="#prestations" class="arrow-button">Nos Prestations<img class="arrow-icon"
                    src="<?= base_url('public/img/acceuil/arrow-up.svg') ?>" alt=""></a>


        </div>
    </main>

    <!-- MAIN FIN -->
    <article>
        <div class="line-article"> </div>

        <div class="presentation">

            <h1>Professionnels de la sécurité.</h1>
            <p>Nous proposons une sécurité adaptée à trois domaines essentiels : les entreprises, les résidences
                privées, et les sites industriels.</p>

            <div class="card-article">
                <div class="card">
                    <img src="<?= base_url('public/img/acceuil/company.svg') ?>" alt="">
                    <p>Nos Services</p>
                </div>

                <div class="card">
                    <img src="<?= base_url('public/img/acceuil/residential.svg') ?>" alt="">
                    <p>Particulier</p>
                </div>

                <div class="card">
                    <img class="industrial" src="<?= base_url('public/img/acceuil/factory.svg') ?>" alt="">
                    <p>Professionnel</p>
                </div>

            </div>
        </div>

        <div class="container-text">
            <div class="left">
                <div class="top-text">
                    <img src="<?= base_url('public/img/acceuil/company2.svg') ?>" alt="">
                    <p>Nos services</p>
                </div>
                <div class="mid-text">
                    <h1 style="color:#1c2752;">Nos services</h1>
                    <p>En tant qu'entreprise de sécurité, nous fournissons une large gamme de services de sécurité pour
                        les particuliers et les professionnels. <br><br>Notre équipe hautement qualifiée est déterminée
                        à
                        garantir votre tranquillité d'esprit, en concevant des solutions sur mesure pour répondre à vos
                        besoins spécifiques, qu'il s'agisse de sécurité résidentielle, de surveillance d'entreprise ou
                        de services de gardiennage.
                    </p>
                </div>
                <div class="end-text">
                    <a href="#">Read More</a>
                </div>
            </div>

            <div class="right">
                <img src="<?= base_url('public/img/acceuil/picture-articleof.svg') ?>" alt="">
            </div>
        </div>


    </article>

    <div class="container-bottom"></div>

    <!-- container prestation debut -->
    <div class="container-prest">
        <h1 class="prest" id="prestations">Nos Prestations :</h1>
        <div class="container-prestimg">
            <div class="container">
                <div class="slider-wrapper">
                    <button id="prev-slide" class="slide-button material-symbols-rounded">
                        chevron_left
                    </button>
                    <ul class="image-list">
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/chien.svg') ?>"
                                alt="img-1" />
                            <p class="image-text">Sécurité Résidentielle</p>
                        </div>
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/boite.svg') ?>"
                                alt="img-3" />
                            <p class="image-text">Sécurité Boite de Nuit</p>
                        </div>
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/industriel.svg') ?>"
                                alt="img-2" />
                            <p class="image-text">Sécurité Incendie / Industriel</p>
                        </div>
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/parking.svg') ?>"
                                alt="img-4" />
                            <p class="image-text">Sécurité Parking</p>
                        </div>
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/magasin.svg') ?>"
                                alt="img-5" />
                            <p class="image-text">Sécurité Magasin</p>
                        </div>
                        
                        <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/entrepot.svg') ?>"
                                alt="img-6" />
                            <p class="image-text">Sécurité Entrepot</p>
                        </div>
                        <div class="image-item-container">
                            <img class="image-item"
                                src="<?= base_url('public/img/acceuil/carrousel/Evenementiel.svg') ?>" alt="img-7" />
                            <p class="image-text">Sécurité Événementiel</p>
                        </div>
                        < <div class="image-item-container">
                            <img class="image-item" src="<?= base_url('public/img/acceuil/carrousel/rapproche.svg') ?>"
                                alt="img-8" />
                            <p class="image-text">Sécurité privé</p>
                </div>


                </ul>
                <button id="next-slide" class="slide-button material-symbols-rounded">
                    chevron_right
                </button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- container prestation fin -->

</body>

</html>