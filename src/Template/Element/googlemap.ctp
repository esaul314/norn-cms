
<section class="content_map2">
      <div class="google-map-api">
        <div id="map-canvas" class="gmap"></div>
      </div>
</section>
<script type="text/javascript">
          google_api_map_init();
          function google_api_map_init(){
            var map;
            var coordData = new google.maps.LatLng(parseFloat(19.4243563), parseFloat(-99.1552253,17));
            var markCoord1 = new google.maps.LatLng(parseFloat(19.4243563), parseFloat(-99.1752253,17));
            //var markCoord1 = new google.maps.LatLng(parseFloat(40.643180), parseFloat(-73.9874068,14));
             var markCoord2 = new google.maps.LatLng(parseFloat(40.6422180), parseFloat(-73.9784068,14));
             var markCoord3 = new google.maps.LatLng(parseFloat(40.6482180), parseFloat(-73.9724068,14));
             var markCoord4 = new google.maps.LatLng(parseFloat(40.6442180), parseFloat(-73.9664068,14));
             var markCoord5 = new google.maps.LatLng(parseFloat(40.6379180), parseFloat(-73.9552068,14));
            var marker;

            var styleArray = [
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c1c1c1"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e8e8e8"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#a2a2a2"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#989898"
            },
            {
                "lightness": 0
            },
            {
                "weight": 1
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#d1d1d1"
            },
            {
                "weight":2
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#c8c8c8"
            },
            {
                "lightness": 0
            },
            {
                "weight":1
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#bababa"
            },
            {
                "weight":0.5
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c4c4c4"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d1d1d1"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#3d3d3d"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#bfbfbf"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ff0000"
            },
            {
                "lightness": 0
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#d1d1d1"
            },
            {
                "lightness": 0
            },
            {
                "weight": 1.2
            }
        ]
    }
]

            var markerIcon = {
                url: "img/gmap_marker.png",
                size: new google.maps.Size(53, 71),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(21, 70)
            };
            function initialize() {
              var mapOptions = {
                zoom: 14,
                center: coordData,
                scrollwheel: false,
                styles: styleArray
              }

              var contentString = "<div></div>";
              var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 200
              });

              var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
              marker = new google.maps.Marker({
                map:map,
                position: markCoord1,
                icon: markerIcon
              });

              /*marker1 = new google.maps.Marker({
                map:map,
                position: markCoord2,
                icon: markerIcon
              });

               marker2 = new google.maps.Marker({
                map:map,
                position: markCoord3,
                icon: markerIcon
              });

               marker3 = new google.maps.Marker({
                map:map,
                position: markCoord4,
                icon: markerIcon
              });

               marker4 = new google.maps.Marker({
                map:map,
                position: markCoord5,
                icon: markerIcon
              }); */

               var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent">'+
                '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
                '</div>'+
                '</div>';

                /*var contentString1 = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent">'+
                '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
                '</div>'+
                '</div>';

                var contentString2 = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent">'+
                '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
                '</div>'+
                '</div>';

                var contentString3 = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent">'+
                '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
                '</div>'+
                '</div>';

                var contentString4 = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent">'+
                '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
                '</div>'+
                '</div>';*/

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            /*var infowindow1 = new google.maps.InfoWindow({
                content: contentString1
            });

            var infowindow2 = new google.maps.InfoWindow({
                content: contentString2
            });

            var infowindow2 = new google.maps.InfoWindow({
                content: contentString3
            });

            var infowindow2 = new google.maps.InfoWindow({
                content: contentString4
            });*/



            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
              $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
            });

            /*google.maps.event.addListener(marker1, 'click', function() {
              infowindow.open(map,marker1);
              $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
            });

            google.maps.event.addListener(marker2, 'click', function() {
              infowindow.open(map,marker2);
              $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
            });

            google.maps.event.addListener(marker3, 'click', function() {
              infowindow.open(map,marker3);
              $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
            });

            google.maps.event.addListener(marker4, 'click', function() {
              infowindow.open(map,marker4);
              $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
            });*/

            google.maps.event.addDomListener(window, 'resize', function() {

              map.setCenter(coordData);

              var center = map.getCenter();
            });
          }

            google.maps.event.addDomListener(window, "load", initialize);

          }
</script>
