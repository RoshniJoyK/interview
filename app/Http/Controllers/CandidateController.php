<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidate;
use App\Models\Addjob;
use App\Models\District;
use App\Models\Candidateexperience;
use App\Models\Schedule;
use App\Models\Email;
use App\Mail\SentMail;
class CandidateController extends Controller
{

    public function index(Request $request){
        $job  = Addjob::where('status','=',1)->get();
        $data = District::all();
        $_SESSION['name']=$request->session()->get('name');
        return view('add_candidate', compact('data', 'job'));
    }

    public function list_cand(Request $request){
        $data =  DB::table('candidates')
                        ->select('candidates.*','schedules.round','schedules.status as schedule_status','schedules.round_result','schedules.candidate_id','emails.email_status')
                        ->leftjoin('schedules','candidates.id','=','schedules.candidate_id','schedules.interview_date')
                        ->leftjoin('emails','emails.candidate_id','=','candidates.id')
                        ->get();
        //dd($data);
        $_SESSION['name']=$request->session()->get('name');
        return view('list_candidate', compact('data'));
    }

    public function store_candidate(Request $request){
        if ($request->has('whatsapp')) {
            $whatsapp = request('phone2');
        }else{
            $whatsapp = 'NULL';
        }

        if ($request->file('cv')) {
            $file     = $request->file('cv');
            $cv = time() . '.' . $request->file('cv')->extension();
            $file->move('images/candidates_cv', $cv);
        }

        if ($request->file('photo')) {
            $file     = $request->file('photo');
            $photo = time() . '.' . $request->file('photo')->extension();
            $file->move('images/candidates_photo', $photo);
        }else{
            $photo = '';
        }

        $formdata     = [
                            'name'         => request('name'),
                            'age'          => request('age'),
                            'gender'       => request('gender'),
                            'email'        => request('email'),
                            'phone1'       => request('phone1'),
                            'phone2'       => request('phone2'),
                            'whatsapp'     => $whatsapp,
                            'addr'         => request('addr'),
                            'location'     => request('location'),
                            'district_id'  => request('district_id'),
                            'w_years'      => request('w_years'),
                            'w_months'     => request('w_months'),
                            'skills'       => request('skills'),
                            'cv'           => $cv,
                            'photo'        => $photo,
                            'job_id'       => request('job_id'),
                            'applied_date' => request('applied_date'),
                            'exp_sal'      => request('exp_sal'),
                            'applied_thru' => request('applied_thru'),
                            'others'       => request('others'),
                        ];
        $candidate_id = Candidate::create($formdata)->id;

        if($request->get('p_company')[0]!= NULL){
            $n = count($request->get('p_company'));
            for ($i = 0; $i<$n; $i++) {
                $exp_data = [
                    'candidate_id' => $candidate_id,
                    'p_company'    => $request->get('p_company')[$i],
                    'from'         => $request->get('from')[$i],
                    'to'           => $request->get('to')[$i]
                ];
                Candidateexperience::create($exp_data);
            }
        }
        //return redirect('/add-candidate');
    }

    public function edit(Request $request,string $id){
        $editcandidate = Candidate::find($id);
        $districtid    = $editcandidate['district_id'];
        $districtname  = District::find($districtid);

        $jobid         = $editcandidate['job_id'];
        $jobname       = Addjob::find($jobid);

        $data          = District::all();
        $job  = Addjob::where('status','=',1)->get();
        $exp           = Candidateexperience::all();
        $experience    = $exp->where('candidate_id', $id);
        $_SESSION['name']=$request->session()->get('name');
        return view('edit_candidate', compact('editcandidate', 'districtname', 'jobname', 'data', 'job', 'experience'));
    }

    public function update(Request $request)
    {
        $editcandidate = Candidate::find($request['candidate_id']);
        echo $editcandidate;
        $exp           = Candidateexperience::all();
        $experience    = $exp->firstWhere('candidate_id', $request['candidate_id']);

        if ($request->has('whatsapp')) {
            $whatsapp = request('phone2');
        }else{
            $whatsapp = '';
        }

        if ($request->file('cv')) {
            $file     = $request->file('cv');
            $cv = time() . '.' . $request->file('cv')->extension();
            $file->move('images/candidates_cv', $cv);
        }else{
            $cv = $editcandidate['cv'];
        }

        if ($request->file('photo')) {
            $file     = $request->file('photo');
            $photo = time() . '.' . $request->file('photo')->extension();
            $file->move('images/candidates_photo', $photo);
        }else{
            $photo = $editcandidate['photo'];
        }

        $formdata     = [
                        'name'         => request('name'),
                        'age'          => request('age'),
                        'gender'       => request('gender'),
                        'email'        => request('email'),
                        'phone1'       => request('phone1'),
                        'phone2'       => request('phone2'),
                        'whatsapp'     => $whatsapp,
                        'addr'         => request('addr'),
                        'location'     => request('location'),
                        'district_id'  => request('district_id'),
                        'w_years'      => request('w_years'),
                        'w_months'     => request('w_months'),
                        'skills'       => request('skills'),
                        'cv'           => $cv,
                        'photo'        => $photo,
                        'job_id'       => request('job_id'),
                        'applied_date' => request('applied_date'),
                        'exp_sal'      => request('exp_sal'),
                        'applied_thru' => request('applied_thru'),
                        'others'       => request('others'),
                    ];
                    //dd($formdata);
        $editcandidate->update($formdata);

        $n = count($request->get('p_company'));

        if(!empty($experience)){
            Candidateexperience::where('candidate_id', $request['candidate_id'])->delete();
            for ($i = 0; $i < $n; $i++) {
                $exp_data = [
                    'candidate_id' => $request['candidate_id'],
                    'p_company'    => $request->get('p_company')[$i],
                    'from'         => $request->get('from')[$i],
                    'to'           => $request->get('to')[$i]
                ];
                Candidateexperience::create($exp_data);
            }
        }else{
            for ($i = 0; $i < $n; $i++) {
                $exp_data = [
                    'candidate_id' => $request['candidate_id'],
                    'p_company'    => $request->get('p_company')[$i],
                    'from'         => $request->get('from')[$i],
                    'to'           => $request->get('to')[$i]
                ];
                Candidateexperience::create($exp_data);
            }
        }
        return redirect('/list-candidate');
    }

    public function list_scheduled(Request $request)
    {
        $data = Candidate::all()->where('status', '1');
        $_SESSION['name']=$request->session()->get('name');
        return view('list_candidate',compact('data'));
    }
    public function list_notscheduled(Request $request)
    {
        $data = Candidate::all()->where('status', '0');
        $_SESSION['name']=$request->session()->get('name');
        return view('list_candidate',compact('data'));
    }

    public function download_cv($file_name)
    {
        $file_path = public_path('images/candidates_cv/'.$file_name);
        return response()->download($file_path);
    }
/*
    public function destroy(Request $request,string $id)
    {
        Candidate::find($id)->delete();
        Candidateexperience::where('candidate_id', $request['id'])->delete();
        Schedule::where('candidate_id', $id)->delete();
        Email::where('candidate_id',$id)->delete();
        return redirect('/list-candidate');
    }*/
    public function destroy(Request $request)
    {
        Candidate::find($request['id'])->delete();
        Candidateexperience::where('candidate_id', $request['id'])->delete();
        Schedule::where('candidate_id', $request['id'])->delete();
        Email::where('candidate_id',$request['id'])->delete();
        return redirect('/list-candidate');
    }

    public function sentmail(string $id){
        $candidate =  DB::table('schedules')
            ->select('schedules.id', 'schedules.candidate_id', 'schedules.round', 'schedules.interview_date', 'candidates.name','candidates.email', 'addjobs.title')
            ->join('candidates', 'candidates.id', '=', 'schedules.candidate_id')
            ->join('addjobs', 'addjobs.id', '=', 'candidates.job_id')
            ->where('schedules.candidate_id', $id)
            ->get();
        $email=Candidate::find($id);
        $mailable= new SentMail($candidate);
        Mail::to($email->email)->send($mailable);
        #dd("Email is sent successfully.");
        $emaildata = Email::find($id);
        $emaildata->update(['email_status' => 1]);
        return redirect('/list-candidate');
        //return $mailable->render();
    }
}
