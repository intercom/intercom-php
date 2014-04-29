<?php
namespace Intercom\Util;

use Iterator;
use InvalidArgumentException;

class ObjectList implements Iterator
{
    /**
     * @var array Holds the objects in the list
     */
    protected $objects = [];

    /**
     * Adds an object to the list
     * @param object $object The object to add to the list
     * @param null|int|string $key An optional key for the object
     * @throws InvalidArgumentException If the key is not an int, string or null
     */
    public function addObject($object, $key = null)
    {
        if (!is_string($key) && !is_int($key) && $key !== null) {
            throw new InvalidArgumentException("List key must be a string or integer");
        }

        if ($key) {
            $this->objects[$key] = $object;
        } else {
            $this->objects[] = $object;
        }
    }


    /**
     * Gets either the current object in the list or if a key is provided
     * will return the object referenced by the key (or null if the key'd object doesn't exist)
     *
     * @param null|int|string $key Optional. The object key
     * @return object|null
     */
    public function getObject($key = null) {
        if ($key == null) {
            return $this->current();
        } else {
            if (isset($this->objects[$key])) {
                return $this->objects[$key];
            } else {
                return null;
            }
        }
    }

    /**
     * Removes the object with the specified key from the list
     *
     * @param $key
     */
    public function removeObject($key)
    {
        if (isset($this->objects[$key])) {
            unset($this->objects[$key]);
        }
    }

    /**
     *
     * @return array
     */
    public function getList() {
        return $this->objects;
    }

    /**
     * Gets the number of objects in this list
     *
     * @return int
     */
    public function getLength()
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