<?php

echo '<br><br> PIRMAS UZD <br><br>';
// Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function h1($tekstas){
    return '<h1>' . $tekstas . '</h1>';
}

echo h1('laba diena');

echo '<br><br> dUu UZD <br><br>';
// Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

function tagoGeneratorius($tekstas, $tagas){
    return "<h$tagas>$tekstas</h$tagas>";
}

echo tagoGeneratorius('laba diena', rand(1, 6));

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
        for($i = 1; $i <= $skaicius; $i++){
            if ($skaicius % $i === 0){
                $count++;
            }
        }
    }
    // return $skaicius . 'graziai dalijasi is: ' . $count . ' sveikuju skaiciu.'; <----------cia tik ketvirtam uzd 
    return $count;
} ////jei nori demostruoti tik kaip ketvirta uzdavini, tai parasyk for'e i=2 ir istrink '='. nes cia kitiems uzdaviniams pakeista

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

foreach($pirminiuMasyvas as $key => &$skaicius){
    if (kiekSkaiciu($skaicius) < 1) {
        unset($pirminiuMasyvas[$key]);
    }
}
print_r($pirminiuMasyvas);
echo 'ilgis be pirminiu skaiciu: ' . count($pirminiuMasyvas);

echo '<br><br> 7U7ZD7-7 <br><br>';
// Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;

$iteracijuSkaicius = rand(10, 30);
$masyvoIlgis = rand(10, 20);
$iteracijuSkaiciavimas = 0; //gal sita galeciau pakeisti statiniu f-jso viduje?

$masyvasRec = (masyvoKurimas($masyvoIlgis, $iteracijuSkaiciavimas, $iteracijuSkaicius));
// print_r($masyvasRec); <=== spausdina masyva

function masyvoKurimas($masyvoIlgis, &$iteracijuSkaiciavimas, $iteracijuSkaicius){
    $iteracijuSkaiciavimas++;
    for ($i = 0; $i < $masyvoIlgis - 1; $i++) {
        $masyvasRec[] = rand(0, 10);
    }
    $iteracijuSkaiciavimas < $iteracijuSkaicius ? $masyvasRec[] = masyvoKurimas($masyvoIlgis, $iteracijuSkaiciavimas, $iteracijuSkaicius) : $masyvasRec[] = 0;
    return $masyvasRec;
}

echo '<br><br> 8U8z*D8-8 <br><br>';
// Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.

$sumosSumeles = 0;
print_r(masyvasRecSuma($masyvasRec, $sumosSumeles));

function masyvasRecSuma($masyvasRec, &$sumosSumeles){
foreach($masyvasRec as $key => &$value){
    is_array($value) ? masyvasRecSuma($value, $sumosSumeles) : $sumosSumeles+= $key;
    }
    unset($value);
    return $sumosSumeles;

}

echo '<br><br> devintas <br><br>';
// Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

for($i = 0; $i < 3; $i++){
    $masyvas9[] = rand(1, 33);
}

function isPirminiai($masyvas9) {
    $masyvoIlgis = count($masyvas9);
    for ($i = $masyvoIlgis - 3; $i < $masyvoIlgis; $i++){
        if(kiekSkaiciu($masyvas9[$i]) > 2){
            $masyvas9[] = rand(1, 33);
            return isPirminiai($masyvas9); ///kokiu atveju cia reikia return rasyt??? ciuju visais :D
        }
    } return $masyvas9;
}

print_r(isPirminiai($masyvas9));

echo '<br><br> 10/10.10 <br><br>';
// Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. 

for($i = 0; $i < 10; $i++){
    for ($j = 0; $j < 10; $j++){
        $masyvas10[$i][$j] = (rand(1, 100));
    }  
}

function pirminiuSurinkimas($masyvas10){
    $maziausias = $masyvas10[0][0];
    foreach($masyvas10 as $key => $miniMasyvas){ 
        foreach($miniMasyvas as $miniKey => &$value){
            if (kiekSkaiciu($value) < 3) $pirminiuArr[] = $value;
            if ($value < $maziausias) $maziausias = $value;
        }
    }
        unset($value);
        return (array_sum($pirminiuArr) / count($pirminiuArr) < 70) ? pridetiTris($masyvas10, $maziausias) : 'pagaliau vidurkis yra: ' . (array_sum($pirminiuArr) / count($pirminiuArr)); 
}
//uzluzta, jei minimasyvas neturi ampersando. virsutinis nereikalauja. kodel?
function pridetiTris($masyvas10, $maziausias){
    foreach($masyvas10 as &$miniMasyvas){ 
        foreach($miniMasyvas as &$value){
            if ($value === $maziausias){
                $value += 3;
                unset($value);
                unset($miniMasyvas);             
                return pirminiuSurinkimas($masyvas10);
            }         
        }
    }
}

echo pirminiuSurinkimas($masyvas10);