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
  
    // Fonction pour vérifier si un élément est dans le viewport
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
  
  
    // TEXT REVEAL EFFECT
  
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
  
  // Initialisation : entoure chaque mot d'un <span>
  wrapWordsInSpans(".animated-text");
  
  // Fonction pour gérer l'animation au défilement
  function handleScrollAnimation() {
    $(".animated-text").each(function () {
      if (isInViewport(this) && !$(this).hasClass("animated")) {
        $(this).addClass("animated"); // Évite de relancer l'animation plusieurs fois
        animateTextReveal(this); // Lance l'animation pour les éléments visibles
      }
    });
  }
  
  $(window).on("scroll", handleScrollAnimation);
  handleScrollAnimation();
    
  
  /* // Lancer l'animation au chargement pour les éléments visibles
  $(document).ready(function () {
    handleScrollAnimation(); // Lancer l'animation au chargement pour les éléments dans le viewport
    $(window).on("scroll", handleScrollAnimation); // Animation au scroll
  }); */
  
    
    
    //ici caorousel
    // Carrousel
    let currentSlide = 0;
    const indicators = $(".indicator");
    const slides = $(".caroussel-slide");
    const texts = $(".about-red-text");
  
    function showSlide(slideIndex) {
      // Met à jour les indicateurs
      indicators.removeClass("active");
      $(indicators[slideIndex]).addClass("active");
  
      // Applique la transformation pour le défilement horizontal
      slides.each(function (index) {
        $(this).removeClass("active inactive");
  
        // Gère la position des titres avec translateX
        $(this).css("transform", `translateX(-${slideIndex * 100}%)`);
  
        // Met à jour la couleur des titres
        if (index === slideIndex) {
          $(this).addClass("active");
        } else {
          $(this).addClass("inactive");
        }
      });
  
      // Met à jour le texte correspondant
      texts.removeClass("active");
      $(texts[slideIndex]).addClass("active");
    }
  
    // Gestion des clics sur les indicateurs
    indicators.each(function (index) {
      $(this).on("click", function () {
        currentSlide = index;
        showSlide(currentSlide);
      });
    });
  
    // Navigation automatique
    setInterval(function () {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }, 5000); // Délai de 5 secondes entre chaque slide
  
    // Ajout pour l'initialisation des mots de texte animés
    $(".animated-text").each(function () {
      if (isInViewport(this) && !$(this).hasClass("animated")) {
        $(this).addClass("animated");
        animateTextReveal(this);
      }
    });
  
  
    //animated-number
    function animatedNumber(selector, duration){
      $(selector).each(function(){
        const $this = $(this); //select actual element
        const from = parseInt($this.attr("data-form")) || 0;
        const to = parseInt($this.attr("data-to")) || 0;
        const interval = Math.ceil(duration /(to-from))// calcule interval entre les increments
        let currentValue = from;
  
        const increment = () => {
          if(currentValue < to){
            currentValue++;
            $this.text(currentValue) //met a jour le text de l element
            setTimeout(increment, interval);
          }else{
            $this.text(to); //assure la valeur finale exact 
          }
        };
        increment(); //lance anime
      });
    }
  
    //lancer l'anim lors du defilement (et non au load du dom)
    function handleNumberAnimation(){
      $(".animated-number").each(function(){
        if(isInViewport(this) && !$(this).hasClass("animated")){
          $(this).addClass("animated"); //Evite de relancer l anim
          animatedNumber(this, 2000); //duree de 2sec pour anim 
        }
      });
    }
  
    $(window).on("scroll", handleNumberAnimation); 
    handleNumberAnimation();
   
  
  
  });
  