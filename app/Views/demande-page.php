<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une demande</title>
</head>

<body>
    <div class="container-demande">
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
                    <a class="extra-prest envoyer-prest">Envoyer</a>
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
                                <input class="input1" type="date">
                            </div>
                            <div class="bloc-input">
                                <p class="p-inputtext">Date fin:</p>
                                <input class="" type="date">
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
                                <input class="input3" type="text">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Sélection des éléments du DOM nécessaires
            var containerPrestation = document.querySelector(".container-prestation");
            var prestationBloc1 = document.querySelector(".prestation-bloc1");
            var chevronIcon = document.querySelector(".chevron-icon");
            var filtrePrestParticulier = document.querySelector(".filtre-prest.first-prest");
            var filtrePrestProfessionnel = document.querySelector(".filtre-prest.second-prest");
            var prestBlocs = document.querySelectorAll(".prest-bloc");
            var checkboxes = document.querySelectorAll('.inp-cbx');
            
            
            

            // Initialisation du style
            containerPrestation.style.display = "none";

            // Gestion de l'événement au clic sur prestationBloc1
            prestationBloc1.addEventListener("click", function (event) {
                // Vérifiez si l'élément cliqué est l'un des boutons exclus
                if (event.target !== filtrePrestParticulier && event.target !== filtrePrestProfessionnel) {
                    // Toggle (afficher/cacher) le bloc de prestation
                    if (containerPrestation.style.display === "none") {
                        containerPrestation.style.display = "block";
                        prestationBloc1.classList.add("ouvert"); // Ajoutez la classe "ouvert"
                        // Mettre à jour l'icône vers "chevron-up"
                        chevronIcon.classList.remove("fa-chevron-down");
                        chevronIcon.classList.add("fa-chevron-up");
                    } else {
                        containerPrestation.style.display = "none";
                        prestationBloc1.classList.remove("ouvert"); // Retirez la classe "ouvert"
                        // Mettre à jour l'icône vers "chevron-down"
                        chevronIcon.classList.remove("fa-chevron-up");
                        chevronIcon.classList.add("fa-chevron-down");
                    }
                }
            });

            /* checkbox input */
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    var prestBloc = checkbox.closest('.prest-bloc');
                    prestBloc.classList.toggle('selected', checkbox.checked);
                    updatePrixTotal(); // Mise à jour du prix total lorsqu'une case à cocher change
                });
            });
            /* checkbox selectioné */
            prestBlocs.forEach(function (prestBloc) {
                prestBloc.addEventListener("click", function () {
                    console.log("Clic sur prest-bloc");
                    var checkbox = prestBloc.querySelector(".inp-cbx");
                    checkbox.checked = !checkbox.checked; // Inverse l'état du checkbox
                    prestBloc.classList.toggle('selected', checkbox.checked); // Ajout ou suppression de la classe "selected"
                    updatePrixTotal(); // Mise à jour du prix total lorsqu'une prestation est sélectionnée
                    console.log("Checkbox checked:", checkbox.checked);
                });
            });


            // Gestion de l'événement au clic sur le filtre particulier
            filtrePrestParticulier.addEventListener("click", function () {
                // Vérifiez si la liste déroulante est fermée et ouvrez-la
                if (containerPrestation.style.display === "none") {
                    containerPrestation.style.display = "block";
                    chevronIcon.classList.remove("fa-chevron-down");
                    chevronIcon.classList.add("fa-chevron-up");
                    prestationBloc1.classList.add("ouvert"); // Ajoutez la classe "ouvert"
                }

                // Si le filtre particulier est déjà actif, désélectionnez-le
                if (filtrePrestParticulier.classList.contains("active")) {
                    // Réinitialisez l'affichage en montrant toutes les prestations
                    prestBlocs.forEach(function (prestBloc) {
                        prestBloc.style.display = "flex";
                        prestBloc.style.borderRadius = "0"; // Réinitialiser le border-radius
                        updatePrixTotal();
                    });

                    // Désactivez la classe "active" pour le filtre
                    filtrePrestParticulier.classList.remove("active");
                } else {
                    // Sinon, appliquez le filtre particulier
                    filterPrestations("Particulier");
                    updateStyles(); // Appeler la fonction pour mettre à jour les styles
                    // Ajoutez la classe "active" pour indiquer que le filtre est actif
                    filtrePrestParticulier.classList.add("active");
                    // Désactivez la classe "active" pour l'autre filtre
                    filtrePrestProfessionnel.classList.remove("active");
                }
            });




            // Gestion de l'événement au clic sur le filtre professionnel
            filtrePrestProfessionnel.addEventListener("click", function () {
                // Vérifiez si la liste déroulante est fermée et ouvrez-la
                if (containerPrestation.style.display === "none") {
                    containerPrestation.style.display = "block";
                    chevronIcon.classList.remove("fa-chevron-down");
                    chevronIcon.classList.add("fa-chevron-up");
                    prestationBloc1.classList.add("ouvert"); // Ajoutez la classe "ouvert"
                }

                // Si le filtre professionnel est déjà actif, désélectionnez-le
                if (filtrePrestProfessionnel.classList.contains("active")) {
                    // Réinitialisez l'affichage en montrant toutes les prestations
                    prestBlocs.forEach(function (prestBloc) {
                        prestBloc.style.display = "flex";
                        prestBloc.style.borderRadius = "0"; // Réinitialiser le border-radius
                    });

                    // Désactivez la classe "active" pour le filtre
                    filtrePrestProfessionnel.classList.remove("active");
                } else {
                    // Sinon, appliquez le filtre professionnel
                    filterPrestations("Professionnel");
                    updateStyles(); // Appeler la fonction pour mettre à jour les styles
                    // Ajoutez la classe "active" pour indiquer que le filtre est actif
                    filtrePrestProfessionnel.classList.add("active");
                    // Désactivez la classe "active" pour l'autre filtre
                    filtrePrestParticulier.classList.remove("active");
                }
                updatePrixTotal();
            });

            // Fonction pour filtrer les prestations
            function filterPrestations(type) {
                prestBlocs.forEach(function (prestBloc) {
                    if (type === "Toutes" || prestBloc.dataset.type === type) {
                        prestBloc.style.display = "flex";
                    } else {
                        prestBloc.style.display = "none";
                    }
                });
            }




            /* Afficehr le prix total  */
            function updatePrixTotal() {
                var prixTotal = 0;

                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        var prestBloc = checkbox.closest('.prest-bloc');
                        var prixPrestation = parseFloat(prestBloc.querySelector('.prix-prest').textContent);
                        prixTotal += prixPrestation;
                    }
                });

                var prixTotalElement = document.querySelector('.extra-prest.prix.total');
                prixTotalElement.textContent = "Prix total: " + prixTotal.toFixed(2) + "€";


            }


            // Fonction pour mettre à jour les styles
            function updateStyles() {
                prestBlocs.forEach(function (prestBloc) {
                    prestBloc.style.borderRadius = "0"; // Réinitialiser le border-radius
                });

                var visibleBlocks = Array.from(prestBlocs).filter(function (prest) {
                    return window.getComputedStyle(prest).display === "flex";
                });

                if (visibleBlocks.length > 0) {
                    // Appliquer le border-radius uniquement au dernier élément visible
                    visibleBlocks[visibleBlocks.length - 1].style.borderRadius = "0px 0px 10px 10px";
                    // Ajouter la classe "active" au bouton correspondant
                    if (visibleBlocks[visibleBlocks.length - 1].dataset.type === "Particulier") {
                        filtrePrestParticulier.classList.add("active");
                        filtrePrestProfessionnel.classList.remove("active");
                    } else if (visibleBlocks[visibleBlocks.length - 1].dataset.type === "Professionnel") {
                        filtrePrestProfessionnel.classList.add("active");
                        filtrePrestParticulier.classList.remove("active");
                    }
                } else {
                    // Si aucun élément n'est visible, réinitialisez le border-radius
                    prestBlocs.forEach(function (prestBloc) {
                        prestBloc.style.borderRadius = "0";
                    });
                    // Désactivez la classe "active" pour les filtres
                    filtrePrestParticulier.classList.remove("active");
                    filtrePrestProfessionnel.classList.remove("active");
                }
            }
        });

    </script>




</body>

</html>