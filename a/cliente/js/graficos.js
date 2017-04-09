        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");


        var canvas2 = document.getElementById("myChart2");
        var ctx2 = canvas2.getContext("2d");


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
                    data: get(0,5000)
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
                    data: get(0,5000)
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

/*Chart.defaults.doughnutLabels = Chart.helpers.clone(Chart.defaults.doughnut);

var helpers = Chart.helpers;
var defaults = Chart.defaults;

Chart.controllers.doughnutLabels = Chart.controllers.doughnut.extend({
	updateElement: function(arc, index, reset) {
    var _this = this;
    var chart = _this.chart,
        chartArea = chart.chartArea,
        opts = chart.options,
        animationOpts = opts.animation,
        arcOpts = opts.elements.arc,
        centerX = (chartArea.left + chartArea.right) / 2,
        centerY = (chartArea.top + chartArea.bottom) / 2,
        startAngle = opts.rotation, // non reset case handled later
        endAngle = opts.rotation, // non reset case handled later
        dataset = _this.getDataset(),
        circumference = reset && animationOpts.animateRotate ? 0 : arc.hidden ? 0 : _this.calculateCircumference(dataset.data[index]) * (opts.circumference / (2.0 * Math.PI)),
        innerRadius = reset && animationOpts.animateScale ? 0 : _this.innerRadius,
        outerRadius = reset && animationOpts.animateScale ? 0 : _this.outerRadius,
        custom = arc.custom || {},
        valueAtIndexOrDefault = helpers.getValueAtIndexOrDefault;

    helpers.extend(arc, {
      // Utility
      _datasetIndex: _this.index,
      _index: index,

      // Desired view properties
      _model: {
        x: centerX + chart.offsetX,
        y: centerY + chart.offsetY,
        startAngle: startAngle,
        endAngle: endAngle,
        circumference: circumference,
        outerRadius: outerRadius,
        innerRadius: innerRadius,
        label: valueAtIndexOrDefault(dataset.label, index, chart.data.labels[index])
      },

      draw: function () {
      	var ctx = this._chart.ctx,
						vm = this._view,
						sA = vm.startAngle,
						eA = vm.endAngle,
						opts = this._chart.config.options;
				
					var labelPos = this.tooltipPosition();
					var segmentLabel = vm.circumference / opts.circumference * 100;
					
					ctx.beginPath();
					
					ctx.arc(vm.x, vm.y, vm.outerRadius, sA, eA);
					ctx.arc(vm.x, vm.y, vm.innerRadius, eA, sA, true);
					
					ctx.closePath();
					ctx.strokeStyle = vm.borderColor;
					ctx.lineWidth = vm.borderWidth;
					
					ctx.fillStyle = vm.backgroundColor;
					
					ctx.fill();
					ctx.lineJoin = 'bevel';
					
					if (vm.borderWidth) {
						ctx.stroke();
					}
					
					if (vm.circumference > 0.15) { // Trying to hide label when it doesn't fit in segment
						ctx.beginPath();
						ctx.font = helpers.fontString(opts.defaultFontSize, opts.defaultFontStyle, opts.defaultFontFamily);
						ctx.fillStyle = "#fff";
						ctx.textBaseline = "top";
						ctx.textAlign = "center";
            
            // Round percentage in a way that it always adds up to 100%
						ctx.fillText(segmentLabel.toFixed(0) + "%", labelPos.x, labelPos.y);
					}
      }
    });

    var model = arc._model;
    model.backgroundColor = custom.backgroundColor ? custom.backgroundColor : valueAtIndexOrDefault(dataset.backgroundColor, index, arcOpts.backgroundColor);
    model.hoverBackgroundColor = custom.hoverBackgroundColor ? custom.hoverBackgroundColor : valueAtIndexOrDefault(dataset.hoverBackgroundColor, index, arcOpts.hoverBackgroundColor);
    model.borderWidth = custom.borderWidth ? custom.borderWidth : valueAtIndexOrDefault(dataset.borderWidth, index, arcOpts.borderWidth);
    model.borderColor = custom.borderColor ? custom.borderColor : valueAtIndexOrDefault(dataset.borderColor, index, arcOpts.borderColor);

    // Set correct angles if not resetting
    if (!reset || !animationOpts.animateRotate) {
      if (index === 0) {
        model.startAngle = opts.rotation;
      } else {
        model.startAngle = _this.getMeta().data[index - 1]._model.endAngle;
      }

      model.endAngle = model.startAngle + model.circumference;
    }

    arc.pivot();
  }
});

var config = {
  type: 'doughnutLabels',
  data: {
    datasets: [{
      data: [
        1200,
        1112,
        533,
        202,
        105,
      ],
      backgroundColor: [
        "#F7464A",
        "#46BFBD",
        "#FDB45C",
        "#949FB1",
        "#4D5360",
      ],
      label: 'Dataset 1'
    }],
    labels: [
      "Red",
      "Green",
      "Yellow",
      "Grey",
      "Dark Grey"
    ]
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
    animation: {
      animateScale: true,
      animateRotate: true
    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx, config);*/