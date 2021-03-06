<?php
    class Compare
    {
        private $first_word;
        private $word_list;

        function __construct($first_word, $word_list)
        {
            $this->first_word = $first_word;
            $this->word_list = explode(", ", $word_list);
        }

        function anagramCompare($first_word, $word_list)
        {
            $word_list = explode(", ", $word_list);
            $results = array();
            $countCharacters = array_count_values(str_split($first_word));
            $regExPattern = '/[' . $first_word . ']/i';
            foreach ($word_list as $word) {
                preg_match_all($regExPattern, $word, $matches);
                if ($matches[0]) {
                    $charCount = true;
                    $matchesCountValues = array_count_values($matches[0]);
                    foreach ($matchesCountValues as $key => $count) {
                        if (!array_key_exists($key, $countCharacters) || $count != $countCharacters[$key]) {
                            $charCount = false;
                        }
                    }
                    if ($charCount) {
                        array_push($results, implode($matches[0]));
                    }
                }
            }

            return $results;
        }
    }

?>
