var ctx1 = document.getElementById("myChart1");
var ctx2 = document.getElementById("myChart2");
var ctx3 = document.getElementById("myChart3");
var ctx4 = document.getElementById("myChart4");

config(ctx3,false,true);
config(ctx4,false,false);

function config(ctx,responsive,maintainAspectRatio) {
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: get(0,60),
        datasets: [{
            label: '# of Votes',
            data: get(0,60),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: responsive,
        maintainAspectRatio: maintainAspectRatio,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
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
