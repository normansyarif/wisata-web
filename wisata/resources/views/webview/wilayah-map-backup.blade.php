<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
		.customMarker {
			position:absolute;
			cursor:pointer;
			background:#424242;
			width:60px;
			height:60px;
			/* -width/2 */
			margin-left:-50px;
			/* -height + arrow */
			margin-top:-110px;
			border-radius:50%;
			padding:0px;
		}
		.customMarker:after {
			content:"";
			position: absolute;
			bottom: -8px;
			left: 20px;
			border-width: 10px 10px 0;
			border-style: solid;
			border-color: #424242 transparent;
			display: block;
			width: 0;
		}
		.customMarker img {
			width:50px;
			height:50px;
			margin:5px;
			border-radius:50%;
		}
	</style>
</head>
<body>

	<div class="map" id="map" style="height: 100vh"></div>

	<!-- Modal -->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="name"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p id="content"></p>
				</div>
				<div class="modal-footer">
					<button id="more" data="" type="button" class="btn btn-sm btn-primary">Selengkapnya</button>
					<a id="latlang" href="#" class="btn btn-sm btn-secondary">Navigasi</a>
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	<script	src="{{ asset('wv-assets/jquery.js') }}"></script>

	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		function CustomMarker(id, name, latlng, map, imageSrc, contentString) {
			this.id = id;
			this.name = name;
			this.latlng_ = latlng;
			this.imageSrc = imageSrc;
			this.contentString = contentString;
			this.setMap(map);
		}

		function initMap() {
			
			CustomMarker.prototype = new google.maps.OverlayView();

			CustomMarker.prototype.draw = function () {
				var div = this.div_;
				if (!div) {
					div = this.div_ = document.createElement('div');
					div.className = "customMarker"


					var img = document.createElement("img");
					var name = this.name;
					var id = this.id;
					var contentString = this.contentString;
					img.src = this.imageSrc;
					var latlang = this.latlng_;
					div.appendChild(img);
					var me = this;

					google.maps.event.addDomListener(div, "click", function (event) {
						google.maps.event.trigger(me, "click");
						$('#more').attr('data', id);
						$('#content').html(contentString);
						$('#name').html(name);
						$('#latlang').attr('href', 'https://www.google.com/maps/search/' + latlang.toString().slice(1,-1));
						$('#modal').modal('show'); 
					});

					var panes = this.getPanes();
					panes.overlayImage.appendChild(div);
				}

				var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);
				if (point) {
					div.style.left = point.x + 'px';
					div.style.top = point.y + 'px';
				}
			};

			CustomMarker.prototype.remove = function () {
				if (this.div_) {
					this.div_.parentNode.removeChild(this.div_);
					this.div_ = null;
				}
			};

			CustomMarker.prototype.getPosition = function () {
				return this.latlng_;
			};

			var map = new google.maps.Map(document.getElementById("map"), {
				zoom: 8,
				center: new google.maps.LatLng(-1.944726, 102.671208),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var data = {!! $wilayah !!};

			for(var i=0;i<data.length;i++){
				new CustomMarker(data[i].id, data[i].name, new google.maps.LatLng(data[i].pos[0],data[i].pos[1]), map,  data[i].profileImage, data[i].contentString)
			}
		}

		$('#more').click(function() {
			let id = $(this).attr('data');
			alert(id);
		});

	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzEtuVlr36M5MJwT7EtHna7cLFTzDTWs&callback=initMap"></script>

</body>
</html>
