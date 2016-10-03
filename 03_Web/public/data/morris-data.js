$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2016-08-31',
            오전: 2,
            오후: 0,
            새벽: 3
        },{
            period: '2016-09-01',
            오전: 1,
            오후: 2,
            새벽: 1
        },{
            period: '2016-09-02',
            오전: 3,
            오후: 1,
            새벽: 0
        }],
        xkey: 'period',
        ykeys: ['오전', '오후', '새벽'],
        labels: ['오전', '오후', '새벽'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

});
