<?php

/**
 * Movie recommendation search
 */
class Recommendation 
{
    private $movies;

    public function __construct(array $movies)
    {
        $this->movies = $movies;
    }

    /**
     * Retrieves the list of random titles.
     *
     * @param int num number of titles to return
     * @return array random titles from the movie list
     * @throws InvalidArgumentException if the num argument is incorrect
    */
    public function algorithm1(int $num = 3) : array
    {
        if($num < 0) {
            throw new InvalidArgumentException('Number of elements must be a non-negative number');
        } elseif ($num > count($this->movies)) {
            throw new InvalidArgumentException('Number of elements requested exceeds array size');
        } elseif($num == 0) {
            return [];
        }
    
        $randomKeys = array_rand($this->movies, $num);

        if ($num == 1) {
            return [$this->movies[$randomKeys]];
        }

        return array_map(function($key) {
            return $this->movies[$key];
        }, $randomKeys);
    }

    /**
     * Retrieves the list of movies with a specific first letter and an even number of characters.
     *
     * @param string firstLetter first letter of the title
     * @return array movies with a specific first letter and an even number of characters
     * @throws InvalidArgumentException if the first letter is an empty string
    */
    public function algorithm2(string $firstLetter) : array
    {
        if(empty($firstLetter)) {
            throw new InvalidArgumentException('First letter cannot be empty string');
        }

        $results = [];
        foreach($this->movies as $title) {
            if(mb_substr($title, 0, 1) == $firstLetter) {
                if(mb_strlen($title) % 2 == 0) {
                    $results[] = $title;
                }
            }
        }

        return $results;
    }

    /**
     * Retrieves the list of movies whose titles contain more than one word.
     *
     * @return array movies whose titles contain more than one word
    */
    public function algorithm3() : array 
    {
        return array_filter($this->movies, function($title) {
            return strpos($title, ' ') !== false;
        });
    }
}