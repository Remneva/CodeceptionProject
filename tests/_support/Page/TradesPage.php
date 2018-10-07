<?php //location: tests/_support/Page/LotsPage.php
namespace Page;

class LotsPage
{
    // include url of current page
    public static $URL = '/v2/trades/procedure/view/Vv_ZhyIUhVexoaxpwhhMpA';

    public static $elements = array(
        'Добавить лот' => '//*[contains(text(),"Добавить лот")]',
        'Загрузить документацию' => '//*[contains(text(),"Загрузить документацию")]',
        'Процедурная часть' => '//*[contains(@class,"panel-heading")]',
        'Заголовок Лотовой части' => '//*[@id ="1224956"]',

    );

    public static function getElement($name){
        return self::$elements[$name];
    }

    protected $tester;

}