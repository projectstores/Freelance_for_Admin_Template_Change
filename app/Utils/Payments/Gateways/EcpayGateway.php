<?php

namespace App\Utils\Payments\Gateways;

class EcpayGateway
{
    /**
     * 綠界 URL 編碼
     *
     * @param  string $source
     * @return string
     */
    public static function ecpayUrlEncode($source)
    {
        $encoded      = urlencode($source);
        $lower        = strtolower($encoded);
        $dotNetFormat = self::toDotNetUrlEncode($lower);

        return $dotNetFormat;
    }

    /**
     * 轉換為 .net URL 編碼結果
     *
     * @param  string $source
     * @return string
     */
    public static function toDotNetUrlEncode($source)
    {
        $search = [
            '%2d',
            '%5f',
            '%2e',
            '%21',
            '%2a',
            '%28',
            '%29',
        ];
        $replace = [
            '-',
            '_',
            '.',
            '!',
            '*',
            '(',
            ')',
        ];
        $replaced = str_replace($search, $replace, $source);

        return $replaced;
    }

    /**
     * Generate Mac value
     *
     * @param array $arParameters
     * @param string $HashKey
     * @param string $HashIV
     * @return string
     */
    public static function generatMac($arParameters = [], $HashKey = '', $HashIV = '')
    {
        $sMacValue = '';

        if (isset($arParameters)) {
            
            // 組合字串
            $sMacValue = 'HashKey='.$HashKey;
            foreach ($arParameters as $key => $value) {
                $sMacValue .= '&'.$key.'='.$value;
            }

            $sMacValue .= '&HashIV='.$HashIV;

            // URL Encode編碼
            $sMacValue = urlencode($sMacValue);

            // 轉成小寫
            $sMacValue = strtolower($sMacValue);

            // 取代為與 dotNet 相符的字元
            $sMacValue = str_replace('%2d', '-', $sMacValue);
            $sMacValue = str_replace('%5f', '_', $sMacValue);
            $sMacValue = str_replace('%2e', '.', $sMacValue);
            $sMacValue = str_replace('%21', '!', $sMacValue);
            $sMacValue = str_replace('%2a', '*', $sMacValue);
            $sMacValue = str_replace('%28', '(', $sMacValue);
            $sMacValue = str_replace('%29', ')', $sMacValue);

            // 編碼
            $sMacValue = hash('sha256', $sMacValue);

            $sMacValue = strtoupper($sMacValue);
        }

        return $sMacValue;
    }
}