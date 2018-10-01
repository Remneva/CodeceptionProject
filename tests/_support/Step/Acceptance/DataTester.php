<?php
namespace Step\Acceptance;

/**
 * Class DataTester
 * @package Step\Acceptance
 * Класс для набора методов базой данных
 */


class DataTester extends \AcceptanceTester
{
    /**
     * @Then пользователь делает запрос в базу данных accreditations и проверяет значение :arg1 в колонке name
     */
    public function step_SelectDB($arg1)
    {
        $this->seeInDatabase('accreditations',['name' => $arg1]);
        //throw new \Codeception\Exception\Incomplete("Step `пользователь делает запрос в базу данных :arg1` is not defined");
    }

    /**
     * @Then пользователь выполняет запрос в базу данных accreditations :arg1
     */
    public function accreditations($arg1)
    {
        $this->executeOnDatabase($arg1);
        throw new \Codeception\Exception\Incomplete("Step `пользователь выполняет запрос в базу данных accreditations :arg1` is not defined");
    }

}