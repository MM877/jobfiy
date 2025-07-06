<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $search = request('search');

        $jobs = Job::with('employer')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->simplePaginate(5);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('jobs.create', [
            'employers' => Employer::all(),
           
        ]);
    }

    /**
     * Store a newly created job.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'string', 'min:3'],
            'employer_name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:100'],
            'is_remote' => ['nullable', 'boolean'],
            'description' => ['required', 'string'],
        ]);

        // Always find or create the employer for this user and name
        $employer = Employer::firstOrCreate(
            [
                'employer_name' => $validated['employer_name'],
                'user_id' => $request->user()->id
            ]
        );

        $job = Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'user_id' => $request->user()->id,
            'employer_id' => $employer->id,
            'employer_name' => $validated['employer_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'country' => $validated['country'],
            'is_remote' => $request->has('is_remote'),
            'description' => $validated['description'],
        ]);

       $job->load('employer.user');

if ($job->employer && $job->employer->user && $job->employer->user->email) {
    Mail::to($job->employer->user->email)
        ->queue(new JobPosted($job));

    return "Test email queued successfully to " . $job->employer->user->email;
}

return "Could not send test email. No job found or employer/user email missing.";

        return redirect('/jobs')->with('success', 'Job added successfully!');
    }

    /**
     * Display a single job.
     */
    public function show(Job $job)
    {
        // Eager load employer to avoid lazy loading exception
        $job->load('employer');
        return view('jobs.show', [
            'job' => $job,
            'employer' => $job->employer,
        ]);
    }

    /**
     * Show the form for editing the job.
     */
    public function edit(Job $job)
    {
        // Debug: Log current user and job owner for troubleshooting 403 errors
        Log::info('Job Edit Debug', [
            'auth_id' => optional(auth())->id(),
            'job_id' => $job->id,
            'job_user_id' => $job->user_id,
        ]);
        $this->authorize('update', $job); // Enforce policy at controller level for edit form
        return view('jobs.edit', [
            'job' => $job,
            'employers' => Employer::all(),
        ]);
    }

    /**
     * Update an existing job.
     */
    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job); // Enforce policy at controller level
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'numeric', 'min:0'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
            'is_remote' => ['nullable', 'boolean'],
            'description' => ['nullable', 'string'],
           
        ]);

        $job->update([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'country' => $validated['country'] ?? null,
            'is_remote' => $request->has('is_remote'),
            'description' => $validated['description'] ?? null,
        ]);

        

        return redirect('/jobs')->with('success', 'Job updated successfully!');
    }

    /**
     * Delete a job.
     */
    public function destroy(Job $job)
    {
        
        $job->delete();

        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }
}
