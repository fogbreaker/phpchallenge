<?php

namespace Models;

class Buch extends LHModel
{
    protected static string $tableName = "buecher";
    public string $Bezeichnung = "";
    public string $Autor = "";
    public int $Seitenanzahl = 0;
    public int $UserPid = -1;
    public int $Bewertung = 0;

}