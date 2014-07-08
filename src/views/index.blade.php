@extends('admin::layouts.master')

@section('content')

<h3 class="page-header">Hello, {{ Auth::user()->name }}.</h3>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Users
			</div>
			<table class="table">
				<tr>
					<th>All Users</th>
					<td>{{ User::count() }}</td>
				</tr>
				@foreach(Role::all() as $role)
				<tr>
					<th>{{ Str::plural($role->name) }}</th>
					<td>{{ Pingpong\Admin\Entities\User::hasRole($role->slug)->count() }}</td>
				</tr>
				@endforeach
			</table>
		</div>

	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Visitors
			</div>
			<table class="table">
				<tr>
					<th>Total Hits</th>
					<td>{{ Pingpong\Admin\Entities\Visitor::getTotalHits() }}</td>
				</tr>
				<tr>
					<th>Page Hits Today </th>
					<td>{{ Pingpong\Admin\Entities\Visitor::getHitsToday() }}</td>
				</tr>
				<tr>
					<th>Online Users</th>
					<td>{{ Pingpong\Admin\Entities\Visitor::getOnlineUsers() }}</td>
				</tr>
				<tr>
					<th>Total Visitors Today</th>
					<td>{{ Pingpong\Admin\Entities\Visitor::getTotalVisitorsToday() }}</td>
				</tr>
			</table>
		</div>

	</div>
	
</div>

@endsection

@section('style')
	<style type="text/css">
	td{
		width:50px;
	}
	th{
		text-indent: 10px;
	}
	</style>
@stop