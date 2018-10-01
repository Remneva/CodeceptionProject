<?php
namespace Helper;

/**
 * Additional methods for DB module
 *
 * Save this file as DbHelper.php in _support folder
 * Enable DbHelper in your suite.yml file
 * Execute `codeception build` to integrate this class in your codeception
 */
class DbHelper extends \Codeception\Module
{

    /**
     * Delete entries from $table where $criteria conditions
     * Use: $I->deleteFromDatabase('users', ['id' => '111111', 'banned' => 'yes']);
     *
     * @param  string $table tablename
     * @param  array $criteria conditions. See seeInDatabase() method.
     * @return boolean Returns TRUE on success or FALSE on failure.
     * @throws \Codeception\Exception\ModuleException
     */
    public function deleteFromDatabase($table, $criteria)
    {
        $dbh = $this->getModule('Db')->dbh;
        $query = "delete from %s where %s";
        $params = [];
        foreach ($criteria as $k => $v) {
            $params[] = "$k = ?";
        }
        $params = implode(' AND ', $params);
        $query = sprintf($query, $table, $params);
        $this->debugSection('Query', $query, json_encode($criteria));
        $sth = $dbh->prepare($query);

        return $sth->execute(array_values($criteria));
    }

    /**
     * Update entries from $table set $data where $criteria conditions
     * Use: $I->updateFromDatabase('users', ['startdate' => '2014-12-12'], ['id' => '111111']);
     *
     * @param string $table tablename
     * @param array $data data changes for update
     * @param array $criteria conditions. See seeInDatabase() method.
     * @return boolean Returns TRUE on success or FALSE on failure.
     * @throws \Codeception\Exception\ModuleException
     */
    public function updateFromDatabase($table, $data, $criteria)
    {
        $dbh = $this->getModule('Db')->dbh;
        $query = "update %s set %s where %s";
        $params = $dataset =[];
        foreach ($criteria as $k => $v) {
            $params[] = "$k = ?";
        }
        $params = implode(' AND ', $params);
        foreach ($data as $c => $d) {
            $dataset[] = "$c = ?";
        }
        $dataset = implode(' , ', $dataset);
        $query = sprintf($query, $table, $dataset, $params);
        $this->debugSection('Query', $query, json_encode($data) . json_encode($criteria));
        $sth = $dbh->prepare($query);

        return $sth->execute(array_values(array_merge($data, $criteria)));
    }

    /**
     * Execute a SQL query
     * Use: $I->executeOnDatabase('UPDATE `users` SET `email` = NULL WHERE `users`.`id` = 1; ');
     *
     * @param  string $sql query
     * @return boolean Returns TRUE on success or FALSE on failure.
     */


    public function executeOnDatabase($arg1)
    {
        $dbh = $this->getModule('Db')->dbh;
        $this->debugSection('Query', $arg1);
        $sth = $dbh->prepare($arg1);

        return $sth->execute();
    }

    /**
     * return row a SQL query
     * Use: $I->grabRowFromDatabase('SELECT * FROM `users` WHERE `users`.`id` = 1; ');
     *
     * @param  string $sql query
     * @return boolean Returns result object on success or null on failure.
     * @throws \Codeception\Exception\ModuleException
     */
    public function grabRowFromDatabase($sql)
    {
        $result = $this->grabRowsFromDatabase($sql);
        if($result) {
            return $result[0];
        }
        return null;
    }
}
