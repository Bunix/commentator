<?php

namespace Plmrlnsnts\Commentator\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Plmrlnsnts\Commentator\HasComments;

class Commentable extends Model
{
    use HasComments;

    protected $guarded = [];
}
