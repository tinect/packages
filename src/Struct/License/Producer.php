<?php
namespace App\Struct\License;

/**
 * @property integer $id
 * @property string $name
 * @property string $prefix
 * @property integer $companyId
 */
class Producer extends Struct
{

    public $id = null;

    public $name = null;

    public $prefix = null;

    public $companyId = null;

    protected static $mappedFields = [
        
    ];


}
