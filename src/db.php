<?php
declare(strict_types=1); //Ieslēdz stringo datu tipu pārbaudi

//DB savienojuma izveidošanas funkcija
//PDO - PHP Data Objects - PHP datu objektu sistēma, kas nodrošina vienotu pieeju dažādām datubāzēm. Ar PDO var darboties ar 12 dažāda veida datubāzēm.

//DB konfigurāciju nolasīsim no config/database.php faila
function getPDO(): PDO {
    static $pdo = null; //Statiskā mainīgā vērtība saglabājas starp funkcijas izsaukumiem
    if ($pdo instanceof PDO) {
        return $pdo; //Ja savienojums jau ir izveidots, no jauna neveido un izmanto esošo
    }

    $cfgPath = dirname(__DIR__) . '/config/database.php'; //dirname(__DIR__) - atgriež augstākā līmeņa direktoriju ceļu
    if (!is_readable($cfgPath)) { //Pārbauda, vai fails ir nolasāms
        throw new RuntimeException("Nevar nolasīt DB konfigfurācijas failu: $cfgPath"); //Izmet kļūdu (izņēmumu), ja nevar failu nolasīt
    }

    $cfg = require $cfgPath; //Ielādē datus no konfigurācijas faila kā masīvu
    //Savienojuma iestatījumi
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Kļūdu režīms - izmet izņēmumu
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Noklusējuma datu iegūšanas režīms - asociatīvais masīvs
        PDO::ATTR_EMULATE_PREPARES => false //Izslēdz sagatavoto vaicājumu emulāciju - izmantos reālos sagatavotos vaicājumus
    ];

    //Izveidojam savienojumu
    $pdo = new PDO($cfg['dsn'], $cfg['username'], $cfg['password'], $options);
    return $pdo;
}