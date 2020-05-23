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
                    <canvas id="leaveBarChart"
                        style="min-height: 250px; height: 450px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
        let month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        let data_all_leaves = <?php echo $allEmployeeLeaves; ?>;

        let data_approved_leaves = <?php echo $approvedLeaves; ?>;
        let data_rejected_leaves = <?php echo $rejectedLeaves; ?>;


        var barChartData = {
            labels: month,
            datasets: [{
                label: 'All Leave Requests',
                backgroundColor: "#f56954",
                data: data_all_leaves
            }, {
                label: 'Approved Leaves',
                backgroundColor: "#00a65a",
                data: data_approved_leaves
            }, {
                label: 'Rejected Leaves',
                backgroundColor: "#f39c12",
                data: data_rejected_leaves
            }]
        };


        window.onload = function() {
            var ctx = document.getElementById("leaveBarChart").getContext("2d");
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
                        text: 'Monthly Leave Status'
                    }
                }
            });


        };
    </script>


</body>

</html>
