<!DOCTYPE html>
<html>
<head>
    <title>Student Chart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/partials/chart.css">
</head>
<body>
   @include('partials.nav')
   @include('partials.sidebar')
<div id="col-2">
<!-- <a href="">
    <i class="gg-arrow-left"></i>
    </a> -->
<div class="chart">
    <div id="highchart"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        $(function () { 
            var dataClick = {{ json_encode($assignment,JSON_NUMERIC_CHECK) }};
            var dataViewer = {{ json_encode($student,JSON_NUMERIC_CHECK) }};
            
            $('#highchart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'StudentProgress'
                },
                xAxis: {
                  
                   categories :['1','2','3','4']
                },
                
                yAxis: {
                    title: {
                        text: 'percentage obtained'
                    }
                },
                series: [{
                   name :'progress',
                    data: dataViewer
                }]
            });
        });
    </script>
    </div>
    </div>
   @include('partials.footer')

</body>