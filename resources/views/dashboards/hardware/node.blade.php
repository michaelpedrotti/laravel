<div id="{{ $id }}" class="box box-primary">
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
							<td style="border:none">
								<span class="pull-right-container">
									<small class="label pull-left bg-green">Ok</small>
								</span>
							</td>
						</tr>
						<tr>
							<td style="text-align:right">@lang('Endereço')</td>
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
				<div class="panel panel-default">
					<div class="panel-body" data-bind="linechart" style="min-height: 200px;"></div>
				</div>
			</div>
			<br />
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body" data-bind="areachart" style="min-height: 200px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>