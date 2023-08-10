@extends('layout')
@section('content')
            <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Candidate</div>
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
							<button type="button" class="btn">Sort</button>
							<button type="button" class="btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="/list-candidate">All</a>
                                <a class="dropdown-item" href="/list-scheduled">Scheduled</a>
								<a class="dropdown-item" href="/list-notscheduled">Not Scheduled</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->


				<h6 class="mb-0 text-uppercase">List of Candidates</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                            @if(count($data)>0)
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Experience</th>
                                        <th>Skills</th>
                                        <th>Status</th>
                                        <th>Email Status</th>
                                        <th>Round</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $candidate)
                                    @if($candidate->schedule_status !=5 && $candidate->schedule_status !=2)
									<tr>
										<td class="text-capitalize">{{$candidate->name}}</td>
										<td>{{$candidate->email}}</td>
                                        <td>
                                            {{$candidate->phone1}} <br>
                                            @if($candidate->phone2 == $candidate->whatsapp)
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAWVJREFUSEvVletNAzEQhCedQCehEpJKgEqASiCVhE5AX7Rz8q3XvvAjEliykvPt7ezMPrzTjdfuxv71JwDuJD1K2sf+kuR9kvQ2U2GLwZOk53CA08/4DyiALN6/jEBGADj4kMTvyIGZ8R5wQDo2IwA7PzZRj4J0MLx/CLDFtgKwLBgjCQ6IcLawOQcDghoCVIbfAXC/AXKQ9BosnKuuTG2EM6L2s+kvHxZgDm6VsywREeDU51QK+bgGAJvW9vJRBkBHorSOjqqyrRQjfwS4yFkBIA0J9rJMlOAqgQVCVqBj0FEMJ64sg8AMZ7Btmywr0AGYYq7n3FQ8e7XMqLhpkof1HN4cuccEcroZc/+USeYQmqxZ3QPEdtm62ro8VZ0MzWsSaonaUdEFlQFcMZ6gdvJejIucl3JujRrNjtHYs6i9B3w3YDdlmwFcpmjLZeJh5wvH1cM5gBWzVXtsXThVt/7q7P8D/AClTmAZ8gyZDwAAAABJRU5ErkJggg=="/>
                                            @endif{{$candidate->phone2}}

                                        </td>
                                        <td>
                                            @if($candidate->w_years!='' || $candidate->w_months!='')
                                                @if($candidate->w_years!='')
                                                    {{$candidate->w_years}} {{"Years"}} <br>
                                                @else
                                                    {{"0 Years"}}
                                                @endif
                                                @if($candidate->w_months!='')
                                                    {{$candidate->w_months}} {{"Months"}}
                                                @else
                                                    {{"0 Months"}}
                                                @endif
                                            @else
                                                {{"0 Years"}}
                                            @endif
                                        </td>

										<td class="text-capitalize">{{Str::limit($candidate->skills, 10)}}</td>
                                        <td class="text-capitalize">
                                            @if($candidate->status == 0)
                                                {{"Not Scheduled"}}
                                            @elseif($candidate->status == 1)
                                                {{"Scheduled"}}
                                            @endif
                                        </td>
                                        <td class="text-capitalize">
                                            @if($candidate->email_status == 0)
                                                {{"Not Sent"}}
                                            @elseif($candidate->email_status == 1)
                                                {{"Sent"}}
                                            @endif
                                        </td>
										<td class="text-capitalize">
                                            {{$candidate->round}}
                                            @if($candidate->schedule_status == 1)
                                                {{"(Attended"}} <b class="text-danger"> {{"$candidate->round_result"}} </b>{{")"}}
                                            @elseif($candidate->schedule_status == 2)
                                                {{"(Not Attended)"}}
                                            @elseif($candidate->schedule_status == 3)
                                                {{"(Postponed)"}}
                                            @elseif($candidate->schedule_status == 4)
                                                {{"(Shortlisted)"}}

                                            @endif
                                        </td>
                                        <td>
											<a href="/edit_candidate/{{$candidate->id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"> <i class="bx bx-pencil"></i></a>
											<a href="" class="btn btn-danger btn-sm delete_candidate" data-id={{$candidate->id}} data-bs-toggle="modal" data-bs-target="#delModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bx bx-trash"></i></a>
											@if($candidate->schedule_status != 4 && $candidate->round_result != 'Failed')
                                                <a href="/schedule-interview/{{$candidate->id}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Schedule Interview"><i class="bx bx-calendar"></i></a>
                                            @endif
                                            @if($candidate->status == 1)
                                            <a href="/sentmail/{{$candidate->candidate_id}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Send Mail"><i class="bx bx-mail-send"></i></a>
                                            @endif

										</td>
									</tr>
                                    @endif
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
            <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/destroy" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="deletecandidateid" name="id" type="hidden">
                                Are you sure to delete?<br>
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
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
                })

            </script>
@endsection
