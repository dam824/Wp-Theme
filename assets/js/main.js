jQuery(document).ready(function ($) {
  console.log("test carousel");
  // Lorsque l'on clique sur le burger menu, on toggle l'affichage du menu mobile
  $(".burger-menu").click(function () {
    $(".mobile-menu-overlay").toggleClass("active");
    $(this).toggleClass("active"); // Toggle la classe active pour le burger menu
  });

  // Pour fermer le menu en cliquant en dehors (facultatif)
  $(".mobile-menu-overlay").click(function (event) {
    if (!$(event.target).closest(".mobile-navigation").length) {
      $(".mobile-menu-overlay").removeClass("active");
      $(".burger-menu").removeClass("active"); // Enlève aussi la classe active du burger menu
    }
  });

  // Gestion du sous-menu mobile au clic
  $(".mobile-nav-menu .menu-item-has-children > a").click(function (e) {
    e.preventDefault(); // Empêche la navigation directe
    $(this).toggleClass("active"); // Toggle la classe active pour changer le chevron
    $(this).parent().find(".sub-menu").stop(true, true).slideToggle(300); // Affiche ou masque le sous-menu
  });

  //text reveal
  // Fonction pour entourer chaque mot d'un <span>
  function wrapWordsInSpans(selector) {
    $(selector).each(function () {
      let words = $(this).text().split(" ");
      $(this).html(words.map((word) => `<span>${word}</span>`).join(" "));
      console.log(words);
    });
  }

  // Fonction pour entourer chaque mot d'un <span>, même si certains mots sont déjà entourés
  function wrapWordsInSpans(selector) {
    $(selector).each(function () {
      let html = $(this).html().trim();
      let words = html.split(/(<[^>]+>| )/g); // Garde les balises et les espaces
      let wrappedWords = words.map((word) => {
        if (word.startsWith("<") && word.endsWith(">")) {
          // Conserve les balises HTML telles quelles
          return word;
        } else if (word.trim() === "") {
          // Conserve les espaces
          return word;
        } else {
          // Enveloppe chaque mot dans un span
          return `<span>${word}</span>`;
        }
      });
      $(this).html(wrappedWords.join(""));
    });
  }

  // Fonction pour animer les mots dans les <span> de manière synchrone
  function animateTextReveal() {
    let h1Spans = $(".home-banner-content h1.animated-text span");
    let pSpans = $(".home-banner-content p.animated-text span");
    let totalSpans = Math.max(h1Spans.length, pSpans.length); // Prend le plus grand nombre de spans pour synchroniser

    for (let i = 0; i < totalSpans; i++) {
      $(h1Spans[i])
        .delay(i * 40)
        .queue(function (next) {
          $(this).addClass("show");
          next();
        });
      $(pSpans[i])
        .delay(i * 40)
        .queue(function (next) {
          $(this).addClass("show");
          next();
        });
    }
  }

  wrapWordsInSpans(".home-banner-content .animated-text");
  animateTextReveal();

  // Lancer les animations
  wrapWordsInSpans(".home-banner-content .animated-text");
  animateTextReveal();

  //test caorousel
  let currentSlide = 0;

  function showSlide(slideIndex) {
    // Changer l'indicateur actif
    $(".indicator").removeClass("active");
    $('.indicator[data-slide="' + slideIndex + '"]').addClass("active");

    // Mettre à jour les slides
    $(".caroussel-slide").each(function (index) {
      $(this).removeClass("active hide-left").css({
        opacity: "0",
        transform: "translateX(100%)",
      });
      if (index < slideIndex) {
        $(this).addClass("hide-left"); // Cacher les titres à gauche
      } else if (index === slideIndex) {
        $(this).addClass("active").css({
          opacity: "1",
          transform: "translateX(0)",
        });
      }
    });

    // Mettre à jour le texte correspondant
    $(".about-red-text").removeClass("active").css("opacity", "0");
    $('.about-red-text[data-slide="' + slideIndex + '"]')
      .addClass("active")
      .css("opacity", "1");
  }

  // Gestion des clics sur les indicateurs
  $(".indicator").click(function () {
    let slideIndex = $(this).data("slide");
    currentSlide = slideIndex;
    showSlide(currentSlide);
  });

  // Navigation automatique
  setInterval(function () {
    currentSlide = (currentSlide + 1) % 3; // Passe au slide suivant
    showSlide(currentSlide);
  }, 50000000); // 5 secondes entre chaque slide
});
