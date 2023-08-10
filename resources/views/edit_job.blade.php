
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
                        <li class="breadcrumb-item active" aria-current="page">Add Jobs</li>
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
                        <h5 class="mb-0">New Job Details</h5>
                    </div>
                    <div class="card-body p-4">
                        
                            <form id="EditjobsValidationForm">
                                @csrf 
                               
                             
                           
                            <div class="row mb-3">
                                <input type="text" name="id"  id="job_id" value={{$editjob->id}} hidden>
                                <label for="input35" class="col-sm-3 col-form-label">Job Title:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="input40" name="title" rows="1" >{{$editjob->title}}</textarea>
                                        
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="input40" class="col-sm-3 col-form-label">Job Description:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="input40" name="description" rows="3" placeholder="Description">{{$editjob->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input40" class="col-sm-3 col-form-label">Key Responsibilities:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="input41" name="responsibilities" rows="3" placeholder="Responsibilities">{{$editjob->responsibilities}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input40" class="col-sm-3 col-form-label">Skills and Requirements:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="input42" name="requirements" rows="3" placeholder="Skills and Requirements">{{$editjob->requirements}}</textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="input14" class="col-sm-3 col-form-label">Experience:</label>
                                <div class="col-sm-9 d-flex justify-content-between">
                                    <div class="d-flex m-1">
                                        <label for="input13" class="col-sm-3 col-form-label">Years:</label>
                                        <input type="text" class="form-control" id="input13" name="year" value={{$editjob->year}}>
                                    </div>
                                    <div class="d-flex m-1">
                                        <label for="input12" class="col-sm-3 col-form-label">Months:</label>
                                        <input type="text" class="form-control" id="input12" name="month" value={{$editjob->month}}>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input11" class="col-sm-3 col-form-label">Apprx. Salary:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="input11" name="salary"
                                        placeholder="Apprx. Salary" value={{$editjob->salary}}>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="input5" class="col-sm-3 col-form-label">Deadline:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="deadline" name="deadline" value={{$editjob->deadline}}>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="input39" class="col-sm-3 col-form-label">For Company:</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="input4" name="company">
                                        <option>{{$editjob->company}}</option>
                                        <option value="GALTech Technology">GALTech Technology</option>
                                        <option value="GALTech School">GALTech School</option>

                                    </select>
                                </div>
                            </div>





                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
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
@endsection
@section('script')

    <script>
       $("#EditjobsValidationForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '../update_job',
        type: 'POST',
        data: formData,
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
      $("#EditjobsValidationForm")[0].reset(); 
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
    </script>
@endsection
