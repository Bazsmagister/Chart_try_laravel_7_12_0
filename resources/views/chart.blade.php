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
        // (function(d){
        // var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November',
        // 'December'];
        // var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

        // d.prototype.getLongMonth = d.getLongMonth = function getLongMonth (inMonth) {
        // return gM.call(this, inMonth, mL);
        // }

        // d.prototype.getShortMonth = d.getShortMonth = function getShortMonth (inMonth) {
        // return gM.call(this, inMonth, mS);
        // }

        // function gM(inMonth, arr){
        // var m;

        // if(this instanceof d){
        // m = this.getMonth();
        // }
        // else if(typeof inMonth !== 'undefined') {
        // m = parseInt(inMonth,10) - 1; // Subtract 1 to start January at zero
        // }

        // return arr[m];
        // }
        // })(Date);
        // var today = new Date();
        // console.log(today.getLongMonth());
        // console.log(Date.getLongMonth(9)); // September
        // console.log(today.getShortMonth());
        // console.log(Date.getShortMonth('09')); // Sept

        let month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November',
        'December'];
        let data_user_joined2019 = <?php echo $user_joined2019; ?>;

        alert(data_user_joined2019);
        console.log(data_user_joined2019);



        var barChartData = {
            // labels: month,
            labels: mL,
            datasets: [{
                label: 'All Joins',
                backgroundColor: "#f56954",
                data: data_user_joined2019
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
                        text: 'Monthly Joined Status'
                    }
                }
            });


        };
    </script>


</body>

</html>
