@extends('DataManager::layouts.main')

@section('content')
<div class="row" >
	<div class="col-md-10 col-md-offset-1">
		<h1>{{ trans('DataManager::setup.title') }}</h1>
		<div class="clearfix"></div>
		<section>
		{{ app('form')->open(['url' => (!isset($lookup) ? 'data/new' : 'data/edit/'. $lookup->dataId), 'method' => 'POST', 'class' => 'form']) }}
			<h4>{{ trans('DataManager::data.form.title') }}</h4>
			<div class="form-group">
			    <label for="data.name">{{ trans('DataManager::data.schema.name') }}</label>
			    @if(!isset($lookup))
			    {{ app('form')->text('data.name','',
			    	array('id'=> 'data.name','placeholder'=>'Enter Lookup Name', 'class' => 'form-control','required')) }}
			    @else
			    {{ app('form')->text('data.name',$lookup->dataName,
			    	array('id'=> 'data.name','placeholder'=>'Enter Lookup Name','class' => 'form-control','required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataName'); }}
			    	</div>
			    @endif
			    <span class="help-block text-danger">Maximum character length 20.</span>

			</div>
			<div class="form-group">
			    <label for="data.table">{{ trans('DataManager::data.schema.table') }}</label>
			    @if(!isset($lookup))
			    {{ app('form')->text('data.table','',
			    	array('id'=> 'data.table','placeholder'=>'Enter Lookup Table', 'class' => 'form-control','required')) }}
			    @else
			    {{ app('form')->text('data.table',$lookup->dataTable,
			    	array('id'=> 'data.table',
			    	($lookup->isMigrated)? 'readonly' : '', 
			    	'class' => 'form-control','required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataTable'); }}
			    	</div>
			    @endif
			    <span class="help-block text-danger">Maximum character length 20.</span>
			</div>
			<div class="form-group">
			    <label for="data.class">{{ trans('DataManager::data.schema.class') }}</label>
			    @if(!isset($lookup))
			    {{ app('form')->text('data.class','',
			    	array('id'=> 'data.class','placeholder'=>'Enter Lookup Class', 'class' => 'form-control','required')) }}
			    @else
			    {{ app('form')->text('data.class',$lookup->dataClass,
			    	array('id'=> 'data.class',
			    	($lookup->isMigrated)? 'readonly' : '', 
			    	'class' => 'form-control','required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataClass'); }}
			    	</div>
			    @endif
			    <span class="help-block text-danger">Maximum character length 20.</span>
			</div>
			<div class="form-group">
			    <label for="data.desc">{{ trans('DataManager::data.schema.desc') }}</label>
			    @if(!isset($lookup))
			    {{ app('form')->text('data.desc','',
			    	array('id'=> 'data.desc','placeholder'=>'Enter Lookup Description', 'class' => 'form-control','required')) }}
			    @else
			    {{ app('form')->text('data.desc',$lookup->dataDesc,
			    	array('id'=> 'data.desc','placeholder'=>'Enter Lookup Description', 'class' => 'form-control','required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataDesc'); }}
			    	</div>
			    @endif
			    <span class="help-block text-danger">Maximum character length 20.</span>
			</div>
			<div class="pull-right">
				<button type="submit" class="btn btn-primary btn-sm">
					@if(!isset($lookup))
					{{ trans('DataManager::data.form.action') }}
					@else
					{{ trans('DataManager::data.form.edit.action') }}
					@endif
				</button>
				<a href="{{ url('data') }}" class="btn btn-default btn-sm" role="button">Back</a> 
			</div>
		{{ app('form')->close() }}
		</section>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
	</div>
</div>
@stop

@section('script')

<script type="text/javascript">


</script>

@stop