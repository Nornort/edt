<?php
require_once "../config.php";
require_once '../vendor/autoload.php';

date_default_timezone_set("UTC"); //google calendar gere l'heure d'été

use Curl\Curl;
use ICal\ICal;

$cache_path = "../cache/";
$cache_time = 20; //minutes

$classes = [
    [20866, 20870, 20869, 20868, 20867],//pet de A à E
    [20871, 20875, 20874, 20873, 20872] //pmp
];

$year = "2019";
            //0       1     2        3       4       5       6       7       8      9
$rooms = ["Z312", "Z313", "Z403", "Z404", "Z420", "Z510", "Z515", "Z517", "Z511", "Z305"];
$hours = ["10:30", "13:30", "16:00"]; //1-6: 0, 7-13: 1, 14-20: 2
$dates = ["09/17","09/24","10/01","10/08","10/15","10/22","11/05","11/12","11/19","11/26","12/03","12/10","12/17"];
$teachers = [
    "CO" => "Catharine Owen",
    "GL" => "Guy Little",
    "HC" => "Helen Chuzel",
    "LA" => "Lauren Ayotte",
    "AM" => "Annielle Mayousse",
    "NL" => "Naomi Lee",
    "VB" => "Véronique Béguin",
    "RC" => "Rosie Cox"
];

$english_groups = [
    // Prof, heure, salles
    1 => [ "CO", 0, [6, 1, 6, 3, 1, 6, 1, 6, 1, 6, 1, 6, 1]],
    2 => [ "HC", 0, [5, 0, 5, 9, 0, 5, 0, 5, 0, 5, 0, 5, 0]],
    3 => [ "LA", 0, []],
    4 => [ "AM", 0, [2, 8, 2, 2, 8, 2, 8, 2, 8, 2, 8, 2, 8]],
    5 => [ "VB", 0, []],
    6 => [ "GL", 0, []],

    7 => [ "CO", 1, []],
    8 => [ "HC", 1, []],
    9 => [ "NL", 1, []],
    10 => [ "AM", 1, []],
    11 => [ "RC", 1, []],
    12 => [ "VB", 1, []],
    13 => [ "GL", 1, []],

    14 => [ "CO", 2, []],
    15 => [ "HC", 2, []],
    16 => [ "NL", 2, []],
    17 => [ "AM", 2, []],
    18 => [ "RC", 2, []],
    19 => [ "VB", 2, []],
    20 => [ "GL", 2, []],
];

if (   !isset($_GET)
    || !in_array(strtolower($_GET["filiere"]), ["pet", "pmp"])
    || !in_array(strtolower($_GET["classe"]), range("a", "e"))
    || intval($_GET["lv1"]) > 20 || intval($_GET["lv1"]) < 1
    || intval($_GET["g"]) > 8    || intval($_GET["g"] < 1))
    // il y'a aussi $_GET["eps"] mais il est optionnel
{
    http_response_code(400);
    echo "400 bad request\n";
    print_r($_GET);
    die();
}

$filiere = strtolower($_GET["filiere"]);
$classe = strtolower($_GET["classe"]);
$lv1 = intval($_GET["lv1"]);
$group = intval($_GET["g"]);

function CurlURL($url) {
    $curl = new Curl();
    global $edt_user, $edt_pass;
    $curl->setBasicAuthentication($edt_user, $edt_pass);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
    $curl->get($url);

    if (!$curl->error) {
        return $curl->response;
    } else {
        die("curl: ". $curl->error_message);
    }
}

function getEDT($id) {
    global $cache_path, $cache_time;
    $file = $cache_path . $id . ".ics";
    $url = "https://edt.grenoble-inp.fr/directCal/2019-2020/phelma/etudiant/jsp/custom/modules/plannings/direct_cal.jsp?resources=";
    $url .= $id;

    if (file_exists($file) && filemtime($file) > (time() - 60 * $cache_time)) { //moins de $cache_time minutes
        //echo "from cache";
        return file_get_contents($file);
    } else { //plus -> on refresh le cache et on return
        //echo "refreshed";
        $ics = CurlURL($url);
        file_put_contents($file, $ics, LOCK_EX);
        return $ics;
    }
}

// on choppe l'index 0 ou 1 (pet ou pmp) puis l'index de 0 à 4 (a à e)
$edt_id = $classes[array_search($filiere, ["pet", "pmp"])][array_search($classe, range("a", "e"))];
$ics = getEDT($edt_id);

try {
    $ical = new ICal($ics, /*['defaultTimeZone'=>'UTC']*/);
    //var_dump($ical->events());
} catch (\Exception $e) {
    die("ical: ". $e);
}

function printevent($sum, $start, $end, $desc, $loc){
    $r =  "BEGIN:VEVENT\n";
    $r .= "SUMMARY:".     $sum  ."\n";
    $r .= "DTSTART:".     $start."\n";
    $r .= "DTEND:".       $end  ."\n";
    if (!empty($desc)) {
        $r .= "DESCRIPTION:". $desc ."\n";
    }
    $r .= "LOCATION:".    $loc  ."\n";
    $r .= "END:VEVENT\n";
    return $r;
}
/*
TODO: UNCOMMENT
header("Content-type: text/calendar");
header("Content-disposition: inline; filename=edt_{$filiere}{$classe}.ics");*/
?>
BEGIN:VCALENDAR
METHOD:REQUEST
PRODID:-//ADE/version 6.0 parsed
VERSION:2.0
CALSCALE:GREGORIAN
<?

foreach ($ical->events() as $e) {
    if (preg_match("/English/", $e->summary)) { // c'est un cours d'anglais, on le skip
        continue;
    }
    if (preg_match("/Math|Physique/", $e->summary)) { // c'est un cours de maths/physique
        $regex = "/_G". $group ."$/m";
        if (!preg_match($regex, $e->description)) { //ce n'est pas le bon groupe : on skip
            continue;
        }
    }
    if (preg_match("/Sportive/", $e->summary) && !isset($_GET["eps"])) { // on skip les cours d'eps par defaut
        continue;
    }
    echo printevent($e->summary, $e->dtstart, $e->dtend, $e->description, $e->location);
}

$e = $english_groups[$lv1];
foreach ($e[2] as $k => $v) {
    $datestring = "{$year}/{$dates[$k]}  {$hours[$e[1]]} Europe/Paris";
    if (strtotime($datestring) < time()) // skip les cours passés
        continue;
    $start = date("Ymd\THis\Z", strtotime($datestring));
    $end   = date("Ymd\THis\Z", strtotime($datestring . " + 2 hours"));
    //echo $start ." - ". $end ." - ". $rooms[$v] ." - ". $teachers[$e[0]] ."<br>";
    echo printevent("English PET-PMP S5", $start, $end, $teachers[$e[0]], $rooms[$v]);
}

?>
END:VCALENDAR
