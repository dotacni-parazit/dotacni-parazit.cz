<?php

namespace App\View;

use Cake\I18n\Number;


class DPUTILS
{

    public static function currency($value, $currency = null, array $options = [])
    {
        return '<span class="right">' . Number::currency($value, $currency, $options) . '</span>';
    }

}