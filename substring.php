<?php
// $s = "barfoothefoobarman";
// $words = ["foo", "bar"];

$s = "wordgoodgoodgoodbestword";
$words = ["word","good","best","word"];

// $s = "barfoofoobarthefoobarman";
// $words = ["bar","foo","the"];

// $s = "wordgoodgoodgoodbestword";
// $words = ["word","good","best","good"];

$s = "a";
$words = ["a","a"];


function getSubstring(&$s, &$words)
{
    $wordLength = strlen($words[0]);
    $countOfArray = count($words);
    $needleLength = $wordLength * $countOfArray;
    $lenghtOfString = strlen($s);
    $answer = [];

    for ($i = 0; $i < $lenghtOfString; $i++) {
        $remainingTextTooShort = ($i + $needleLength) > ($lenghtOfString + 1);

        if (!$remainingTextTooShort) {
            $nextWord = substr($s, $i, $needleLength);
            $wordParts = str_split($nextWord, $wordLength);
            if(allWordsInArray($wordParts, $words)) array_push($answer, $i);
        }
    }
    return $answer;
}

function allWordsInArray($wordsList, $wordsArray)
{
    $tracker = [];
    $length_of_list = count($wordsList);
    $length_of_array = count($wordsArray);
    foreach($wordsList as $word){
        for($i=0; $i<$length_of_list; $i++){
            if($word === $wordsArray[$i]){
                if(!in_array($i, $tracker)){
                    array_push($tracker, $i);
                    break;
                }
            }
        }
    }
    $length_of_tracker = count($tracker);
    // var_dump($wordsList, $wordsArray, $tracker);
    if(($length_of_tracker  === $length_of_list ) && ($length_of_tracker === $length_of_array)) return true;
    return false;
}
print_r(getSubstring($s, $words));