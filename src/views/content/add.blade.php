@extends('DataManager::layouts.main')

@section('content')
<div class="row" >
	<div class="col-md-10 col-md-offset-1">
		<h1>{{ trans('DataManager::setup.title') }}</h1>
		<div class="clearfix"></div>
		<section>
		{{ app('form')->open(['url' => (!isset($content) ? url('content/new/'. $lookup->dataId) : url('content/edit/'. $lookup->dataId)), 'method' => 'POST', 'class' => 'form']) }}
			<h4>{{ trans('DataManager::data.form.content.title') }} : <span class="label label-primary">{{ $lookup->dataClass }} </span></h4>
			<div class="form-group">
			    <label for="data.name">{{ trans('DataManager::data.schema.content.name') }}</label>
			    @if(!isset($content))
			    {{ app('form')->text('data.name','',
			    	array('id'=> 'data.name',
			    	'placeholder'=>trans('DataManager::data.form.content.add.holder.name'), 
			    	'class' => 'form-control',
			    	'required')) }}
			    @else
			    {{ app('form')->text('data.name',$lookup->dataName,
			    	array('id'=> 'data.name',
			    	'placeholder'=>trans('DataManager::data.form.content.add.holder.name'),
			    	'class' => 'form-control',
			    	'required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataName'); }}
			    	</div>
			    @endif
			    <span class="help-block text-danger">Maximum character length 20.</span>

			</div>
			<div class="form-group">
			    <label for="data.desc">{{ trans('DataManager::data.schema.content.desc') }}</label>
			    @if(!isset($content))
			    {{ app('form')->text('data.desc','',
			    	array('id'=> 'data.desc',
			    	'placeholder'=> trans('DataManager::data.form.content.add.holder.desc'), 
			    	'class' => 'form-control',
			    	'required')) }}
			    @else
			    {{ app('form')->text('data.desc',$lookup->dataDesc,
			    	array('id'=> 'data.desc',
			    	'placeholder'=>trans('DataManager::data.form.content.add.holder.desc'), 
			    	'class' => 'form-control',
			    	'required')) }}
			    @endif
			    @if($errors)
			    	<div class="text-danger">
			    		{{ $errors->first('dataDesc'); }}
			    	</div>
			    @endif
			</div>

			<button type="submit" class="btn btn-primary btn-sm">
				@if(!isset($content))
				{{ trans('DataManager::data.form.content.action') }}
				@else
				{{ trans('DataManager::data.form.content.edit.action') }}
				@endif
			</button>
			<a href="{{ url('content/manage/'.$lookup->dataId) }}" class="btn btn-default btn-sm" role="button">Back</a> 
		{{ app('form')->close() }}
		</section>
		<div class="clearfix"></div>
		<div class="clearfix"></div>
	</div>
</div>
@stop

@section('script')

<script type="text/javascript">


</script>

@stop