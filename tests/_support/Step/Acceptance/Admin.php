<?php
namespace Step\Acceptance;

class Admin extends \AcceptanceTester
{

    public function loginAsAdmin()
    {
        $I = $this;
        $I->amOnPage('/admin');
        $I->fillField('username', 'admin');
        $I->fillField('password', '123456');
        $I->click('Login');
    }

}