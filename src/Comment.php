<?php

namespace Plmrlnsnts\Commentator;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Plmrlnsnts\Commentator\NewComment;

class Comment extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

     /**
     * The "booting" method of the model.
     *
     * @return void
     */
     public static function boot()
     {
         parent::boot();

         static::created(function ($model) {
            NewComment::dispatch($model);
         });
     }

     /**
      * The author of this comment.
      */
     public function author()
     {
         return $this->belongsTo(config('commentator.models.user'), 'user_id');
     }

     /**
      * Get the commentable model.
      */
     public function commentable()
     {
         return $this->morphTo();
     }

     /**
      * Determine if this comment is written by the specified user.
      *
      * @param \Illuminate\Foundation\Auth\User $user
      * @return boolean
      */
     public function isWrittenBy($user)
     {
         return $user->is($this->author);
     }

     /**
      * Determine if this comment has been edited.
      *
      * @return boolean
      */
     public function isEdited()
     {
         return $this->created_at != $this->updated_at;
     }

     /**
      * Get the mentioned names from the body of this comment.
      *
      * @return array
      */
     public function mentionedNames()
     {
        preg_match_all('/@([\w\-]+)/', $this->body, $matches);

        return $matches[1];
     }

     /**
      * The resource url for this comment.
      *
      * @return string
      */
     public function url()
     {
         return url('/comments/' . $this->id);
     }

     /**
      * The html representation of the comment.
      *
      * @return string
      */
     public function getBody()
     {
        return (new GithubFlavoredMarkdownConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]))->convertToHtml($this->attributes['body']);
     }
}
