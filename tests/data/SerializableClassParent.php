<?php


namespace ndashutin\tools\serializable\tests\data;

use ndashutin\tools\serializable\json\JsonSerializableTrait;

/**
 * Class SerializableClassParent
 * @package ndashutin\tools\serializable\tests\data
 */
class SerializableClassParent
{
    use JsonSerializableTrait;
    /**
     * @var float
     */
    public $value1 = 1.1;
    /**
     * @var string
     */
    protected $value2 = '2';
    /**
     * @var int
     */
    private $value3 = 3;
}