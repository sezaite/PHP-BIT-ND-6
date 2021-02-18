<?php

echo '<br><br> PIRMAS UZD <br><br>';
// Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

$tekstas = 'laba diena';
function h1($tekstas){
    return $tekstas;
}

echo '<h1>' . h1($tekstas) . '</h1>';

echo '<br><br> dUu UZD <br><br>';
// Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

$tekstas = 'laba diena';
$tagas = rand(1, 6);
function tagoGeneratorius($tekstas, $tagas){
    return "<h$tagas>$tekstas</h$tagas>";
}

echo tagoGeneratorius($tekstas, $tagas);

echo '<br><br> tRys UZD <br><br>';
// Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo uždavinio funkciją ir preg_replace_callback();

$skaiciuTekstas = preg_replace_callback('/\D+/', "raidziuIsemimas", md5(time()));
$galutinisTekstas = preg_replace_callback('/\d+/', "pakeitimoFunkcija", $skaiciuTekstas);

function raidziuIsemimas($matches){
    return ' ';
}
function kitasTagoGeneratorius($tekstas){
    return $tekstas;
}
function pakeitimoFunkcija($matches){
    return '<h1>' . $matches[0] . '</h1>';
}

echo kitasTagoGeneratorius($galutinisTekstas);

echo '<br><br> keTuRi UZD <br><br>';
// Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;

$ponasSkaicius = 56.9;
function kiekSkaiciu($skaicius){
    if(($skaicius * 10) % 10 !== 0){
        echo 'argumentas turi buti sveikasis skaicius';
        return false;
    } else {
        $count = 0;
        for($i = 2; $i < $skaicius; $i++){
            if ($skaicius % $i === 0){
                $count++;
            }
        }
    }
    // return $skaicius . 'graziai dalijasi is: ' . $count . ' sveikuju skaiciu.'; <----------cia tik ketvirtam uzd 
    return $count;
}

echo kiekSkaiciu($ponasSkaicius);

echo '<br><br> 5UZD <br><br>';
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

for($i = 0; $i < 100; $i++){
    $masyvas[] = rand(33, 77);
}

usort($masyvas, function($a, $b){
    return kiekSkaiciu($b) <=> kiekSkaiciu($a);
});

echo '<pre>'; 
// print_r($masyvas); <======= ATKOMENTUOTI

echo '<br><br> 66U6ZD <br><br>';
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.

for($i = 0; $i < 100; $i++){
    $pirminiuMasyvas[] = rand(333, 777);
}

foreach($pirminiuMasyvas as $key => $skaicius){
    if (kiekSkaiciu($skaicius) < 0 ){
        unset($pirminiuMasyvas[$key]);
    }
}
_d($pirminiuMasyvas);