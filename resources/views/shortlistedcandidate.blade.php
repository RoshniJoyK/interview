@extends('layout')
@section('content')

            <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">ShortList Candidate</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Candidate List</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

							{{-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button> --}}
							{{-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div> --}}
						</div>
					</div>
				</div>
				<!--end breadcrumb-->


				<h6 class="mb-0 text-uppercase">Shortlisted Candidates</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
													
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Job Position</th>
                                        <th>location</th>

										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($candidate as $candidates)
																	
									<tr>

										<td>{{$candidates->name}}</td>
                                        <td>{{$candidates->title}}</td>
                                        <td>{{$candidates->location}}</td>
										
																
																			
										<td>
											<a href="/addStaffForm/{{$candidates->id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" > </i>Add staff</a>

										</td>
									
										
									
									</tr>
									
                                    @endforeach
								</tbody>
								{{-- <tfoot>
									<tr>
										<th>Name</th>
										<th>Job Title</th>
                                        <th>Status</th>
										<th>Actions</th>
									</tr>
								</tfoot> --}}
							</table>
							
						</div>
					</div>
				</div>
			</div>

@endsection
