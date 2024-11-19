jQuery(document).ready(function ($) {
  console.log("test carousel");

  // Lorsque l'on clique sur le burger menu, on toggle l'affichage du menu mobile
  $(".burger-menu").click(function () {
    $(".mobile-menu-overlay").toggleClass("active");
    $(this).toggleClass("active");
  });

  $(".mobile-menu-overlay").click(function (event) {
    if (!$(event.target).closest(".mobile-navigation").length) {
      $(".mobile-menu-overlay").removeClass("active");
      $(".burger-menu").removeClass("active");
    }
  });

  $(".mobile-nav-menu .menu-item-has-children > a").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(this).parent().find(".sub-menu").stop(true, true).slideToggle(300);
  });

  // Fonction utilitaire : Vérifier si un élément est visible dans le viewport
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  // Animation de texte
  function wrapWordsInSpans(selector) {
    $(selector).each(function () {
      let html = $(this).html().trim();
      let words = html.split(/(<[^>]+>| )/g);
      let wrappedWords = words.map((word) => {
        if (word.startsWith("<") && word.endsWith(">")) return word;
        if (word.trim() === "") return word;
        return `<span>${word}</span>`;
      });
      $(this).html(wrappedWords.join(""));
    });
  }

  function animateTextReveal(selector) {
    $(selector).each(function () {
      let spans = $(this).find("span");
      spans.each(function (index) {
        $(this)
          .delay(index * 40)
          .queue(function (next) {
            $(this).addClass("show");
            next();
          });
      });
    });
  }

  wrapWordsInSpans(".animated-text");

  // Animation des nombres
  function animatedNumber(selector, totalDuration) {
    $(selector).each(function () {
      const $this = $(this);
      const from = parseInt($this.attr("data-from")) || 0;
      const to = parseInt($this.attr("data-to")) || 0;
  
      const steps = 200; // Nombre d'étapes total pour toutes les animations
      const stepIncrement = Math.ceil((to - from) / steps); // Calcul de l'incrément par étape
      const interval = Math.ceil(totalDuration / steps); // Temps entre chaque étape
  
      let currentValue = from;
  
      const increment = () => {
        if (currentValue < to) {
          currentValue += stepIncrement;
          if (currentValue > to) currentValue = to; // Assure de ne pas dépasser la valeur finale
          $this.text(`+${currentValue}`);
          setTimeout(increment, interval);
        } else {
          $this.text(`+${to}`); // Assure d'afficher la valeur finale exacte
        }
      };
  
      increment();
    });
  }

  // Gérer les animations au défilement
  function handleScrollAnimation() {
    // Animation de texte
    $(".animated-text").each(function () {
      if (isInViewport(this) && !$(this).hasClass("animated")) {
        $(this).addClass("animated");
        animateTextReveal(this);
      }
    });

    // Animation des nombres
    $(".animated-number").each(function () {
      if (isInViewport(this) && !$(this).hasClass("animated")) {
        $(this).addClass("animated");
        animatedNumber(this, 2000);
      }
    });
  }

  // Lancer les animations
  $(window).on("scroll", handleScrollAnimation);
  handleScrollAnimation();

  // Carrousel
  let currentSlide = 0;
  const indicators = $(".indicator");
  const slides = $(".caroussel-slide");
  const texts = $(".about-red-text");

  function showSlide(slideIndex) {
    indicators.removeClass("active");
    $(indicators[slideIndex]).addClass("active");

    slides.each(function (index) {
      $(this).removeClass("active inactive");
      $(this).css("transform", `translateX(-${slideIndex * 100}%)`);
      // Met à jour la couleur des titres
      if (index === slideIndex) {
        $(this).addClass("active");
      } else {
        $(this).addClass("inactive");
      }
    });

    texts.removeClass("active");
    $(texts[slideIndex]).addClass("active");
  }

  indicators.each(function (index) {
    $(this).on("click", function () {
      currentSlide = index;
      showSlide(currentSlide);
    });
  });

  setInterval(function () {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }, 5000);





  /* //slider
    const $cardsContainer = $('.notre-equipe-card');
    const $cards = $cardsContainer.find('.card');
    let currentCardIndex = 0;
    const totalCards = $cards.length;

    // Cacher toutes les cartes sauf la première
    $cards.hide().first().show();

    $('.slider-next').on('click', function() {
        // Carte courante
        const $currentCard = $cards.eq(currentCardIndex);
        
        // Prochaine carte
        currentCardIndex = (currentCardIndex + 1) % totalCards;
        const $nextCard = $cards.eq(currentCardIndex);

        // Vider le conteneur
        $cardsContainer.empty();

        // Ajouter les cartes dans le nouvel ordre
        $cardsContainer.append($nextCard);
        $nextCard.show();
    });

    $('.slider-prev').on('click', function() {
        // Carte courante
        const $currentCard = $cards.eq(currentCardIndex);
        
        // Carte précédente
        currentCardIndex = (currentCardIndex - 1 + totalCards) % totalCards;
        const $prevCard = $cards.eq(currentCardIndex);

        // Vider le conteneur
        $cardsContainer.empty();

        // Ajouter les cartes dans le nouvel ordre
        $cardsContainer.append($prevCard);
        $prevCard.show();
    }); */

    const $cardsContainer = $('.notre-equipe-card');
const $cards = $cardsContainer.find('.card');
let currentCardIndex = 0;
const totalCards = $cards.length;

// Fonction pour gérer l'affichage des cartes en fonction de la taille de l'écran
function handleCardsDisplay() {
    if ($(window).width() < 992) {
        // Sous 992px : cacher toutes les cartes sauf la première
        $cards.hide().first().show();
    } else {
        // Au-delà de 992px : afficher toutes les cartes
        $cards.show();
    }
}

// Appeler la fonction au chargement de la page
handleCardsDisplay();

// Réagir au redimensionnement de la fenêtre
$(window).on('resize', handleCardsDisplay);

$('.slider-next').on('click', function () {
    // Sous 992px, permettre le slider
    if ($(window).width() < 992) {
        const $currentCard = $cards.eq(currentCardIndex);
        currentCardIndex = (currentCardIndex + 1) % totalCards;
        const $nextCard = $cards.eq(currentCardIndex);
        $cardsContainer.empty();
        $cardsContainer.append($nextCard);
        $nextCard.show();
    }
});

$('.slider-prev').on('click', function () {
    // Sous 992px, permettre le slider
    if ($(window).width() < 992) {
        const $currentCard = $cards.eq(currentCardIndex);
        currentCardIndex = (currentCardIndex - 1 + totalCards) % totalCards;
        const $prevCard = $cards.eq(currentCardIndex);
        $cardsContainer.empty();
        $cardsContainer.append($prevCard);
        $prevCard.show();
    }
});

   


    




});
