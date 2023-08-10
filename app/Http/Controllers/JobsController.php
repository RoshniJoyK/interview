<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Addjob;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $_SESSION['name']=$request->session()->get('name');
        return view('add_jobs');
    }
    public function list_jobs(Request $request)
    {

        $job = Addjob::all()->where('status', '1');
        $_SESSION['name']=$request->session()->get('name');
        return view('list_jobs',compact('job'));
        // return view('list_jobs');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_jobs(Request $request)
    {
        // dd($request->all());
        // $formfield = $request->validate([
        //     'title' => 'required',
        //     'description'  => 'required',
        //     'responsibilities' => 'required',
        //     'requirements' => 'required',
        //     'year' => 'required',
        //     'month' => 'required',
        //     'salary' => 'required',
        //     'deadline' => 'required',
        //     'company' => 'required',
        // ]);

        $create = Addjob::create($request->except('_token'));
       // dd($create);

       //return redirect('/add-jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /* public function showAll()
    {
        $results = Addjob::all();
        return view('list-jobs',compact('results'));

    } */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_job(Request $request,$id)
    {
        $editjob=Addjob::find($id);
        $_SESSION['name']=$request->session()->get('name');
        return view('edit_job',compact('editjob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_job(Request $request)
    {
        $formfield = $request->validate([
                 'title' => 'required',
                 'description'  => 'required',
                'responsibilities' => 'required',
                'requirements' => 'required',
               'year' => 'required',
                'month' => 'required',
                'salary' => 'required',
                 'deadline' => 'required',
                 'company' => 'required',
             ]);




        $editjob=Addjob::find($request->id);
        $formfield['status']=1;
        $editjob->update($formfield);
        //return redirect('/list-jobs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function destroy($id)
    {

        $deletejob=Addjob::find($id);
        $deletejob->delete();

        return redirect('/list-jobs');

    } */
    public function disable(Request $request)
    {
        $disablejob=Addjob::find($request['id']);

        $disablejob->update(['status' => '0']);
        return redirect('/list-jobs');
    }
    public function fulfilled(Request $request)
    {
        $fulfilledjob=Addjob::find($request['id']);

        $fulfilledjob->update(['status' => '2']);
        return redirect('/list-jobs');
    }
    public function enable(Request $request)
    {
        $enablejob=Addjob::find($request['id']);

        $enablejob->update(['status' => '1']);
        return redirect('/list-jobs');
    }

    public function findDisable(Request $request)
    {
        $job = Addjob::all()->where('status', '0');
        $_SESSION['name']=$request->session()->get('name');
        return view('list_jobs',compact('job'));
    }
    public function findFulfilled(Request $request)
    {
        $job = Addjob::all()->where('status', '2');
        $_SESSION['name']=$request->session()->get('name');
        return view('list_jobs',compact('job'));
    }

    public function destroy(Request $request){

        Addjob::find($request['id'])->delete();
        return redirect('/list-jobs');
    }
}
