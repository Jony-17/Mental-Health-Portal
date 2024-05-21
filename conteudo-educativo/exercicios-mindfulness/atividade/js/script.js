/*---------------Carrossel---------------*/
$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 1
          }
      }
  });
});

/*---------------Fontes---------------*/

//Função fontes
const fontes = document.querySelectorAll(".fontes");

fontes.forEach(fonte => {
    fonte.addEventListener("click", () => {
        fonte.classList.toggle("active");
    });
});

/*---------------Botão gotop---------------*/

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (
    document.body.scrollTop > 500 ||
    document.documentElement.scrollTop > 500
  ) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}

function scrollTopFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/*---------------Hamburguer e Dropdown---------------*/

const btn = document.querySelector(".toggle_btn");
const btnIcon = document.querySelector(".toggle_btn i");
const dropdownMenus = document.querySelectorAll(".dropdown_menu");

// Função para calcular a altura total dos dropdowns abertos
function calcularAlturaDropdownsAbertos() {
  let alturaTotal = 0;
  dropdownMenus.forEach((menu) => {
    if (menu.classList.contains("open")) {
      alturaTotal += menu.scrollHeight;
    }
  });
  return alturaTotal;
}

// Event listener para o botão do hambúrguer
btn.onclick = function () {
  dropdownMenus.forEach((menu) => {
    menu.classList.toggle("open");
  });

  const isOpen = dropdownMenus[0].classList.contains("open"); // Verificar apenas um dos menus

  btnIcon.className = isOpen ? "fas fa-xmark" : "fas fa-bars";

  // Ajustar a altura do dropdown_menu
  const alturaDropdownsAbertos = calcularAlturaDropdownsAbertos();
  dropdownMenus[0].style.height = `${alturaDropdownsAbertos}px`;
};

// Event listener para os dropdown triggers (dropdown Conteúdo Educativo, Perfil no telemóvel)
const dropdownTriggers = document.querySelectorAll(".dropdown-trigger");

dropdownTriggers.forEach((trigger) => {
  trigger.addEventListener("click", function (event) {
    event.preventDefault();
    const dropdown = this.querySelector(".dropdown");
    dropdown.classList.toggle("is-active");
  });

  const dropdownItems = trigger.querySelectorAll(".dropdown li");
  dropdownItems.forEach((item) => {
    item.addEventListener("click", function (event) {
      event.stopPropagation(); // Impede a propagação do evento até o elemento pai
    });
  });
});

/*---------------Loading---------------*/

const loader = document.querySelector(".loader");

//Função Load página
function hideLoader() {
  loader.classList.add("loader--hidden");

  loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
  });
}

window.addEventListener("load", () => {
  hideLoader();
  setInterval(textLoad, 12000);
});

/*---------------Footer---------------*/

/*function changeLanguage(language) {
            // Lógica para mudar o idioma aqui
            // Por exemplo, você pode recarregar a página com o idioma selecionado ou usar AJAX para carregar novos conteúdos.
            console.log("Idioma selecionado: " + language);

            if (language === 'portuguese') {
                document.getElementById('portugues').removeAttribute('href');
                document.getElementById('ingles').setAttribute('href', '#');
            } else if (language === 'english') {
                document.getElementById('ingles').removeAttribute('href');
                document.getElementById('portugues').setAttribute('href', '#');
            }

            // Aqui você pode implementar a lógica para alterar o idioma conforme necessário
        }*/

//Função Light/Dark
function toggleDarkMode() {
  document.body.classList.toggle("dark-mode", this.checked);
}
darkModeToggle.addEventListener("change", toggleDarkMode);
const darkModeToggle = document.getElementById("darkmode-toggle");