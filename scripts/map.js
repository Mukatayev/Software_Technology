

    /*$(document).ready(function () {

    $(".slidingDiv").hide();
    $(".btn-default").show();

    $('.btn-default').click(function () {
        $(".slidingDiv").toggle("slide");
    });

});*/


       
    	
 var directionsRenderer;
var autoComplete;
var googleMap;
var marker;

var markers = [];

var geocoder;
var googleMap;
var geoMarker;
var bounds = new google.maps.LatLngBounds();
var select;
var select1;
var markerArray = [];








$(document).ready(function () {
    $('#btnAddLocation').click(function () {
        if ($('#txtLocation').val().trim() == "") {
            alert('Please enter location.');
            return;
        }

        // Remove previous marker, if any
        if (marker) {
            marker.setMap(null);
        }

        // Add location to source as well as destination drop down lists.
        $('#ddlDestination').append('<option value="' + $('#txtLocation').val() + '">' + $('#txtLocation').val() + '</option>');
        $('#ddlSource').append('<option value="' + $('#txtLocation').val() + '">' + $('#txtLocation').val() + '</option>');

        // Clear location text box and focus it.
        $('#txtLocation').val('');
        $('#txtLocation').focus();

        // Display success message.
        $('#successMessage').show();
        
        // Hide success message after 5 seconds.
        setTimeout(function () {
            $('#successMessage').hide();
        }, 800);
    });


    $('#print').click(function printMaps() {


     	var body               = $('body');
      var mapContainer       = $('.map');
      var mapContainerParent = mapContainer.parent();
      var panelContainer       = $('#panel');
      var panelContainerParent = mapContainer.parent();
      var printContainer     = $('<div>');

      printContainer
        .addClass('print-container')
        .css('position', 'relative')
        .height(mapContainer.height())
        .append(mapContainer)
        .height(panelContainer.height())
        .append(panelContainer)
        .prependTo(body);

      var content = body
        .children()
        .not('script')
        .not(printContainer)
        .detach();
        
      // Patch for some Bootstrap 3.3.x `@media print` styles. :|
      var patchedStyle = $('<style>')
        .attr('media', 'print')
        .text('img { max-width: none !important; }' +
              'a[href]:after { content: ""; }')
        .appendTo('head');  

      window.print();
      window.close();
           

      body.prepend(content);
      mapContainerParent.prepend(mapContainer);
      panelContainerParent.prepend(panelContainer);

      printContainer.remove();
      patchedStyle.remove();
     

    
    });

    /*$('#chkDestinationIsSameAsSource').change(function () {
        $('#ddlDestination').attr('disabled', $('#chkDestinationIsSameAsSource').is(':checked'));
        if ($('#chkDestinationIsSameAsSource').is(':checked')) {
            $('#ddlDestination').val($('#ddlSource').val());
        }
    });*/

    /*$('#ddlSource').change(function () {
        if ($('#chkDestinationIsSameAsSource').is(':checked')) {
            $('#ddlDestination').val($('#ddlSource').val());
        }
    });*/

    $('#btnDisplayDirections').click(function () {
        if ($('#ddlSource').val() == '') {
            alert('Please select Source.');
            $('#ddlSource').focus();
            return;
        }

        if ($('#ddlDestination').val() == '') {
            alert('Please select Destination.');
            $('#ddlDestination').focus();
            return;
        }

        if ($('#ddlTravelMode').val() == '') {
            alert('Please select Travel Mode.');
            $('#ddlTravelMode').focus();
            return;
        }

        // Clear previous directions, if any.
        if (directionsRenderer) {
            directionsRenderer.setMap(null);
        }
        $('#panel').html('');

        var directionsService = new google.maps.DirectionsService;

        directionsRenderer = new google.maps.DirectionsRenderer({
            map: googleMap,
            panel: document.getElementById("panel"),
            draggable: true
           
        });

        // Add way points to array.
        var wayPoints = [];
        $('#ddlSource > option').each(function () {
            if ($(this).val() != '' && $(this).val() != $('#ddlSource').val() && $(this).val() != $('#ddlDestination').val()) {
                var wayPoint = {
                    location: $(this).val(),
                    stopover: true
                };
                wayPoints.push(wayPoint);
            }
        });

         var stepDisplay = new google.maps.InfoWindow;


        // Create directions request.
        var directionsRequest = {
            origin: $('#ddlSource').val(),
            destination: $('#ddlDestination').val(),
            travelMode: google.maps.TravelMode[$('#ddlTravelMode').val()],
            waypoints: wayPoints,
            optimizeWaypoints: $('#chkOptimizePath').is(':checked')
        };

        // Send request to the directions service.
        directionsService.route(directionsRequest, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
                  computeTotalDistance(response);

                //showSteps(response, markerArray, stepDisplay, googleMap);
                var route = [];

                var start = response.routes[0].legs[0].start_location;


                 route = response.routes[0].waypoint_order.bounds;
    



              //alert(route);

            } else {
                alert('Directions request failed due to ' + status);
            }
        });



    });
});



function initializeMap() {


    // Specify auto complete text box.
    autoComplete = new google.maps.places.Autocomplete(document.getElementById("txtLocation"));

    // Add auto complete listener.
    autoComplete.addListener('place_changed', function () {
        // Display the place on the map.
        var place = autoComplete.getPlace();
        googleMap.setCenter(place.geometry.location);
        googleMap.setZoom(15);

        // Remove previous marker, if any.
        if (marker) {
            marker.setMap(null);
        }

        // Add a new marker.
        marker = new google.maps.Marker({
            position: place.geometry.location,
            map: googleMap,
            title: place.formatted_address
        });
    });

    document.getElementById('btnClearDirections').addEventListener('click', function () {
        if (confirm('Are you sure you want to clear all locations?')) {
            // Clear directions, if any.
            if (directionsRenderer) {
                directionsRenderer.setMap(null);
            }

            // Clear the form.
            $('#panel').html('');
            $('#frmLocation').get(0).reset();



            select = document.getElementById("ddlSource");
            var length = select.options.length;
                for (i = length; i >= 0; i--) {
                    select.remove(i);
            }

            select1 = document.getElementById("ddlDestination");
            var length1 = select1.options.length;
                for (i = length; i >= 0; i--) {
                    select1.remove(i);
            }

             $('#ddlDestination').attr('disabled', $('#chkDestinationIsSameAsSource').is(':checked'));

            // Remove previous marker, if any.
            if (marker) {
                marker.setMap(null);
            }
        }
    });

    var latLng = new google.maps.LatLng(43.238885, 76.897097);



	var my_style = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
];



    var mapOptions = {		
        center: latLng,
        zoom: 12,
        styles: my_style
    };

    googleMap = new google.maps.Map(document.getElementById("googleMap"), mapOptions);


    var input = /** @type {!HTMLInputElement} */(
            document.getElementById('txtLocation'));
    var centerControlDiv = document.createElement('div');
     //var centerControl = new CenterControl(centerControlDiv, googleMap);
  	var add = /** @type {!HTMLInputElement} */(
            document.getElementById('btnAddLocation'));
  	var sourcedd = /** @type {!HTMLInputElement} */(
            document.getElementById('traffic'));
  	var destinationdd = /** @type {!HTMLInputElement} */(
            document.getElementById('print'));

  
        centerControlDiv.index = 1;
        centerControlDiv.style['padding-top'] = '10px';
        input.index = 1;
        
        input.style['padding'] = '0 11px 0 13px';
        input.style['width'] = '300px';


    

        destinationdd.style['float'] = 'right'; 
        destinationdd.style['margin-right'] = '8px'; 
        destinationdd.style['margin-top'] = '5px'; 
   


        sourcedd.style['float'] = 'right'; 
        sourcedd.style['margin-right'] = '8px'; 

      



        //googleMap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      //  googleMap.controls[google.maps.ControlPosition.TOP_LEFT].push(add);	
      
        googleMap.controls[google.maps.ControlPosition.TOP_RIGHT].push(destinationdd);
         googleMap.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(sourcedd);




      

	googleMap.data.loadGeoJson(
            'https://storage.googleapis.com/mapsdevsite/json/google.json');

   var contentString = 'If you have question: nuraly.mukataev@is.sdu.edu.kz';



	var infowindow = new google.maps.InfoWindow({
          content: contentString
        });


   

     

	 var image = 'http://x-lines.ru/letters/i/cyrillicdreamy/0130/162127/18/1/4nq7dy6todembwf54gfo.png';
  var myLatLng1 = new google.maps.LatLng(43.260046, 77.034502); //or wherever you want the marker placed
  var beachMarker = new google.maps.Marker({
      position: myLatLng1,
      map: googleMap,
      icon: image,
      title: 'nuraly.mukataev@is.sdu.edu.kz',
      draggable: true
  });

   beachMarker.addListener('click', function() {
          infowindow.open(googleMap, beachMarker);
        });
      

    var trafficLayer = new google.maps.TrafficLayer();


    function toggleTraffic() {
  if (trafficLayer.getMap() == null) {
    //traffic layer is disabled.. enable it
    trafficLayer.setMap(googleMap);
  } else {
    //traffic layer is enabled.. disable it
    trafficLayer.setMap(null);
  }
}

google.maps.event.addDomListener(document.getElementById('traffic'), 'click', toggleTraffic);


 var txtArray = $("#ddlSource option").each(function() {
    geocodeAddress($(this).text());
     console.log($(this).text());
  });

     var txtArray = $("#ddlDestination option").each(function() {
    geocodeAddress($(this).text());
     console.log($(this).text());
  });



     $("#ddlSource").change(function() {
    var addr = ($('#ddlSource :selected').text());
    console.log(addr);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
      'address': addr
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0].geometry.viewport) {
          googleMap.fitBounds(results[0].geometry.viewport);
        } else if (results[0].geometry.bounds) {
          googleMap.fitBounds(results[0].geometry.bounds);
        } else {
          googleMap.setCenter(results[0].geometry.location);
        }
      } else {
        alert("Error geocoding address: " + address + "status=" + status);
      }
    });
  });


    $("#ddlDestination").change(function() {
    var addr = ($('#ddlDestination :selected').text());
    console.log(addr);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
      'address': addr
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0].geometry.viewport) {
          googleMap.fitBounds(results[0].geometry.viewport);
        } else if (results[0].geometry.bounds) {
          googleMap.fitBounds(results[0].geometry.bounds);
        } else {
          googleMap.setCenter(results[0].geometry.location);
        }
      } else {
        alert("Error geocoding address: " + address + "status=" + status);
      }
    });
  });


    google.maps.event.addListener(googleMap, 'click', function (e) {
        // Remove previous marker, if any.
        if (marker) {
            marker.setMap(null);
        }

        // Get address by lat/lng.
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': e.latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[0].formatted_address;

                    marker = new google.maps.Marker({
                        position: e.latLng,
                        map: googleMap,
                        title: address
                    });

                    $('#txtLocation').val(address);
                }
            }
        });
    });
}

function showSteps(directionResult, markerArray, stepDisplay, map) {
  // For each step, place a marker, and add the text to the marker's infowindow.
  // Also attach the marker to an array so we can keep track of it and remove it
  // when calculating new routes.
  for (var j = 0 ; j < directionResult.routes[0].legs.length; j++ ){
  
  var myRoute = directionResult.routes[0].legs[j];


  for (var i = 0; i < myRoute.steps.length; i++) {
    var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
    marker.setMap(map);
    marker.setPosition(myRoute.steps[i].start_location);
    attachInstructionText(
        stepDisplay, marker, myRoute.steps[i].instructions, map);
  }
    }
 
}

  function computeTotalDistance(result) {
             var total = 0;
            var myroute = result.routes[0];
            for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
                }
                total = total / 1000;
             document.getElementById('total').innerHTML = total + ' km';
}



function attachInstructionText(stepDisplay, marker, text, map) {
  google.maps.event.addListener(marker, 'click', function() {
    // Open an info window when the marker is clicked on, containing the text
    // of the step.
    stepDisplay.setContent(text);
    stepDisplay.open(map, marker);
  });
}

 function geocodeAddress(address) {    
  geocoder = new google.maps.Geocoder();

      
  geocoder.geocode({
    'address': address
  }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {

      bounds.extend(results[0].geometry.location);
      googleMap.fitBounds(bounds);
    } 
    else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) { 
        nextAddress--;
            delay++;
        alert("OQL: " + status);
        } 

    else {
      alert("Error geocoding address: " + address + "status=" + status);
    }
  });
  
}


 


// Add window load event.
google.maps.event.addDomListener(window, "load", initializeMap);

