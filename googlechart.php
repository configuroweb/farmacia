<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<div id="myChart1" style="width:100%; max-width:600px; height:500px;"></div>
<?php
error_reporting(0);
$a=array("Italy","France","Spain","USA","Argentina");
$b=array(50,55,60,70,80);
$cnt=count($a);
$data='';
for ($i=0;$i<$cnt;$i++){
  $data.="['".$a[$i]."',".$b[$i]."],";
}
echo $data; //used this $data variable in js
?>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([ ['Contry', 'Mhl'],<?php echo $data;?>]);

var options = {
  title:'World Wide Wine Production',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);

  var chart = new google.visualization.BarChart(document.getElementById('myChart1'));
  chart.draw(data, options);
}
</script>

</body>
</html>

