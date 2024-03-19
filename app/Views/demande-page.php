<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une demande</title>

</head>

<body>
    <div class="container-demande">
        <form id="envoyer-form" method="POST">
            <div class="left-demande">
                <div class="container-name">
                    <h2 class="left-name">
                        Bonjour <span>
                            <?php echo $nomclient; ?>
                        </span>
                    </h2>
                    <div class="extra-menu">
                        <p class="extra-prest prix total">Prix total:</p>
                        <a class="extra-prest ajout-prest">Ajouter une Prestation</a>
                        <a class="extra-prest envoyer-btn">Envoyer</a>
                    </div>
                </div>
                <div class="container-left-demande">
                    <div class="prestation-bloc1">
                        <span class="prest-text">Type de Prestation :</span>
                        <a class="filtre-prest first-prest" data-type="Particulier">Particulier</a>
                        <a class="filtre-prest second-prest" data-type="Professionnel">Professionnel</a>
                        <span class="prest-icon"><i class="fas fa-chevron-down chevron-icon"></i></span>
                    </div>

                    <div class="container-prestation">
                        <?php foreach ($demandes as $index => $demande): ?>
                            <div class="prest-bloc" data-type="<?php echo esc($demande->type) ?>">
                                <div class="left-prest">
                                    <div class="checkbox-wrapper-15">
                                        <input class="inp-cbx" id="cbx-15-<?php echo $index ?>" type="checkbox"
                                            style="display: none;" />
                                        <label class="cbx" for="cbx-15-<?php echo $index ?>">
                                            <span>
                                                <svg width="12px" height="9px" viewbox="0 0 12 9">
                                                    <polyline points="1 5 4 8 11 1"></polyline>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                    <p class="type-prest" style="display:none;">
                                        <?php echo esc($demande->type) ?>
                                    </p>
                                    <p class="description-prest">
                                        <?php echo esc($demande->description) ?>
                                    </p>
                                </div>
                                <div class="right-prest">
                                    <p class="prix-prest">
                                        <?php echo esc($demande->prix) ?>€
                                    </p>
                                    <form>
                                        <select id="choix" name="choix" onclick="event.stopPropagation();">
                                            <option class="nuit-prest" value="2">Nuit</option>
                                            <option class="jour-prest" value="1">Journée</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="container-input">
                        <div class="bloc1-input">
                            <div class="bloc-left-dateprest">
                                <span class="prest-date">Adresse de la Prestation :</span>
                            </div>
                            <div class="bloc-right-dateprest">
                                <div class="bloc-input">
                                    <p class="p-inputtext">Date debut:</p>
                                    <input id="date-debut-input" class="input1" type="date">
                                </div>
                                <div class="bloc-input">
                                    <p class="p-inputtext">Date fin:</p>
                                    <input id="date-fin-input" class="" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="bloc2-input">
                            <div class="bloc-left-adresse">
                                <span class="prest-date">Date de la Prestation :</span>
                            </div>
                            <div class="bloc-right-adresse">
                                <div class="bloc-input">
                                    <p class="p-inputtext">Adresse:</p>
                                    <input class="input1" type="text">
                                </div>
                                <div class="bloc-input">
                                    <p class="p-inputtext">Ville:</p>
                                    <input class="input2" type="text">
                                </div>
                                <div class="bloc-input">
                                    <p class="p-inputtext">Code Postal:</p>
                                    <input class="input3" type="text" pattern="\d*" maxlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Conteneur pour afficher les informations saisies -->
        <div class="container-informations" style="display: none;">
            <h3 class="info-saisi">Informations saisies :</h3>
            <div id="informations">
                <p>Date de début: <span id="date-debut"></span></p>
                <p>Date de fin: <span id="date-fin"></span></p>
            </div>
            <p id="prix-total-container">Prix total: <span id="prix-total-informations">0€</span></p>
            <!-- Bouton pour confirmer l'envoi -->
            <button type="button" class="btn-confirm" id="confirmer-btn">Êtes-vous sûr d'envoyer ?</button>
        </div>
    </div>


</body>


</html>