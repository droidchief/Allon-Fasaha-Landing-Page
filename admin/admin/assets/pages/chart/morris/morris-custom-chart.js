"use strict";
$(document).ready(function() {

    lineChart();
    areaChart();
    donutChart();

    $(window).on('resize',function() {
        window.lineChart.redraw();
        window.areaChart.redraw();
        window.donutChart.redraw();
    });
});

// Morris bar chart
Morris.Bar({
    element: 'morris-bar-chart',
    data: [{
        y: 1,
        a: 100,
        b: 90
    }, {
        y: 2,
        a: 75,
        b: 65
    }, {
        y: 2,
        a: 50,
        b: 40
    }, {
        y: 3,
        a: 75,
        b: 65
    }, {
        y: 4,
        a: 50,
        b: 40,
    }, {
        y: 5,
        a: 75,
        b: 65
    }, {
        y: 6,
        a: 100,
        b: 90
    }],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Students', 'Logins'],
    barColors: ['#5FBEAA', '#5D9CEC'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
});