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
        <td colspan="2"><hr>Marre de voir les cours d'anglais, de maths, de physique et de sport de tout le monde dans ton edt ?
            marre de devoir chercher la salle sur tous ces evenements ? alors il est temps de changer d'EDT. <br><br>
        </td>
    </tr>

    <tr>
        <td colspan="2">Une intervalle de synchro d'1 heure semble largement suffisante<br>
            Il y'a un cache interne de 20min (Je veux pas me faire bannir d'ADE)
        </td>
    </tr>

    <tr>
        <td colspan="2">Garder un EDT original d'ADE peut etre une bonne idée, je ne suis pas a l'abri d'une panne, ou d'une erreur. <br>
            <span style="font-size: 10px; font-style: oblique;">THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND</span>
        </td>
    </tr>

    <tr>
        <td colspan="2">Un bug, une réclam, ou autre :
            <a href="https://m.me/plharraud" target="blank">
                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGlkPSJTb2NpYWxfSWNvbnMiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDEyOCAxMjgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJfeDM0X19zdHJva2UiPjxnIGlkPSJGYWNlYm9va19NZXNzZW5nZXJfMV8iPjxyZWN0IGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBoZWlnaHQ9IjEyOCIgd2lkdGg9IjEyOCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTcwLjM2LDc5LjgwMkw1NC4wNjIsNjIuNDIgICAgTDIyLjI2MSw3OS44MDJsMzQuOTgxLTM3LjEzNmwxNi42OTYsMTcuMzgzbDMxLjQwNC0xNy4zODNMNzAuMzYsNzkuODAyeiBNNjQsMEMyOC42NTQsMCwwLDI2LjUzMSwwLDU5LjI1OSAgICBjMCwxOC42NDksOS4zMDcsMzUuMjgzLDIzLjg1MSw0Ni4xNDZWMTI4bDIxLjc5MS0xMS45NmM1LjgxNiwxLjYwOSwxMS45NzcsMi40NzgsMTguMzU4LDIuNDc4YzM1LjM0NiwwLDY0LTI2LjUzMSw2NC01OS4yNTkgICAgUzk5LjM0NiwwLDY0LDB6IiBmaWxsPSIjMDA3RkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJGYWNlYm9va19NZXNzZW5nZXIiLz48L2c+PC9nPjwvc3ZnPg==" alt="messenger" style="width:20px">
            </a>
        </td>
    </tr>

    <tr>
        <td style="text-align: center;" colspan="2">
            Avant/après <br>
            <img src="ba.png" alt="avant/après" style="margin:auto;width:500px">
        </td>
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