<?php

require_once "../config.php";
require_once '../vendor/autoload.php';

date_default_timezone_set("UTC");

use Curl\Curl;
use ICal\ICal;

$classes = [
    [20866, 20870, 20869, 20868, 20867],//pet de A à E
    [20871, 20875, 20874, 20873, 20872] //pmp
];

$year = "2019";
            //0       1     2        3       4       5       6       7       8
$rooms = ["Z312", "Z313", "Z403", "Z404", "Z420", "Z510", "Z515", "Z517", "Z511"];
$hours = ["10:15", "13:30", "16:00"]; //1-6: 0, 7-13: 1, 14-20: 2
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
    1 => [ "CO", 0,  [6, 1, 6, 3, 1, 6, 1, 6, 1, 6, 1, 6, 1]],
    4 => [ "AM", 0, [2, 8, 2, 2, 8, 2, 8, 2, 8, 2, 8, 2, 8]]
];

if (   !isset($_GET)
    || !in_array(strtolower($_GET["filiere"]), ["pet", "pmp"])
    || !in_array(strtolower($_GET["classe"]), range("a", "e"))
    || intval($_GET["lv1"]) > 20 || intval($_GET["lv1"]) < 1)
{
    http_response_code(400);
    die();
}

$filiere = strtolower($_GET["filiere"]);
$classe = strtolower($_GET["classe"]);
$lv1 = intval($_GET["lv1"]);

// on choppe l'index 0 ou 1 (pet ou pmp) puis l'index de 0 à 4 (a à e)
$edt_id = $classes[array_search($filiere, ["pet", "pmp"])][array_search($classe, range("a", "e"))];
$edt_url = "https://edt.grenoble-inp.fr/directCal/2019-2020/phelma/etudiant/jsp/custom/modules/plannings/direct_cal.jsp?resources={$edt_id}";


$curl = new Curl();
$curl->setBasicAuthentication($edt_user, $edt_pass);
$curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
$curl->get($edt_url);

if (!$curl->error) {
    $ics = $curl->response;
} else {
    die($curl->error_message);
}

try {
    $ical = new ICal($ics, /*['defaultTimeZone'=>'UTC']*/);
    //var_dump($ical->events());
} catch (\Exception $e) {
    die($e);
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

//header("Content-type: text/calendar");
header("Content-disposition: inline; filename=edt.ics");
?>
BEGIN:VCALENDAR
METHOD:REQUEST
PRODID:-//ADE/version 6.0 parsed
VERSION:2.0
CALSCALE:GREGORIAN
<?

foreach ($ical->events() as $e) {
    if (!preg_match("/English/", $e->summary)) {
        echo printevent($e->summary, $e->dtstart, $e->dtend, $e->description, $e->location);
    }
}

$e = $english_groups[$lv1];
foreach ($e[2] as $k => $v) {
    $datestring = "{$year}/{$dates[$k]}  {$hours[$e[1]]} Europe/Paris";
    $start = date("Ymd\THis\Z", strtotime($datestring));
    $end   = date("Ymd\THis\Z", strtotime($datestring . " + 2 hours"));
    //echo $start ." - ". $end ." - ". $rooms[$v] ." - ". $teachers[$e[0]] ."<br>";
    echo printevent("English PET-PMP S5", $start, $end, $teachers[$e[0]], $rooms[$v]);
}

?>
END:VCALENDAR
