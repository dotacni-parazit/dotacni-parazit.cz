<?php

namespace App\View;

use App\Model\Entity\PrijemcePomoci;
use Cake\I18n\Number;


class DPUTILS
{

    /**
     * @param number $value
     * @param null|string $currency
     * @param null|array $options
     * @return string formatted currency string
     */
    public static function currency($value, $currency = null, array $options = [])
    {
        return '<span class="right">' . Number::currency($value, $currency, $options) . '</span>';
    }

    /**
     * @param number $ico
     * @return string formatted ico string
     */
    public static function ico($ico)
    {
        return $ico == 0 ? '' : str_pad($ico, 8, '0', STR_PAD_LEFT);
    }

    /**
     * @param PrijemcePomoci $prijemcePomoci
     * @return string jmeno prijemce pomoci (obchodniJmeno nebo "jmeno prijmeni")
     */
    public static function jmenoPrijemcePomoci($prijemcePomoci)
    {
        return empty($prijemcePomoci) ? '' : (empty($prijemcePomoci->obchodniJmeno) ? $prijemcePomoci->jmeno . ' ' . $prijemcePomoci->prijmeni : $prijemcePomoci->obchodniJmeno);
    }

}