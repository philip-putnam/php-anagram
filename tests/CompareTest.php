<?php
    require_once 'src/Compare.php';

    class CompareTest extends PHPUnit_Framework_TestCase
    {
        function test_anagramCompare_oneToOne()
        {
            //arrange
            $comparison = new Compare;
            $first_word = "mars";
            $word_list = array("arms");

            //act
            $result = $comparison->anagramCompare($first_word, $word_list);

            //assert
            $this->assertEquals(array("arms"), $result);
        }

        function test_anagramCompare_oneToMany()
        {
            //arrange
            $comparison = new Compare;
            $first_word = "pots";
            $word_list = array("stop", "post", "tops" );

            //act
            $result = $comparison->anagramCompare($first_word, $word_list);

            //assert
            $this->assertEquals(array("stop", "post", "tops"), $result);
        }

        function test_anagramCompare_oneToManyNonMatchingChars()
        {
            //arrange
            $comparison = new Compare;
            $first_word = "pots";
            $word_list = array("stop", "post", "tops", "rail");

            //act
            $result = $comparison->anagramCompare($first_word, $word_list);

            //assert
            $this->assertEquals(array("stop", "post", "tops"), $result);
        }

        function test_anagramCompare_oneToManyWithMatchingChars()
        {
            //arrange
            $comparison = new Compare;
            $first_word = "pots";
            $word_list = array("stop", "post", "tops", "rail", "tsaps");

            //act
            $result = $comparison->anagramCompare($first_word, $word_list);

            //assert
            $this->assertEquals(array("stop", "post", "tops"), $result);
        }

        function test_anagramCompare_oneToManyIncludingSmallWithMatchingChars()
        {
            //arrange
            $comparison = new Compare;
            $first_word = "pots";
            $word_list = array("stop", "post", "tops", "rail", "tsaps", "ots");

            //act
            $result = $comparison->anagramCompare($first_word, $word_list);

            //assert
            $this->assertEquals(array("stop", "post", "tops", "ots"), $result);
        }
    }
?>
