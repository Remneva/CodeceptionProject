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
            //$this->click($arg1);
            //$curPage = $this->currentPage;
            //$this->click($curPage::getElement($arg1));
            $this->click($this->getPageElement($arg1));
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
        public function step_86($arg1, $arg2)
        {
            $this->fillField($this->getPageElement($arg1), $arg2);
        }

        /**
         * @Then пользователь заполняет поле :field текущей датой плюс :arg2
         */
        public function step_fillFieald($field, $day)
        {
            $this->fillField(($this->getPageElement($field)), date('Y-m-d', strtotime("+$day day")));
            $this->wait(1);

        }

        /**
         * @Then на странице присутствует :element
         */
        public function step_seeElement($element)
        {
            $this->waitForElementVisible($this->getPageElement($element));
            $this->seeElement($this->getPageElement($element));
        }

        /**
         * @Then пользователь переходит на страницу создания МПДО
         */
        public function step_597220a26()
        {
            $this->amOnPage('/v2/trades/configurator/simple/new-create-procedure/83egcZf2FSDJ1KI0ZWAk1A/');
        }

        /**
         * @Then заполнят поле :arg1 значением :arg2
         */
        public function step_156164710($arg1, $arg2)
        {
            throw new \Codeception\Exception\Incomplete("Step `заполнят поле :arg1 значением :arg2` is not defined");
        }

        private $currentPage;
        private $pages = array(
            "Главная страница" => "\Page\MainPage",
            "Личный кабинет" => "\Page\PersonalPage",
            "Форма создания Процедуры" => "\Page\ProcedurePage",
            "Список лотов" => "\Page\TradesPage",
            "Создание лота" => "\Page\TradesCreatePage",
        );

        /**
         * @Given пользователь находится на странице :arg1
         */
        public function step_beingOnPage($arg1)
        {
            // Инициализируется нужный pageObject (TBD Добавить проверку на наличие элемента в массиве)
            $this->currentPage = $this->pages[$arg1];
            $curPage = $this->currentPage;
            $this->amOnPage($curPage::$URL);
        }

        /**
         * @Given пользователь перешел на страницу :arg1
         */
        public function step_beingOn($arg1)
        {
            // Инициализируется нужный pageObject БЕЗ проверки урла
            $this->currentPage = $this->pages[$arg1];

        }

        private function getPageElement($elementName)
        {
            $curPage = $this->currentPage;
            return $curPage::getElement($elementName);
        }


        /**
         * @Then сохраняется сессия
         */
        public function step_6666()
        {
            $this->saveSessionSnapshot("fabrikant");
        }

        /**
         * @Then восстановлена сессия
         */
        public function step_7777()
        {
            $this->loadSessionSnapshot("fabrikant");
        }
    }
}