<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Addjob;
use App\Models\Addstaff;
use App\Models\District;
use App\Models\Candidateexperience;
use App\Models\Staffexperience;
use App\Models\Schedule;
use Illuminate\Support\Facades\Response;

class ShortlistedController extends Controller
{
    public function show(Request $request)
    {

        $candidate =  DB::table('candidates')
            ->select('candidates.id', 'candidates.name', 'candidates.location', 'addjobs.title', 'schedules.status')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->join('schedules', 'schedules.candidate_id', '=', 'candidates.id')
            // ->join('addstaffs','addstaffs.candidate_id','=','candidates.id')
            ->where('schedules.status', '=', 4)
            ->get();

        /*  $staffcandidate =  DB::table('candidates')
        ->select('candidates.id','addstaffs.candidate_id')
        ->join('addstaffs','addstaffs.candidate_id','=','candidates.id')
        ->where('addstaffs.status','=',1)
        ->get(); */

        $_SESSION['name'] = $request->session()->get('name');
        return view('shortlistedcandidate', compact('candidate'));
    }

    public function shortlist(Request $request)
    {
        $_SESSION['name'] = $request->session()->get('name');
        return view('shortlistedcandidate');
    }
    public function shortListedCandidates(Request $request, $id)
    {
        $candidate = Schedule::find($id);
        // dd($candidate);
        $candidate->update(['status' => '1']);
        $_SESSION['name'] = $request->session()->get('name');
        return view('shortlistedcandidate', compact('candidate'));
    }


    public function index(Request $request, string $id)
    {
        $editcandidate = Candidate::find($id);
        $data          = District::all();
        $job  = Addjob::where('status', '=', 1)->get();
        $jobid         = $editcandidate['job_id'];
        $jobname       = Addjob::find($jobid);
        $districtid    = $editcandidate['district_id'];
        $districtname  = District::find($districtid);
        $editcandidate = Candidate::find($id);
        $experience          = Candidateexperience::where('candidate_id', $id)->get();;
        //$experience    = $exp->Where('candidate_id', $id);

        $_SESSION['name'] = $request->session()->get('name');
        return view('addStaffForm', compact('data', 'editcandidate', 'experience', 'jobname', 'job', 'districtname'));
    }

    public function staff_candidate(Request $request)
    {
        $editcandidate = Candidate::find($request['candidate_id']);
        $exp           = Candidateexperience::all();
        $experience    = $exp->where('candidate_id', $request['candidate_id']);
        if ($request->has('whatsapp')) {
            $request['whatsapp'] = request('phone2');
        }

        if ($request->file('cv')) {
            $file     = $request->file('cv');
            $newname = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/candidates_cv', $newname);
            $request['cv'] = $newname;
        } else {
            $request['cv'] = $editcandidate['cv'];
        }

        if ($request->file('uploadoffer')) {
            $file     = $request->file('uploadoffer');
            $newname = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/candidates_offer', $newname);
            $request['uploadoffer'] = $newname;
            print($newname);
        } else {
            $request['uploadoffer'] = $editcandidate['uploadoffer'];
        }
        $uploadoffer = $newname;


        if ($request->file('photo')) {
            $file     = $request->file('photo');

            $imagename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/candidates_photo', $imagename);
            $request['photo'] = $imagename;
        } else {
            $request['photo'] = $editcandidate['photo'];
        }

        $data = $request->except(['_token', 'p_company', 'from', 'to', 'uploadoffer']);
        $data['uploadoffer'] = $uploadoffer;

        $candidate_id = Addstaff::create($data)->id;



        $getstatus = Schedule::select('status')->where('candidate_id', $request['candidate_id']);
        if ($getstatus) {
            $status = 5;
        }
        Schedule::where('candidate_id', $request['candidate_id'])->update(['status' => $status]);
        if ($request->get('p_company') != NULL) {
            $n = count($request->get('p_company'));
            for ($i = 0; $i < $n; $i++) {
                $exp_data = [
                    'candidate_id' => $candidate_id,
                    'p_company'    => $request->get('p_company')[$i],
                    'from'         => $request->get('from')[$i],
                    'to'           => $request->get('to')[$i]
                ];
                Staffexperience::create($exp_data);
            }
        }
        //return redirect('/add-candidate');



    }

    public function download_cv($file_name)
    {
        $file_path = public_path('images/candidates_cv/' . $file_name);
        return response()->download($file_path);
    }
    public function download_offer($file_name)
    {
        $file_path = public_path('images/candidates_offer/' . $file_name);
        return response()->download($file_path);
    }

    public function list_staff(Request $request)
    {
        $staff =  DB::table('addstaffs')
            ->select('addstaffs.*', 'addjobs.title')
            ->leftjoin('addjobs', 'addstaffs.job_id', '=', 'addjobs.id')
            ->get();
        //dd($data);
        $_SESSION['name'] = $request->session()->get('name');
        return view('list_staff', compact('staff'));
    }

    public function staff_details(Request $request, string $id)
    {


        $staff =  DB::table('candidates')
            ->select('candidates.*', 'addstaffs.offerdetails', 'addstaffs.salary', 'addstaffs.joiningdate', 'addstaffs.uploadoffer')
            ->leftJoin('addstaffs', 'addstaffs.candidate_id', '=', 'candidates.id')
            ->where('candidates.id', $id)
            ->first();

        $schedule = Schedule::where('candidate_id', $staff->id)->first();

        //dd($data);
        $_SESSION['name'] = $request->session()->get('name');
        return view('view_staffDetails', compact('staff', 'schedule'));
    }
}
