<h2 style="color:rgb(0, 200, 255); padding-left:80px;">***** FUNKCIJOS ****** </h2>
<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 1 ****** </h3>

<?php
echo '<br>';
echo 'Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą. <br><br>';

$text = 'Lorem ipsum is a dummy text used in print, graphic or web designs.';
function tekstas($text)
{
    return "<h1>$text</h1>";
};
echo tekstas($text);

?>


<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 2 ****** </h3>
<?php
echo '<br>';
echo 'Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, <br>
o antrasis tago numeris (1-6). <br>
Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją. <br><br>';

$text2 = 'Some Lorem Ipsum random size.';
$hTagNum = rand(1, 6);
echo "H Tag number is random, right now it is: $hTagNum";

function tekstas2($text2, $hTagNum)
{
    return "<h$hTagNum>$text2</h$hTagNum>";
};
echo tekstas2($text2, $hTagNum);

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 3 ****** </h3>
<?php
echo '<br>';
echo 'Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). <br>
Visus skaitmenis stringe įdėkite į h1 tagą. <br>
Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu <br>
(h1 atsidaro prieš pirmą ir užsidaro po paskutinio) <br>
Keitimui naudokite pirmo uždavinio funkciją ir preg_replace_callback(). <br><br>';

echo 'MD5 hash - taking a string of an any length and encoding it into a 128-bit hash output <br>';
echo 'preg_replace_callback — Perform a regular expression search and replace using a callback <br>';
echo ' time() funkcija generuoja sekundziu kieki nuo 70-uju<br>';

$randomString = md5(time());
echo "<br><br><b>Sugeneruojame atsitiktinį 'hash' numerį:</b><br>";
echo $randomString . '<br><br>';

// VIENAS SRENDIMO BUDAS
// $numText = preg_replace_callback('/\D+/', "letterRemoval", $randomString);
// $finalText = preg_replace_callback('/\d+/', "letterShift", $numText);

// function letterRemoval($matches){
//     return ' '; 
// }

// function tagGenerating($text){
//     return $text;
// }

// function letterShift($matches) {
//     return '<h1>'.$matches[0].'</h1>';
// }

// echo tagGenerating($finalText);

function h1($text){
    if(is_array($text)) {
        $text = $text[0];
    }
    return '<h1 style = "display:inline;">'.$text. '</h1>';
}

$pakeistasKodas = preg_replace_callback('/\d+/', function($match){
    _d($match);
    return h1($match[0]);
}, $randomString );

echo "<br><br><b> Visu skaicius sudedame į h1, o raidės lieka, kaip buvusios </b><br>";
echo $pakeistasKodas;

//****************/
$pakeistasKodas = preg_replace_callback('/\d+/', function($match){
    _d($match);
    return '<h1 style = "display:inline;">'.$match[0]. '</h1>';
 
}, $randomString );

echo '<br> Kitas užrašymas <br>';
echo $pakeistasKodas;
echo '<br>    <br>';

 
?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 4 ****** </h3>
<?php
echo '<br>';
echo 'Parašykite funkciją, kuri skaičiuotų,  iš kiek sveikų skaičių jos argumentas dalijasi be liekanos <br>
(išskyrus vienetą ir patį save) <br>
Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių. <br>';

function pirminiaiSkaiciai(int $number) {
    $dviders = []; 
    global $dividers; // importavimui del syntax

    for ($i = 2; $i < $number; $i++) { // 2 nes negali dalintis is 1 ir pacio saves
        if ($number % $i == 0) {
            $dividers++;
            //    echo $i. '<br>'; // dalikliai is kuriu dalinasi skaicius be liekanos;
        }
    }
    return $dividers;
}

echo "<br><b>  Sveiki skaičiai, kurie dalinasi iš funkcijoje įrašyto skaičiaus (kurio čia nesimato):</b><br>";
echo pirminiaiSkaiciai(60);
echo "<br> <br>";
// echo $dividers;

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 5 ****** </h3>
<?php
echo '<br>';
echo 'Sugeneruokite masyvą iš 100 elementų, <br>
kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. <br>
Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka,<br>
panaudodami ketvirto uždavinio funkciją. <br>';

$array = [];

foreach (range(1, 10) as $_) {
    $array[] = rand(33, 77);
}

// print_r($array);
usort($array, function ($a, $b) {
    return pirminiaiSkaiciai($b) <=> pirminiaiSkaiciai($a);
});

echo '<pre>';
print_r($array);
echo '</pre>';

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 6 ****** </h3>
<?php
echo '<br>';
echo 'Sugeneruokite masyvą iš 100 elementų, <br>
kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. <br>
Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius. <br>';

$array6 = [];

foreach (range(1, 10) as $_) {
    $array6[] = rand(333, 777);
}
echo '<pre>';
echo 'masyvas pirminis <br>';
print_r($array6);
echo '</pre>';

$ilgis = count($array6);

for ($i = 0; $i < $ilgis; $i++) {
    // if (pirminiaiSkaiciai($array6[$i]) == 0) {
    if (pirminiaiSkaiciai($array6[$i]) == 0) {
        unset($array6[$i]); //istrina viska
    }
}
echo '<pre>';
echo 'masyvas po istrynimo <br>';
print_r($array6);
echo '</pre>';



/*  
$array2 = [];

for ($i=0; $i < 100; $i++) {​​ 
    $array2[] = rand(333, 777);     

}​​
echo 'Before removal';
_dc($array2);

foreach ($array2 as $key => &$value) {​​
    if (countDividers($value)['count'] === 0) {​​ 
        unset($array2[$key]);
    }​​
}​​
echo 'After removal';
_dc($array2);

unset($key, $value);

*/

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 7 ****** </h3>
<?php
echo '<br>';
echo 'Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą,<br>
 kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, <br>
 o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. <br>
 Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. <br>
 Paskutinio masyvo paskutinis elementas yra lygus 0.<br>';

 $rand = rand(10, 30);

function generateFunction($rand) {
    $num1 = rand(10, 20);
    for ($i = 0; $i < $num1; $i++) {
        if ($i < $num1 - 1) {
            $array7[$i] = rand(10, 20);
        } else {
            if($rand > 0) {
                    $array7[$i] = generateFunction($rand - 1);
            } else {
                $array7[] = 0;
            }
        }
    }
return $array7; 
}


echo '<pre>';
echo '<br>';
print_r (generateFunction($rand));
// print_r($array7);
echo '</pre>';

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 8 ****** </h3>
<?php
echo '<br>';
echo 'Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą. <br>';



?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 9 ****** </h3>
<?php
echo '<br>';
echo 'Sugeneruokite masyvą iš trijų elementų,  
<br> kurie yra atsitiktiniai skaičiai nuo 1 iki 33.  <br>
Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius,  <br>
prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33.  <br>
Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą.  <br>
Kartokite, kol sąlyga nereikalaus pridėti elemento. <br>';

function isPrime($num){
    if(0 ==$num || 1==$num) return false;
    if (2 == $num) return true;
    for ($i=2; $i < $num ; $i++) { 
        if ($num % $i ==0) return false; 
        }
        return true;
    }

for ($i=0; $i < 3 ; $i++) { 
    $array9[$i] = rand(1, 33);
}

    while (isPrime($array9[count($array9)-1]) || isPrime($array9[count($array9)-2]) || isPrime($array9[count($array9)-3]) ) {
        $array9[] = rand(1, 33);
}

echo '<pre>';
echo '<br>';
print_r ($array9);
echo '</pre>';

?>

<h3 style="color:rgb(0, 200, 255); padding-left:80px;">***** ND 10 ****** </h3>
<?php
echo '<br>';
echo 'Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų,  <br>
kurie yra atsitiktiniai skaičiai nuo 1 iki 100.  <br>
Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70,  <br>
suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3.  <br>
Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite.  <br>';

?>