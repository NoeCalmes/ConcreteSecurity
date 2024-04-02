// Script JavaScript spécifique à la page de demande
(function demandePageScript() {
  document.addEventListener("DOMContentLoaded", function () {
    var containerPrestation = document.querySelector(".container-prestation");
    var prestationBloc1 = document.querySelector(".prestation-bloc1");
    var chevronIcon = document.querySelector(".chevron-icon");
    var filtrePrestParticulier = document.querySelector(
      ".filtre-prest.first-prest"
    );
    var filtrePrestProfessionnel = document.querySelector(
      ".filtre-prest.second-prest"
    );
    var prestBlocs = document.querySelectorAll(".prest-bloc");
    var checkboxes = document.querySelectorAll(".inp-cbx");
    var envoyerBtn = document.querySelector(".envoyer-btn");
    var leftDemande = document.querySelector(".left-demande");
    var containerInformations = document.querySelector(
      ".container-informations"
    );
    var confirmerBtn = document.getElementById("confirmer-btn");
    var informationsContainer = document.getElementById("informations");

    // Fonction pour vérifier si au moins une prestation est sélectionnée
    function checkAtLeastOnePrestationSelected() {
      var atLeastOneSelected = false;
      checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
          atLeastOneSelected = true;
        }
      });
      return atLeastOneSelected;
    }

    // Fonction pour vérifier si tous les champs sont remplis
    function checkAllFieldsFilled() {
      var dateDebut = document.getElementById("date-debut-input").value;
      var dateFin = document.getElementById("date-fin-input").value;
      var adresse = document.querySelector(".input1").value;
      var ville = document.querySelector(".input2").value;
      var codePostal = document.querySelector(".input3").value;

      return (
        dateDebut.trim() !== "" &&
        dateFin.trim() !== "" &&
        adresse.trim() !== "" &&
        ville.trim() !== "" &&
        codePostal.trim() !== "" &&
        checkAtLeastOnePrestationSelected() // Vérifie si au moins une prestation est sélectionnée
      );
    }

    if (envoyerBtn && confirmerBtn && informationsContainer) {
      envoyerBtn.addEventListener("click", function () {
        // Vérifier si tous les champs sont remplis avant d'afficher les informations
        if (checkAllFieldsFilled()) {
          containerInformations.style.display = "block";
          informationsContainer.innerHTML = "";

          // Récupérer les valeurs des champs de date de début et de fin
          var dateDebut = document.getElementById("date-debut-input").value;
          var dateFin = document.getElementById("date-fin-input").value;

          // Afficher les dates de début et de fin dans les informations saisies
          var dateDebutElement = document.createElement("p");
          dateDebutElement.textContent = "Date de début: " + dateDebut;
          informationsContainer.appendChild(dateDebutElement);

          var dateFinElement = document.createElement("p");
          dateFinElement.textContent = "Date de fin: " + dateFin;
          informationsContainer.appendChild(dateFinElement);

          checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
              var prestBloc = checkbox.closest(".prest-bloc");
              if (prestBloc) {
                var description =
                  prestBloc.querySelector(".description-prest").textContent;
                var prix = prestBloc.querySelector(".prix-prest").textContent;
                var type = prestBloc.querySelector(".type-prest").textContent;
                var selectElement = prestBloc.querySelector("#choix");
                var duree =
                  selectElement.options[selectElement.selectedIndex]
                    .textContent;
                var infoText =
                  description + "(" + type + ") " + duree + " - " + prix;
                var infoElement = document.createElement("p");
                infoElement.textContent = infoText;
                informationsContainer.appendChild(infoElement);
              }
            }
          });

          leftDemande.style.display = "none";
        } else {
          // Afficher un message d'erreur si tous les champs ne sont pas remplis
          alert(
            "Veuillez remplir tous les champs et sélectionner au moins une prestation avant d'envoyer la demande."
          );
        }
      });

      confirmerBtn.addEventListener("click", function () {
        document.getElementById("envoyer-form").submit();
      });
    }

    if (containerPrestation) {
      containerPrestation.style.display = "none";
    }

    if (prestationBloc1) {
      prestationBloc1.addEventListener("click", function (event) {
        if (
          event.target !== filtrePrestParticulier &&
          event.target !== filtrePrestProfessionnel
        ) {
          if (containerPrestation.style.display === "none") {
            containerPrestation.style.display = "block";
            prestationBloc1.classList.add("ouvert");
            chevronIcon.classList.remove("fa-chevron-down");
            chevronIcon.classList.add("fa-chevron-up");
          } else {
            containerPrestation.style.display = "none";
            prestationBloc1.classList.remove("ouvert");
            chevronIcon.classList.remove("fa-chevron-up");
            chevronIcon.classList.add("fa-chevron-down");
          }
        }
      });
    }

    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener("change", function () {
        var prestBloc = checkbox.closest(".prest-bloc");
        prestBloc.classList.toggle("selected", checkbox.checked);
        uncheckOtherCheckboxes(checkbox);
        updatePrixTotal();
      });
    });

    prestBlocs.forEach(function (prestBloc) {
      prestBloc.addEventListener("click", function () {
        var checkbox = prestBloc.querySelector(".inp-cbx");
        checkbox.checked = !checkbox.checked;
        prestBloc.classList.toggle("selected", checkbox.checked);
        uncheckOtherCheckboxes(checkbox);
        updatePrixTotal();
      });
    });

    function uncheckOtherCheckboxes(checkbox) {
      checkboxes.forEach(function (otherCheckbox) {
        if (otherCheckbox !== checkbox) {
          otherCheckbox.checked = false;
          otherCheckbox.closest(".prest-bloc").classList.remove("selected");
        }
      });
    }

    if (filtrePrestParticulier) {
      filtrePrestParticulier.addEventListener("click", function () {
        if (containerPrestation.style.display === "none") {
          containerPrestation.style.display = "block";
          chevronIcon.classList.remove("fa-chevron-down");
          chevronIcon.classList.add("fa-chevron-up");
          prestationBloc1.classList.add("ouvert");
        }

        if (filtrePrestParticulier.classList.contains("active")) {
          prestBlocs.forEach(function (prestBloc) {
            prestBloc.style.display = "flex";
            prestBloc.style.borderRadius = "0";
            updatePrixTotal();
          });
          filtrePrestParticulier.classList.remove("active");
        } else {
          filterPrestations("Particulier");
          updateStyles();
          filtrePrestParticulier.classList.add("active");
          filtrePrestProfessionnel.classList.remove("active");
        }
      });
    }

    if (filtrePrestProfessionnel) {
      filtrePrestProfessionnel.addEventListener("click", function () {
        if (containerPrestation.style.display === "none") {
          containerPrestation.style.display = "block";
          chevronIcon.classList.remove("fa-chevron-down");
          chevronIcon.classList.add("fa-chevron-up");
          prestationBloc1.classList.add("ouvert");
        }

        if (filtrePrestProfessionnel.classList.contains("active")) {
          prestBlocs.forEach(function (prestBloc) {
            prestBloc.style.display = "flex";
            prestBloc.style.borderRadius = "0";
          });
          filtrePrestProfessionnel.classList.remove("active");
        } else {
          filterPrestations("Professionnel");
          updateStyles();
          filtrePrestProfessionnel.classList.add("active");
          filtrePrestParticulier.classList.remove("active");
        }
        updatePrixTotal();
      });
    }

    function filterPrestations(type) {
      prestBlocs.forEach(function (prestBloc) {
        if (type === "Toutes" || prestBloc.dataset.type === type) {
          prestBloc.style.display = "flex";
        } else {
          prestBloc.style.display = "none";
        }
      });
    }

    function updatePrixTotalLeft(prixTotal) {
      var prixTotalLeftElement = document.querySelector(
        ".extra-prest.prix.total"
      );
      if (prixTotalLeftElement) {
        prixTotalLeftElement.textContent = "Prix : " + prixTotal + "€";
      }
    }

    function updatePrixTotal() {
      var prixTotal = 0;
      var prestationsSelectionnees = [];

      checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
          var prestBloc = checkbox.closest(".prest-bloc");
          if (prestBloc) {
            var prixPrestation = parseFloat(
              prestBloc.querySelector(".prix-prest").textContent
            );
            prixTotal += prixPrestation;
            var description =
              prestBloc.querySelector(".description-prest").textContent;
            var prix = prestBloc.querySelector(".prix-prest").textContent;
            var type = prestBloc.querySelector(".type-prest").textContent;
            var selectElement = prestBloc.querySelector("#choix");
            var duree =
              selectElement.options[selectElement.selectedIndex].textContent;
            // Ajouter la valeur de l'option sélectionnée
            var choix =
              selectElement.options[selectElement.selectedIndex].textContent;

            prestationsSelectionnees.push({
              description: description,
              prix: prix,
              type: type,
              duree: duree,
              choix: choix,
            });
          }
        }
      });

      var prixTotalElement = document.getElementById("prix-total-informations");
      if (prixTotalElement) {
        var prixTotalString = prixTotal.toFixed(2);
        var prixTotalFloat = parseFloat(prixTotalString);
        var prixTotalSansDecimales = Math.floor(prixTotalFloat);

        prixTotalElement.textContent = prixTotalSansDecimales + "€";
      }

      updatePrixTotalLeft(prixTotalSansDecimales);
    }

    document.addEventListener("DOMContentLoaded", function () {
      updatePrixTotal();
    });

    function updateStyles() {
      prestBlocs.forEach(function (prestBloc) {
        prestBloc.style.borderRadius = "0";
      });

      var visibleBlocks = Array.from(prestBlocs).filter(function (prest) {
        return window.getComputedStyle(prest).display === "flex";
      });

      if (visibleBlocks.length > 0) {
        visibleBlocks[visibleBlocks.length - 1].style.borderRadius =
          "0px 0px 10px 10px";
        if (
          visibleBlocks[visibleBlocks.length - 1].dataset.type === "Particulier"
        ) {
          filtrePrestParticulier.classList.add("active");
          filtrePrestProfessionnel.classList.remove("active");
        } else if (
          visibleBlocks[visibleBlocks.length - 1].dataset.type ===
          "Professionnel"
        ) {
          filtrePrestProfessionnel.classList.add("active");
          filtrePrestParticulier.classList.remove("active");
        }
      } else {
        prestBlocs.forEach(function (prestBloc) {
          prestBloc.style.borderRadius = "0";
        });
        filtrePrestParticulier.classList.remove("active");
        filtrePrestProfessionnel.classList.remove("active");
      }
    }
  });
})();
