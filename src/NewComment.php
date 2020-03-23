<?php

namespace Plmrlnsnts\Commentator;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewComment
{
    use SerializesModels, Dispatchable;

    /**
     * The comment that was created.
     *
     * @var \Plmrlnsnts\Commentator\Comment
     */
    public $comment;

    /**
     * Create a new event instance.
     *
     * @param \Plmrlnsnts\Commentator\Comment
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
