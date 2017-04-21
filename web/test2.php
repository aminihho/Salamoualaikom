<?php
/**
 * Created by PhpStorm.
 * User: kourda
 * Date: 4/3/17
 * Time: 11:57 PM
 */



	// Prayer Times Calculator, Sample Usage
	// By: Hamid Zarrabi-Zadeh
	// Inputs : $method, $year, $latitude, $longitude, $timeZone

	import_request_variables("p");
	include('PrayTime.php');

	if (!isset($method) || !isset($year) )
        list($method, $year, $latitude, $longitude, $timeZone) = array(0, 2007, 43, -80, -5);
?>
<html>
<head>
    <title>Prayer Timetable</title>
</head>
<style>
    pre {font-family: courier, serif, size: 10pt; margin: 0px 8px;}
</style>

<body>

<h1> Prayer Timetable </h1>
<form name="form" method="post" action="<?php echo $PHP_SELF ?>">
    <div style="padding:10px; background-color: #F8F7F4; border: 1px dashed #EAE9CD;">

        Latitude: <input type="text" value="<?php echo $latitude ?>" name="latitude" size="4">
        Longitude: <input type="text" value="<?php echo $longitude ?>" name="longitude" size="4">
        Time Zone: <input type="text" value="<?php echo $timeZone ?>" name="timeZone" size="2">
        Year: <input type="text" value="<?php echo $year ?>" name="year" size="4"> <br>
        Method:
        <select id="method" name="method" size="1" onchange="document.form.submit()">
            <option value="0">Shia Ithna-Ashari</option>
            <option value="1">University of Islamic Sciences, Karachi</option>
            <option value="2">Islamic Society of North America (ISNA)</option>
            <option value="3">Muslim World League (MWL)</option>
            <option value="4">Umm al-Qura, Makkah</option>
            <option value="5">Egyptian General Authority of Survey</option>
            <option value="7">Institute of Geophysics, University of Tehran</option>
        </select>
        <input type="submit" value="Make Timetable">

    </div>
</form>

<pre>
 Date   Fajr   Sunrise  Dhuhr    Asr   Sunset  Maghrib  Isha
-------------------------------------------------------------
    <?php

    $prayTime = new PrayTime($method);

    $date = strtotime($year. '-1-1');
    $endDate = strtotime(($year+ 1). '-1-1');

    while ($date < $endDate)
    {
        $times = $prayTime->getPrayerTimes($date, $latitude, $longitude, $timeZone);
        $day = date('M d', $date);
        print $day. "\t". implode("\t", $times). "\n";
        $date += 24* 60* 60;  // next day
    }

/*
</pre>

<script type="text/javascript">

  var method = <?php echo $method ?>;
  document.getElementById('method').selectedIndex = Math.min(method, 6);

</script>

</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Mobile First -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Title</title>
  <link rel="stylesheet" href= " {{ asset( 'css/bootstrap/bootstrap.min.css') }}" >

  <link rel="stylesheet" href= "{{ asset( 'css/app/IFtar.css') }} " >
  <link href= "https://fonts.googleapis.com/css?family=Roboto"  rel="stylesheet">

  <style>

        #map {
            height: 100%;
        }


//    </style>


//   <script>
//        var map;
//      function initMap() {
//        map = new google.maps.Map(document.getElementById('map'), {
//          center: {lat: -34.397, lng: 150.644},
//               zoom: 4
 //          });
   //     }
//    </script>









    <script src= "{{ asset('js/bootstrap/bootstrap.min.js')}} " ></script>
</head>
<body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzZl3rZXM2MFILoKDY60wUeDygk43w0HU&callback=initMap"
        async defer></script>
<header class="container-fluid" >
    Header
</header>
<div class="container-fluid">
    <div class="row">
        <section  class="col-sm-8">
            table to represente the data
        </section>
        <aside class="col-sm-4">

            <div id="IFtarmenu">

            </div>

            <div id ="IFtarGebetsZeit">
                <table class="table table-bordered">
                    <thead>
                    <tr class="row">
                        <th class="col-sm-2">#</th>
                        <th class="col-sm-2">First Name</th>
                        <th class="col-sm-2" >First Name</th>
                        <th class="col-sm-2" >First Name</th>
                        <th class="col-sm-2" >First Name</th>
                        <th class="col-sm-2">First Name</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="row">
                        <td class="col-sm-2">Mark</td>
                        <td class="col-sm-2">Mark</td>
                        <td class="col-sm-2">Mark</td>
                        <td class="col-sm-2">Mark</td>
                        <td class="col-sm-2">Mark</td>
                        <td class="col-sm-2">Mark</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div id="map">

            </div>

        </aside>
    </div>
</div>

</body>
</html>
*/