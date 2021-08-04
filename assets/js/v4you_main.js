function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16,
      center: { lat: 20.6407228, lng: -105.2284675 },
    });
    // Create an array of alphabetical characters used to label the markers.
    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    const markers = locations.map((location, i) => {
      return new google.maps.Marker({
        position: location,
        label: labels[i % labels.length],
      });
    });
    // Add a marker clusterer to manage the markers.
    new MarkerClusterer(map, markers, {
      imagePath:
        "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
    });
  }
  const locations = [
    { lat: 20.6408528, lng: -105.2324269 },
    { lat: 20.6381063, lng: -105.2220256 },
  
  ];

    var rellax = new Rellax('.rellax', {
        wrapper: '.parallax-os-container'
    });
    

    /**Contact form submission */

    $('#osContactForm').on('submit', function (e) {
        e.preventDefault();

        $('.has-error').removeClass('has-error');
        $('.js-show-feedback').removeClass('js-show-feedback');

        var form = $(this);

        var name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            phone = form.find('#phone').val(),
            ajaxurl = form.data('url');

        if (name === '') {
            $('#name').parent('.col').addClass('has-error');
            return;
        }

        if (email === '') {
            $('#email').parent('.col').addClass('has-error');
            return;
        }

        if (message === '') {
            $('#message').parent('.col').addClass('has-error');
            return;
        }

        form.find('input, button, textarea').attr('disabled', 'disabled');

        $('.js-form-submission').addClass('js-show-feedback');

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                message: message,
                action: 'v4you_save_contact'
            },

            error: function (response) {
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').removeClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success: function (response) {
                if (response == 0) {
                    setTimeout(function () {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').removeClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);


                } else {
                    setTimeout(function () {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').removeClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    }, 1500);

                }
            }
        });

        console.log('Form submited');
    });

    $("#osContactFormLink").on('click', 'a', function (event) {

        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 140
        }, 500);


    });

