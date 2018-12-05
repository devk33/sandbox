<?php

    /**
     * Сложение чисел столбиком
     * Ограничений на длину числа нет
     */
    function sumBigDigits($a, $b)
    {
        $sum = [];

        if (strlen($a) >= strlen($b)) {
            $digit1 = str_split($a);
            $digit2 = str_split($b);
        } else {
            $digit1 = str_split($b);
            $digit2 = str_split($a);
        }

        echo 'DIGIT #1: '.implode($digit1, '').'<br />';
        echo 'DIGIT #2: '.implode($digit2, '').'<br />';

        $digit1 = array_reverse($digit1);
        $digit2 = array_reverse($digit2);

        $left = 0;
        foreach ($digit1 as $i => $d1)
        {
            if (isset($digit2[$i]))
            {
                $v = $d1 + $digit2[$i] + $left;

                if ($v >= 10) {
                    $ex = str_split($v);
                    $left = $ex[0];
                    $v    = $ex[1];
                } else {
                    $left = 0;
                }

                $sum[] = $v;
            }
            else
            {
                $v = $d1 + $left;
                if ($v >= 10) {
                    $ex = str_split($v);
                    $left = $ex[0];
                    $v    = $ex[1];
                } else {
                    $left = 0;
                }

                $sum[] = $v;
            }
        }

        if ($left > 0) {
            $sum[] = $left;
        }

        return implode(array_reverse($sum), "");
    }

    $result = sumBigDigits(
        '99999999999999999999999999999999',
        '33333333333333333333333333333333'
    );

    echo 'RESULT: '.$result.'<br />';