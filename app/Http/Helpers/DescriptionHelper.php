<?php

namespace App\Http\Helpers;

class DescriptionHelper
{
    static public function help($items, $code, $lang): ?string
    {
        foreach ($items as $item) {
            if (strtolower($item["code"]) == strtolower($code)) {
                return strtolower($code) . "|" . $item["name"][$lang];
            }
        }

        return null;
    }
}