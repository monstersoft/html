        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");


        var canvas2 = document.getElementById("myChart2");
        var ctx2 = canvas2.getContext("2d");

        var y = get(0,60);
        var chart2 = new Chart(ctx2, {
            type: 'line',
            options: {
                legend: {
                    display: true,
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                        autoSkip: true,
                        maxRotation: 0,
                        minRotation: 90,
                        fontSize: 12,
                        beginAtZero: true,
                        /*maxTicksLimit: 20*/
                        }
                    }],
                    yAxes:[{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        },
                        stacked: false
                    }]
                }
            },
            data: {
                labels: ['08:00 am','08:01 am','08:02 am','08:03 am','08:04 am','08:05 am','08:06 am','08:07 am','08:08 am','08:09 am',
                '08:10 am','08:11 am','08:12 am','08:13 am','08:14 am','08:15 am','08:16 am','08:17 am','08:18 am','08:19 am',
                '08:20 am','08:21 am','08:22 am','08:23 am','08:24 am','08:25 am','08:26 am','08:27 am','08:28 am','08:28 am',
                '08:30 am','08:31 am','08:32 am','08:33 am','08:34 am','08:35 am','08:36 am','08:37 am','08:38 am','08:39 am',
                '08:40 am','08:41 am','08:42 am','08:43 am','08:44 am','08:45 am','08:46 am','08:47 am','08:48 am','08:49 am',
                '08:50 am','08:51 am','08:52 am','08:53 am','08:54 am','08:55 am','08:56 am','08:57 am','08:58 am','08:59 am'],
                datasets: [
                {
                    label: 'FRONTAL',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#F5A214",
                    borderColor: "#F5A214",
                    borderWidth: 1,
                    pointRadius: 3,
                    pointBorderWidth: 3,
                    data: y
                },
                {
                    label: 'TRASERA',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#262626",
                    borderColor: "#262626",
                    borderWidth: 1,
                    pointRadius: 1,
                    data: y
                }
                ]
            }
        });




        var chart = new Chart(ctx, {
            type: 'line',
            options: {
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                        autoSkip: true,
                        maxRotation: 0,
                        minRotation: 90,
                        fontSize: 12,
                        beginAtZero: true,
                        //maxTicksLimit: 20
                        }
                    }],
                    yAxes:[{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            beginAtZero: true,
                            //display: false
                        },
                        stacked: false
                    }]
                }
            },
            data: {
                labels: ['08:00 am','08:01 am','08:02 am','08:03 am','08:04 am','08:05 am','08:06 am','08:07 am','08:08 am','08:09 am',
                '08:10 am','08:11 am','08:12 am','08:13 am','08:14 am','08:15 am','08:16 am','08:17 am','08:18 am','08:19 am',
                '08:20 am','08:21 am','08:22 am','08:23 am','08:24 am','08:25 am','08:26 am','08:27 am','08:28 am','08:28 am',
                '08:30 am','08:31 am','08:32 am','08:33 am','08:34 am','08:35 am','08:36 am','08:37 am','08:38 am','08:39 am',
                '08:40 am','08:41 am','08:42 am','08:43 am','08:44 am','08:45 am','08:46 am','08:47 am','08:48 am','08:49 am',
                '08:50 am','08:51 am','08:52 am','08:53 am','08:54 am','08:55 am','08:56 am','08:57 am','08:58 am','08:59 am'],
                datasets: [
                {
                    label: 'FRONTAL',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#F5A214",
                    borderColor: "#F5A214",
                    borderWidth: 1,
                    pointRadius: 3,
                    pointBorderWidth: 3,
                    data: get(0,5000)
                },
                {
                    label: 'TRASERA',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#262626",
                    borderColor: "#262626",
                    borderWidth: 1,
                    pointRadius: 1,
                    data: y
                }
                ]
            }
        });



        function get(min, max) {
          var a = [];
          var i=0;
          while(i<=60) {
              a.push(Math.floor(Math.random() * (max - min + 1)) + min);
              i++;
          }
          return a;
        }