<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('diskon')) {
    function diskon($angka)
    {
        $hasil_diskon = number_format($angka) . "%";
        return $hasil_diskon;
    }
}
