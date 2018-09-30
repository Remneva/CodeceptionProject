<?php

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 * @method void haveInDatabase($table, $data)
 * @method void seeInDatabase($table, $criteria = null)
 * @SuppressWarnings(PHPMD)
 */

//Подключает gherkin context для phpStorm (!!!)
namespace Behat\Behat\Context {
    interface Context
    {
    }
}

namespace {
    class AcceptanceTester extends \Codeception\Actor implements \Behat\Behat\Context\Context
    {
        use _generated\AcceptanceTesterActions;

        /**
         * Define custom actions here
         */

        /**
         * @Given пользователь находится на Главной странице
         */
        public function step_beingOnMainPage()
        {
            $this->amOnPage('/');
        }

        /**
         * @Given нажимает на кнопку :arg1
         */
        public function step_clickOnButton($arg1)
        {
            $this->click($arg1);
        }

        /**
         * @Then открывается модальное окно :arg1
         */
        public function step_beingOnAutorizationDialog($arg1)
        {
            $this->see($arg1);
        }

        /**
         * @Then пользователь заполняет поле :arg1 значением :arg2
         */
        public function step_869973adb($arg1, $arg2)
        {
            $this->fillField($arg1, $arg2);
        }

        /**
         * @Then пользователь делает запрос в базу данных :arg1
         */
        public function step_Select($arg1)
        {
            $this->seeInDatabase($arg1);
            throw new \Codeception\Exception\Incomplete("Step `пользователь делает запрос в базу данных :arg1` is not defined");
        }


    }

   // use Trait DataTesterActions,
}


