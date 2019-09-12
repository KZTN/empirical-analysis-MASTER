"use strict";
var ButtonElementSubmit = document.querySelector("#app .btnSubmit");
var ElementLoader = document.querySelector("#app .loader");
ButtonElementSubmit.onclick = function addLoader() {
    ElementLoader.style.display = 'inline-block';
}
var data;
var myInit = { method: 'GET',
               headers: {
                   'Content-Type': 'application/json'
                },
                mode: 'cors',
                cache: 'default'
            };
let myRequest = new Request("./data.json", myInit);
fetch(myRequest)
    .then(function(resp) {
        return resp.json();
    })
    .then(function(data) {
        console.log(data);
        // var dataArray = [];
        // for(var o in data) {
        //     dataArray.push(data[o]);
        // }
        // console.log(dataArray);
        var x1 = data.data[0].tempo;
        var y1 = data.data[0].n_amostras;
        console.log(x1);
        console.log(y1);
        var x = "5";
        var y = "5";
        var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [data.data[0].n_amostras, data.data[1].n_amostras, data.data[2].n_amostras, data.data[3].n_amostras, data.data[4].n_amostras, data.data[5].n_amostras, data.data[6].n_amostras, data.data[7].n_amostras, data.data[8].n_amostras, data.data[9].n_amostras],
        datasets: [{
            label: '# of samples',
            data: [data.data[0].tempo, data.data[1].tempo, data.data[2].tempo, data.data[3].tempo, data.data[4].tempo, data.data[5].tempo, data.data[6].tempo, data.data[7].tempo, data.data[8].tempo, data.data[9].tempo],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                '(rgba(230, 52, 98, 1))',
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
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    });