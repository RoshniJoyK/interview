<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attend;
use App\Models\Notattend;
use App\Models\Postponed;
use App\Models\Candidate;
use App\Models\Schedule;
use App\Models\Email;

class InterviewController extends Controller
{
    public function show(Request $request)
    {

        $candidate =  DB::table('schedules')
            ->select('schedules.id', 'schedules.candidate_id', 'schedules.round', 'schedules.interview_date', 'schedules.type', 'schedules.question', 'schedules.status', 'schedules.round_result', 'candidates.name', 'addjobs.title')
            ->join('candidates', 'candidates.id', '=', 'schedules.candidate_id')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->where('schedules.status','<',4)
            ->get();
        $_SESSION['name']=$request->session()->get('name');
        return view('listInterview', compact('candidate'));
    }

    public function attend_store(Request $request)
    {
        if ($request->file('upload_code')) {
            $file     = $request->file('upload_code');
            $newcodename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/interview_code', $newcodename);
            $request['upload_code'] = $newcodename;
        }


        if ($request->file('upload_interview_paper')) {
            $file     = $request->file('upload_interview_paper');
            $newpapername = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/interview_paper', $newpapername);
            $request['upload_interview_paper'] = $newpapername;
        }

        //$request['candidate_id']=$id;
        // dd($request);
        Attend::create($request->except('_token'));

        $getstatus = Schedule::select('status')->where('candidate_id', $request['candidate_id']);
        if ($getstatus) {
            $status = 1;
        }
        Schedule::where('candidate_id', $request['candidate_id'])->update(['status' => $status]);
        return redirect('/list_interview');
    }
    public function notattend_store(Request $request)
    {
        //$request['candidate_id']=$id;
        Notattend::create($request->except('_token'));

        $getstatus = Schedule::select('status')->where('candidate_id', $request['candidate_id']);
        if ($getstatus) {
            $status = 2;
        }
        Schedule::where('candidate_id', $request['candidate_id'])->update(['status' => $status]);
        return redirect('/list_interview');
    }
    public function postponed_store(Request $request)
    {
        //$request['candidate_id']=$id;

        $getstatus = Schedule::select('status', 'interview_date')->where('candidate_id', $request['candidate_id']);

        if ($getstatus) {
            $status = 3;
        }
        Schedule::where('candidate_id', $request['candidate_id'])->update([
            'status' => $status,
            'interview_date' => $request['interview_date']
        ]);

        $data = ($request->except('_token', 'interview_date'));
        $data['date'] = $request->interview_date;

        // dd($data);
        Postponed::create($data);
        //return redirect('/list_interview');
    }


    public function attend(Request $request,$id)
    {
        $candidate = Candidate::find($id);

        // echo $candidate;
        $attendcandidate = Attend::where('candidate_id','=',$id)->latest('created_at')->first();
        //dd($attendcandidate);
        $_SESSION['name']=$request->session()->get('name');
        return view('attended', compact('candidate','attendcandidate'));
    }
    public function not_attend(Request $request,$id)
    {
        $candidate = Candidate::find($id);
        //dd($candidate);
        $_SESSION['name']=$request->session()->get('name');
        return view('not_attended', compact('candidate'));
    }
    public function postponed(Request $request,$id)
    {
        $candidate = Candidate::find($id);
        $_SESSION['name']=$request->session()->get('name');
        return view('postponed', compact('candidate'));
    }
    public function listinterview(Request $request)
    {
        $_SESSION['name']=$request->session()->get('name');
        return view('listinterview');
    }
    public function shortlist(Request $request)
    {
        $_SESSION['name']=$request->session()->get('name');
        return view('shortlist');
    }


    public function store_schedule(Request $request)
    {
        //$request['candidate_id'] = $id;
        //dd($request);
        $sched_data = Schedule::select('*')->where('candidate_id', $request['candidate_id'])->first();
        //dd($sched_data);
        if ($sched_data) {
            $sched_data->update([
                'round'        => $request['round'],
                'status'       => 0,
                'round_result' => NULL
            ]);
            $emaildata = Email::find($request['candidate_id']);
            $emaildata->update(['email_status' => 0]);
        }
        else {
            Schedule::create($request->except(['_token']));
            Email::create(['candidate_id'=>$request['candidate_id']]);
        }

        $data = Candidate::find($request['candidate_id']);
        $data->update([
            'status' => 1
        ]);
        return redirect('/list-candidate');
    }

    public function store_round_result(Request $request)
    {
        $data = Schedule::find($request['id']);
        $data->update([
            'round_result' => $request['result']
        ]);
        return redirect('/list_interview');
    }

    public function index(Request $request,string $id)
    {
        $candidate = Candidate::find($id);
        //dd( $candidate);
        $_SESSION['name']=$request->session()->get('name');
        return view('schedule_interview', compact('candidate'));
    }
    public function shortListedCandidates($id)
    {

        $schedule = Schedule::where('candidate_id', $id)->first();
        //dd($schedule);
        $schedule->update(['status' => '4']);

        return redirect('/list_interview');
    }
    public function findAttend(Request $request)
    {
        $candidate =  DB::table('schedules')
            ->select('schedules.id', 'schedules.candidate_id', 'schedules.round', 'schedules.interview_date', 'schedules.type', 'schedules.question', 'schedules.status', 'schedules.round_result', 'candidates.name', 'addjobs.title')
            ->join('candidates', 'candidates.id', '=', 'schedules.candidate_id')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->where('schedules.status', '1')
            ->get();
        //    $candidate =Schedule::all()->where('status', '1');
        // dd($candidate);
        $_SESSION['name']=$request->session()->get('name');
        return view('listInterview', compact('candidate'));
    }
    public function findNotattend(Request $request)
    {
        $candidate =  DB::table('schedules')
            ->select('schedules.id', 'schedules.candidate_id', 'schedules.round', 'schedules.interview_date', 'schedules.type', 'schedules.question', 'schedules.status', 'schedules.round_result', 'candidates.name', 'addjobs.title')
            ->join('candidates', 'candidates.id', '=', 'schedules.candidate_id')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->where('schedules.status', '2')
            ->get();
        //dd($candidate);
        //$candidate = Schedule::all()->where('status', '2');
        $_SESSION['name']=$request->session()->get('name');
        return view('listInterview', compact('candidate'));
    }
    public function findPostponed(Request $request)
    {
        $candidate =  DB::table('schedules')
            ->select('schedules.id', 'schedules.candidate_id', 'schedules.round', 'schedules.interview_date', 'schedules.type', 'schedules.question', 'schedules.status', 'schedules.round_result', 'candidates.name', 'addjobs.title')
            ->join('candidates', 'candidates.id', '=', 'schedules.candidate_id')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->where('schedules.status', '3')
            ->get();
        //    dd($candidate);
        //     $candidate = Schedule::all()->where('status', '3');
        $_SESSION['name']=$request->session()->get('name');
        return view('listInterview', compact('candidate'));
    }
}
