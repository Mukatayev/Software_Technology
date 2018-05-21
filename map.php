<?php 


mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("stock") or die(mysql_error());

$query = "SELECT client_address from orders where payment_type = 2 and order_status = 1";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
$result1 = mysql_query($query) or die(mysql_error()."[".$query."]");

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Logistics</title>
    
    <link href="./styles/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./styles/ie10-viewport-bug-workaround.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>

  
  



   <!-- <link href="./styles/style.css" rel="stylesheet" type="text/css" />-->

    <script src="./scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="./scripts/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./scripts/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      --AIzaSyAu8PGryDoIrZkodd2vAyyxP4IiD7OWNlM
    <![endif]-->

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <style type="text/css">
        .form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #2220ac;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #2220ac;
    padding: 3%;
    border: 1px solid #2220ac;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #2220ac;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #1e1c97;
}
    
body {
    padding-top: 55px;
}




.map {
    
    width: 100%;
    height: 583px;
    z-index: 1;

  
  /* Set up positioning */
}


.form-inline {
    margin: 10px;
}

select {
    width: 180px !important;
}

@media(max-width: 767px) {
    select {
        width: 100% !important;
    }
    
    input[type="button"] {
        width: 100% !important;
    }
}

.success-msg {
    position: relative;
    z-index: 9;
    margin-top: 13px;
    margin-left: 9px;
    bottom: 50px;
    display: none;
    width: 150px;
    height: 40px;
    text-align: center;
}

.success-msg  .str{
    position: relative;
    bottom: 5px;
    
}

</style>

</head>
<script type="text/javascript">


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
$(document).ready(function() {

    

    $('#getadd').click(function(){

        <?php 

        $results = array();
        $resultsd = array();


                        while ($row = mysql_fetch_array($result1))
{
    $results[] = $row[client_address];
}



                        while ($row = mysql_fetch_array($result))
{
    $resultsd[] = $row[client_address];
}

?> 


        <?php
$js_array = json_encode($results);
$js_arrayd = json_encode($resultsd);

echo "var optionsarray = ". $js_array . ";\n";
echo "var optionsarrayd = ". $js_arrayd . ";\n";
?>



var seloption = "";
var seloptiond = "";

$.each(optionsarray,function(i){
    seloption += '<option value="'+optionsarray[i]+'">'+optionsarray[i]+'</option>'; 
});

$.each(optionsarrayd,function(i){   
    seloptiond += '<option value="'+optionsarrayd[i]+'">'+optionsarrayd[i]+'</option>'; 
});

$('#ddlSource').append(seloption);

$('#ddlDestination').append(seloptiond);



    });





    $('#btnAddLocation').click(function() {
        if ($('#txtLocation').val().trim() == "") {
            alert('Please enter location.');
            return
        }
        if (marker) {
            marker.setMap(null)
        }
        $('#ddlDestination').append('<option value="' + $('#txtLocation').val() + '">' + $('#txtLocation').val() + '</option>');
        $('#ddlSource').append('<option value="' + $('#txtLocation').val() + '">' + $('#txtLocation').val() + '</option>');
        $('#txtLocation').val('');
        $('#txtLocation').focus();
        $('#successMessage').show();
        setTimeout(function() {
            $('#successMessage').hide()
        }, 800)
    }); 
    $('#print').click(function printMaps() {
        var body = $('body');
        var mapContainer = $('.map');
        var mapContainerParent = mapContainer.parent();
        var panelContainer = $('#panel');
        var panelContainerParent = mapContainer.parent();
        var printContainer = $('<div>');
        printContainer.addClass('print-container').css('position', 'relative').height(mapContainer.height()).append(mapContainer).height(panelContainer.height()).append(panelContainer).prependTo(body);
        var content = body.children().not('script').not(printContainer).detach();
        var patchedStyle = $('<style>').attr('media', 'print').text('img { max-width: none !important; }' + 'a[href]:after { content: ""; }').appendTo('head');
        window.print();
        window.close();
        body.prepend(content);
        mapContainerParent.prepend(mapContainer);
        panelContainerParent.prepend(panelContainer);
        printContainer.remove();
        patchedStyle.remove()
    });
    $('#btnDisplayDirections').click(function() {
        if ($('#ddlSource').val() == '') {
            alert('Please select Source.');
            $('#ddlSource').focus();
            return
        }
        if ($('#ddlDestination').val() == '') {
            alert('Please select Destination.');
            $('#ddlDestination').focus();
            return
        }
        if ($('#ddlTravelMode').val() == '') {
            alert('Please select Travel Mode.');
            $('#ddlTravelMode').focus();
            return
        }
        if (directionsRenderer) {
            directionsRenderer.setMap(null)
        }
        $('#panel').html('');
        var directionsService = new google.maps.DirectionsService;
        directionsRenderer = new google.maps.DirectionsRenderer({
            map: googleMap,
            panel: document.getElementById("panel"),
            draggable: true
        });
        var wayPoints = [];
        $('#ddlSource > option').each(function() {
            if ($(this).val() != '' && $(this).val() != $('#ddlSource').val() && $(this).val() != $('#ddlDestination').val()) {
                var wayPoint = {
                    location: $(this).val(),
                    stopover: true
                };
                wayPoints.push(wayPoint)
            }
        });
        var stepDisplay = new google.maps.InfoWindow;
        var directionsRequest = {
            origin: $('#ddlSource').val(),
            destination: $('#ddlDestination').val(),
            travelMode: google.maps.TravelMode[$('#ddlTravelMode').val()],
            waypoints: wayPoints,
           // optimizeWaypoints: $('#chkOptimizePath').is(':checked')
        };
        directionsService.route(directionsRequest, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
               
            } else {
                alert('Directions request failed due to ' + status)
            }
        })
    })
});

function initializeMap() {
    autoComplete = new google.maps.places.Autocomplete(document.getElementById("txtLocation"));
    autoComplete.addListener('place_changed', function() {
        var place = autoComplete.getPlace();
        googleMap.setCenter(place.geometry.location);
        googleMap.setZoom(15);
        if (marker) {
            marker.setMap(null)
        }
        marker = new google.maps.Marker({
            position: place.geometry.location,
            map: googleMap,
            title: place.formatted_address
        })
    });
    document.getElementById('btnClearDirections').addEventListener('click', function() {
        if (confirm('Are you sure you want to clear all locations?')) {
            if (directionsRenderer) {
                directionsRenderer.setMap(null)
            }
            $('#panel').html('');
            $('#frmLocation').get(0).reset();
            select = document.getElementById("ddlSource");
            var length = select.options.length;
            for (i = length; i >= 0; i--) {
                select.remove(i)
            }
            select1 = document.getElementById("ddlDestination");
            var length1 = select1.options.length;
            for (i = length; i >= 0; i--) {
                select1.remove(i)
            }
            $('#ddlDestination').attr('disabled', $('#chkDestinationIsSameAsSource').is(':checked'));
            if (marker) {
                marker.setMap(null)
            }
        }
    });
    var latLng = new google.maps.LatLng(47.4979, 19.0402);
    var my_style = [{
        "elementType": "geometry",
        "stylers": [{
            "color": "#ebe3cd"
        }]
    }, {
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#523735"
        }]
    }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
            "color": "#f5f1e6"
        }]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#c9b2a6"
        }]
    }, {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#dcd2be"
        }]
    }, {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#ae9e90"
        }]
    }, {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [{
            "color": "#dfd2ae"
        }]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
            "color": "#dfd2ae"
        }]
    }, {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#93817c"
        }]
    }, {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#a5b076"
        }]
    }, {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#447530"
        }]
    }, {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f5f1e6"
        }]
    }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
            "color": "#fdfcf8"
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f8c967"
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#e9bc62"
        }]
    }, {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry",
        "stylers": [{
            "color": "#e98d58"
        }]
    }, {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#db8555"
        }]
    }, {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#806b63"
        }]
    }, {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [{
            "color": "#dfd2ae"
        }]
    }, {
        "featureType": "transit.line",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#8f7d77"
        }]
    }, {
        "featureType": "transit.line",
        "elementType": "labels.text.stroke",
        "stylers": [{
            "color": "#ebe3cd"
        }]
    }, {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [{
            "color": "#dfd2ae"
        }]
    }, {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#b9d3c2"
        }]
    }, {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#92998d"
        }]
    }];
    var mapOptions = {
        center: latLng,
        zoom: 12,
        styles: my_style
    };
    googleMap = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    var input = (document.getElementById('txtLocation'));
    var centerControlDiv = document.createElement('div');
    var add = (document.getElementById('btnAddLocation'));
    var sourcedd = (document.getElementById('traffic'));
    var destinationdd = (document.getElementById('print'));
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
    googleMap.controls[google.maps.ControlPosition.TOP_RIGHT].push(destinationdd);
    googleMap.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(sourcedd);
    googleMap.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');
    var contentString = 'If you have question: nuraly.mukataev@is.sdu.edu.kz';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    var image = 'http://x-lines.ru/letters/i/cyrillicdreamy/0130/162127/18/1/4nq7dy6todembwf54gfo.png';
    var myLatLng1 = new google.maps.LatLng(43.260046, 77.034502);
    var beachMarker = new google.maps.Marker({
        position: myLatLng1,
        map: googleMap,
        icon: image,
        title: 'nuraly.mukataev@is.sdu.edu.kz',
        draggable: true
    });
    beachMarker.addListener('click', function() {
        infowindow.open(googleMap, beachMarker)
    });
    var trafficLayer = new google.maps.TrafficLayer();

    function toggleTraffic() {
        if (trafficLayer.getMap() == null) {
            trafficLayer.setMap(googleMap)
        } else {
            trafficLayer.setMap(null)
        }
    }
    google.maps.event.addDomListener(document.getElementById('traffic'), 'click', toggleTraffic);
    var txtArray = $("#ddlSource option").each(function() {
        geocodeAddress($(this).text());
        console.log($(this).text())
    });
    var txtArray = $("#ddlDestination option").each(function() {
        geocodeAddress($(this).text());
        console.log($(this).text())
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
                    googleMap.fitBounds(results[0].geometry.viewport)
                } else if (results[0].geometry.bounds) {
                    googleMap.fitBounds(results[0].geometry.bounds)
                } else {
                    googleMap.setCenter(results[0].geometry.location)
                }
            } else {
                alert("Error geocoding address: " + address + "status=" + status)
            }
        })
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
                    googleMap.fitBounds(results[0].geometry.viewport)
                } else if (results[0].geometry.bounds) {
                    googleMap.fitBounds(results[0].geometry.bounds)
                } else {
                    googleMap.setCenter(results[0].geometry.location)
                }
            } else {
                alert("Error geocoding address: " + address + "status=" + status)
            }
        })
    });
    google.maps.event.addListener(googleMap, 'click', function(e) {
        if (marker) {
            marker.setMap(null)
        }
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'latLng': e.latLng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[0].formatted_address;
                    marker = new google.maps.Marker({
                        position: e.latLng,
                        map: googleMap,
                        title: address
                    });
                    $('#txtLocation').val(address)
                }
            }
        })
    })
}
function showSteps(directionResult, markerArray, stepDisplay, map) {
    for (var j = 0; j < directionResult.routes[0].legs.length; j++) {
        var myRoute = directionResult.routes[0].legs[j];
        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
            marker.setMap(map);
            marker.setPosition(myRoute.steps[i].start_location);
            attachInstructionText(stepDisplay, marker, myRoute.steps[i].instructions, map)
        }
    }
}
function attachInstructionText(stepDisplay, marker, text, map) {
    google.maps.event.addListener(marker, 'click', function() {
        stepDisplay.setContent(text);
        stepDisplay.open(map, marker)
    })
}
function geocodeAddress(address) {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            bounds.extend(results[0].geometry.location);
            googleMap.fitBounds(bounds)
        } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
            nextAddress--;
            delay++;
            alert("OQL: " + status)
        } else {
            alert("Error geocoding address: " + address + "status=" + status)
        }
    })
}
google.maps.event.addDomListener(window, "load", initializeMap);

 </script>

<body>
    

  <!--  <div class="container-fluid" style="position: fixed;">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#map">Directions Map</a></li>
                <li><a data-toggle="tab" href="#infoPanel">Directions Description</a></li>
            </ul>-->

            <!--<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div id="panel"></div>
</div>-->




              <div style="
  /* Set rules to fill background */
 
  
  /* Set up proportionate scaling */
  width: 100%;
  height: 55px;
  
  /* Set up positioning */
  position: fixed;
  top: 0;
  left: 0;



   background: white;
">




                    <form id="frmLocation" action="" class="form-inline" role="form" style="">
                        <div class="form-group">
                            <label for="txtLocation" class="sr-only">Location</label>
                            <input id="txtLocation"  type="text" placeholder="Location" class="form-control" />
                        </div>

                        <div class="form-group">
                            <input id="btnAddLocation" type="button" value="Add" class="btn btn-success" />
                        </div>

                        <div class="form-group">
                            <label for="ddlSource" class="sr-only">Source</label>
                            <select id="ddlSource" class="form-control">
                                   
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ddlDestination" class="sr-only">Destination</label>
                            <select id="ddlDestination" class="form-control">
                                 
                            </select>
                        </div>



                       <!-- <div class="checkbox">
                          
                                <input id="chkDestinationIsSameAsSource" type="checkbox" checked data-toggle="toggle"/>
                                
                           
                        </div>-->

                        <div class="form-group">
                            <label for="ddlTravelMode" class="sr-only">Travel Mode</label>
                            <select id="ddlTravelMode" class="form-control">
                                <option value="DRIVING">Driving</option>
                                <option value="WALKING">Walking</option>
                            </select>
                        </div>

                        <div class="checkbox">
                            
                                <input id="chkOptimizePath" type="checkbox" checked data-toggle="toggle" data-on="Optimize" data-off="&nbsp In Order " data-onstyle="success" data-offstyle="danger"/>
                               
                              
                        </div>

                        <div class="form-group">
                            <input id="btnClearDirections" type="button" value="Clear" class="btn btn-danger" />
                        </div>
                         

                    
                        <input  type="button" class = "btn btn-default" value="Traffic" alt="Submit" id="traffic" />
                          <input  type="button" class = "btn btn-default" value="Print" alt="Submit" id="print" />

                    
                    <div class="form-group">
                            <input id="btnDisplayDirections" type="button" value="Display" class="btn btn-primary" />
                        </div>

                        
                         <div class="form-group">
                            <input id="getadd" type="button" value="Get Addresses" class="btn btn-info" />
                        </div>  
                         


                     
                         

                        <div class="form-group">
                            <a href="index.php" class="btn btn-default" role="button">Back</a>
                        </div>

                          
                    


                        <div id="successMessage" class="alert alert-success alert-dismissible success-msg" role="alert" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="str"><strong>Added!</strong></div>
                        </div>
                    </form>
                
                  
                   
          </div>
                       
              <div id="googleMap" class="map"></div>
              <div id="panel" class="slidingDiv" ></div>
       
             
            
        
</body>

</html>
      
