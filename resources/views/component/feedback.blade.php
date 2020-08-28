<style>
.contact-section .contact-info p a {
  color: #1a1a1a; }

.contact-section .box {
  width: 100%;
  display: block; }
  .contact-section .box .icon {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    margin-bottom: 2em;
    background: rgba(0, 0, 0, 0.05);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%; }
    .contact-section .box .icon span {
      color: #000000;
      font-size: 30px; }
  .contact-section .box h3 {
    font-size: 18px;
    font-weight: 700; }

.contact-section .contact-form {
  width: 100%; }

.block-9 .form-control {
  outline: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  font-size: 15px; }

.block-21 .blog-img {
  display: block;
  height: 80px;
  width: 80px; }

.block-21 .text {
  width: calc(100% - 100px); }
  .block-21 .text .heading {
    font-size: 18px;
    font-weight: 300; }
    .block-21 .text .heading a {
      color: #000000; }
      .block-21 .text .heading a:hover, .block-21 .text .heading a:active, .block-21 .text .heading a:focus {
        color: #00bd56; }
  .block-21 .text .meta > div {
    display: inline-block;
    font-size: 14px;
    margin-right: 5px; }
    .block-21 .text .meta > div a {
      color: gray; }
#map-canvas {
  width: 190%;
height:90%; }
  @media (max-width: 991.98px) {
    #map-canvas {
      height: 300px; } }


</style>

<section class="ftco-section contact-section" style="background-image:url(../img/mascot/z.jpg);background-size: cover;"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="/SaveFeedback" method="post" class="bg-dark p-5 contact-form">
		<div class="row justify-content-center">
        	<div class="col-md-6 heading-section text-center ftco-animate">
		<h4 class="subheading" style="color:white;font-size:25px;font-weight:bold;">Enter Your FeedBack</h4>
	      	    </div>
	</div>
		 {{csrf_field()}}
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <textarea name="feedback" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5 btn-sm">
              </div>
            </form>
          </div>
          <div class="col-md-6 order-md-last d-flex">
           
     
                <div class="form-group">
                    
                    <input type="text" class="form-control" id="searchmap" placeholder="seach places">
			<br>
                    <div id="map-canvas"></div>
                </div>       
          </div>
        </div>
      </div>
    </section>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlCRXZoqj-N891EuNNhed9ht9jmFrVQgA&libraries=places"></script>

   
<script>
 //var map;

var map=new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat: 5.9381,
            lng: 80.5761
        },
        zoom:15
    });
    var marker=new google.maps.Marker({
        position:{
            lat: 5.9381,
            lng: 80.5761
        },
        map: map,
        draggable: true
    });
    var searchBox=new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places=searchBox.getPlaces();
        var bounds=new google.maps.LatLngBounds();
        var i,place;

        for(i=0;place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    google.maps.event.addListener(marker,'position_changed',function(){
        var lat=marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);
    });

</script>
