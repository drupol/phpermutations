<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class FiniteGroup.
 *
 * The finite group is an abelian finite cyclic group.
 */
class FiniteGroup extends Combinatorics implements IteratorInterface
{
    /**
     * The group size.
     *
     * @var int
     */
    protected $size;

    /**
     * The group.
     *
     * @var int[]
     */
    protected $group;

    /**
     * The key.
     *
     * @var int
     */
    protected $key;

    /**
     * Combinatorics constructor.
     */
    public function __construct()
    {
        parent::__construct([], null);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->group);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->key;
        next($this->group);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->group[$this->key()]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->key = 0;
    }

    /**
     * Count elements of an object.
     *
     * @return int
     *             The number of element
     */
    public function count()
    {
        return count($this->group);
    }

    /**
     * Set the group size.
     *
     * @param int $size
     *                  The size
     */
    public function setSize($size)
    {
        $this->size = $size;
        $this->computeGroup();
    }

    /**
     * Get the group size.
     *
     * @return int
     *             The size
     */
    public function getSize()
    {
        return (int) $this->size;
    }

    /**
     * Get the order.
     *
     * @param int $generator
     *                       The generator
     *
     * @return int
     *             The order
     */
    public function order($generator)
    {
        $result = [];

        foreach (range(1, $this->getSize() - 1) as $number) {
            $value = ($generator ** $number) % $this->getSize();
            $result[$value] = $value;
        }

        return count($result);
    }

    /**
     * Clean out the group from unwanted values.
     */
    private function computeGroup()
    {
        $this->group = [];

        foreach (range(1, $this->getSize() - 1) as $number) {
            if (1 === $this->gcd($number, $this->getSize() - 1)) {
                $this->group[] = $number;
            }
        }
    }

    /**
     * Get the greater common divisor between two numbers.
     *
     * @param int $a
     *               The first number
     * @param int $b
     *               The second number
     *
     * @return int
     *             The greater common divisor between $a and $b
     */
    private function gcd($a, $b)
    {
        return $b ? $this->gcd($b, $a % $b) : $a;
    }
}
