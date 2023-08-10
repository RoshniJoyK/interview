@extends('layout')
@section('content')
    {{-- <div class="page-wrapper"> --}}
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">List Interview</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Postponed</li>
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
                            <h5 class="mb-0">Postponed Candidates</h5>
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form id="Postponed" method="post" >
                                @csrf
								<div class="row mb-3">
                                    <input type="text" name="candidate_id"  id="candidate_id" value={{$candidate->id}} hidden>
									<label for="exampleInputdate1" class="col-sm-3 col-form-label">New Date of interview : </label>
									<div class="col-sm-9 mt-2">
										<input type="date" class="form-control " id="interview_date" name="interview_date">
									</div>
								</div>

                                <div class="row mb-4">
                                    <label for="exampleInputreason1" class="col-sm-3 col-form-label">Enter Reason: </label>
									<div class="col-sm-9">
										<textarea class="form-control" id="exampleInputreason1" name="reason" rows="8" placeholder="Enter Reason"></textarea>
									</div>
                                    

                                </div>
                        </div>



						<div class="row">
							<label class="col-sm-3 col-form-label"></label>
							<div class="col-sm-9">
								<div class="d-md-flex d-grid align-items-center gap-3">
									<button type="submit" class="btn btn-primary px-4 mb-4">Submit</button>
									<button type="reset" class="btn btn-light px-4 mb-4">Reset</button>
								</div>
							</div>
						</div>
                    </form>

                </div>
            </div>
        </div>
    {{-- </div> --}}
    <!--end row-->

  
@endsection
@section('script')
<script>
    $("#Postponed").on("submit", function(e) {
         e.preventDefault();
         var formData = new FormData(this);
         //if ($("#interview_sched").valid()) {
             $.ajax({
                 type        : "POST",
                 headers     : {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                 url         :'../postponed_store',
                 processData : false,
                 contentType : false,
                 data        : formData,
                 success: function(response) {
                     setTimeout(() => {
                         var notification2 = Lobibox.notify('success', {
                             pauseDelayOnHover: true,
                             continueDelayOnInactiveTab: false,
                             position: 'top right',
                             icon: 'bx bx-check-circle',
                             msg: 'Data saved successfully!!',
                             delay: false

                         });
                     }, 200);
                     $("#Postponed")[0].reset(); 
                 },
                 error: function(response) {
                 // Create a sweet alert message.

                 }
             });
        // }
     });
 </script>
@endsection 