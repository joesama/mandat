@extends('DataManager::layouts.main')

@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ trans('DataManager::setup.setup.title') }}</h1>
		{{ app('form')->open(['url' => 'data/setup', 'method' => 'POST', 'class' => 'form-horizontal']) }}
		@if(isset($migrate))
			{{ print_r($migrate) }}
		@endif
		<section>
			<h4>{{ trans('DataManager::setup.setup.checkDB') }}</h4>
			<table class="table table-bordered table-striped requirements">
				<thead>
					<tr>
						<th>{{ trans('DataManager::setup.schema.name') }}</th>
						<th style="width:50px;">{{ trans('DataManager::setup.schema.status') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($db['table'] as $schema => $status)
					<tr>
						<td>
						 <var class="alert{!! true === $status ? ' alert-error ' : '' !!}">
						 {{ $schema }}
						 </var> 
						</td>
						<td class="text-center">
						<input type="hidden" name="{{ $schema }}" value="{{ $status }}" />
						@if (TRUE === $status)
							<button type="button" class="btn btn-success btn-xs btn-block disabled">
								{{ trans('DataManager::setup.status.available') }}<!--<span class="glyphicon glyphicon-thumbs-up"></span> --> 
							</button>
						@else
							<button class="btn btn-danger btn-xs btn-block disabled">
								{{ trans('DataManager::setup.status.taken') }}<!-- <span class="glyphicon glyphicon-thumbs-down"></span> -->
							</button>
						@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</section>
		<section>
		<div class="progress">
			<div class="progress-bar progress-bar-success progress-bar-striped" style="width: 0%"></div>
		</div>
		<button type="submit" class="btn btn-default pull-right">{{ trans('DataManager::setup.setup.initiate') }}</button>
		</section>
		{{ app('form')->close() }}
	</div>

	<div id="installation" class="six columns box">
	</div>
</div>
@stop
