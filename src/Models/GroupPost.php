<?php

namespace Lifeids\Groups\Models;
use Lifeids\AbuseReportable\Traits\AbuseReportable as AbuseReportableTrait;

use Eloquent;

class GroupPost extends Eloquent
{
    use AbuseReportableTrait;
    
    protected $table = 'group_post';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
