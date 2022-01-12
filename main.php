<h2>Разбиение и объединение ФИО</h2>
<?php

function getFullnameFromParts($name, $surname, $patronomyc)
{
    return $surname . ' ' . $name . ' ' . $patronomyc;
}

$fullname = getFullnameFromParts('Иван', 'Иванов', 'Иванович');

print_r('№1' . "<br />");
print_r($fullname);
print_r("<br />");
print_r("<br />");


function getPartsFromFullname($fullname)
{
    $partsFromFullname = explode(' ', $fullname);
    return ['surname' => $partsFromFullname[0], 'name' => $partsFromFullname[1], 'patronomyc' => $partsFromFullname[2]];
}

print_r('№2' . "<br />");
print_r(getPartsFromFullname($fullname));
print_r("<br />");
?>


<h2>Сокращение ФИО</h2>
<?php
function getShortName($fullname)
{
    $arrayFullName = getPartsFromFullname($fullname);
    return $arrayFullName['name'] . ' ' . mb_substr($arrayFullName['patronomyc'], 0, 1) . '.';
}

print_r('№3' . "<br />");
print_r(getShortName($fullname));
print_r("<br />");
?>



<?php // в основном для 4-ого задания
function getPersonsSet($example_persons_array)
{
    $persons = [];
    foreach ($example_persons_array as $i => $person) {
        $persons[++$i] = $person['fullname'];
    }
    return $persons;
}

$arrayOfPersons = getPersonsSet($example_persons_array);

function getGenderFromName($arrayOfPersons)
{
    $genderOfPersons = []; // для 5-ого задания

    foreach ($arrayOfPersons as $j => $person) {
        $arrayFullName = getPartsFromFullname($person);
        $heOrShe = 0;
        $gender = '';

        if (mb_substr($arrayFullName['patronomyc'], -3) === "вна") {
            $heOrShe--;
        }
        if (mb_substr($arrayFullName['name'], -1) === "а") {
            $heOrShe--;
        }
        if (mb_substr($arrayFullName['surname'], -2) === "ва") {
            $heOrShe--;
        }
        if (mb_substr($arrayFullName['patronomyc'], -2) === "ич") {
            $heOrShe++;
        }
        if (mb_substr($arrayFullName['name'], -1) === "й" or mb_substr($arrayFullName['name'], -1) === "н") {
            $heOrShe++;
        }
        if (mb_substr($arrayFullName['surname'], -1) === "в") {
            $heOrShe++;
        }

        if ($heOrShe > 0) {
            $gender = 'мужчина';
        } elseif ($heOrShe < 0) {
            $gender = 'женщина';
        } else {
            $gender = 'хз';
        }

        $genderOfPersons[$j++] = $gender; // для 5-ого задания

        print_r($person . ' скорее всего ' . "<b>" . $gender . "</b>" . "<br />");
        print_r("<br />");
    }
    return $genderOfPersons; // для 5-ого задания
}
?>


<h2>Функция определения пола по ФИО</h2>
<?php
print_r('№4' . "<br />");

$totalPeople = getGenderFromName($arrayOfPersons);
?>


<h2>Определение возрастно-полового состава</h2>
<?php
print_r('№5' . "<br />");

function getGenderDescription($totalPeople)
{
    $totalOfMan = array_filter($totalPeople, function ($man) {
        return $man == 'мужчина';
    });
    $totalOfWoman = array_filter($totalPeople, function ($woman) {
        return $woman == 'женщина';
    });
    $totalOfAnother = array_filter($totalPeople, function ($another) {
        return $another == 'хз';
    });

    $man = round((count($totalOfMan) / count($totalPeople) * 100), 1);
    $woman = round((count($totalOfWoman) / count($totalPeople) * 100), 1);
    $another = round((count($totalOfAnother) / count($totalPeople) * 100), 1);

    echo <<<HEREDOCLETTER
Гендерный состав аудитории:<br />
---------------------------<br />
Мужчины - $man<br />
Женщины - $woman<br />
Не удалось определить - $another<br />
HEREDOCLETTER;

    print_r("<br />");
    print_r("<br />");

    print_r('Гендерный состав аудитории:' . '<br />');
    print_r('---------------------------' . '<br />');
    print_r("Мужчины - " . round((count($totalOfMan) / count($totalPeople) * 100), 1) . '%' . '<br />');
    print_r("Женщины - " . round((count($totalOfWoman) / count($totalPeople) * 100), 1) . '%' . '<br />');
    print_r("Не удалось определить - " . round((count($totalOfAnother) / count($totalPeople) * 100), 1) . '%' . '<br />');
}

getGenderDescription($totalPeople);

?>


<h2>Идеальный подбор пары</h2>
<?php
print_r('№6' . "<br />");

$surnameLove = 'ИваНова';
$nameLove = 'Иваня';
$patronomycLove = 'ивановичвна';
$personLove = [];

function getPerfectPartner($surnameLove, $nameLove, $patronomycLove)
{
    $fullnameLove = ((mb_convert_case(getFullnameFromParts($surnameLove, $nameLove, $patronomycLove), MB_CASE_TITLE_SIMPLE)));
    $personLove[] = $fullnameLove;
    if (getGenderFromName($personLove)[0] === 'мужчина') {
        print_r('ищем бабу!!!');
    } elseif (getGenderFromName($personLove)[0] === 'женщина') {
        print_r('ищем мужика!!!');
    } else {
        print_r('повезёт в следующий раз...');
    }
}

getPerfectPartner($surnameLove, $nameLove, $patronomycLove,);
?>