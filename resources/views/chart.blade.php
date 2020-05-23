<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
        let month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        let data_user_joined = <?php echo $user_joined; ?>;
        // let data_userJoined = <?php echo $user_joined; ?>;


        var barChartData = {
            labels: month,
            datasets: [{
                label: 'All Joins',
                backgroundColor: "#f56954",
                data: data_user_joined
            }]
        };


        window.onload = function() {
            var ctx = document.getElementById("UserJoinedBarChart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
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
