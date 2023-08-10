@extends('layout')
@section('content')

            <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Interview</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Interview List</li>
							</ol>
						</nav>
					</div>

					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn">Sort</button>
							<button type="button" class="btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<a class="dropdown-item" href="/list_interview">All</a>
								<a class="dropdown-item" href="/findAttend">Attended candidates</a>
								<a class="dropdown-item" href="/findNotattend">Not-Attended candidates</a>
								<a class="dropdown-item" href="/findPostponed">Postponed candidates</a>
								<a class="dropdown-item" href="/stafflist">Shortlist candidates</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->


				<h6 class="mb-0 text-uppercase">List of Interviewees</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							@if(count($candidate)>0)
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Job Title</th>
                                        <th>Round</th>
										<th>Interview Date</th>
										<th>Mode of Interview</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($candidate as $data)
									<tr>
										<td>{{$data->name}}</td>
										<td>{{$data->title}}</td>
										<td>
                                            {{$data->round}}
                                                @if($data->status == 1 && $data->round_result == NULL )
                                                    <a href="" data-id={{$data->id}} data-bs-toggle="modal" data-bs-target="#resultModal" class="btn btn-info btn-sm round_result">Result</a>
                                                @else
                                                    {{-- <a href="" class="btn btn-secondary btn-sm" style="pointer-events: none">Result</a> --}}


														@if($data->status == 1)
															{{"(Attended"}} <b class="text-danger"> {{"$data->round_result"}} </b>{{")"}}
														@elseif($data->status == 2)
															{{"(Not Attended)"}}
														@elseif($data->status == 3)
															{{"(Postponed)"}}
														@elseif($data->status == 4)
															{{"(Shortlisted)"}}

														@endif

													@endif
                                        </td>
                                        <td>{{$data->interview_date}}</td>
										<td>{{$data->type}}</td>
										<td class="text-capitalize">
                                            @if($data->status == 0)
                                                {{"Not attended"}}
                                            @elseif($data->status == 1)
                                                {{"Attended"}}
                                            @endif
                                        </td>
										<td>
											@if($data->status != 4 )

											<a href="/attend/{{$data->candidate_id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" > </i>Attended</a>
											<a href="/not_attend/{{$data->candidate_id}}" class="btn btn-danger btn-sm"  data-bs-toggle="tooltip" data-bs-placement="bottom" >Not Attended</i></a>
											<a href="/postponed/{{$data->candidate_id}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" ></i>Postpone</a>
											@if($data->round == 'Final' && $data->round_result == 'Passed' )
											<a href="/shortListedCandidates/{{$data->candidate_id}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" ></i>Shortlist</a>
											@endif
											@else
											<a href="" class="btn btn-secondary btn-sm" style="pointer-events: none"> Attended</a>
											<a href="" class="btn btn-secondary btn-sm" style="pointer-events: none">Not Attended</a>
											<a href="" class="btn btn-secondary btn-sm" style="pointer-events: none">Postpone</a>

											@endif
										</td>
									</tr>
                                    @endforeach

								</tbody>

							</table>
							@else
                            <h6 class="alert alert-info" text-align="center">No Data to Display!</h6>
                            @endif
						</div>
					</div>
				</div>
			</div>
            <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resultModalLabel">Round Result</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/store-round-result" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="id" name="id" type="hidden">
                                <div class="row mb-3">
                                    <label for="result" class="col-sm-3 col-form-label">Result</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="result" name="result">
                                            <option selected disabled value>Choose...</option>
                                            <option value="Passed">Passed</option>
                                            <option value="Failed">Failed</option>
                                            <option value="Not Completed">Not Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <i class="text-danger">Be careful while adding the result. You can't change it</i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
