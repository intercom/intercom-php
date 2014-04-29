<?php
namespace Intercom\Util;

use Iterator;

class ObjectList implements Iterator
{
    /**
     * @var array Holds the objects in the list
     */
    protected $objects = [];

    /**
     * Gets the number of objects in this list
     *
     * @return int
     */
    public function getObjectCount()
    {
        return count($this->objects);
    }

    /**
     * Rewinds the object list pointer to the start
     */
    public function rewind()
    {
        reset($this->objects);
    }

    /**
     * Gets the current object at the list pointer
     *
     * @return object
     */
    public function current()
    {
        return current($this->objects);
    }

    /**
     * Gets the key for the object at the list pointer
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->objects);
    }

    /**
     * Moves the object list pointer forward
     *
     * @return mixed|void
     */
    public function next()
    {
        return next($this->objects);
    }

    /**
     * Verifies the current conversation list pointer
     *
     * @return bool
     */
    public function valid()
    {
        $key = key($this->objects);
        return ($key !== null && key($this->objects) !== false);
    }
}