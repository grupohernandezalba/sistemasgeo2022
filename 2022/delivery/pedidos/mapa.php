
    <style>
      #map {
        width: 100%;
        height: 350px;
      }
    </style>

    <div class="container">
      <div class="row">
        <div class="col-12">
          Buscar: <input id="autocomplete" class="form-control" placeholder="Ingresa tu domicilio" onFocus="geolocate()" type="text" autocomplete="off"/>
        </div>
      </div>
    </div>
    <div class="container bg-light rounded shadow my-3 p-3">
      <div class="row">
        <div class="col-12 col-md-6">
          Calle: <input id="route" name="route" required class="form-control"/>
        </div>
        <div class="col-12 col-md-6">
          No: <input id="street_number" name="street_number" required class="form-control"/>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          Ciudad: <input id="locality" required class="form-control"/>
        </div>
        <div class="col-12 col-md-6">
          Estado: <input id="administrative_area_level_1" required class="form-control"/>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          CP: <input id="postal_code" required class="form-control"/>
        </div>
        <div class="col-12 col-md-6">
          Páis: <input id="country" class="form-control"/>
          <input type="hidden" name="latitud" id="latitud">
          <input type="hidden" name="longitud" id="longitud">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div id="map"></div>
        </div>
      </div>
    </div>


    <script>

    var placeSearch, autocomplete;

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    var coordenadas = {  lat: 21.152639, lng:  -101.711598 };

    var propiedades = {
        center: coordenadas,
        zoom: 12
    };

    function initAutocomplete() {


    map = new google.maps.Map(document.getElementById('map'),propiedades);


    const options = {
      fields: ["formatted_address", "geometry", "name"],
      strictBounds: false,
      types: ["establishment"],
    };
    

        var autocompletado = document.getElementById('autocomplete');
        autocomplete = new google.maps.places.Autocomplete(autocompletado, options);

        autocomplete.bindTo("bounds", map);

        autocomplete.setFields(['address_component','geometry']);
        autocomplete.addListener('place_changed', obtieneDatos);
        
    }

  function obtieneDatos() {

    var place = autocomplete.getPlace();
    console.log(place);
    console.log('Resultado: ' + place.geometry);

    var marker = new google.maps.Marker({
        position: place.geometry.location,
        map: map
    });

    console.log('Location' + place.geometry.location);
    map.panTo(place.geometry.location);
    map.setZoom(18);
    map.setCenter(place.geometry.location);

    console.log(place.address_components);

    for (var i = 0; i < place.address_components.length; i++) {

      var addressType = place.address_components[i].types[0];

      console.log(addressType);

      if (componentForm[addressType]) {
        var val = place.address_components[i]['long_name'];
        document.getElementById(addressType).value = val;
      }
    }
  }

 
    function geolocate() {
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
            };


            var circle = new google.maps.Circle(
                {
                  strokeColor: '#FF0000',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor: '#FF0000',
                fillOpacity : 0.35,
                map: map,
                center: geolocation, 
                radius: position.coords.accuracy}
                );

            console.log(circle.getBounds());

            autocomplete.setBounds(circle.getBounds());

        });
        }
    }
  
  </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMrQgga-C5zCuZLTVk2MPVzX7naqKZXZU&libraries=places&callback=initAutocomplete" async defer></script>