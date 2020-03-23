<?php

namespace Plmrlnsnts\Commentator;

trait HasComments
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootHasComments()
    {
        static::deleting(function ($model) {
            $model->comments()->delete();
        });
    }

    /**
     * The comments associated to this model.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Create a new comment to this model.
     *
     * @param string $body
     * @return \Plmrlnsnts\Commentator\Comment
     */
    public function comment($body)
    {
        return $this->comments()->create([
            'user_id' => auth()->id(),
            'body' => $body
        ]);
    }

    /**
     * Used to identify this commentable.
     *
     * @return string
     */
    public function commentableKey()
    {
        return $this->getMorphClass() . '::' . $this->id;
    }

    /**
      * The resource url for this model's comments.
      *
      * @return string
      */
      public function commentableUrl()
      {
          return url($this->commentableKey() . '/comments');
      }
}
