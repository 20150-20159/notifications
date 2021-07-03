<?php

namespace App\Jobs;

use App\Mail\RequestReject;
use App\Mail\RequestSuccess;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRequestReject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_to;
    private $user_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $user_to, string $user_name)
    {
        $this->user_name = $user_name;
        $this->user_to = $user_to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user_to)->send(new RequestReject($this->user_name));
    }
}
