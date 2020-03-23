<?php

namespace Plmrlnsnts\Commentator;

use Illuminate\Console\Command;

class CommentatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commentator:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic comment views and routes';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! is_dir($directory = app_path('Http/Controllers'))) {
            mkdir($directory, 0755, true);
        }

        \Illuminate\Support\Facades\File::copy(
            __DIR__.'/../stubs/CommentsController.stub',
            app_path('Http/Controllers/CommentsController.php')
        );

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/../stubs/routes.stub'),
            FILE_APPEND
        );

        $this->info('Comment scaffolding generated successfully.');
    }
}
