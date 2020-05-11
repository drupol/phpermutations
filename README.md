[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/phpermutations.svg?style=flat-square)](https://packagist.org/packages/drupol/phpermutations)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/phpermutations.svg?style=flat-square)](https://packagist.org/packages/drupol/phpermutations)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/phpermutations.svg?style=flat-square)](https://packagist.org/packages/drupol/phpermutations)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/drupol/phpermutations/Continuous%20Integration?style=flat-square)](https://github.com/drupol/phpermutations/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/phpermutations/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phpermutations/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/phpermutations/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phpermutations/?branch=master)
 [![License](https://img.shields.io/packagist/l/drupol/phpermutations.svg?style=flat-square)](https://packagist.org/packages/drupol/phpermutations)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
## PHPermutations

PHP Iterators and Generators to generate combinations and permutations in an efficient way.

At first the library was created to only generate permutations and combinations.

In the end, I added other Iterators and Generators like:
* Fibonacci numbers,
* Perfect numbers,
* Prime numbers,
* Product of numbers,
* Rotation of an array,
* Cycling through an array,
* Permutations,
* Combinations,

## Introduction

I've always been fascinated by numbers and everything around them... in other words, mathematics.

The library has been written first for being used in [PHPartition](https://github.com/drupol/phpartition), then it has
been extended here and there.

Its main use is for generating Permutations and Combinations without running out of memory, thanks to
[PHP Generators](https://secure.php.net/manual/en/language.generators.overview.php) and 
and [Iterators](https://secure.php.net/manual/en/class.iterator.php).

The difference with other combinatorics library is that you can use an extra parameter 'length', that allows you to
compute Permutations and Combinations of a particular size.
The other notable difference is that your input arrays may contains any type of object (integers, arrays, strings or
objects), the library will still continue to work without any trouble.

## Requirements

* PHP >= 7.1.3,

## How to use

Include this library in your project by doing:

`composer require drupol/phpermutations`

Let's say you want to find all the permutations of the list of number [1, 2, 3, 4, 5] having a length of 3:

```php
// Create the object
$permutations = new \drupol\phpermutations\Generators\Permutations([1,2,3,4,5], 3);

// Use a foreach loop.
foreach ($permutations->generator() as $permutation) {// do stuff}

// Or get the whole array at once.
$permutations->toArray();
```

Most of the components always has the same arguments except for very few of them.

As the documentation per component is not written yet, I advise you to
[check the tests](https://github.com/drupol/phpermutations/tree/master/tests/src) to see how to use them.

## Combinations

> In mathematics, a combination is a way of selecting items from a collection, such that (unlike permutations) the order
> of selection does not matter.
>  -- [_Wikipedia_](https://en.wikipedia.org/wiki/Combination)

In one sentence: _When the order doesn't matter, it is a Combination._

## Examples

Let's say we have a group of fruits:

`$list = ['Apple', 'Pear', 'Banana', 'Orange']`

and we want to find the combinations of length: `3`, the result will be:

`['Apple', 'Pear', 'Banana']`

`['Apple', 'Pear', 'Orange']`

`['Apple', 'Banana', 'Orange']`

`['Pear', 'Banana', 'Orange']`

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

The permutations of length 3 of the array [1, 2, 3, 4, 5] are, _please hold on tight_, the sum of all the permutations
of each combinations having a length of 3 of that array.

## Tests

Each Generators and Iterators are tested using the same values as input. I try to be as much complete as possible with
the [tests](https://github.com/drupol/phpermutations/tree/master/tests/fixtures).
Every time the sources are modified, [Github](https://github.com/drupol/phpermutations/actions), the continuous integration
service, tests the code against those tests, this way you are aware if the changes that you are introducing are valid.

# Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
