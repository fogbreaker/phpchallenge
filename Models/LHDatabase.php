<?php

/* Copyright: Liebrecht & Haas GmbH */

namespace Models;
use Exception;
use mysqli;
use PDO;

/* @version 1.1
 */
class LHDatabase
{
    public $core;
    public $log_;
    private $pdo_ = null;


    private string $Hostname;
    private string $Username;
    private string $Password;
    public string $DatabaseName;


    public function getPDO()
    {
        if ($this->pdo_ == null) {

            $this->pdo_ = new PDO("mysql:host=" . $this->Hostname . ";dbname=" . $this->DatabaseName . ";charset=utf8mb4", $this->Username, $this->Password);
            $this->pdo_->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo_->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        return $this->pdo_;

    }


    function __construct(string $Hostname, string $Database, string $Username, string $Password)
    {
        $this->Hostname = $Hostname;
        $this->DatabaseName = $Database;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->core = new mysqli($Hostname, $Username, $Password, $Database);
        $this->core->set_charset("utf8mb4");
    }


    function query($Query)
    {

        try {
            $retn = $this->core->query($Query);
            if (!$retn) {
                echo "Fehlerhaftes Query: $Query";
                exit;
            }
        } catch (Exception $exception) {

            echo "SQL Fehler: <br/>$Query <br/><br/>  <br/> Fehlerbeschreibung (Exception-Description): $exception";
            exit;
        }

        return $retn;
    }
}

