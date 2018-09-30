<?php

use Codeception\Util\HttpCode;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/');
$I->seeResponseCodeIs(HttpCode::OK);
$I->see('Электронная торговая площадка'); // ! Тут часть фразы с вашей главной
$I->amOnPage('/about/company');
$I->seeResponseCodeIs(HttpCode::OK);
$I->see('лидер рынка электронных закупок России'); // ! Тут часть фразы с вашей страницы about

