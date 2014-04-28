<?php
namespace Intercom\Util;

use \InvalidArgumentException as ArgumentException;
use \ArrayAccess as ArrayAccess;

class FlatStore implements ArrayAccess {
    private $attributes = [];

    /**
     * Validates the requested attribute key and value to ensure we don't end up with a multi-dimensional object
     *
     * @param string $key The key to validate
     * @param mixed $value The value to validate
     * @throws \InvalidArgumentException If the key is not a string or if the value is an object or array
     */
    public function validate_key_and_value($key, $value) {
        if (!is_string($key)) {
            throw new ArgumentException('The key must be a string: ' . $key);
        }
        if (is_array($value) || is_object($value)) {
            throw new ArgumentException(
                "Nested data structures are not supported (key: {$key}, value:" . var_export($value)
            );
        }
    }

    /**
     * Creates a new FlatStore object
     *
     * @param array $attributes Optional. An array of attributes to load into the new object
     */
    public function __construct(array $attributes = []) {
        foreach($attributes as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * Gets the attributes array
     *
     * @return array
     */
    public function __toArray() {
        return $this->getStore();
    }

    /**
     * Gets the attributes array
     *
     * @return array
     */
    public function getStore() {
        return $this->attributes;
    }

    /**
     * Sets an attribute
     *
     * @param string $offset The attribute name
     * @param mixed $value The value
     */
    public function offsetSet($offset, $value) {
        $this->validate_key_and_value($offset, $value);
        $this->attributes[$offset] = $value;
    }

    /**
     * Checks an attribute exists
     *
     * @param string $offset The attribute key
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->attributes[$offset]);
    }

    /**
     * Removes an attribute
     *
     * @param string $offset The attribute key
     */
    public function offsetUnset($offset) {
        unset($this->attributes[$offset]);
    }

    /**
     * Gets the value of an attribute
     *
     * @param string $offset The attribute name
     * @return mixed|null The value if the attribute exists, otherwise null
     */
    public function offsetGet($offset) {
        return ($this->offsetExists($offset)) ? $this->attributes[$offset] : null;
    }
}