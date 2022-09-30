<?php
$mapbox_plugin_setting = json_decode(get_option('mapbox_plugin_setting'),true);
$Content = "
<link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet'>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
<style>
.column-1 {
  float: left;
  width: 20%;
  padding: 10px;
  
}
.column-2 {
  float: left;
  width: 80%;
  padding: 10px;
  
}
/* Clear floats after the columns */
.row:after {
  content: '';
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .column-1 {
    width: 100%;
  }
  .column-2 {
    width: 100%;
  }
}
#map-container {
    position: relative;
    top:0px;
    left:0px;
    height: 100%;
    width:100%;
  }

#map {
    position: relative;
    height: 500px; 
    width:100%;
  }
      
.marker {
    display: block;
    background-color:#ff0000;
    width:20px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    padding: 0;
}
</style>



<div class='row'>
  <div class='column-1'>
    <h2>Add Tag</h2>
    <input type='checkbox' id='taga' name='taga' value='Tag A'>
      <label for='taga'> Tag A</label><br>
      <input type='checkbox' id='tagb' name='tagb' value='Tag B'>
      <label for='tagb'> Tag B</label><br>
      <input type='checkbox' id='tagc' name='tagc' value='Tag C'>
      <label for='tagc'> Tag C</label><br>
      <input type='checkbox' id='tagd' name='tagd' value='Tag D'>
      <label for='tagd'> Tag D</label><br>
  </div>
  <div class='column-2'>
   <div id='map-container'>
       <div id='map'></div>
   </div>
  </div>
</div>

 <!-- Modal -->
<div class='modal fade' id='Modal' tabindex='-1' role='dialog' aria-labelledby='ModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='ModalLabel'>Add Marker</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <input type='text' class='form-control' placeholder='Name' id='tagname'><br>
           <input type='checkbox' id='taga-box' name='taga-box' value='Tag A'>
          <label for='taga-box'> Tag A</label><br>
          <input type='checkbox' id='tagb-box' name='tagb-box' value='Tag B'>
          <label for='tagb-box'> Tag B</label><br>
          <input type='checkbox' id='tagc-box' name='tagc-box' value='Tag C'>
          <label for='tagc-box'> Tag C</label><br>
          <input type='checkbox' id='tagd-box' name='tagd-box' value='Tag D'>
          <label for='tagd-box'> Tag D</label><br>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary' onclick='add_coor()'>Save changes</button>
      </div>
    </div>
  </div>
</div>  
<script>
	
	mapboxgl.accessToken = '".$mapbox_plugin_setting['mapbox_accessToken']."';//'pk.eyJ1IjoibWN3ZWkiLCJhIjoiY2w4ZjlneG11MDAxYzN3bTI3amY1Z3VubyJ9.-h86XaoQcH18nHAPWELQvA';
const map = new mapboxgl.Map({
container: 'map',
// Choose from Mapbox's core styles, or make your own style with Mapbox Studio
style: 'mapbox://styles/mapbox/streets-v11',
center: [-96, 37.8],
zoom: 4
});
 
map.on('load', () => {
// Add an image to use as a custom marker
map.loadImage(
'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
(error, image) => {
if (error) throw error;
map.addImage('custom-marker', image);
// Add a GeoJSON source with 2 points
map.addSource('points', {
'type': 'geojson',
'data': {
'type': 'FeatureCollection',
'features': [
{
// feature for Mapbox DC
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [
-77.03238901390978, 38.913188059745586
]
},
'properties': {
'title': 'Test A'
}
},
{
// feature for Mapbox SF
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [-102.414, 37.776]
},
'properties': {
'title': 'Test B'
}
}
]
}
});

// Add a symbol layer
map.addLayer({
'id': 'points',
'type': 'symbol',
'source': 'points',
'layout': {
'icon-image': 'custom-marker',

'text-field': ['get', 'title'],
'text-font': [
'Open Sans Semibold',
'Arial Unicode MS Bold'
],
'text-offset': [0, 1.25],
'text-anchor': 'top'
}
});



}
);
}

);
var click_coor='';
map.on('click', (e) => {
//alert(JSON.stringify(e.lngLat.wrap()));
click_coor = e.lngLat.wrap();

$('#Modal').modal('show'); 
});

function add_coor()
{
$('#Modal').modal('hide'); 
var tagname = document.getElementById('tagname').value;
 document.getElementById('tagname').value='';
//var custagname = tagname+'-custom';
    map.loadImage(
'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
(error, image1) => {
if (error) throw error;
map.addImage('custom-marker1', image1);
// Add a GeoJSON source with 2 points
map.addSource(tagname, {
'type': 'geojson',
'data': {
'type': 'FeatureCollection',
'features': [
{
// feature for Mapbox DC
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [
click_coor['lng'], click_coor['lat']
]
},
'properties': {
'title': tagname
}
}
]
}
});

// Add a symbol layer
map.addLayer({
'id': tagname,
'type': 'symbol',
'source': tagname,
'layout': {
'icon-image': 'custom-marker1',

'text-field': ['get', 'title'],
'text-font': [
'Open Sans Semibold',
'Arial Unicode MS Bold'
],
'text-offset': [0, 1.25],
'text-anchor': 'top'
}
});



}
);

}
</script>";
?>