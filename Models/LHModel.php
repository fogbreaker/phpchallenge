<?php

/* Copyright: Liebrecht & Haas GmbH */

namespace Models;


abstract class LHModel
{
    protected static string $tableName;
    public int $id = -1;
    protected string $CreationDate = "";
    public string $Bezeichnung = "";
    protected string $LastUpdated = "";
    public bool $Aktiv = true;
    public string $Typ = "";

    /* =================================================================================== */


    static protected function GetDB(): LHDatabase
    {

        global $mysqli;
        return $mysqli;
    }
    /* ============== LOAD, CREATE, UPDATE & REMOVE FUNKTION ============== */
    /* @return static[] */
    static public function Load(array $options = [], bool $NurAktive = true, int $Limit = 999999, string $OrderBy = "CreationDate", bool $Descending = true, bool $Verodern = false, string $CustomQuery = ""): array
    {

        /* @var $retn LHModel[] */
        $retn = [];

        $db = static::GetDB();

        if ($CustomQuery == "") {
            $Where = "WHERE ";
            $Iter = 0;

            if (count($options) == 0) {
                $Where .= "1=1";
            }
            foreach ($options as $key => $Value) {
                if ($Iter != 0) {
                    if ($Verodern) {
                        $Where .= " OR ";
                    } else {
                        $Where .= " AND ";
                    }
                }
                $Iter++;
                $Where .= "`$key` = '$Value'";
            }


            if ($Descending) {
                $Descending = "DESC";
            }
            if ($OrderBy != "") {
                $OrderBy = "ORDER BY $OrderBy $Descending";
            }

            if ($NurAktive) {
                $ANDAktiv = "AND Aktiv=1";
            } else {
                $ANDAktiv = "";
            }

            $Query = "SELECT * FROM " . static::$tableName . " $Where $ANDAktiv $OrderBy LIMIT $Limit";
        } else {
            $Query = $CustomQuery;
        }


        $pdo = $db->getPDO();
        try {
            $statement = $pdo->prepare($Query);
            $statement->execute();
        } catch (\Exception $ex) {

            var_dump("⛔ [PDO] Exception: $ex->errorInfo", $Query . "<br>" . $ex->getMessage());
            exit;

        }


        while ($object = $statement->fetchObject(static::class)) {
            array_push($retn, $object);
        }


        return $retn;
    }

    /* @return static|null */
    static public function LoadById(int $Id,bool $NurAktive = true, int $Limit = 999999, string $OrderBy = "CreationDate", bool $Descending = true): ?LHModel {

        /* @var $retn LHModel */

        if ($Id == -1) {
            return null;
        }

        return self::LoadSingle(['id' => $Id], NurAktive: $NurAktive, Limit: $Limit, OrderBy: $OrderBy, Descending:  $Descending);
    }

    static public function LoadSingle(array $options, bool $NurAktive = true, int $Limit = 999999, string $OrderBy = "CreationDate", bool $Descending = true): ?LHModel
    {
        $many = self::Load($options, NurAktive: $NurAktive, Limit: $Limit, OrderBy: $OrderBy, Descending: $Descending);
        if (count($many) >= 1) {
            return $many[0];
        } else {
            return null;
        }
    }

    /* ============== LOAD, CREATE, UPDATE & REMOVE FUNKTION ============== */
    /* @return static[] */

    static public function LoadTarget(string $TargetClass, int $TargetPid): ?LHModel
    {
        if (class_exists($TargetClass)) {
            return $TargetClass::LoadById($TargetPid);
        }
        return null;
    }

    public function refetch(): LHModel
    {
        return self::Load(['id' => $this->id], NurAktive: false);
    }

    static public function Create(array $create = null): ?LHModel
    {
        $db = static::GetDB();
        global $cu;

        $Query = "";
        if ($create) {
            $RemoveKeys = ['csrf_token'];
            foreach ($create as $Key => $Value) {
                foreach ($RemoveKeys as $RemoveKey) {
                    if ($Key == $RemoveKey) {
                        unset($create[$Key]);
                        continue(2);
                    }
                }
                if (is_bool($Value)) {
                    $Value = $Value ? 1 : 0;
                }
                unset($create[$Key]);
                $create[str_replace("'", "", $Key)] = $Value;
            }


            if ($cu) {
                $create['CreatorPid'] = $cu->id;
            } else {
                $create['CreatorPid'] = -1;
            }
            $columns = implode(", ", array_keys($create));

            $escaped_values = array_map([$db->core, 'real_escape_string'], array_values($create));
            $values = implode("', '", $escaped_values);
            $Query = "INSERT INTO " . static::$tableName . " ($columns) VALUES ('$values')";

        }


        try {
            $pdo = $db->getPDO();
            $statement = $pdo->prepare($Query);
            $statement->execute();
            $RowCount = $statement->rowCount();


            if ($RowCount > 0) {
                $Id = $pdo->lastInsertId();
                return static::LoadById($Id, NurAktive: false);
            }
        } catch (\Exception $ex) {
            var_dump("⛔ [PDO] Exception: $ex->errorInfo", $Query . "<br>" . $ex->getMessage());
            exit;
        }
        return null;
    }

    public function update(array $array, bool $PasswortEmailUnterdruecken = false, bool $LastUpdatedIgnorieren = false)
    {
        $db = static::GetDB();
        $Query = "";
        try {
            $pdo = $db->getPDO();
            $values = "";
            foreach ($array as $Key => $Value) {
                if (is_bool($Value)) {
                    $Value = $Value ? 1 : 0;
                }
                $Key = str_replace("'", "", $Key);
                $Value = $pdo->quote($Value);
                $values .= "$Key = $Value, ";
            }
            if (strlen($values) >= 2) {
                $values = substr($values, 0, strlen($values) - 2);
            }

            if (!$LastUpdatedIgnorieren) {
                if (!array_key_exists("LastUpdated", $array)) {
                    $values .= ", LastUpdated = CURRENT_TIMESTAMP()";
                }
            }


            $Query = "UPDATE " . static::$tableName . " SET $values WHERE id='$this->id'";


            $statement = $pdo->prepare($Query);
            $ok = $statement->execute();
            if ($statement->errorCode() > 0 || !$ok) {
                return false;
            }
            return $statement->rowCount() ? true : false;

        } catch (\Exception $ex) {
            var_dump("⛔ [PDO] Exception: $ex->errorInfo", $Query . "<br>" . $ex->getMessage());
            exit;
        }

    }

    public function remove()
    {
        $db = static::GetDB();
        assert(is_numeric($this->id));
        $Query = "DELETE FROM " . static::$tableName . " WHERE id = '$this->id'";
        $db->query($Query);
        return $db->core->affected_rows ? true : false;
    }

}
