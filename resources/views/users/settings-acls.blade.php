@section('tab-content')
<div class="tab-pane active">
	<form class="form-horizontal">
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">Name</label>

			<div class="col-sm-10">
				<input class="form-control" id="inputName" placeholder="Name" type="email">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-10">
				<input class="form-control" id="inputEmail" placeholder="Email" type="email">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">Name</label>

			<div class="col-sm-10">
				<input class="form-control" id="inputName" placeholder="Name" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="inputExperience" class="col-sm-2 control-label">Experience</label>

			<div class="col-sm-10">
				<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputSkills" class="col-sm-2 control-label">Skills</label>

			<div class="col-sm-10">
				<input class="form-control" id="inputSkills" placeholder="Skills" type="text">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-danger">Submit</button>
			</div>
		</div>
	</form>
</div>
@stop
@include('users.partials.settings', ['expanded' => 'acls'])