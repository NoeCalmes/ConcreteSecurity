const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const slideButtons = document.querySelectorAll(
    ".slider-wrapper .slide-button"
  );
  const sliderScrollbar = document.querySelector(
    ".container .slider-scrollbar"
  );
  const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

  // Handle scrollbar thumb drag
  scrollbarThumb.addEventListener("mousedown", (e) => {
    const startX = e.clientX;
    const thumbPosition = scrollbarThumb.offsetLeft;
    const maxThumbPosition =
      sliderScrollbar.getBoundingClientRect().width -
      scrollbarThumb.offsetWidth;

    // Update thumb position on mouse move
    const handleMouseMove = (e) => {
      const deltaX = e.clientX - startX;
      const newThumbPosition = thumbPosition + deltaX;

      // Ensure the scrollbar thumb stays within bounds
      const boundedPosition = Math.max(
        0,
        Math.min(maxThumbPosition, newThumbPosition)
      );
      const scrollPosition =
        (boundedPosition / maxThumbPosition) * maxScrollLeft;

      scrollbarThumb.style.left = `${boundedPosition}px`;
      imageList.scrollLeft = scrollPosition;
    };

    // Remove event listeners on mouse up
    const handleMouseUp = () => {
      document.removeEventListener("mousemove", handleMouseMove);
      document.removeEventListener("mouseup", handleMouseUp);
    };

    // Add event listeners for drag interaction
    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);
  });

  // Slide images according to the slide button clicks
  slideButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const direction = button.id === "prev-slide" ? -1 : 1;
      const scrollAmount = imageList.clientWidth * direction;
      imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });
  });

  // Creation Prestation

  // Show or hide slide buttons based on scroll position
  const handleSlideButtons = () => {
    slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
    slideButtons[1].style.display =
      imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  };

  // Update scrollbar thumb position based on image scroll
  const updateScrollThumbPosition = () => {
    const scrollPosition = imageList.scrollLeft;
    const thumbPosition =
      (scrollPosition / maxScrollLeft) *
      (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
    scrollbarThumb.style.left = `${thumbPosition}px`;
  };

  // Call these two functions when image list scrolls
  imageList.addEventListener("scroll", () => {
    updateScrollThumbPosition();
    handleSlideButtons();
  });
};

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);



/* DEMANDE PAGE */
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

    if (envoyerBtn && confirmerBtn && informationsContainer) {
      envoyerBtn.addEventListener("click", function () {
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
                selectElement.options[selectElement.selectedIndex].textContent;
              var infoText =
                description + "(" + type + ") " + duree + " - " + prix;
              var infoElement = document.createElement("p");
              infoElement.textContent = infoText;
              informationsContainer.appendChild(infoElement);
            }
          }
        });

        var prixTotalElement = document.createElement("p");
        var prixTotal = document.getElementById(
          "prix-total-informations"
        ).textContent;
        prixTotalElement.textContent = "Prix total: " + prixTotal;
        informationsContainer.appendChild(prixTotalElement);

        leftDemande.style.display = "none";
      });

      confirmerBtn.addEventListener("click", function () {
        alert("Les informations ont été envoyées avec succès !");
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
        updatePrixTotal();
      });
    });

    prestBlocs.forEach(function (prestBloc) {
      prestBloc.addEventListener("click", function () {
        var checkbox = prestBloc.querySelector(".inp-cbx");
        checkbox.checked = !checkbox.checked;
        prestBloc.classList.toggle("selected", checkbox.checked);
        updatePrixTotal();
      });
    });

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
        prixTotalLeftElement.textContent = "Prix total: " + prixTotal + "€";
      }
    }

    function updatePrixTotal() {
      var prixTotal = 0;

      checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
          var prestBloc = checkbox.closest(".prest-bloc");
          if (prestBloc) {
            var prixPrestation = parseFloat(
              prestBloc.querySelector(".prix-prest").textContent
            );
            prixTotal += prixPrestation;
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
