<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs/index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function show(Job $job)
    {
        return view('jobs/show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function edit($id)
    {
        $job = Job::find($id);

        Gate::authorize('edit-job', $id);

        return view('jobs/edit', ['job' => Job::find($id)]);
    }

    public function update($id)
    {

        $job = Job::findOrFail($id);
        Gate::authorize('edit-job', $job);

        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);


        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();

        // $job->update([
        //     'title'->request('title'),
        //     'salary'->request('salary')
        // ]);


        return redirect('/jobs/' . $job->id);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        Gate::authorize('edit-job', $job);
        Job::findOrFail($id)->delete();


        return redirect('/jobs');
    }
}
