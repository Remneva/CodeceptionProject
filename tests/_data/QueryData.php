<?php

/**
 * @Then пользователь делает запрос в базу данных :arg1
 */

//Подключает gherkin context для phpStorm (!!!)


namespace Behat\Behat\Context {
    interface Context
    {
    }
}

namespace {
    class QueryData extends \Codeception\Actor implements \Behat\Behat\Context\Context
    {



    public
    function step_Select($arg1)
    {
        $this->seeInDatabase($arg1);
        throw new \Codeception\Exception\Incomplete("Step `пользователь делает запрос в базу данных :arg1` is not defined");
    }
}}
