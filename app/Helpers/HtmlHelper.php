<?php
if (!function_exists('getRate')) {
    function getRate($number)
    {
        $html = "";
        if ($number < 5) {
            for ($i = 0; $i < $number; $i++) {
                $html .= '<i class="fa fa-star"></i>';
            }
            for ($i = 0; $i < 5 - $number; $i++) {
                $html .= '<i class="fa fa-star"></i>';
            }
        } elseif ($number == "") {
            for ($i = 0; $i < 5; $i++) {
                $html .= '<i class="fa fa-star"></i>';
            }
        } else {
            for ($i = 0; $i < 5; $i++) {
                $html .= '<i class="fa fa-star"></i>';
            }
        }

        echo $html;
    }
}
