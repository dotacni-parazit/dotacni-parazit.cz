<?php

namespace App\View;

use Cake\I18n\Number;


class DPUTILS
{

    public static function currency($value, $currency = null, array $options = [])
    {
        return '<span class="right">' . Number::currency($value, $currency, $options) . '</span>';
    }

    public static function ico($ico)
    {
        return $ico == 0 ? '' : str_pad($ico, 8, '0', STR_PAD_LEFT);
    }

}