<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class JobPosted extends Mailable
{
    use Queueable, SerializesModels;

    public Job $job;

    public function __construct(Job $job)
    {
        $this->job = $job; // ✅ Assign incoming job to $this->job
    }

    public function build()
    {
        return $this->subject('New Job Posted')
                    ->view('emails.job-posted') // Make sure the Blade file exists at resources/views/emails/job-posted.blade.php
                    ->with(['job' => $this->job]); // ✅ Pass the job to the view
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Posted'
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.job-posted', // Make sure this Blade exists OR remove this method
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
