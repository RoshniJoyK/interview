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
                        <li class="breadcrumb-item active" aria-current="page">View Staff Details</li>
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
                        <h5 class="mb-0">Staff Details</h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="add_staff" enctype="multipart/form-data">
                            @csrf

                            <h6 class="mb-4 head-personal">Personal Information</h6>
                            <div class="row mb-3">
                                <input type="text" name="candidate_id" id="candidate_id" value={{ $staff->id }}
                                    hidden>
                                <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-capitalize" id="name" name="name"
                                        value="{{ $staff->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="age" class="col-sm-3 col-form-label">Age</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="age" name="age"
                                        value="{{ $staff->age }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    @if ($staff->gender == 'Male')
                                        <input type="radio" class="form-check-input" id="radio1" name="gender"
                                            value="Male" checked>
                                        <label class="form-check-label" for="radio1">Male</label>
                                        <input type="radio" class="form-check-input" id="radio2" name="gender"
                                            value="Female">
                                        <label class="form-check-label" for="radio1">Female</label>
                                    @else
                                        <input type="radio" class="form-check-input" id="radio1" name="gender"
                                            value="Male">
                                        <label class="form-check-label" for="radio1">Male</label>
                                        <input type="radio" class="form-check-input" id="radio2" name="gender"
                                            value="Female" checked>
                                        <label class="form-check-label" for="radio1">Female</label>
                                    @endif

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $staff->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone1" class="col-sm-3 col-form-label">Phone No 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone1" name="phone1"
                                        value="{{ $staff->phone1 }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone2" class="col-sm-3 col-form-label">Phone No 2</label>
                                <div class="col-sm-9 d-flex justify-content-between">

                                    <div style="width:80%;">
                                        <input type="text" class="form-control" id="phone2" name="phone2"
                                            value="{{ $staff->phone2 }}">
                                    </div>

                                    <div class="form-check">
                                        @if ($staff->phone2 == $staff->whatsapp)
                                            <input class="form-check-input" type="checkbox" id="whatsapp"
                                                name="whatsapp" checked="checked">
                                        @else
                                            <input class="form-check-input" type="checkbox" id="whatsapp"
                                                name="whatsapp">
                                        @endif

                                        <label class="form-check-label" for="whatsapp">WhatsApp</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="addr" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control text-capitalize" id="addr" name="addr" rows="3" placeholder="Address">{{ $staff->addr }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-capitalize" id="location"
                                        name="location" value="{{ $staff->location }}">
                                </div>
                            </div>

                            {{-- <div class="row mb-4">
                                <label for="district_name" class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="district_id" name="district_id">
                                        <option selected value="{{ $districtname->id }}">{{ $districtname->district_name }}
                                        </option>
                                        @foreach ($data as $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <hr />
                            <h6 class="mb-4 mt-4 head-quali">Qualification and Work Experience</h6>
                            <div class="row mb-3">
                                <label for="input14" class="col-sm-3 col-form-label">Work Experience</label>
                                <div class="col-sm-9 d-flex justify-content-between">
                                    <div class="d-flex m-1">
                                        <label for="w_years" class="col-sm-3 col-form-label">Years</label>
                                        <input type="text" class="form-control" id="w_years" name="w_years"
                                            value="{{ $staff->w_years }}">
                                    </div>
                                    <div class="d-flex m-1">
                                        <label for="w_months" class="col-sm-3 col-form-label">Months</label>
                                        <input type="text" class="form-control" id="w_months" name="w_months"
                                            value="{{ $staff->w_months }}">
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="p_company" class="col-sm-3 col-form-label">Previous Company</label>
                                @if ($experience)
                                    @foreach ($experience as $pexperience)
                                        <div class="col-sm-9">

                                            <input type="text" class="form-control text-capitalize" id="p_company"
                                                name="p_company[]" value="{{ $pexperience->p_company }}">
                                        </div>

                                        <div class="row mb-3" id="exp_from_to">
                                            <label for="input35" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9 d-flex justify-content-between">
                                                <div class="d-flex m-1">
                                                    <label for="from" class="col-sm-3 col-form-label">From</label>

                                                    <input type="month" class="form-control" id="from"
                                                        name="from[]" value="{{ $pexperience->from }}">

                                                    <div class="d-flex m-1">
                                                        <label for="to" class="col-sm-3 col-form-label">To</label>

                                                        <input type="month" class="form-control" id="to"
                                                            name="to[]" value="{{ $pexperience->to }}">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-sm-9">

                                        <input type="text" class="form-control text-capitalize" id="p_company"
                                            name="p_company[]">
                                    </div>

                                    <div class="row mb-3" id="exp_from_to">
                                        <label for="input35" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9 d-flex justify-content-between">
                                            <div class="d-flex m-1">
                                                <label for="from" class="col-sm-3 col-form-label">From</label>

                                                <input type="month" class="form-control" id="from"
                                                    name="from[]">

                                                <div class="d-flex m-1">
                                                    <label for="to" class="col-sm-3 col-form-label">To</label>

                                                    <input type="month" class="form-control" id="to"
                                                        name="to[]">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div> --}}
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" id="add_more" class="btn btn-secondary btn-sm m-1"
                                        style="float:right;" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Add More"><i class="bx bx-plus"></i></button>
                                    <!-- <button type="submit" id="remove" class="btn btn-secondary btn-sm m-1" style="float:right;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"><i class="bx bx-minus"></i></button> -->
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="skills" class="col-sm-3 col-form-label">Skillset</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="skills" name="skills"
                                        value="{{ $staff->skills }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cv" class="col-sm-3 col-form-label">Download CV</label>

                                <div class="col-sm-9">
                                    {{-- <input type="file" class="form-control" id="cv" name="cv"> --}}
                                    <div class="d-flex m-1">
                                        {{-- <label class="form-check-label p-1" for="radio2">{{$staff->cv}}</label> --}}
                                        {{-- <label for="cv" class="col-sm-3 col-form-label">Download CV</label> --}}
                                        <a href="/download-cv/{{ $staff->cv }}" class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download"><i
                                                class="bx bx-download"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="photo" class="col-sm-3 col-form-label">Uploaded Photo</label>
                                <div class="col-sm-9 d-flex justify-content-between">
                                    <div class="d-flex m-1">
                                        <img src="../images/candidates_photo/{{ $staff->photo }}" alt=""
                                            height="100" width="100">
                                    </div>
                                    <div class="d-flex m-1 align-items-center">
                                        {{-- <div>
                                            <input type="file" class="form-control" id="photo" name="photo">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="row mb-3">
                                <label for="job_id" class="col-sm-3 col-form-label">Applied for Job</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="job_id" name="job_id">
                                        <option selected value="{{ $jobname->id }}">{{ $jobname->title }}</option>
                                        @foreach ($job as $jobs)
                                            <option value="{{ $jobname->id }}">{{ $jobname->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <hr />
                            <div class="row mb-3 mt-3">
                                <label for="applied_date" class="col-sm-3 col-form-label">Applied Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="applied_date" name="applied_date"
                                        value="{{ $staff->applied_date }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exp_sal" class="col-sm-3 col-form-label">Expected Salary</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exp_sal" name="exp_sal"
                                        value="{{ $staff->exp_sal }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="applied_thru" class="col-sm-3 col-form-label">Applied through</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="applied_thru" name="applied_thru">
                                        <option selected value="{{ $staff->applied_thru }}">
                                            {{ $staff->applied_thru }}</option>
                                        <option value="Infopark Website">Infopark Website</option>
                                        <option value="Galtech Website">Galtech Website</option>
                                        <option value="Indeed">Indeed</option>
                                        <option value="Consultancy">Consultancy</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" name="others" id="others" class="form-control mt-3"
                                        value="{{ $staff->others }}">
                                </div>
                            </div>
                            <hr />


                            {{-- <div class="row mb-3 mt-3">
                                <label for="first_interview_date" class="col-sm-3 col-form-label">First Interview
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="first_interview_date"
                                        name="first_interview_date" value="{{ $schedule->interview_date }}">
                                </div>
                            </div>

                            <div class="row mb-3 mt-3">
                                <label for="second_interview_date" class="col-sm-3 col-form-label">Second Interview
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="second_interview_date"
                                        name="second_interview_date" value="{{ $schedule->interview_date }}">
                                </div>
                            </div>

                            <div class="row mb-3 mt-3">
                                <label for="third_interview_date" class="col-sm-3 col-form-label">Third Interview
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="third_interview_date"
                                        name="third_interview_date" value="{{ $schedule->interview_date }}">
                                </div>
                            </div>

                            <div class="row mb-3 mt-3">
                                <label for="hr_interview_date" class="col-sm-3 col-form-label">HR Interview Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="hr_interview_date"
                                        name="hr_interview_date" value="{{ $schedule->interview_date }}">
                                </div>
                            </div> --}}

                            <div class="row mb-3 mt-3">
                                <label for="final_interview_date" class="col-sm-3 col-form-label">Final Interview
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="final_interview_date"
                                        name="final_interview_date" value="{{ $schedule->interview_date }}">
                                </div>
                            </div>
                            <hr />


                            <div class="row mb-3">
                                <label for="input40" class="col-sm-3 col-form-label">Offer Details:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="offerdetails" name="offerdetails" rows="3"
                                        placeholder="" value="{{$staff->offerdetails}}"></input>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input40" class="col-sm-3 col-form-label">Salary: </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="salary" name="salary" rows="3"
                                        placeholder="" value="{{$staff->salary}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input14" class="col-sm-3 col-form-label">Joining Date:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="joiningdate" name="joiningdate"
                                    value="{{$staff->joiningdate}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input5" class="col-sm-3 col-form-label">Uploaded Offer Letter:</label>
                                <div class="col-sm-9">
                                    {{-- <input type="file" class="form-control" id="uploadoffer" name="uploadoffer"
                                        placeholder="" value="{{$staff->uploadoffer}}"> --}}
                                    {{-- <label class="text-danger">*Supported formats : .doc, .docx, .pdf, .zip and .rar
                                        only</label> --}}

                                        <div class="d-flex m-1">
                                            {{-- <label class="form-check-label p-1" for="radio2">{{$staff->uploadoffer}}</label> --}}
                                            {{-- <label for="cv" class="col-sm-3 col-form-label">Download CV</label> --}}
                                            <a href="/download-offer/{{$staff->uploadoffer}}" class="btn btn-info"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download"><i
                                                    class="bx bx-download"></i></a>
                                        </div>
                                        </div>


                            </div>




                            <div class="row mb-3">
                                <label for="input11" class="col-sm-3 col-form-label">Training Period: </label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="traingperiod"
                                            id="traingperiod" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="traingperiod"
                                            id="traingperiod" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="show-content">
                                <div class="row mb-3">
                                    <label for="input5" class="col-sm-3 col-form-label">Enter number of days: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="trainingnumberofdays"
                                            name="trainingnumberofdays" placeholder="">

                                    </div>
                                </div>



                            </div>
                            {{-- <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                                        <button type="reset" class="btn btn-light px-4">Reset</button>
                                    </div>
                                </div>
                            </div> --}}
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
        $("#view_staffDetails").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);



            $.ajax({
                url: '../staff_details',
                type: 'POST',
                data: formData,
                success: function(response) {

                    console.log("success");
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
                    $("#add_staff")[0].reset();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
