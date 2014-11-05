@extends('DataManager::layouts.main')

@section('content')

<div class="row" >
	<div class="col-md-10 col-md-offset-1">
		<h1>{{ trans('DataManager::setup.title') }}</h1>
		<div class="clearfix">&nbsp;</div>
		<section>
		<h4>{{ trans('DataManager::data.migration.form.title') }} </h4>
		{{ app('form')->open(['url' =>  url('schema/add/'. $lookup->dataId), 'method' => 'POST', 'class' => 'form']) }}
				<div class="form-group">
				    <label for="data.name">{{ trans('DataManager::data.migration.schema.field') }}</label>
				    @if(isset($schema))
				    	{{ app('form')->hidden('schema.id',$schema->schemaId) }}
				    @endif

				    {{ app('form')->text('schema.name',(!isset($schema))? '' : $schema->schemaName,
				    	array('id'=> 'data.name',
				    	'placeholder'=>trans('DataManager::data.migration.schema.add.holder.name'), 
				    	'class' => 'form-control',
				    	'required')) }}
	
				    @if($errors)
				    	<div class="text-danger">
				    		{{ $errors->first('dataName'); }}
				    	</div>
				    @endif
				</div>
				<div class="form-group">
				    <label for="data.desc">{{ trans('DataManager::data.migration.schema.type') }}</label>
				    {{ app('form')->select('schema.type',$listType,(!isset($schema))? NULL : $schema->schemaType,
				    	array('id'=> 'data.desc', 
				    	'class' => 'form-control',
				    	'required')) }}
				    @if($errors)
				    	<div class="text-danger">
				    		{{ $errors->first('dataDesc'); }}
				    	</div>
				    @endif
				</div>
				<div class="form-group">
				    <label for="data.desc">{{ trans('DataManager::data.schema.content.desc') }}</label>
				    {{ app('form')->text('schema.desc',(!isset($schema))? '' : $schema->schemaDesc,
				    	array('id'=> 'data.desc',
				    	'placeholder'=> trans('DataManager::data.migration.schema.add.holder.desc'), 
				    	'class' => 'form-control',
				    	'required')) }}
				    @if($errors)
				    	<div class="text-danger">
				    		{{ $errors->first('dataDesc'); }}
				    	</div>
				    @endif
				</div>
				<button type="submit" class="btn btn-primary btn-sm pull-right">
					@if(!isset($schema))
					{{ trans('DataManager::data.migration.form.action') }}
					@else
					{{ trans('DataManager::data.migration.form.edit') }}
					@endif
				</button>
		{{ app('form')->close() }}
		</section>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<h4>{{ trans('DataManager::data.migration.title') }} : <span class="label label-primary">{{ 'create_'.$lookup->dataTable }} </span></h4>
		<section>
			<table class="table table-bordered table-striped requirements">
				<thead>
					<tr>
						<th>{{ trans('DataManager::data.migration.schema.field') }}</th>
						<th>{{ trans('DataManager::data.migration.schema.type') }}</th>
						<th>{{ trans('DataManager::data.migration.schema.desc') }}</th>						
						@if(count($list) > 0)
						<th class="text-center" width="100px">{{ trans('DataManager::data.action') }}</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@if(!empty($list))
						@foreach ($list as $data)
						<tr>
							<td> {{ $data->schemaName }}</td>
							<td> {{ $data->schemaType }}</td>
							<td> {{ $data->schemaDesc }}</td>
							<td class="text-center">
							<a href="{{ url('schema/edit/'. $lookup->dataId .'/' . $data->schemaId) }}" class="btn btn-success btn-xs" role="button">
								<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
							</a> 
							</td>
						</tr>
						@endforeach
					@else
					<tr>
						<td colspan="3" class="text-center"> No Data</td>
					</tr>
					@endif
				</tbody>
			</table>
		</section>
		<div class="clearfix pull-right">
		<a href="{{ url('schema/create/'.$lookup->dataId) }}" class="btn btn-warning btn-sm" role="button">
			{{ trans('DataManager::data.migration.action') }}
		</a> 
		<a href="{{ url('data') }}" class="btn btn-default btn-sm" role="button">Back</a> 
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
	</div>
</div>
@stop

@section('script')

<script type="text/javascript">


</script>

@stop