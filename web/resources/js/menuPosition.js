
    			
    			var map;


    			$("#myModal").on("shown.bs.modal", function () {												   
												    			map = new google.maps.Map(document.getElementById('map_canvas'), {
																	                zoom: 8,
																	                mapTypeId: google.maps.MapTypeId.ROADMAP
																	            });

												    			initialize();
																google.maps.event.trigger(map, "resize");
																});


				function initialize() {
							            var vMarker = new google.maps.Marker({
							                position: new google.maps.LatLng( { lat: -34.09557942423603, lng: -59.0513387178529 }),
							                draggable: true
							            });
							            google.maps.event.addListener(vMarker, 'dragend', function (evt) {

						                $(".positionLt").val(evt.latLng.lat().toFixed(6));
						                $(".positionLn").val(evt.latLng.lng().toFixed(6));

							                map.panTo(evt.latLng);
							            });
							            map.setCenter(vMarker.position);
							            vMarker.setMap(map);
							        }
		    
