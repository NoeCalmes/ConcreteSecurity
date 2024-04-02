<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Client</title>

</head>

<body>
    <h2 class="title-panel">Consulter vos demandes |
        <?php echo ucwords($nomclient); ?>
    </h2>


    <div class="container-panel " id="container">

        <div class="onglets">
            <div class="onglet actif">
                <p class="p-panel">Toutes
                    <span>
                        <?php echo $nombreTotalDemandes; ?>
                    </span>
                </p>
            </div>
            <div class="onglet">
                <p class="p-panel">En Attente
                    <span>
                        <?php echo $nombreEnAttente; ?>
                    </span>
                </p>
            </div>
            <div class="onglet">
                <p class="p-panel">Validée
                    <span>
                        <?php echo $nombreValidees; ?>
                    </span>
                </p>
            </div>
            <div class="onglet">
                <p class="p-panel">Refusé
                    <span>
                        <?php echo $nombreRefusees; ?>
                    </span>
                </p>
            </div>
            <div class="onglet">
                <p class="p-panel">En Cours
                    <span>
                        <?php echo $nombreEnCours; ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="contenu actif">
            <h3 class="h3-demande">Toutes vos demandes </h3>
            <?php if (empty($data)): ?>
                <p>Aucune demande pour le moment...</p>
            <?php else: ?>
                <?php foreach ($data as $demandeInfo): ?>
                    <div class="tous-demande">
                        <div class="tous-first">
                            <p>État de la Demande :
                                <span style="background-color:
                        <?php
                        if ($demandeInfo['demande']->etat === 'EnAttente') {
                            echo 'orange';
                        } elseif ($demandeInfo['demande']->etat === 'Validé') {
                            echo '#349f30';
                        } elseif ($demandeInfo['demande']->etat === 'Refusé') {
                            echo '#c73320';
                        } elseif ($demandeInfo['demande']->etat === 'EnCours') {
                            echo '#58A3F7';
                        } else {
                            echo 'transparent';
                        }
                        ?>
                    ">
                                    <?php echo $demandeInfo['demande']->etat ?>
                                </span>
                            </p>
                            <p class="prix-total">Prix total :
                                <?php echo $demandeInfo['prixTotal'] ?>€
                            </p>
                            <p class="date-dem">Date de la demande :
                                <?php echo $demandeInfo['demande']->dated ?>
                            </p>
                        </div>
                        <div class="line-tous"></div>
                        <ul>

                            <?php foreach ($demandeInfo['prestations'] as $prestation): ?>
                                <li class="date_li">Du
                                    <span>
                                        <?php echo $prestation['date_debut'] ?>
                                    </span>
                                    au
                                    <span>
                                        <?php echo $prestation['date_fin'] ?>
                                    </span>
                                </li>
                                <li>Prestation :
                                    <?php echo $prestation['description'] ?>

                                </li>
                                <li>Adresse :
                                    <?php echo $prestation['adresse'] ?> ,
                                    <?php echo $prestation['cp'] ?>
                                    <?php echo $prestation['ville'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="contenu">
            <h3 class="h3-demande">Vos demandes en Attente <span>(Vous aurez une réponse très bientot ...)</span></h3>
            <?php if (empty($dataEnAttente)): ?>
                <p>Aucune demande en attente pour le moment...</p>
            <?php else: ?>
                <?php foreach ($dataEnAttente as $demandeInfo): ?>
                    <div class="tous-demande">
                        <div class="tous-first">
                            <p>Prix total :
                                <?php echo $demandeInfo['prixTotal'] ?>€
                            </p>
                            <p class="date-dem">Date demande :
                                <?php echo $demandeInfo['demande']->dated ?>
                            </p>
                        </div>
                        <div class="line-tous"></div>
                        <div>
                            <?php foreach ($demandeInfo['prestations'] as $prestation): ?>
                                <li class="date_li">Du
                                    <span>
                                        <?php echo $prestation['date_debut'] ?>
                                    </span>
                                    au
                                    <span>
                                        <?php echo $prestation['date_fin'] ?>
                                    </span>
                                </li>
                                <li>Prestation :
                                    <?php echo $prestation['description'] ?>

                                </li>
                                <li>Adresse :
                                    <?php echo $prestation['adresse'] ?> ,
                                    <?php echo $prestation['cp'] ?>
                                    <?php echo $prestation['ville'] ?>
                                </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="contenu">
            <h3 class="h3-demande">Vos demandes Validées <span>(Dans l'attente de votre paiement )</span></h3>
            <?php if (empty($dataValide)): ?>
                <p>Aucune demande validée pour le moment...</p>
            <?php else: ?>
                <?php foreach ($dataValide as $demandeInfo): ?>
                    <div class="tous-demande">
                        <div class="tous-first">
                            <p class="prix-total">Prix total :
                                <?php echo $demandeInfo['prixTotal'] ?>€
                            </p>
                            <p class="date-dem">Date de la demande :
                                <?php echo $demandeInfo['demande']->dated ?>
                            </p>
                        </div>
                        <div class="line-tous"></div>
                        <ul>
                            <?php foreach ($demandeInfo['prestations'] as $prestation): ?>
                                <li class="date_li">Du
                                    <span>
                                        <?php echo $prestation['date_debut'] ?>
                                    </span>
                                    au
                                    <span>
                                        <?php echo $prestation['date_fin'] ?>
                                    </span>
                                </li>
                                <li>Prestation :
                                    <?php echo $prestation['description'] ?>

                                </li>
                                <li>Adresse :
                                    <?php echo $prestation['adresse'] ?> ,
                                    <?php echo $prestation['cp'] ?>
                                    <?php echo $prestation['ville'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="confirmation-paiement">
                            <form action="<?php echo base_url('Panelclient/ConfirmerEtPayer'); ?>" method="POST">
                                <input type="hidden" name="demandeId" value="<?php echo $demandeInfo['demande']->id; ?>">
                                <button type="submit">Confirmer et payer</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="contenu">
            <h3 class="h3-demande">Vos demandes Refusées <span>(Nous ne sommes malheureusement pas disponibles ce
                    jour-là)</span></h3>
            <?php if (empty($dataRefusee)): ?>
                <p>Aucune demande refusée pour le moment...</p>
            <?php else: ?>
                <?php foreach ($dataRefusee as $demandeRefusee): ?>
                    <div class="tous-demande">
                        <div class="tous-first">
                            <p>Prix total :
                                <?php echo $demandeRefusee['prixTotal'] ?>€
                            </p>
                            <p class="date-dem">Date de refus :
                                <?php echo $demandeRefusee['demande']->dated ?>
                            </p>

                        </div>
                        <div class="line-tous"></div>
                        <div>
                            <?php foreach ($demandeRefusee['prestations'] as $prestation): ?>
                                <li class="date_li">Du
                                    <span>
                                        <?php echo $prestation['date_debut'] ?>
                                    </span>
                                    au
                                    <span>
                                        <?php echo $prestation['date_fin'] ?>
                                    </span>
                                </li>
                                <li>Prestation :
                                    <?php echo $prestation['description'] ?>

                                </li>
                                <li>Adresse :
                                    <?php echo $prestation['adresse'] ?> ,
                                    <?php echo $prestation['cp'] ?>
                                    <?php echo $prestation['ville'] ?>
                                </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>


        <div class="contenu">
            <h3 class="h3-demande">Vos demandes en Cours <span>(Plus pour longtemps , nos agents de sécurité sont sur le point d'arriver)</span></h3>
            <?php if (empty($dataEnCours)): ?>
                <p>Aucune demande en cours pour le moment...</p>
            <?php else: ?>
                <?php foreach ($dataEnCours as $demandeInfo): ?>
                    <div class="tous-demande">
                        <div class="tous-first">
                            <p>Prix:
                                <?php echo $demandeInfo['prixTotal'] ?>€
                            </p>
                            <p class="date-dem">Date demande :
                                <?php echo $demandeInfo['demande']->dated ?>
                            </p>
                        </div>
                        <div class="line-tous"></div>
                        <div>
                            <?php foreach ($demandeInfo['prestations'] as $prestation): ?>
                                <li class="date_li">Du
                                    <span>
                                        <?php echo $prestation['date_debut'] ?>
                                    </span>
                                    au
                                    <span>
                                        <?php echo $prestation['date_fin'] ?>
                                    </span>
                                </li>
                                <li>Prestation :
                                    <?php echo $prestation['description'] ?>

                                </li>
                                <li>Adresse :
                                    <?php echo $prestation['adresse'] ?> ,
                                    <?php echo $prestation['cp'] ?>
                                    <?php echo $prestation['ville'] ?>
                                </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.onglet').click(function () {
            $('.onglet').removeClass('actif');
            $(this).addClass('actif');
            $('.contenu').removeClass('actif');
            var indice = $(this).index();
            $('.contenu').eq(indice).addClass('actif');
        });
    </script>


</body>



<style>
    .container-panel {
        width: 1000px;
        margin: auto;
        margin-bottom: 30px;
        background-color: #f4f4f4;
        border-radius: 5px;
    }

    .p-panel {
        font-size: 17px;
        color: #1c2752;
        font-weight: 600;
    }

    .p-panel span {
        background-color: #D1D0D0;
        color: #1c2752;
        padding: 2px 5px;
        border-radius: 25px;
    }

    .onglet {
        width: calc(100% / 5);
        font-size: 1.3em;
        padding: 2% 4%;
        float: left;
        box-sizing: border-box;
        text-align: center;
        cursor: pointer;
    }

    .onglet.actif {
        background: #EAE9E9;
        border-radius: 5px 5px 0px 0px;
    }

    .contenu {
        clear: both;
        display: none;
        padding: 2%;
    }

    .contenu.actif {
        display: block;
        background: #EAE9E9;
        border-radius: 0px 0px 5px 5px;
    }

    h2.title-panel {
        text-align: center;
        margin-bottom: 10px;
        color: #1c2752;
        font-size: 26px;
        margin-bottom: 40px;
    }

    h3.h3-demande {
        margin: 10px 0px 15px 0px;
        font-size: 21px;
        color: #1c2752;
        font-weight: 700;
    }

    h3.h3-demande span {
        font-size: 15px;
        opacity: 0.5;
        color: #697a89;
    }

    .tous-demande {
        display: flex;
        align-items: center;
        margin: 25px 0px 25px 0px;

    }



    .line-tous {
        margin: 0px 20px 0px 40px;
        width: 1.5px;
        height: 50px;
        border-radius: 50px;
        background-color: #1c2752;

    }

    .date-dem {
        color: #697a89;
        font-size: 12px;
        margin-top: 5px;
        font-weight: 600;
    }

    .tous-first p span {
        padding: 3px 10px;
        width: 1000px;
        background-color: red;
        border-radius: 15px;
    }

    .date_li span {
        font-weight: 600;
        font-style: italic;
    }

    .confirmation-paiement button {
        outline: none;
        border: none;
        color: white;
        font-family: 'Inter';
        margin-left: 50px;
        font-weight: 500;
        font-size: 15px;
        line-height: 24px;
        padding: 11px;
        background-color: #1c2752;
        cursor: pointer;
        transition: background-color 0.2s;
        border-radius: 2px;
    }
</style>

</html>