<?php
require_once "../config.php";
require_once '../vendor/autoload.php';

date_default_timezone_set("UTC"); //google calendar gere l'heure d'été

use Curl\Curl;
use ICal\ICal;

if (   !isset($_GET)
    || !in_array(strtolower($_GET["filiere"]), ["pet", "pmp"])
    || !in_array(strtolower($_GET["classe"]), range("a", "e"))
    || intval($_GET["lv1"]) > $nb_groupes_lv1 || intval($_GET["lv1"]) < 1
    || intval($_GET["g"]) > $nb_groupes_maths || intval($_GET["g"] < 1)
    || intval($_GET["eps"]) > $nb_groupes_eps || intval($_GET["eps"] < 0))
{
    http_response_code(400);
    echo "400 bad request\n";
    print_r($_GET);
    die();
}

$filiere = strtolower($_GET["filiere"]);
$classe =  strtolower($_GET["classe"]);
$group_lv1 =   intval($_GET["lv1"]);
$group_maths = intval($_GET["g"]);
$group_eps =   intval($_GET["eps"]);

function printevent($sum, $start, $end, $desc, $loc){
    $r =  "BEGIN:VEVENT\n";
    $r .= "SUMMARY:".  $sum  ."\n";
    $r .= "DTSTART:".  $start."\n";
    $r .= "DTEND:".    $end  ."\n";
    if (!empty($desc)) {
        $r .= "DESCRIPTION:". $desc ."\n";
    }
    $r .= "LOCATION:". $loc  ."\n";
    $r .= "END:VEVENT\n";
    return $r;
}

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
    $url = 'https://edt.grenoble-inp.fr/directCal/2019-2020/phelma/etudiant/jsp/custom/modules/plannings/direct_cal.jsp?resources='. $id;

    if (file_exists($file) && filemtime($file) > (time() - 60 * $cache_time)) { //moins de $cache_time minutes
        return file_get_contents($file);
    } else { //plus -> on refresh le cache et on return
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

if (!isset($_GET["test"])) {
    header("Content-type: text/calendar");
    header("Content-disposition: inline; filename=edt_{$filiere}{$classe}.ics");
}
?>
BEGIN:VCALENDAR
METHOD:REQUEST
PRODID:-//edt.harraud.fr//Parser ADE 1A//FR
VERSION:2.0
CALSCALE:GREGORIAN
<?php
$reg_lv1 = '/_G'. $group_lv1 .'$/m';
$reg_maths = '/_G'. $group_maths .'$/m';
$reg_eps = '/_G'. $group_eps .'$/m';

foreach ($ical->events() as $e) {

    if (   (preg_match("/English/", $e->summary)       && !preg_match($reg_lv1,   $e->description))
        || (preg_match("/Math|Physique/", $e->summary) && !preg_match($reg_maths, $e->description))
        || (preg_match("/Sportive/", $e->summary)      && !preg_match($reg_eps,   $e->description))
        || $group_eps == 0)
        continue;

    echo printevent($e->summary, $e->dtstart, $e->dtend, $e->description, $e->location);
}
?>
END:VCALENDAR
