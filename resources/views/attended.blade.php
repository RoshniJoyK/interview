@extends('layout')
@section('content')

        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">List Interview</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Attended</li>
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

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header px-4 py-3">
                            <h5 class="mb-0">Attended Candidates</h5>
                        </div>
                        <div class="card-body p-4">
                            <form id="AttendedCandidate" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <input type="text" name="candidate_id"  id="candidate_id" value={{$candidate->id}} hidden>
                                    <label for="input35" class="col-sm-3 col-form-label">Result:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="input35" name="result" autocomplete="off">
                                    </div>
                                </div>




                                <div class="row mb-3">
                                    <label for="input40" class="col-sm-3 col-form-label">Details:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="input40" class="col-sm-3 col-form-label">Expected Salary: </label>
                                    <div class="col-sm-9">
                                        @if($attendcandidate)
                                        <input class="form-control" id="input42" name="expected_salary" rows="3"
                                            value="{{$attendcandidate->expected_salary}}" autocomplete="off">
                                            @elseif ($candidate)
                                            <input class="form-control" id="input42" name="expected_salary" rows="3"
                                            value="{{$candidate->exp_sal}}" autocomplete="off">
                                            @else
                                            <input class="form-control" id="input42" name="expected_salary" rows="3"
                                            autocomplete="off">
                                             @endif
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="input14" class="col-sm-3 col-form-label">Joining Date:</label>
                                    <div class="col-sm-9 d-flex justify-content-between">
                                        @if($attendcandidate)
                                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$attendcandidate->joining_date}}" autocomplete="off">
                                        @else
                                        <input type="date" class="form-control" id="joining_date" name="joining_date"  autocomplete="off">
                                   @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="input5" class="col-sm-3 col-form-label">Notice Period: </label>
                                    <div class="col-sm-9">
                                        @if($attendcandidate)
                                        <input type="text" class="form-control" id="input11" name="notice_period"
                                        value="{{$attendcandidate->notice_period}}" autocomplete="off">
                                        @else
                                        <input type="text" class="form-control" id="input11" name="notice_period"
                                         autocomplete="off">
                                         @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="input5" class="col-sm-3 col-form-label">Upload Code:</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="upload_code" name="upload_code">
                                        <label class="text-danger">*Supported formats : .zip and .rar only</label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="input5" class="col-sm-3 col-form-label"> Upload Interview Paper:</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="upload_interview_papaer"
                                            name="upload_interview_paper">
                                            <label class="text-danger">*Supported formats : .doc, .docx, and .pdf only</label>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                                            <div id='loader' class="loading-spinner">
                                                <img src='https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif' width='32px' height='32px'>
                                              </div>
                                            <button type="reset" class="btn btn-light px-4">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->


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
                        <input id="id" name="id" type="hidden">
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

@endsection
@section('script')

    <script>
       $("#AttendedCandidate").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: '../attend_store',
        type: 'POST',
        data: formData,
        beforeSend: function(){
    // Show image container
    $("#loader").removeClass('loading-spinner')
   },
        success: function(response) {
          // Create a sweet alert message.
          console.log("success");
          setTimeout(() => {

		var notification2 = Lobibox.notify('success', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: 'bx bx-check-circle',
			msg: 'Data updated successfully!!',
			delay: false

		});


	  }, 200);
      $("#AttendedCandidate")[0].reset();
        },
        complete:function(data){
    // Hide image container
    $("#loader").addClass('loading-spinner')
   },
        cache: false,
        contentType: false,
        processData: false
    });
});
    </script>
@endsection
