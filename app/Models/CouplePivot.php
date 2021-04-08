<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CouplePivot extends Pivot {

    protected $casts = [
        'id' => 'string',
    ];

}
