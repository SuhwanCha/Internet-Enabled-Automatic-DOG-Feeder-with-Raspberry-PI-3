<?php

  $yd = DB::table('feed')
  ->where('created_at','like',date("Y-m-d",strtotime ("-1 days")).'%')->get();
  $td = DB::table('feed')
  ->where('created_at','like',date("Y-m-d", time()).'%')->get();
  $total = DB::table('feed')
                  ->latest()
                  ->first();

  $large = DB::table('feed')
                ->orderBy('created_at', 'desc')
                ->get()[0];

?>
@extends('app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <div class="col-lg-4 col-sm-6">
              <div class="card" style="text-align:center;height:131px;vertical-align:middle">

                <button type="button" class="btn btn-primary" style="margin-top:46.5px" onclick="run();">먹이주기</button>
              </div>
            </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>오늘 횟수</p>
                                         {{ count($td) }}번
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-calendar"></i> 최근 - {{$td[0]->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>총 횟수</p>
                                        {{$total->id}}번
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> Total
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">먹이주는 빈도</h4>
                            <p class="category">최근 1주일</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart"></div>
                            <div class="footer">
                                <div class="chart-legend">
                                    <i class="fa fa-circle text-info"></i> 전체
                                    <i class="fa fa-circle text-danger"></i> 오전
                                    <i class="fa fa-circle text-warning"></i> 오후
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Real Time
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">{{date("Y-M", time())}} 빈도수</h4>
                            <p class="category">각 날짜 모두를 총합</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart"></div>

                            <div class="footer">
                                <div class="chart-legend">
                                    <i class="fa fa-circle text-info"></i> 빈도수
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="ti-check"></i> Updated Monthly
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>

                    <li>
                        <a href="https://gdb.kr">
                            gdb.kr Co.
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/SuhwanCha/Internet-Enabled-Automatic-DOG-Feeder-with-Raspberry-PI-3">
                           GitHub
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/SuhwanCha/Internet-Enabled-Automatic-DOG-Feeder-with-Raspberry-PI-3/blob/master/LICENSE">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                Disigned by <a href="http://www.creative-tim.com">Creative Tim</a>
            </div>
        </div>
    </footer>

</div>
@stop
@section('script')
<script>
$(document).ready(function(){

  demo = {
    initPickColor: function(){
      $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
          var display_buttons = display_div.find('.btn');
          display_buttons.removeClass(old_class);
          display_buttons.addClass(new_class);
          display_div.attr('data-class', new_class);
        }
      });
    },

    initChartist: function(){
      <?php
      for($i=6;$i>=0;$i--){
        $rw[6-$i] = DB::table('feed')
        ->where(
          [['created_at','>=', date("Y-m-d",strtotime ("-".$i." days"))],
          ['created_at', '<=',date("Y-m-d",strtotime ("-".($i-1)." days"))]]
          )
          ->orderBy('created_at', 'asc')->get();
        }
        for($i=6;$i>=0;$i--){
          $rw1[6-$i] = DB::table('feed')
          ->where([
            ['created_at','>=', date("Y-m-d",strtotime ("-".$i." days"))." 12"],
            ['created_at', '<=',date("Y-m-d",strtotime ("-".($i-1)." days"))]
          ]
          )
          ->orderBy('created_at', 'asc')->get();
        }
        for($i=6;$i>=0;$i--){
          $rw2[6-$i] = DB::table('feed')
          ->where([
            ['created_at','>=', date("Y-m-d",strtotime ("-".$i." days"))." 0"],
            ['created_at', '<=',date("Y-m-d",strtotime ("-".($i)." days")). " 12"]
          ]
          )
          ->orderBy('created_at', 'asc')->get();
        }
        ?>
        var dataSales = {
          labels: [<?php for($i=5;$i>=0;$i--) echo "'".date("D",strtotime ("-".($i+1)." days"))."', "; ?>'{{date("D", time())}}'],
          series: [
            [<?php for($i=0;$i<=5;$i++) echo "'".count($rw[$i])."', "; ?>'{{count($rw[6])}}'],
            [<?php for($i=0;$i<=5;$i++) echo "'".count($rw2[$i])."', "; ?>'{{count($rw2[6])}}'],
            [<?php for($i=0;$i<=5;$i++) echo "'".count($rw1[$i])."', "; ?>'{{count($rw1[6])}}']
            ]
          };

          var optionsSales = {
            lineSmooth: false,
            low: 0,
            high: 10,
            showArea: true,
            height: "245px",
            axisX: {
              showGrid: false,
            },
            lineSmooth: Chartist.Interpolation.simple({
              divisor: 3
            }),
            showLine: true,
            showPoint: false,
          };

          var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
          ];

          Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);

          <?php
          for($i=1;$i<=31;$i++){
            $day[$i] = DB::table('feed')
            ->where(
            'created_at','like', date("Y-m",time())."-".sprintf('%02d', $i).'%'
            )
            ->orderBy('created_at', 'asc')->get();
          }
          // print_r($day);
          ?>

          var data = {
            labels: [<?php for($i=1;$i<=30;$i++) echo "'".$i."',"; ?>'31'],
            series: [
            [<?php for($i=1;$i<=30;$i++) echo "'".count($day[$i])."',"; ?>'{count($day[31])}']
            ]
          };

          var options = {
            seriesBarDistance: 10,
            axisX: {
              showGrid: false
            },
            height: "245px"
          };

          var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
          ];

          Chartist.Line('#chartActivity', data, options, responsiveOptions);

          var dataPreferences = {
            series: [
            [25, 30, 20, 25]
            ]
          };

          var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
              showGrid: false
            }
          };
        },

        showNotification: function(from, align){
          color = Math.floor((Math.random() * 4) + 1);

          $.notify({
            icon: "ti-gift",
            message: "Welcome to <b>Paper Dashboard</b> - a beautiful freebie for every web developer."

          },{
            type: type[color],
            timer: 4000,
            placement: {
              from: from,
              align: align
            }
          });
        }


      }
})
$(document).ready(function(){

    demo.initChartist();

});
</script>

<script>
function run(){
  $.ajax({
      type:"GET",
        url:"https://local.gdb.kr/run.php",
      success:function(args){
      },
      error:function(e){

        }
  });
  $.ajax({
      type:"GET",
      url:"https://49.174.13.19:55555/run.php",
      success:function(args){
      }
    });
    $.ajax({
        type:"get",
        url:"/tttt",
        success:function(args){
        }
      });

}

</script>
@stop
