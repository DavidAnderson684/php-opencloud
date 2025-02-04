<?php

namespace OpenCloud\Common;

class ArrayAccess implements \ArrayAccess
{
    protected $elements;

    public function __construct($data = array())
    {
        $this->elements = (array) $data;
    }

    /**
     * Sets a value to a particular offset.
     *
     * @param mixed $offset
     * @param mixed $value
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }

    /**
     * Checks to see whether a particular offset key exists.
     *
     * @param mixed $offset
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * Unset a particular key.
     *
     * @param mixed $offset
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }

    /**
     * Get the value for a particular offset key.
     *
     * @param mixed $offset
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->elements[$offset] : null;
    }
}
