<?php

namespace Core\Helpers;

class Helper {
    public static function formatDate($date, $format = 'd/m/Y') {
        return date($format, strtotime($date));
    }

    public static function url($path) {
        return '/meu_projeto/' . ltrim($path, '/');
    }
}