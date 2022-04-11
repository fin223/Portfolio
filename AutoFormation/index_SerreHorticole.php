<?php
include 'functions.php';
?>

<?=template_header('Courbes')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AnyChart PHP template</title>
    <meta charset="UTF-8">
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-vml.min.js"></script>
    <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" />
    <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/fonts/css/anychart.min.css"/>
    <link rel="stylesheet" href="static/css/style_projet.css"/>
    <link rel="shortcut icon" href="assets/favicon.ico">
</head>
<body>
<div id="container" style="width: 500px; height: 400px;"></div>
<script>
    anychart.data.loadJsonFile("/data (index_SerreHorticole_temp).php", function (data) {  // init and draw chart
        var chart = anychart.area(data);
        chart.title("Température en °C");
        chart.container("container");
        chart.draw();
        // update chart from server every 5 seconds
        setInterval(function(){
            // make request to server
            // to use loadJsonFile function you must include data-adapter.min.js to your page
            anychart.data.loadJsonFile("/data (index_SerreHorticole_temp).php", function (data) {
                chart.data(data);
            })
        }, 2000);endl
    });

    anychart.data.loadJsonFile("/data (index_SerreHorticole_humid).php", function (data) {  // init and draw chart
        var chart = anychart.area(data);
        chart.title("humidité en %");
        chart.container("container");
        chart.draw();
        
        // update chart from server every 5 seconds
        setInterval(function(){
            // make request to server
            // to use loadJsonFile function you must include data-adapter.min.js to your page
            anychart.data.loadJsonFile("/data (index_SerreHorticole_humid).php", function (data) {
                chart.data(data);
            })
        }, 2000);endl
        });
        
</script>
</body>
</html>
<?=template_footer()?>