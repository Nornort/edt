<!-- Code dégueu pour ingénieur averti... -->
<title>EDT Phelma perso</title>

<style>
table {
    margin: auto;
    font-family: Verdana, Geneva;
    width: 600px;
}
</style>

<form action="">

<table>
    <tr><td colspan="2" style="text-align: center"> <h3>EDT Phelma perso</h3></td></tr>

    <tr>
        <td colspan="2">
            <input type="text" id="url" style="width:500px"><button class="copy" data-clipboard-target="#url">Copier</button>
        </td>
    </tr>

    <tr>
        <td>
            Filière :
        </td>
        <td>
            <label for="pet"><input type="radio" name="filiere" value="pet" id="pet"> PET</label><br>
            <label for="pmp"><input type="radio" name="filiere" value="pmp" id="pmp"> PMP</label>
        </td>
    </tr>

    <tr>
        <td>
            Classe :
        </td>
        <td>
            <? foreach (range("a", "e") as $v) {
                echo "<label for=\"{$v}\"><input type=\"radio\" name=\"classe\" value=\"{$v}\" id=\"{$v}\"> ". strtoupper($v) ."</label>\n";
            } ?>
        </td>
    </tr>

    <tr>
        <td>
            <label for="g"> Groupe de maths :
            </label>
        </td>
        <td>
            <select name="g" id="g">
                <option value="">--</option>
            <? for ($i=1; $i <= 8; $i++) {
                        echo "<option value=\"{$i}\">{$i}</option>\n";
            } ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            <label for="lv1"> Groupe d'anglais :
            </label>
        </td>
        <td>
            <select name="lv1" id="lv1">
                <option value="">--</option>
            <? for ($i=1; $i <= 20; $i++) {
                        echo "<option value=\"{$i}\">{$i}</option>\n";
            } ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            <label for="eps">Afficher l'EPS :
            </label>
        </td>
        <td>
            <input type="checkbox" name="eps" id="eps">
        </td>
    </tr>

    <tr>
        <td colspan="2"><br>Marre de voir les cours d'anglais, de maths, de physique et de sport de tout le monde dans ton edt ?
            marre de devoir chercher la salle sur tous ces evenements ? alors il est temps de changer d'EDT. <br><br>
        </td>
    </tr>

    <tr>
        <td colspan="2">Une intervalle de synchro d'1 heure semble largement suffisante<br>
            Il y'a un cache interne de 20min (Je veux pas me faire bannir d'ADE)
        </td>
    </tr>

    <tr>
        <td colspan="2">Garder un EDT original d'ADE peut etre une bonne idée, on est pas a l'abri d'une panne, d'un oubli ou d'une erreur de ma part. <br>
            <span style="font-size: 10px; font-style: oblique;">THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND</span>
        </td>
    </tr>

    <tr>
        <td>Un bug, une réclam, ou autre :</td>
        <td><a href="https://m.me/plharraud" target="blank"><img src="pl.jpg" alt="messenger" style="width:120px"></a></td>
    </tr>
</table>

</form>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

<script>
form = document.getElementsByTagName("form")[0];
url = document.getElementById("url");
options = {}

document.addEventListener("submit", e => {
    e.preventDefault();
})

document.addEventListener("change", e => {
    //console.log(e)

    if(e.target.type == "checkbox") {
        if (!e.target.checked) {
            delete options[e.target.name]
        } else {
            options[e.target.name] = 1
        }
    } else {
        options[e.target.name] = e.target.value
    }

    params = ""
    for (let k in options) {
        params += encodeURIComponent(k) + "=" + encodeURIComponent(options[k]) + "&"
    }
    url.value = "https://edt.harraud.fr/edt?" + params.slice(0, -1)

    //console.log(options)
})
new ClipboardJS('.copy');
</script>