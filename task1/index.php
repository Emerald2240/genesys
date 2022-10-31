<?php
$sampleList = array(5, 4, 5, 4, 5, 4, 4, 5, 3, 3, 3, 2, 2, 1, 5);


echo '<pre>';
echo 'The array in question is: ';
print_r($sampleList);
echo '<br>';

//Calling the function
nth_most_rare($sampleList, 1);
echo '<br>';
echo '<br>';
echo '<br>';

nth_most_rare($sampleList, 4);
echo '<br>';
echo '<br>';
echo '<br>';

nth_most_rare($sampleList, 390);
echo '<br>';
echo '<br>';
echo '<br>';



//returns the value of the nth most rare element in an array. If the value of n is larger than the array, the least common value is simply returned.
function nth_most_rare($list, $n)
{
    $nonRepeatingArray = array_values(array_unique($list));
    echo 'Array is broken down into non repeating values for easy searching: ';
    echo '<br>';
    print_r($nonRepeatingArray);
    echo '<br>';

    //Array holding all the arrays and their number of appearances
    $itemCountArray = [];

    //Loop through the array and check for the occurences of all the unique values
    for ($i = 0; $i < count($nonRepeatingArray); $i++) {
        $library = array('appearances' => itemOccurrences($list, $nonRepeatingArray[$i]), 'num' => $nonRepeatingArray[$i]);
        array_push($itemCountArray, $library);
    }

    //sort the array results into ascending order of occurences
    asort($itemCountArray);

    //The array keys are sorted too, this returns them to normal
    echo ('The array elements and their number of appearances, sorted in ascending order: ');
    echo '<br>';

    print_r(array_values($itemCountArray));
    $itemCountArray = array_values($itemCountArray);

    echo '<h1>The ' . $n . 'th rarest element in the array is: ';
    if ($n < count($itemCountArray)) {
        echo $itemCountArray[$n - 1]['num'];
        echo '</h1>';

        return $itemCountArray[$n - 1]['num'];
    } else {
        echo $itemCountArray[count($nonRepeatingArray) - 1]['num'];
        echo '</h1>';

        return $itemCountArray[count($nonRepeatingArray) - 1]['num'];
    }
}

//Returns the number of times a particular element occurs in an array
function itemOccurrences($list, $value)
{
    $count = 0;
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i] == $value) {
            $count++;
        }
    }
    return $count;
}
