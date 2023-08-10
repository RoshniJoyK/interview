@extends('layout')
@section('content')
            <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Staff</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Staff List</li>
							</ol>
						</nav>
					</div>
					<!-- <div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div> -->
				</div>
				<!--end breadcrumb-->


				<h6 class="mb-0 text-uppercase">List of Staff</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							@if(count($staff)>0)
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Experience</th>
                                        <th>Job Post</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($staff as $staffs)
									<tr>
										<td>{{$staffs->name}}</td>
										<td>{{$staffs->email}}</td>
                                        <td>
                                            {{$staffs->phone1}} <br>
                                            @if($staffs->phone2 == $staffs->whatsapp)
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAWVJREFUSEvVletNAzEQhCedQCehEpJKgEqASiCVhE5AX7Rz8q3XvvAjEliykvPt7ezMPrzTjdfuxv71JwDuJD1K2sf+kuR9kvQ2U2GLwZOk53CA08/4DyiALN6/jEBGADj4kMTvyIGZ8R5wQDo2IwA7PzZRj4J0MLx/CLDFtgKwLBgjCQ6IcLawOQcDghoCVIbfAXC/AXKQ9BosnKuuTG2EM6L2s+kvHxZgDm6VsywREeDU51QK+bgGAJvW9vJRBkBHorSOjqqyrRQjfwS4yFkBIA0J9rJMlOAqgQVCVqBj0FEMJ64sg8AMZ7Btmywr0AGYYq7n3FQ8e7XMqLhpkof1HN4cuccEcroZc/+USeYQmqxZ3QPEdtm62ro8VZ0MzWsSaonaUdEFlQFcMZ6gdvJejIucl3JujRrNjtHYs6i9B3w3YDdlmwFcpmjLZeJh5wvH1cM5gBWzVXtsXThVt/7q7P8D/AClTmAZ8gyZDwAAAABJRU5ErkJggg=="/>
                                            @endif{{$staffs->phone2}}

                                        </td>
                                        <td>{{$staffs->w_years}} {{"Years"}} <br> {{$staffs->w_months}} {{"Months"}}</td>
                                        <td>{{$staffs->title}}</td>
                                        <td>
											<a href="/staffDetails/{{$staffs->candidate_id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" > </i>View Details</a>
										</td>
									</tr>

                                    @endforeach

								</tbody>

							</table>
							@else
                            <h6 class="alert alert-info" align="center">No Data to Display!</h6>
                            @endif
						</div>
					</div>
				</div>
			</div>

@endsection
