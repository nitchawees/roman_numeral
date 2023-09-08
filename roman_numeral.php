<?php
$input = "MCMXCIII";
ConvertRomanToInteger($input);

function ConvertRomanToInteger($input) {
    $rules = array(
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    );

    $input = strtoupper($input);
    $length = strlen($input);
    $counter = 0;
    $answer = 0;
    $explain = "";
    
    $flag3 = False;
    $flag2 = False;
    
    //For explaination in case III and II
    if ((substr($input, ($length - 3), $length)) == "III") {
        $flag3 = True;
    } else if ((substr($input, ($length - 2), $length)) == "II") {
        $flag2 = True;
    }

    //Calculate
    while ($counter < $length) {
        $temp = 0;
        if (($counter + 1 < $length) && ($rules[$input[$counter]]  < $rules[$input[$counter + 1]])) {
            $temp = $rules[$input[$counter + 1]] - $rules[$input[$counter]];
            $answer += $temp;
            $explain .= ", " . ($input[$counter] . $input[$counter + 1]) . " = " . $temp; 
            $counter += 2;
        } else {
            $temp = $rules[$input[$counter]];
            $answer += $temp;
            $explain .= ", " . $input[$counter] . " = " . $temp; 
            $counter++;
        }
    }
    
    //Format explaination
    if ($flag3) {
        $explain = substr($explain, 0, -21);
        $explain .= ", III = 3";
    } else if ($flag2) {
        $explain = substr($explain, 0, -14);
        $explain .= ", II = 2";
    }
    $explain = substr($explain,2);
    
    echo "Input: s = \"" . $input . "\"" . PHP_EOL;
    echo "Output: " . $answer . PHP_EOL;
    echo "Explaination: " . $explain;
}
