<?php
class Db
{

    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;

    public function __construct(
        string $dbhost,
        string $dbname,
        string $dbuser,
        string $dbpass)
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }

    /**
     * PDOインスタンスを返すDB接続
     *
     * @return object
     */
    function db_init(): object
    {
        return new PDO(
            'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8;',
            $this->dbuser,
            $this->dbpass,
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}
