<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <!-- Bootstrap 3 Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    <!-- CharJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>

<body>

    <div id="container">
        <div id="card">
            <div class="card-body">
                <div class="chart">
                    <canvas id="UserJoinedBarChart"
                        style="min-height: 250px; height: 450px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Assign php generated json to JavaScript variable
            let tempArray = <?php echo json_encode($mergecombinedorigplusdates); ?>;

           //You will be able to access the properties as
           //alert(tempArray); //object Object
           //console.log(tempArray);

           var datesGood = Object.keys(tempArray);
           console.log(datesGood); //array

           var countsGood = Object.values(tempArray);
           console.log(countsGood); //array

        // <?php
        // $php_array = array('abc','def','ghi');
        // $js_array = json_encode($php_array);
        // echo "var javascript_array = ". $js_array . ";\n";
        // ?>

        // counts  php array to js array:
        var countsfromphp = [<?php echo '"'.implode('","', $mergecombinedorigplusdates).'"' ?>];
        //console.log(countsfromphp);
        //alert(countsfromphp);

        var barChartData = {
            // labels:
            labels: datesGood,
            datasets: [{
                label: 'All Joins',
                backgroundColor: "#f56954",
                data: countsGood
            }]

        };


        window.onload = function() {
            var ctx = document.getElementById("UserJoinedBarChart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                // type: 'pie',
                // type: 'line',
                // type: 'radar',
                // type: 'doughnut',
                // type: 'bubble',  //not works
                // type: 'scatter',
                // type: 'polarArea',
                data: barChartData,
                options: {
                    // scales:{
                    // xAxes: [{
                    // ticks: {
                    // beginAtZero: true
                    // }
                    // }]
                    // }

                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    maintainAspectRatio     : true,
                    title: {
                        display: true,
                        text: 'Daily Joined Status'
                    }
                }
            });


        };
    </script>

</body>

</html>
