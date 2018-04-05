@extends('layout.app')
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
	
	
	$(".knob").knob({
			format: function (value) {
					return value + '%';
				},
			draw: function () {

				// "tron" case
				if (this.$.data('skin') == 'tron') {

				var a = this.angle(this.cv)  // Angle
					, sa = this.startAngle          // Previous start angle
					, sat = this.startAngle         // Start angle
					, ea                            // Previous end angle
					, eat = sat + a                 // End angle
					, r = true;

				this.g.lineWidth = this.lineWidth;

				this.o.cursor
				&& (sat = eat - 0.3)
				&& (eat = eat + 0.3);

				if (this.o.displayPrevious) {
					ea = this.startAngle + this.angle(this.value);
					this.o.cursor
					&& (sa = ea - 0.3)
					&& (ea = ea + 0.3);
					this.g.beginPath();
					this.g.strokeStyle = this.previousColor;
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
					this.g.stroke();
				}

				this.g.beginPath();
				this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
				this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
				this.g.stroke();

				this.g.lineWidth = 2;
				this.g.beginPath();
				this.g.strokeStyle = this.o.fgColor;
				this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
				this.g.stroke();

				return false;
				}
			}
		});
	
	
	var chartData = {
	};

	function updateChart( label, value ) {
		if (!chartData.hasOwnProperty(label)) {
			chartData[label] = { data: [], last: value };
		}
		if (chartData[label].data.length >= 25)
			chartData[label].data.shift();
		chartData[label].data.push( parseInt(value) - parseInt(chartData[label].last) );
		chartData[label].last = value;
		$('#' + label).html( chartData[label].data.join(',') ).each( function() {
			var $this = $(this);
			$this.sparkline('html', $this.data());
		});
	}

	function getData() {
		// Retrieve dashboard data
		$.ajax({
			url:     '{{ url("dashboards/smartdefender") }}',
			success: function(result,statis,xhr) {
				var obj = JSON.parse(result);
				// Total de requisições
				$('#requests_total').html( obj.total );
				// Requisições sem cache
				$('#requests_not_cached').val( (parseInt(obj.not_cached)/parseInt(obj.total))*100  ).trigger('change');
				// Requisições com cache
				$('#requests_cached').val( 100-parseInt($('#requests_not_cached').val()) ).trigger('change');
				// Requisições bloqueadas
				if (obj.hasOwnProperty('blacklist')) $('#requests_blocked').html( obj.blacklist );
				// Usuários Online
				$('#online_users').html( Object.keys(obj.online).length );
				// Smart Crawler
				if (obj.hasOwnProperty('url_queue')) $('#crawler_queue').html( obj.url_queue );
				// Smart Box
				if (obj.hasOwnProperty('sandbox_queue')) $('#box_queue').html( obj.sandbox_queue );
				// Arquivo
				if (obj.hasOwnProperty('file_total')) $('#file_total').html( obj.file_total );
				if (obj.hasOwnProperty('file_threat')) $('#file_threat').html( obj.file_threat );
				updateChart( 'file_total_chart', (obj.hasOwnProperty('file_total')) ? obj.file_total : 0 );
				updateChart( 'file_threat_chart', (obj.hasOwnProperty('file_threat')) ? obj.file_threat : 0 );

				// URL
				if (obj.hasOwnProperty('url_total')) $('#url_total').html( obj.url_total );
				if (obj.hasOwnProperty('url_threat')) $('#url_threat').html( obj.url_threat );
				updateChart( 'url_total_chart', (obj.hasOwnProperty('url_total')) ? obj.url_total : 0 );
				updateChart( 'url_threat_chart', (obj.hasOwnProperty('url_threat')) ? obj.url_threat : 0 );
				// IP
				if (obj.hasOwnProperty('ip_total')) $('#ip_total').html( obj.ip_total );
				if (obj.hasOwnProperty('ip_threat')) $('#ip_threat').html( obj.ip_threat );
				updateChart( 'ip_total_chart', (obj.hasOwnProperty('ip_total')) ? obj.ip_total : 0 );
				updateChart( 'ip_threat_chart', (obj.hasOwnProperty('ip_threat')) ? obj.ip_threat : 0 );
				
				
				
				var tbody = $('.online_users_table').find('tbody')	
				tbody.empty();
				
				$.each(obj.online, function(key, row){
					
					tbody.append('<tr><td>' + row['Registered-To'] + '</td><td>' + row['Remote-Address'] + '</td><td>' + row['Requests'] + '</td></tr>');
				});
				
				
				var tbody = $('.offline_users_table').find('tbody')	
				tbody.empty();
				
				$.each(obj.online, function(key, row){
					
					tbody.append('<tr><td>' + row['Registered-To'] + '</td><td>' + row['Remote-Address'] + '</td><td>' + row['Requests'] + '</td></tr>');
				});

			}
		}).always(function() {
			// Agenda a próxima execução
			setTimeout( getData, 10 * 1000 );
		});
	}

	getData();
});
</script>
@append
@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="row">
			<!-- Total de requisições -->	
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
					<h3><span id="requests_total">-</span></h3>
					<p>Total de requisições</p>
					</div>
					<div class="icon">
					<i class="fa fa-connectdevelop"></i>
					</div>
					<a href="#" class="small-box-footer"></a>
					</a>
				</div>
			</div>

			<!-- Requisições x Cache -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box">
					<div class="inner">
						<div class="row">
							<div class="col-md-4">
								<input id="requests_cached" type="text" class="knob" data-skin="tron" value="0" data-width="57" data-height="57" data-fgColor="#3c8dbc" data-thickness="0.1">
								<div class="knob-label">Com cache</div>
							</div>
							<div class="col-md-4">
								<input id="requests_not_cached" type="text" class="knob" data-skin="tron" value="0" data-width="57" data-height="57" data-fgColor="#3c8dbc" data-thickness="0.1">
								<div class="knob-label">Sem cache</div>
							</div>
						</div>
					</div>
					<div class="icon">
					<i class="fa fa-bolt"></i>
					</div>
					<a href="#" class="small-box-footer"></a>
					</a>
				</div>
			</div>


			<!-- Requisições Bloqueadas -->	
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
					<h3><span id="requests_blocked">0</span></h3>
					<p>Requisições Bloqueadas</p>
					</div>
					<div class="icon">
					<i class="fa fa-close"></i>
					</div>
					<a href="#" class="small-box-footer"></a>
					</a>
				</div>
			</div>

			<!-- Usuários Online -->	
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
					<h3><span id="online_users">0</span></h3>
					<p>Clientes Online</p>
					</div>
					<div class="icon">
					<i class="fa fa-users"></i>
					</div>
					<a href="#" class="small-box-footer"></a>
					</a>
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-lg-3 col-xs-6">
				<div class="row">
					<!-- Clientes conectados -->
					<div class="col-lg-12 col-xs-12">
						<div class="box">
							<div class="box-header">
							<h3 class="box-title"><i class="fa fa-user-plus"></i> Lista de Clientes Conectados</h3>
							</div>
							<div class="box-body no-padding">
								<table class="online_users_table table table-striped table-bordered table-responsive">
									<thead>
										<tr>
											<th>Cliente</th>
											<th>IP</th>
											<th>Requisições</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- Falhas de autenticação -->
					<div class="col-lg-12 col-xs-12">
						<div class="box">
							<div class="box-header">
							<h3 class="box-title"><i class="fa fa-user-times"></i> Lista de Falhas de Autenticação</h3>
							</div>
							<div class="box-body no-padding">
								<table class="offline_users_table datatable table table-striped table-bordered table-responsive">
									<thead>
										<tr>
											<th>Cliente</th>
											<th>IP</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col-lg-9 col-xs-9">
				<!-- Filas -->
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-cogs"></i> Filas</h3>
							</div>
							<div class="box-body">
								<div class="row">

								<!-- Smart Crawler -->
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-link"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Smart Crawler</span>
										<span id="crawler_queue" class="info-box-number">-</span>
									</div>
									</div>
								</div>

								<!-- Smart Box -->
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Smart Box</span>
										<span id="box_queue" class="info-box-number">-</span>
									</div>
									</div>
								</div>


								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Arquivo -->
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border"><h3 class="box-title"><i class="fa fa-file-code-o"></i> Arquivo</h3></div>
							<div class="box-body">
								<div class="row">
									<!-- Requisições -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Requisições</span>
											<span id="file_total" class="info-box-number">-</span>
											<div id="file_total_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
									<!-- Ameaças -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-red"><i class="fa fa-bug"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Ameaças Encontradas</span>
											<span id="file_threat" class="info-box-number">-</span>
											<div id="file_threat_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- URL -->
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border"><h3 class="box-title"><i class="fa fa-link"></i> URL</h3></div>
							<div class="box-body">
								<div class="row">
									<!-- Requisições -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Requisições</span>
											<span id="url_total" class="info-box-number">-</span>
											<div id="url_total_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
									<!-- Ameaças -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-red"><i class="fa fa-bug"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Ameaças Encontradas</span>
											<span id="url_threat" class="info-box-number">-</span>
											<div id="url_threat_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- IP -->
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border"><h3 class="box-title"><i class="fa fa-cubes"></i> IP</h3></div>
							<div class="box-body">
								<div class="row">
									<!-- Requisições -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Requisições</span>
											<span id="ip_total" class="info-box-number">-</span>
											<div id="ip_total_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
									<!-- Ameaças -->
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="info-box">
										<span class="info-box-icon bg-red"><i class="fa fa-bug"></i></span>
										<div class="info-box-content">
											<span class="info-box-text">Ameaças Encontradas</span>
											<span id="ip_threat" class="info-box-number">-</span>
											<div id="ip_threat_chart" class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="35px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)"></div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@stop