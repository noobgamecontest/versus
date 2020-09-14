<?php

namespace App\Services;

use Entities\Consistency;
use Entities\Entity;

class Level extends Entity
{
    use Consistency;

    public $range;

    public $speed;

    public $name;
}
