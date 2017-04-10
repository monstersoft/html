var data = {
    labels: ['08:00','08:01','08:02','08:03','08:04','08:05','08:06','08:07','08:08','08:09',
                '08:10','08:11','08:12','08:13','08:14','08:15','08:16','08:17','08:18','08:19',
                '08:20','08:21','08:22','08:23','08:24','08:25','08:26','08:27','08:28','08:28',
                '08:30','08:31','08:32','08:33','08:34','08:35','08:36','08:37','08:38','08:39',
                '08:40','08:41','08:42','08:43','08:44','08:45','08:46','08:47','08:48','08:49',
                '08:50','08:51','08:52','08:53','08:54','08:55','08:56','08:57','08:58','08:59'],
    series: [
        get(0,3600),
        get(0,3600)
    ]
    };
graphedChartLine('#chartLineSticky', true, data);
graphedChartLine('#chartLine', false, data);
graphedChartLine('#example', false, data);

function graphedChartLine(idChart, axisShowY, data) {
    var options = {    
        axisY: {
          showLabel: axisShowY,
        },
        plugins: [
            Chartist.plugins.tooltip()
        ]
    }
    new Chartist.Line(idChart, data, options);
}
function get(min, max) {
  var a = [];
  var i=0;
  while(i<=60) {
      a.push(Math.floor(Math.random() * (max - min + 1)) + min);
      i++;
  }
  return a;
}