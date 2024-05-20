<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{


    public function index()
    {
        return view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate()]);
    }


    public function list(Employer $employer)
    {

        return view('jobs.list', [
            'jobs' => Job::where('employer_id', '=', $employer->id)
                ->latest()
                ->simplePaginate()
        ]);

    }

    public function show(Job $job)
    {

        return view('jobs.show', ['job' => $job]);

    }

    public function create()
    {

        return view('jobs.create');

    }


    public function store()
    {
        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'salary' => ['required', 'numeric']
            ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::user()->employer->id
        ]);


        Mail::to(Auth::user())->queue(new JobPosted($job));

        return redirect('/jobs');


    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job)
    {


        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'salary' => ['required', 'numeric']
            ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }


    public function destroy(Job $job)
    {

        $job->delete();
        return redirect('/jobs');
    }


}
