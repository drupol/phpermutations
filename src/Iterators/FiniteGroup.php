<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use function count;

/**
 * Class FiniteGroup.
 *
 * The finite group is an abelian finite cyclic group.
 */
class FiniteGroup extends Iterators
{
    /**
     * The group.
     *
     * @var int[]
     */
    protected $group;

    /**
     * The group size.
     *
     * @var int
     */
    protected $size;

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
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->group);
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
     * {@inheritdoc}
     *
     * @return void
     */
    public function next()
    {
        ++$this->key;
        next($this->group);
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

        foreach (range(1, $this->getSize()) as $number) {
            $value = ($generator ** $number) % $this->getSize();
            $result[$value] = $value;
        }

        return count($result);
    }

    /**
     * Set the group size.
     *
     * @param int $size
     *                  The size
     *
     * @return void
     */
    public function setSize($size)
    {
        $this->size = $size;
        $this->computeGroup();
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function valid()
    {
        return isset($this->group[$this->key()]);
    }

    /**
     * Clean out the group from unwanted values.
     *
     * @return void
     */
    private function computeGroup()
    {
        $this->group = [];

        foreach (range(1, $this->getSize()) as $number) {
            if (1 === $this->gcd($number, $this->getSize())) {
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
