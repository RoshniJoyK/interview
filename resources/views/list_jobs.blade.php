@extends('layout')
@section('content') 
            <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Jobs</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Job List</li>
							</ol>
						</nav>
					</div>
					 <div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn">Sort</button>
							<button type="button" class="btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item" href="/list-jobs">Active</a>
								<a class="dropdown-item" href="/findDisable">Disabled</a>
								<a class="dropdown-item" href="/findFulfilled">Fulfilled</a>
							</div>
						</div>
					</div> 
				</div>
				<!--end breadcrumb-->
				
				
				<h6 class="mb-0 text-uppercase">List of Jobs</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							@if(count($job)>0)
							<table id="example2" class="table table-striped table-bordered table-wrapped">
								<thead>
									<tr>
										<th>Title</th>
										<th>Experience</th>
										<th>Salary</th>
										<th>Deadline</th>
										<th>Company</th>
										<th>Actions</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach ($job as $jobs)
																			
									<tr>
										<td>{{$jobs->title}}</td>
										
										<td>{{$jobs->year}}.{{$jobs->month}}</td>
										<td>{{$jobs->salary}}</td>
										<td>{{$jobs->deadline}}</td>
										<td>{{$jobs->company}}</td>
										<td><a href="/edit_job/{{$jobs->id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" id="edit"> <i class="bx bx-pencil"></i></a>
										{{-- <a href="/disable/{{$jobs->id}}" class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Disable"> <i class="bx bx-minus"></i></a> --}}
										@if($jobs->status==0) 
										<a href="" class="btn btn-warning btn-sm enable_job" data-id={{$jobs->id}} data-bs-toggle="modal" data-bs-target="#enableModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enable" id="enable"><i class="bx bx-show"></i></a>
										@else
										<a href="" class="btn btn-secondary btn-sm disable_job" data-id={{$jobs->id}} data-bs-toggle="modal" data-bs-target="#disableModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Disable" id="disable"><i class="bx bx-block"></i></a>
										@endif
										<a href="" class="btn btn-danger btn-sm delete_job" data-id={{$jobs->id}} data-bs-toggle="modal" data-bs-target="#jobModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bx bx-trash"></i></a>
										<a href="" class="btn btn-success btn-sm fulfilled_job" data-id={{$jobs->id}} data-bs-toggle="modal" data-bs-target="#fulfilledModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fulfilled"><i class="bx bx-check"></i></a>
										
										{{-- <a href="/destroy/{{$jobs->id}}" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"> <i class="bx bx-trash"></i></a> --}}
										{{-- <a href="/fulfilled/{{$jobs->id}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fulfilled"> <i class="bx bx-check"></i></a> --}}
									   
									</tr>
									@endforeach				
									
									
								</tbody>
								{{-- <tfoot>
									<tr>
										<th>Title</th>
										<th>Description</th>
										<th>Requirements</th>
										<th>Experience</th>
										<th>Deadline</th>
										<th>Actions</th>
									</tr>
								</tfoot> --}}
							</table>
							@else
                            <h6 class="alert alert-info" align="center">No Data to Display!</h6>
                            @endif
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="disableModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Disable</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/disable-job" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="disablejobid" name="id" type="hidden">
                                Are you sure to disable? <br>
                                <i class="text-danger">Caution : Once disabled, it won't appear on the active page.</i> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Disable</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


			<div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/destroy-job" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="deletejobid" name="id" type="hidden">
                                Are you sure to delete? <br>
                                <i class="text-danger">Caution : Once you delete data will permanently deleted.</i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



			<div class="modal fade" id="fulfilledModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Fulfilled</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/fulfilled-job" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="fulfilledjobid" name="id" type="hidden">
                                Are you sure to fulfill? <br>
                                <i class="text-danger">Caution : Once fulfilled, it won't appear on the active page.</i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Fulfill</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

			<div class="modal fade" id="enableModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Enable</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/enable-job" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="enablejobid" name="id" type="hidden">
                                Are you sure to enable? <br>
                                <i class="text-danger">Caution : Once enabled, it will appear on the active page.</i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Enable</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
		})
		
	</script>
@endsection

{{-- style={white-space: break-spaces;min-width: 200px;} --}}
