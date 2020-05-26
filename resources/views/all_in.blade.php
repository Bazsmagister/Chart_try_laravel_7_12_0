// (function(d){
// var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
'November',
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






// // All Joins
// $user_joined = User::select(DB::raw("COUNT(created_at) as count"))

// ->whereYear('created_at', '2019')

// // ->whereYear('created_at', date('Y')-1)
// // ->where('created_at', raw(YEAR('2019'))

// // ->whereYear('created_at', \Carbon\Carbon::now()->subYear()->format('Y'))
// // ->whereYear('created_at', \Carbon\Carbon::now()->subYear())

// ->groupBy(DB::raw("MONTH(created_at)"))
// // ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
// ->get()->toArray();
// $user_joined = array_column($user_joined, 'count');

// return view('chart')
// ->with('user_joined', json_encode($user_joined, JSON_NUMERIC_CHECK));




// $users_joined_2019 = DB::select('select * from users where created_at = ?', YEAR(2019))
// ->get()->toArray();

// $user_joined2019 = DB::table('users')
// ->whereYear('created_at', '2019')
// ->select(DB::raw("count(*) as count, MONTH(created_at) as date"))
// // ->select(DB::raw('DATE(created_at)as subscription_date')
// // ->groupBy(DB::raw("MONTH(created_at)"))
// // ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')

// ->groupBy('date')
// // ->orderBy('date', 'ASC')

// ->get()->toArray();
// // dd($user_joined2019);
// $user_joined2019 = array_column($user_joined2019, 'count');
// // dd($user_joined2019);

// return view('chart')
// ->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK));


// $user_joined2019 = DB::table('users')
// ->whereYear('created_at', '2019')
// // ->select(DB::raw("MONTHNAME(created_at) as date, count(*) as count"))
// ->select(DB::raw("DATE(created_at) as date, count(*) as count"))

// // ->select(DB::raw('DATE(created_at)as subscription_date')
// // ->groupBy(DB::raw("MONTH(created_at)"))
// ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')

// ->groupBy('count')

// ->orderBy('date', 'ASC')

// ->get()->toArray();
// dd($user_joined2019);

// foreach ($user_joined2019 as $res) {
// $month = $res->created_at->month();
// // $data[$res->id]['id'] = $res->id;
// }
// dd($month);

// $user_joined2019 = array_column($user_joined2019, 'count');
// // dd($user_joined2019);


// $data=json_encode($data);//this will encode the data array into json format.


// return view('chart')
// ->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK));

// $graph = DB::table('users')
// ->whereYear('created_at', '2019')
// ->select(
// DB::raw('MONTHNAME(created_at) as month'),
// DB::raw("DATE_FORMAT(created_at,'%M') as monthNum"),
// DB::raw('ifnull(count(id),0) as m')
// )
// ->groupBy('monthNum')
// ->orderBy('created_at')
// ->get();
// dd($graph);

// $results = User::whereYear('created_at', '2019')
// ->groupBy('date')
// ->orderBy('date')
// ->get([
// DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'),
// DB::raw('count(*) as total')
// ])
// ->keyBy('date')
// ->map(function ($item) {
// $item->date = Carbon::parse($item->date);
// return $item;
// });
// // dd($results);

// $period = new DatePeriod(Carbon::now()->subYear(1), CarbonInterval::month(), Carbon::now()->month());

// dd($period);

// $graph = array_map(function ($datePeriod) use ($results) {
// $date = $datePeriod->format('Y-m-d');
// return $results->has($date) ? $results->get($date)->total : 0;
// }, iterator_to_array($period));
// dd($graph);


<script>
    var user_pass = @json($user_joined2019);
        // var user_pass = <?php echo $user_joined2019; ?>;
        alert(user_pass);
        console.log(user_pass);

</script>
<script>
    var barChartData = {
        // labels: month,
        labels: mL,
        datasets: [{
        label: 'All Joins',
        backgroundColor: "#f56954",
        data: user_pass
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
        // type: 'bubble', //not works
        // type: 'scatter',
        // type: 'polarArea',
        data: barChartData,
        options: {
            scales: {
                xAxes: {
                categories: [JSON.stringify(user_pass)],
                axisBorder: {
                show: true,
                color: '#bec7e0',
                },
                axisTicks: {
                show: true,
                color: '#bec7e0',
                },
                },


            elements: {
            rectangle: {
            borderWidth: 2,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio : true,
        title: {
        display: true,
        text: 'Monthly Joined Status'
        }
        }
        });


        };
    }
</script>
