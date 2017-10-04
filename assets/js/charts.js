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
                    /*backgroundColor:'grey',*/
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: judul,
                    /*style: {
                        color: '#FFF',
                        font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                    }*/
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
                        /*color: '#FFFFFF'*/
                    },
                    data: datas
                }]
            });
    },
    line:function(datas,dom,judul,pointer,legend){
        console.log("INTEGER:"+datas.seriesJual);
        Highcharts.chart(dom, {
            chart: {
                type: 'line'
            },
            title: {
                text: judul
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: datas.labelsBeli
            },
            yAxis: {
                title: {
                    text: legend
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Penjualan',
                data: datas.seriesJual
                }, {
                name: 'Pembelian',
                data: datas.seriesBeli
                }]
        });
    }
}

