<div id="box_search_desktop">
    <div style="background-color:#4D5E27;width:100%;height: 80px;">
        <div class="width_980">
            <div style="float:left">
                <img src="<?php echo $base_url;?>sido_img/images/logo_header.png" style="margin-top: 10px">
            </div>
            <div style="float: right">
                <form id="form_submitsearch" method="post" action="<?php echo $base_url.'search'; ?>" enctype="multipart/form-data">
                <div class="input-group_search">
                    <div style="float: left">
                    <input type="text" class="form-control_search" name="search" id="search" placeholder="Search">
                    </div>
                    <div id="ico_search">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div style="position: relative">
         <?php include "menu.php";?>
        <?php if($menu_id=='18'){ ?>
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>-->
        <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?sensor=true'></script> 
        <script type='text/javascript' src='http://sidomuncul.com/skin/assets/js/plugins/gmaps.js'></script> 
        
        <script type="text/javascript">/*<![CDATA[*/$ = jQuery.noConflict();
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#country-map',
				lat: -20.3618402,
				lng: 16.6997947,
				zoom: 3,
				scrollwheel: false
			  });
				
					var contentString = '<h2>'+'Malaysia'+'</h2>';
					map.addMarker({
						lat: 20.7706203,
						lng: -2.0702512,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Singapore'+'</h2>';
					map.addMarker({
						lat: 4.4473873,
						lng: 101.0048673,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Brunei'+'</h2>';
					map.addMarker({
						lat: 4.5242486,
						lng: 114.7196266,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Australia (Sydney,Melbourne)'+'</h2>';
					map.addMarker({
						lat: 1.3455918,
						lng: 103.8256818,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Korea'+'</h2>';
					map.addMarker({
						lat: -37.8602828,
						lng: 145.079616,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Nigeria'+'</h2>';
					map.addMarker({
						lat: 9.077751,
						lng: 8.6774567,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Algeria'+'</h2>';
					map.addMarker({
						lat: 28.0095865,
						lng: 2.0841468,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Hong Kong'+'</h2>';
					map.addMarker({
						lat: 22.3294114,
						lng: 114.1642371,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'USA'+'</h2>';
					map.addMarker({
						lat: 38.6714858,
						lng: -98.0380469,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Saudi Arabia'+'</h2>';
					map.addMarker({
						lat: 24.1065558,
						lng: 44.8661497,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Mongolia'+'</h2>';
					map.addMarker({
						lat: 46.850083,
						lng: 103.6370305,
						infoWindow: {
						  content: contentString
						}
						
					  });

					
					var contentString = '<h2>'+'Russia'+'</h2>';
					map.addMarker({
						lat: 61.7228288,
						lng: 100.6717774,
						infoWindow: {
						  content: contentString
						}
						
					  });

							});/*]]>*/
                </script>
                <div id="country-map" style="height:700px"></div>
                <?php }else{ ?>
                <!-- Slideshow -->
                    <!--<ul class="slideshow_page">-->
                       <div>
                        <?php foreach ($data_page as $pg) {?> 
                            <div class="slide_page" style="background: url('<?php echo $pg->image;?>');background-position: center center;background-size:cover; ">

                            </div>
                        <?php }?>
                        </div>
                    <!--</ul>-->
                <?php }?>
        
    </div>