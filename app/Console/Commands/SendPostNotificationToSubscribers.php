<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Notifications\NewPostNotification;
use Illuminate\Console\Command;

class SendPostNotificationToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-notification {postId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post notification to subscribers.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::findOrFail($this->argument('postId'));
        $post->website->users->each->notify(new NewPostNotification($post));
        $this->info('Email sent to the Subscribers!');
    }
}
