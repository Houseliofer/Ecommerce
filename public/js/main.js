(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 768) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Header slider
    $('.header-slider').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Product Slider 4 Column
    $('.product-slider-4').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    // Product Slider 3 Column
    $('.product-slider-3').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    // Product Detail Slider
    $('.product-slider-single').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.product-slider-single-nav'
    });
    $('.product-slider-single-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        asNavFor: '.product-slider-single'
    });


    // Brand Slider
    $('.brand-slider').slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        swipeToSlide: true,
        centerMode: true,
        focusOnSelect: false,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 300,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Review slider
    $('.review-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Widget slider
    $('.sidebar-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Quantity
    $('.qty button').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });


    // Shipping address show hide
    $('.checkout #shipto').change(function () {
        if ($(this).is(':checked')) {
            $('.checkout .shipping-address').slideDown();
        } else {
            $('.checkout .shipping-address').slideUp();
        }
    });


    // Payment methods show hide
    $('.checkout .payment-method .custom-control-input').change(function () {
        if ($(this).prop('checked')) {
            var checkbox_id = $(this).attr('id');
            $('.checkout .payment-method .payment-content').slideUp();
            $('#' + checkbox_id + '-show').slideDown();
        }
    });
})(jQuery);


$(document).ready(()=>{

    //Registar Usuarios
    $("#registrarUsuario").submit(function(event) {
        event.preventDefault();
        // Obtiene los datos del formulario en el formato correcto
        var data = {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            address: $("#address").val(),
            password: $("#password").val(),
        };
    
        // Envía los datos a la API por AJAX
        $.ajax({
            url: 'http://localhost:3000/api/v1/user',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json', // Establece el tipo de contenido a JSON
            data: JSON.stringify(data), // Convierte los datos a formato JSON
            success: function(response) {
                console.log('Datos Enviados Correctamente', data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    //Termina Registrar Usuarios

    //inicia mostrar ordenes
    new DataTable('#tblOrders', {
        footerCallback: function (row, data, start, end, display) {
            let api = this.api();
            let total = 0;
    
            // Obtener los datos de las filas de la página actual
            let currentPageData = api.rows({ page: 'current' }).data();
    
            // Filtrar las filas para obtener solo las con status "approved"
            let filteredData = currentPageData.filter(function (row) {
                return row[4] === 'approved';
            });
    
            // Calcular el total de la página actual para las filas "approved"
            let pageTotal = filteredData.reduce(function (acc, row) {
                return acc + parseFloat(row[3].replace('$', '').replace(',', ''));
            }, 0);
    
            // Actualizar el pie de página con los totales
            $('tfoot th:last-child').html('$' + pageTotal.toFixed(2));
        }
    });
    //Temina Mostrar ordenes

    
    $('#selectCategories').select2({
        ajax:{
            url:'/api/categories',
            dataType:'json'
        }
    });

    $('#btnMostrar').click(() => {
        let selected = $('#selectCategories').select2('data');

        $('#tblProducts').DataTable().clear().destroy();
        $.getJSON("/api/products/"+(selected.length?selected[0].id:""), function (result) {
            $.each(result, function (i, obj) {
                $('#tblProducts > tbody:last-child').append(
                    '<tr>' +
                    '<td>' + obj.id            + '</td>' +
                    '<td>' + obj.name          + '</td>' +
                    '<td>' + obj.sale_price    + '</td>' +
                    '<td>' + obj.category.name + '</td>' +
                    '<td>' + obj.color         + '</td>' +
                    '<td>' + obj.size          + '</td>' +
                    '</tr>'
                );
            });
    
            let table = new DataTable('#tblProducts');
            //table.destroy();
        });
 
    });
});


