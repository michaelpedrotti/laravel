@extends('layout.app')
@section('javascript')
<script type="text/javascript">

$(document).ready(function(){ });

</script>
@append
@section('content')
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
				<span class="info-box-text">CPU</span>
				<span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
				<span class="info-box-text">Swap</span>
				<span class="info-box-number">20%</span>
            </div>
            <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix visible-sm-block"></div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
				<span class="info-box-text">Sales</span>
				<span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
				<span class="info-box-text">New Members</span>
				<span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>

<div class="row">
	<div class="col-md-6">
		<div class="box">
            <div class="box-header with-border">
				<h3 class="box-title">CPU Load</h3>
            </div>
            <div class="box-body">
				<div class="row">
					<div class="col-sm-4 col-xs-5">
						<div class="description-block border-right">
							<h5 class="description-header text-green">1</h5>
							<span>5.5mm</span>
						</div>
					</div>
					<div class="col-sm-4 col-xs-5">
						<div class="description-block border-right">
							<h5 class="description-header text-yellow">5</h5>
							<span>3.5mm</span>
						</div>
					</div>
					<div class="col-sm-4 col-xs-5">
						<div class="description-block border-right">
							<h5 class="description-header text-green">15</h5>
							<span>4.5mm</span>
						</div>
					</div>
				</div>
            </div>
		</div>
		<!-- /.box -->
	</div>
	
	<div class="col-md-6">
		<div class="box">
            <div class="box-header with-border">
				<h3 class="box-title">Discos</h3>
            </div>
            <div class="box-body">
				<div class="progress-group">
                    <span class="progress-text">/</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
						<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
				</div>
				<!-- /.progress-group -->
				<div class="progress-group">
                    <span class="progress-text">/home</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
						<div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
				</div>
				<!-- /.progress-group -->
				<div class="progress-group">
                    <span class="progress-text">/opt</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
						<div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		
		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="line-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="509" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 509.5px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 22px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 93px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 163px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 234px; text-align: center;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 304px; text-align: center;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 372px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 63px; top: 283px; left: 443px; text-align: center;">12</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 1px; text-align: right;">-1.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 225px; left: 1px; text-align: right;">-1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 180px; left: 1px; text-align: right;">-0.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 5px; text-align: right;">0.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 90px; left: 5px; text-align: right;">0.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 45px; left: 5px; text-align: right;">1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 5px; text-align: right;">1.5</div></div></div><canvas class="flot-overlay" width="509" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 509.5px; height: 300px;"></canvas></div>
            </div>
            <!-- /.box-body-->
          </div>
		
	</div>

</div>


<div class="row">
        <div class="col-xs-12">
          <!-- interactive chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Interactive Area Chart</h3>

              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1069" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1069px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 21px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 123px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 227px; text-align: center;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 332px; text-align: center;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 437px; text-align: center;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 541px; text-align: center;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 646px; text-align: center;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 751px; text-align: center;">70</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 855px; text-align: center;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 960px; text-align: center;">90</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 13px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 216px; left: 7px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 162px; left: 7px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 7px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 7px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">100</div></div></div><canvas class="flot-overlay" width="1069" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1069px; height: 300px;"></canvas></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>


@stop
