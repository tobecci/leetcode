<?php
$s = "barfoothefoobarman";
$words = ["foo", "bar"];

// $s = "wordgoodgoodgoodbestword";
// $words = ["word","good","best","word"];

// $s = "barfoofoobarthefoobarman";
// $words = ["bar","foo","the"];




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
            if(allWordsInArray($wordParts, $words) && !hasDuplicates($wordParts)){
                array_push($answer, $i);
            }
        }
    }
    return $answer;
}

function allWordsInArray($wordsList, $wordsArray)
{
    foreach($wordsList as $word){
        if(!in_array($word, $wordsArray)) return false;
    }
    return true;
}

function hasDuplicates($wordList)
{
    $firstCount = count($wordList);
    $secondCount = count(array_unique($wordList));
    if($firstCount !== $secondCount) return true;
    return false;
}
print_r(getSubstring($s, $words));