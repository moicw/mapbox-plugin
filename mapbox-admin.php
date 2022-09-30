<?php
echo "	<link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet'>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
   <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>";
    echo "
   <form method='post' action='".htmlspecialchars($_SERVER[" PHP_SELF "])."' class='row col-md-11'>
    <div class='col-md-12'>
      <label class='form-label'><b>Mapbox Setup</b></label>
    
    </div>
    <div class='col-md-12'>
      <label class='form-label'>Mapbox Access Token</label>
      <input type='text' class='form-control' value='".$mapbox_plugin_setting['mapbox_accessToken']."' id='mapbox_token' name='mapbox_token'>
    </div>
    <!--<div class='col-md-6'>
      <label class='form-label'>First Name</label>
      <input type='text' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label class='form-label'>Last Name</label>
      <input type='text' class='form-control'>
    </div>
    
    <div class='col-md-6'>
      <label class='form-label'>City</label>
      <input type='email' class='form-control'>
    </div>
    <div class='col-md-4'>
      <label class='form-label'>States</label>
      <select name='' id='' class='form-select'>
        <option value=''>Punjab</option>
        <option value=''>Sindh</option>
        <option value=''>Kpk</option>
        <option value=''>Balochistan</option>
      </select>
    </div>
    <div class='col-md-2'>
      <label class='form-label'>Zip</label>
      <input type='text' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label class='form-label'>Upload Domicile</label>
      <input type='file' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label class='form-label'>Gender</label>
      <br>
      <div class='form-check form-check-inline'>
        <input type='radio' class='form-check-input' name='rdo' checked>
        <label class='form-check-label'>Male</label>
      </div>
      <div class='form-check form-check-inline'>
        <input type='radio' class='form-check-input' name='rdo'>
        <label class='form-check-label'>Female</label>
      </div>
      <div class='form-check form-check-inline'>
        <input type='radio' class='form-check-input' name='rdo'>
        <label class='form-check-label'>Other</label>
      </div>
    </div>-->
    <div class='col-md-2'>
      <br>
      <button class='btn btn-primary form-control'>Submit</button>
    </div>
</form>";
?>