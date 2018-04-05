@extends('layout.app')
@section('javascript')
<script type="text/javascript">

var NS = APP.ns('APP.modules');

NS.SmartDefender = new (function(){

	/**
	 * Cria ou atualiza o element html do knob
	 * 
	 */
	function setKnob(selector, id, label, percent){

		var content = $('#' + id);

		if(content.length == 0) {

			content = $('#knob-clone').clone();
			content.attr('id', id);
			content.removeAttr('hidden');

			selector.find('[data-bind=tron]').append(content);
		}

		content.find('.knob-label').text(label);
		content.find('input.knob').val(parseInt(percent)).knob({
			readOnly:true,
			format:function(value){ return value + '%'; }
		});		
	}
	
	/**
	 * Carrega os dados nos dasboard de cada servidor
	 * 
	 */
	function load(){

		$.ajax({
			type: 'GET',
			url: '{{ url("dashboards/hardware") }}',
			dataType: 'json',
			success: function(records) {

				var index = 1;

				$.each(records, function(hostname, record){

					var selector = $('#container-' + index);
					
					if(selector.length == 0) {
						return true;
					}

					selector.find('.box-title').html(hostname);
					selector.find('[data-bind=processor]').html(record.cpu.manufacturer + ' ' + record.cpu.brand + ' ' + record.cpu.speed + ' GHz');
					selector.find('[data-bind=latencia]').html(record.inetLatency + 's');
					selector.find('[data-bind=ram]').html(record.mem.total);
					selector.find('[data-bind=ip]').html(record.net.pop().ip4);

					setKnob(selector, 'knob-cpu', 'CPU', '20');
					setKnob(selector, 'knob-swap', 'SWAP', '50');

					$.each(record.fsSize, function(index, disk){

						setKnob(selector, 'knob-disk-' + disk.fs.replace(/\//g , '-'), 'Disk '+ disk.mount, disk.use);
					});
					
					setCharts(selector, hostname.replace(/\W+/g, '-'), record);

					index++;
				});
			}
		}).always(function(){
			setTimeout(load, 10 * 1000);
		});
	}
	
	function parseDate(date) {
		
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = '' + d.getFullYear(),
			hour = '' + d.getHours(),
			min = '' + d.getMinutes();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;
		if (hour.length < 2) hour = '0' + hour;
		if (min.length < 2) min = '0' + min;

		return year + '-' + month + '-' + day + ' ' + hour + ':' + min;
	}
		
	/**
	 * 
	 * @param {String} key 
	 * @param {Array|String|Integer|Object} data
	 * @return {Array|String|Integer|Object}  
	 */
	function get(key, data){
		
		if(!this[key]) this[key] = data;
		
		return this[key];
	}
	
	function push(key, data){
		
		if(!this[key]) this[key] = [];
		
		this[key].push(data);
		
		return this[key];
	}

	function setCharts(selector, basename, record){

		var key = basename + '-linechart';

		if(!this[key]) {
			this[key] = Morris.Line({
				data:[],
				ymin:0,
				xkey: 'period',
				ykeys: ['1', '5', '15'],
				labels: ['load1', 'load5', 'load15'],
				lineColors: ['gray', 'blue', 'red'],
				fillOpacity: 0.6,
				hideHover: 'auto',
				behaveLikeLine: true,
				resize: true,
				pointFillColors: ['#ffffff'],
				pointStrokeColors: ['black'],
				element:selector.find('[data-bind=linechart]').get(0)
			});
		}
		
		var rows = push(basename + '-linechart-rows', {
			'period':parseDate(record.time.current), 
			'1':record.load[0].toFixed(2), 
			'5':record.load[1].toFixed(2), 
			'15':record.load[2].toFixed(2)
		});
		
		if(rows.length > 10) {
			rows = rows.slice(0);
		}
		
		this[key].setData(rows);
		
		
		
		
			

//		if(this[basename + '-areachart']){
//			
//		}
//		else {
//			this[basename + '-areachart'] = Morris.Area({
//				data:[
//					{y: '2014', a: 50, b: 90, c:0.5},
//					{y: '2015', a: 65,  b: 75, c:10},
//					{y: '2016', a: 50, b: 50, c:12},
//					{y: '2017', a: 75, b: 60, c:33},
//					{y: '2018', a: 80, b: 65, c:10},
//					{y: '2019', a: 90, b: 70, c:44},
//					{y: '2020', a: 100, b: 75, c:10},
//					{y: '2021', a: 115, b: 75, c:54},
//					{y: '2022', a: 120, b: 85, c:10},
//					{y: '2023', a: 145, b: 85, c:22},
//					{y: '2024', a: 160, b: 95, c:12}
//				],
//				xkey: 'y',
//				ykeys: ['a', 'b', 'c'],
//				labels: ['0', '5', '10'],
//				fillOpacity: 0.6,
//				hideHover: 'auto',
//				behaveLikeLine: true,
//				resize: true,
//				pointFillColors: ['#ffffff'],
//				pointStrokeColors: ['black'],
//				lineColors: ['gray', 'red', 'blue'],
//				element:selector.find('[data-bind=areachart]').get(0)
//			});
//		}
	}
	
	this.init = function(e) {
		
		load();
    }
	
})();

$(document).ready(NS.SmartDefender.init);

</script>
@append
@section('content')

<!-- begin: knob model -->
<div id="knob-clone" hidden="hidden" class="pull-left" style="width:60px; margin-right:10px">
	<input class="knob" data-skin="tron" value="0" data-width="57" data-height="57" data-fgColor="#3c8dbc" data-thickness="0.1">
	<div class="knob-label" style="text-align: center">Label</div>	
</div>
<!-- end: knob model -->

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-body" style="padding-top:0; padding-bottom:0">
				<div class="col-lg-12">
					<div class="col-lg-offset-4 col-lg-4">
						<table class="table">
							<tbody>
								<tr>
									<td style="border:none; text-align:right"><b>Smart Defender API</b></td>
									<td style="border:none">Ok</td>
								</tr>
								<tr>
									<td style="text-align:right">Tempo de Resposta</td>
									<td>0.100 s</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div id="container-1" class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Carregando...</h3>
            </div>
            <div class="box-body" style="padding-top:0">
				<div class="row">
					<div class="col-lg-12">
						<table class="table" style="width:100%">
							<tbody>
								<tr>
									<td style="border:none; text-align:right; width:30%">Status</td>
									<td style="border:none">Ok</td>
								</tr>
								<tr>
									<td style="text-align:right">Endereço</td>
									<td data-bind="ip">-</td>
								</tr>
								<tr>
									<td style="text-align:right">Processador</td>
									<td data-bind="processor">-</td>
								</tr>
								<tr>
									<td style="text-align:right">RAM (MB)</td>
									<td data-bind="ram">-</td>
								</tr>
								<tr>
									<td style="text-align:right">Latência</td>
									<td data-bind="latencia">-</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" data-bind="tron" style="min-height:80px"></div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div data-bind="linechart" style="min-height: 200px;"></div>
					</div>
					<br />
					<div class="col-lg-12">
						<div data-bind="areachart" style="min-height: 200px;"></div>
					</div>
				</div>
            </div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">smartdefender02.mliclound.com</h3>
            </div>
            <div class="box-body">
				Hello World
            </div>
		</div>
	</div>
</div>

@stop
