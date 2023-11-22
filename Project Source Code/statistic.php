<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="http://cdn.highcharts.com.cn/highcharts/10.0.0/highcharts.js"></script>
        <script src="https://cdn.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
        <title>Administrator System</title>
    </head>
    <body class="admin">
        <h2 class="row d-flex justify-content-center h-10"><strong>Administrator System</strong></h2>
        <nav class="navbar navbar-expand-lg navbar-light justify-content-center background">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">View List of Registered Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pnotice.php">View List of Pending Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cnotice.php">View List of Completed Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistic.php">System Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <div id="container" class="align-items-center" style="min-width:400px;height:400px"></div>
        <script>
            var chart = Highcharts.chart('container',{
    chart: {
        type: 'column'
    },
    title: {
        text: 'The Number of Notices in Different Age Ranges'
    },
    
    xAxis: {
        categories: [
            '[<10]','[10,30]','[30,50]','[50,70]','[>=70]'
        ],
        crosshair: true,
        title: {
            text: 'AGE'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'NUMBER'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}UNIT</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },

    <?php
            $server = "localhost";
            $user = "landf";
            $pw = "landf123";
            $db = "lostnfound";
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql1 = "SELECT COUNT(object_id) AS num FROM notice WHERE age < 10";
            $result1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT COUNT(object_id) AS num FROM notice WHERE age >= 10 and age < 30";
            $result2 = mysqli_query($connect, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            $sql3 = "SELECT COUNT(object_id) AS num FROM notice WHERE age >= 30 and age < 50";
            $result3 = mysqli_query($connect, $sql3);
            $row3 = mysqli_fetch_assoc($result3);

            $sql4 = "SELECT COUNT(object_id) AS num FROM notice WHERE age >= 50 and age < 70";
            $result4 = mysqli_query($connect, $sql4);
            $row4 = mysqli_fetch_assoc($result4);

            $sql5 = "SELECT COUNT(object_id) AS num FROM notice WHERE age >= 70";
            $result5 = mysqli_query($connect, $sql5);
            $row5 = mysqli_fetch_assoc($result5);
        

    print "series: [{
        name: 'Notice',
        data: [".$row1['num'].",".$row2['num'].",".$row3['num'].",".$row4['num'].",".$row5['num']."]
    }]"?>
});
        </script>
    </body>
</html>