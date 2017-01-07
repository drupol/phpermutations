## PHPermutations
[![Build Status](https://travis-ci.org/drupol/phpermutations.svg?branch=master)](https://travis-ci.org/drupol/phpermutations) [![Code Coverage](https://scrutinizer-ci.com/g/drupol/phpermutations/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpermutations/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drupol/phpermutations/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drupol/phpermutations/?branch=master) [![Dependency Status](https://www.versioneye.com/user/projects/5870ade140543803e80abb5b/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5870ade140543803e80abb5b)

PHP iterators and generators to generate combinations and permutations in an efficient way.

At first the library was created to only generate permutations and combinations.
In the end, I added other Iterators and Generators like:
* Fibonacci numbers,
* Perfect numbers,
* Prime numbers,
* Product of numbers,
* ... more to come.

## Permutations

> In mathematics, the notion of permutation relates to the act of arranging all the members of a set into some sequence
> or order, or if the set is already ordered, rearranging (reordering) its elements, a process called permuting.
> These differ from combinations, which are selections of some members of a set where order is disregarded.
>  -- [_Wikipedia_](https://en.wikipedia.org/wiki/Permutation)

In one sentence: _When the order does matter, it is a Permutation._

### Examples

Let's say we have a group of fruits

`['Apple', 'Pear', 'Banana', 'Orange']`

and we want to find the permutations of length: `3`, the result will be:

`['Apple', 'Pear', 'Banana']`

`['Pear', 'Apple', 'Banana']`

`['Apple', 'Banana', 'Pear']`

`['Banana', 'Apple', 'Pear']`

`['Pear', 'Banana', 'Apple']`

`['Banana', 'Pear', 'Apple']`

`['Apple', 'Pear', 'Orange']`

`['Pear', 'Apple', 'Orange']`

`['Apple', 'Orange', 'Pear']`

`['Orange', 'Apple', 'Pear']`

`['Pear', 'Orange', 'Apple']`

`['Orange', 'Pear', 'Apple']`

`['Apple', 'Banana', 'Orange']`

`['Banana', 'Apple', 'Orange']`

`['Apple', 'Orange', 'Banana']`

`['Orange', 'Apple', 'Banana']`

`['Banana', 'Orange', 'Apple']`

`['Orange', 'Banana', 'Apple']`

`['Pear', 'Banana', 'Orange']`

`['Banana', 'Pear', 'Orange']`

`['Pear', 'Orange', 'Banana']`

`['Orange', 'Pear', 'Banana']`

`['Banana', 'Orange', 'Pear']`

`['Orange', 'Banana', 'Pear']`

## Combinations

> In mathematics, a combination is a way of selecting items from a collection, such that (unlike permutations) the order
> of selection does not matter.
>  -- [_Wikipedia_](https://en.wikipedia.org/wiki/Combination)

In one sentence: _When the order doesn't matter, it is a Combination._

## Examples

Let's say we have a group of fruits

`$list = ['Apple', 'Pear', 'Banana', 'Orange']`

and we want to find the combinations of length: `3`, the result will be:

`['Apple', 'Pear', 'Banana']`

`['Apple', 'Pear', 'Orange']`

`['Apple', 'Banana', 'Orange']`

`['Pear', 'Banana', 'Orange']`

## Inspired by

* Many stackoverflow posts.

## Requirements

* PHP >= 5.6,
* (optional) [PHPUnit](https://phpunit.de/) to run tests.
