<?php
    if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['ajax'] ) ){

        $dbhost =   'localhost';
        $dbuser =   'root'; 
        $dbpwd  =   ''; 
        $dbname =   'pos';
        $db     =   new mysqli( $dbhost, $dbuser, $dbpwd, $dbname );

        $places=array();

        $sql    =   'select 
                        `address` as \'name\',
                        `latitude` as \'lat\',
                        `longitude` as \'lng\'
                        from `store`
                        limit 100';

        $res    =   $db->query( $sql );
        if( $res ) while( $rs=$res->fetch_object() ) $places[]=array( 'latitude'=>$rs->lat, 'longitude'=>$rs->lng, 'address'=>$rs->name );
        $db->close();

        header( 'Content-Type: application/json' );
        echo json_encode( $places,JSON_FORCE_OBJECT );
        exit();
    }
?>
<?php include('header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs3QQkb4mTal0giQNdv-dcB_7fQeL_pBg&libraries" type='text/javascript' async defer></script>
        <script type='text/javascript'>
            (function(){

                var map,marker,latlng,bounds,infowin;
                /* initial locations for map */
                var _lat=2.25748;
                var _lng=102.229;

                var getacara=0; /* What should this be? is it a function, a variable ???*/
				
                function showMap(){
                    /* set the default initial location */
                    latlng={ lat: _lat, lng: _lng };

                    bounds = new google.maps.LatLngBounds();
                    infowin = new google.maps.InfoWindow();

                    /* invoke the map */
                    map = new google.maps.Map( document.getElementById('map'), {
                       center:latlng,
                       zoom: 10
                    });

                    /* show the initial marker */
                    marker = new google.maps.Marker({
                       position:latlng,
                       map: map,
                       title: 'Hello World!'
                    });
                    bounds.extend( marker.position );


                    /* I think you can use the jQuery like this within the showMap function? */
                    $.ajax({
                        /* 
                            I'm using the same page for the db results but you would 
                            change the below to point to your php script ~ namely
                            phpmobile/getlanglong.php
                        */
                        url: document.location.href,/*'phpmobile/getlanglong.php'*/
                        data: { 'id': getacara, 'ajax':true },
                        dataType: 'json',
                        success: function( data, status ){
                            $.each( data, function( i,item ){
                                /* add a marker for each location in response data */ 
                                addMarker( item.latitude, item.longitude, item.name );
                            });
                        },
                        error: function(){
                            output.text('There was an error loading the data.');
                        }
                    });                 
                }

                /* simple function just to add a new marker */
                function addMarker(lat,lng,title){
                    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
                       position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) },
                       map:map,
                       title:title
                    });

                    google.maps.event.addListener( marker, 'click', function(event){
                        infowin.setContent(this.title);
                        infowin.open(map,this);
                        infowin.setPosition(this.position);
                    }.bind( marker ));

                    bounds.extend( marker.position );
                    map.fitBounds( bounds );
                }

                document.addEventListener( 'DOMContentLoaded', showMap, false );
            }());
        </script>
        <style>
            html, html body, #map{ height:100%; width:100%; padding:0; margin:0; }
        </style>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	
	<div style="height: 80px;"></div>
	<div>
		<h2 class="page-header">Store Location</h2>
		<center><div id='map' style='width:900px;height:500px;'></div><br><br>
	</div>
</div>
<?php include('script.php'); ?>

<script src="custom.js"></script>
</body>
</html>





