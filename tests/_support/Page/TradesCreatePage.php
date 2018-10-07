<?php //location: tests/_support/Page/LotAddPage.php
namespace Page;

class LotAddPage
{
    // include url of current page
    public static $URL = '/v2/trades/procedure/view/Vv_ZhyIUhVexoaxpwhhMpA';

    public static $elements = array(
        'Сохранить' => '//button[@name="save"]',

    );

    public static function getElement($name){
        return self::$elements[$name];
    }

    protected $tester;

}