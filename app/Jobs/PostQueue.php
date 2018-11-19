<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Notifications;


class PostQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $insert = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $insert)
    {
        //
        $this->insert = $insert;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $insert = Post::insert($this->insert);

        session()->flash("message","Your post has been published successfully");

        Notification::send(User::all(),new Notifications("Has Published a new Post"));



    }


}
