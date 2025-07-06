<?php
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

// Static Pages
Route::view('/about', 'about')->name('about');

Route::view('/contact', 'contact')->name('contact');

// Contact Form Submission

/*
Route::get('/test-mail', function () {
    // Find a job to test with, or create one if none exists
    $job = Job::first(); // Gets the first job

    if ($job && $job->employer && $job->employer->user && $job->employer->user->email) {
        Mail::to('mfh3873@gmail.com')
            ->queue(new JobPosted($job));
        return "Test email queued successfully to " . $job->employer->user->email;
    }
    return "Could not send test email. No job found or employer/user email missing.";
});
*/

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store')->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth'); // removed can:edit,job middleware to allow controller policy check
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy')->middleware('auth');

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
