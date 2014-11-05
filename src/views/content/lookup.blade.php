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
						<h4>{{ trans('DataManager::data.content.title') }}</h4>
					</div>
					<div class="col-md-2">
						<a href="{{ url('content/new/'.$lookup->dataId) }}" class="btn btn-primary btn-sm active pull-right" role="button">
						<span class="glyphicon glyphicon-plus"></span>
						{{ trans('DataManager::data.form.content.title') }}
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped requirements">
							<thead>
								<tr>
									<th>{{ trans('DataManager::data.schema.content.name') }}</th>
									<th>{{ trans('DataManager::data.schema.content.desc') }}</th>
									@if(count($list) > 0)
									<th class="text-center">{{ trans('DataManager::data.action') }}</th>
									@endif
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
				<div>
					<a href="{{ url('data') }}" class="btn btn-default btn-sm" role="button">Back</a> 
				</div>
			</div>
		</div>
		</section>
	</div>
</div>
@stop
