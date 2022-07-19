jQuery(document).ready(function ($) {
  "use strict";

  // Page loading animation

  $("#preloader").animate(
    {
      opacity: "0",
    },
    600,
    function () {
      setTimeout(function () {
        $("#preloader").css("visibility", "hidden").fadeOut();
      }, 300);
    }
  );

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var box = $(".header-text").height();
    var header = $("header").height();

    if (scroll >= box - header) {
      $("header").addClass("background-header");
    } else {
      $("header").removeClass("background-header");
    }
  });

  if ($(".owl-clients").length) {
    $(".owl-clients").owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      items: 1,
      margin: 30,
      autoplay: true,
      smartSpeed: 700,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1,
          margin: 0,
        },
        460: {
          items: 1,
          margin: 0,
        },
        576: {
          items: 2,
          margin: 20,
        },
        992: {
          items: 3,
          margin: 30,
        },
      },
    });
  }

  if ($(".owl-banner").length) {
    $(".owl-banner").owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      items: 1,
      margin: 0,
      autoplay: true,
      smartSpeed: 700,
      autoplayTimeout: 4000,
      responsive: {
        0: {
          items: 1,
          margin: 0,
        },
        460: {
          items: 1,
          margin: 0,
        },
        576: {
          items: 1,
          margin: 20,
        },
        992: {
          items: 1,
          margin: 30,
        },
      },
    });
  }

});

$(document).ready(function () {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  sync1.owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: true,
    autoplay: true,
    dots: true,
    loop: true,
    responsiveRefreshRate: 200,
    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
      items: slidesPerPage,
      dots: true,
      nav: true,
      smartSpeed: 200,
      slideSpeed: 500,
      slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
      responsiveRefreshRate: 100
    }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - (el.item.count / 2) - .5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }

    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();

    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }

  sync2.on("click", ".owl-item", function (e) {
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
});

//Alert borrar registro
function borrar() {
  return window.confirm('¿Estas seguro de borrar el registro? Esta acción es irreversible');
}

//Mostrar o no en sitio
function checkb() {
  let checkb = document.getElementById("visible");
  if (this.checked) {
    this.checked = false;
    checkb.value = 0;
  } else {
    this.checked = true;
    checkb.value = 1;
  }
}

//Reset filtros
$("#limpiar").on("click", function (e) {
  e.preventDefault();
  $('#myselect option').each(function () {
    if (this.value = "") {
      this.selected = true;
    } else {
      this.selected = false;
    }
  });
});

// FORMULARIO
let msjEnviado = document.getElementById("msjEnviado");
let msjNoEnviado = document.getElementById("msjNoEnviado");
let submit = document.getElementById("form-submit");
// definimos el formulario a usar formFile
const formFile = document.getElementById('form');

submit.addEventListener('click', function (event) {
  // definimos la accion clic al pulsar el boton submit
  if (formFile.checkValidity()) {

    // event.preventDefault(); // anulamos que boton nos lleve a otro lado
    //usamos FormData para compilar los datos a enviar
    // llamamos a una funcion que enviara los datos,
    // como parametro pasamos los datos del formulario
    var formData = new FormData(formFile);

    for (var i = 0; i < formData.length; i++) {
      formData.append('mail[]', arr[i]);
    }

    postData(formData);

    submit.disabled = true;
    msjEnviado.style.display = "none";
    msjNoEnviado.style.display = "none";
    document.getElementById("alertaEnviando").style.display = "block";
  }

  // nuestra función personalizada que envia datos y recibe respuesta del servidor
  // usamos async/await para trabajar de mejor manera la respuesta por parte del servidor

  // en fetch especificamos el archivo en el servidor que captura los datos enviados
  async function postData(formData) {
    const response = await fetch('/email', {
      // el metodo a usar
      method: 'POST',
      // los datos a ser enviados
      body: formData
    });
    document.getElementById("alertaEnviando").style.display = "none";
    // data contendra la respuesta del servidor
    const data = await response.text();
    console.log(data);
    if (data){
      document.getElementById("form").reset();
      msjEnviado.style.display = "block";
    } else {
      msjNoEnviado.style.display = "block";
    }
    submit.disabled = false;
  }
});