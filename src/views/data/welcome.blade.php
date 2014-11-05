@extends('DataManager::layouts.main')

@section('content')
<div class="row" >
	<div class="col-md-10 col-md-offset-1">
		<h1>{{ trans('DataManager::setup.title') }}</h1>
		<div class="clearfix"></div>
		<section>
		<div class="row">
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-10">
					<h4>{{ trans('DataManager::data.listavail') }}</h4>
				</div>
				<div class="col-md-2">
					<a href="data/new" class="btn btn-primary btn-sm active pull-right" role="button">
					<span class="glyphicon glyphicon-plus"></span>
					{{ trans('DataManager::data.form.title') }}
					</a>
				</div>
			</div>
			<table class="table table-bordered table-striped requirements">
				<thead>
					<tr>
						<th>{{ trans('DataManager::data.schema.name') }}</th>
						<th>{{ trans('DataManager::data.schema.table') }}</th>
						<th>{{ trans('DataManager::data.schema.class') }}</th>
						<th>{{ trans('DataManager::data.schema.desc') }}</th>
						@if(count($list) > 0)
						<th class="text-center" width="220px">{{ trans('DataManager::data.action') }}</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($list as $lookup)
					<tr>
						<td> {{ $lookup->dataName }}</td>
						<td> {{ $lookup->dataTable }}</td>
						<td> {{ $lookup->dataClass }}</td>
						<td> {{ $lookup->dataDesc }}</td>
						<td class="text-center">
							<a href="data/edit/{{ $lookup->dataId }}" class="btn btn-success btn-xs" role="button">
								<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
							</a> 
							<a href="schema/manage/{{ $lookup->dataId }}" class="btn btn-success btn-xs" role="button">
								<span class="glyphicon glyphicon-tasks"></span>&nbsp;Scheme
							</a> 
							<a href="content/manage/{{ $lookup->dataId }}" class="btn btn-success btn-xs" role="button">
								<span class="glyphicon glyphicon-th-list"></span>&nbsp;Content
							</a> 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		</section>
	</div>
</div>
@stop
