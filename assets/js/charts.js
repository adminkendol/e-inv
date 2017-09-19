/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
charts={
    pie:function(datas,dom,judul,pointer){
        Highcharts.chart(dom, {
                chart: {
                    type: 'pie',
                    backgroundColor:'grey',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: judul,
                    style: {
                        color: '#FFF',
                        font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: pointer,
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF'
                    },
                    data: datas
                }]
            });
    }
}

