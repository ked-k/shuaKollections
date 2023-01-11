        <script src="../amcharts/amcharts.js"></script>
        <script src="../amcharts/serial.js"></script>
           <script src="../amcharts/export.js"></script>
    <link rel="stylesheet" href="../amcharts/export.css" type="text/css" media="all" />
        <script src="../amcharts/themes/frozen.js"></script>
          <script src="../amcharts/themes/light.js"></script>
        <script src="../amcharts/animate.min.js"></script>

        <script src="../amcharts/plugins/responsive/responsive.min.js"></script>
        <script src="../amcharts/pie.js"></script>
 <style>
    #chart {
      width       : 100%;
      height      : 420px;
      font-size   : 12px;
    } 
    .amcharts-pie-slice {
      transform: scale(1);
      transform-origin: 50% 50%;
      transition-duration: 0.3s;
      transition: all .3s ease-out;
      -webkit-transition: all .3s ease-out;
      -moz-transition: all .3s ease-out;
      -o-transition: all .3s ease-out;
      cursor: pointer;
      box-shadow: 0 0 30px 0 #000;
    }

    .amcharts-pie-slice:hover {
      transform: scale(1.1);
      filter: url(#shadow);
    }     
    
      #chart2,#chart3,#chart4 {
      width       : 100%;
      height      : 220px;
      font-size   : 8px;
    } 
    .amcharts-pie-slice {
      transform: scale(1);
      transform-origin: 50% 50%;
      transition-duration: 0.3s;
      transition: all .3s ease-out;
      -webkit-transition: all .3s ease-out;
      -moz-transition: all .3s ease-out;
      -o-transition: all .3s ease-out;
      cursor: pointer;
      box-shadow: 0 0 30px 0 #000;
    }

    .amcharts-pie-slice:hover {
      transform: scale(1.1);
      filter: url(#shadow);
    }     
  </style>
<!-- ./wrapper -->
  <script>

          var raw = '<?php echo $d; ?>';
          var data = JSON.parse(raw);
          var chart = AmCharts.makeChart( "chartdiv", {
            "type": "serial",
            "theme": "frozen",
            "dataProvider": data,
                  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "sales by month"
  }],
   "colors": [ '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#2A0CD0', '#CD0D74', '#CC0000', '#222333', '#990000','#FF6600', '#FCD202', '#B0DE09', '#0D8ECF'],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [ {
              "balloonText": "[[category]]: <b>Sales [[value]]</b>",
              "fillAlphas": 0.8,
              "lineAlpha": 0.2,
              "type": "column",
              "valueField": "value"
            } ],
            "chartCursor": {
              "categoryBalloonEnabled": false,
              "cursorAlpha": 0,
              "zoomable": true
            },
            "categoryField": "title",
            "categoryAxis": {
              "gridPosition": "start",
              "gridAlpha": 0,
              "tickPosition": "start",
              "tickLength": 20
            },
              "categoryAxis": {
              "gridPosition": "start",
              "gridAlpha": 0,
              "tickPosition": "start",
               "labelRotation": 45,
              "tickLength": 20
            },
            "export": {
              "enabled": true
            }

          } );
        </script>



        <script type="text/javascript">
            var raw = '<?php echo $d1; ?>';
            var data = JSON.parse(raw);
            var chart = AmCharts.makeChart( "chart", {
                "type": "pie",
                "theme": "light",
                "dataProvider": data ,
                "titleField": "title",
                "valueField": "value",
                "labelRadius": 15,
                
                "radius": "37%",
                "innerRadius": "20%",
                "labelText": " [[title]] ([[percents]]%)",
                "export": {
                    "enabled": true
                },
                "depth3D": 10,
                "angle": 17,
                "fontFamily": "Helvetica",
                "fontSize": 13,
                "balloonText": "[[value]]",
                "color": "#222",
                 "export": {
              "enabled": true
            },
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": [ '#67B7DC', '#0000CC', '#DDDDDD', '#999999', '#2A0CD0', '#CD0D74', '#CC0000', '#222333', '#990000','#FF6600', '#FCD202', '#B0DE09', '#0D8ECF']
    } );
</script>



 <script>

          var raw = '<?php echo $d2; ?>';
          var data = JSON.parse(raw);
          var chart = AmCharts.makeChart( "chart2", {
            "type": "serial",
            "theme": "frozen",
            "dataProvider": data,
                  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Daily sales"
  }],
   "colors": [ '#8067DC', '#0000CC', '#DDDDDD', '#999999', '#2A0CD0', '#CD0D74', '#CC0000', '#222333', '#990000','#FF6600', '#FCD202', '#B0DE09', '#0D8ECF'],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [ {
              "balloonText": "[[category]]: <b>Sales [[value]]</b>",
              "fillAlphas": 0.8,
              "lineAlpha": 0.2,
              "type": "column",
              "valueField": "value"
            } ],
            "chartCursor": {
              "categoryBalloonEnabled": false,
              "cursorAlpha": 0,
              "zoomable": true
            },
            "categoryField": "title",
            "categoryAxis": {
              "gridPosition": "start",
              "gridAlpha": 0,
              "tickPosition": "start",
               "labelRotation": 45,
              "tickLength": 20
            },
            "export": {
              "enabled": true
            }

          } );
        </script>



 <script type="text/javascript">
            var raw = '<?php echo $d3; ?>';
            var data = JSON.parse(raw);
            var chart = AmCharts.makeChart( "chart3", {
                "type": "pie",
                "theme": "light",
                "dataProvider": data ,
                "titleField": "title",
                "valueField": "value",
                "labelRadius": 2,
                
                "radius": "25%",
                
                "labelText": " [[title]] ([[percents]]%)",
                "export": {
                    "enabled": true
                },
                "depth3D": 10,
                "angle": 17,
                "fontFamily": "Helvetica",
                "fontSize": 13,
                "balloonText": "[[value]]",
                "color": "#222",
                 "export": {
              "enabled": true
            },
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#3F24D5', '#DC67CE', '#B8E121', '#0000CC', '#DDDDDD','#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0',  '#999999', '#222333', '#990000']
    } );
</script>

 <script type="text/javascript">
            var raw = '<?php echo $d4; ?>';
            var data = JSON.parse(raw);
            var chart = AmCharts.makeChart( "chart4", {
                "type": "pie",
                "theme": "light",
                "dataProvider": data ,
                "titleField": "title",
                "valueField": "value",
                "labelRadius": 2,
                
                "radius": "27%",
                
                "labelText": " [[title]] ([[percents]]%)",
                "export": {
                    "enabled": true
                },
                "depth3D": 10,
                "angle": 17,
                "fontFamily": "Helvetica",
                "fontSize": 13,
                "balloonText": "[[value]]",
                "color": "#222",
                 "export": {
              "enabled": true
            },
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#21D8DE', '#1DD62C', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
    } );
</script>





