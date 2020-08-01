<?php

namespace App\Struct\License;

use App\Struct\Struct;

/**
 * @property int    $id
 * @property string $name
 * @property string $description
 */
class Status extends Struct
{
    public $id = null;

    public $name = null;

    public $description = null;
}
