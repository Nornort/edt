<!-- Code dégueu pour ingénieur averti... -->
<title>EDT Phelma perso</title>
<meta charset="utf-8">
<style>
table {
    margin: auto;
    font-family: Verdana, Geneva;
    width: 600px;
}
</style>

<form action="">

<table>
    <tr><td colspan="2" style="text-align: center"><h3>EDT perso 1A</h3></td></tr>

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
            <?php foreach (range("a", "e") as $v) {
                echo "<label for=\"{$v}\"><input type=\"radio\" name=\"classe\" value=\"{$v}\" id=\"{$v}\"> ". strtoupper($v) ."</label>\n";
            } ?>
        </td>
    </tr>

    <tr>
        <td>
            <label for="g"> Groupe de maths :</label>
        </td>
        <td>
            <select name="g" id="g">
                <option value="">--</option>
            <?php for ($i=1; $i <= 8; $i++) {
                        echo "<option value=\"{$i}\">{$i}</option>\n";
            } ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            <label for="lv1"> Groupe d'anglais :</label>
        </td>
        <td>
            <select name="lv1" id="lv1">
                <option value="">--</option>
            <?php for ($i=1; $i <= 20; $i++) {
                        echo "<option value=\"{$i}\">{$i}</option>\n";
            } ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            <label for="eps">Groupe d'EPS :</label>
        </td>
        <td>
            <select name="eps" id="eps">
                <option value="">--</option>
                <option value="0">Cacher</option>
                <option value="1">10h15</option>
                <option value="2">13h30</option>
                <option value="3">15h45</option>
            </select>
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
        <td colspan="2">Garder un EDT original d'ADE peut etre une bonne idée, je ne suis pas a l'abri d'une panne serveur, ou d'une erreur.<br>
            <span style="font-size: 10px; font-style: oblique;">THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND</span>
        </td>
    </tr>

    <tr>
        <td colspan="2">Un bug, une réclam, ou autre :
            <a href="https://m.me/plharraud" target="blank"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGlkPSJTb2NpYWxfSWNvbnMiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDEyOCAxMjgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJfeDM0X19zdHJva2UiPjxnIGlkPSJGYWNlYm9va19NZXNzZW5nZXJfMV8iPjxyZWN0IGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBoZWlnaHQ9IjEyOCIgd2lkdGg9IjEyOCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTcwLjM2LDc5LjgwMkw1NC4wNjIsNjIuNDIgICAgTDIyLjI2MSw3OS44MDJsMzQuOTgxLTM3LjEzNmwxNi42OTYsMTcuMzgzbDMxLjQwNC0xNy4zODNMNzAuMzYsNzkuODAyeiBNNjQsMEMyOC42NTQsMCwwLDI2LjUzMSwwLDU5LjI1OSAgICBjMCwxOC42NDksOS4zMDcsMzUuMjgzLDIzLjg1MSw0Ni4xNDZWMTI4bDIxLjc5MS0xMS45NmM1LjgxNiwxLjYwOSwxMS45NzcsMi40NzgsMTguMzU4LDIuNDc4YzM1LjM0NiwwLDY0LTI2LjUzMSw2NC01OS4yNTkgICAgUzk5LjM0NiwwLDY0LDB6IiBmaWxsPSIjMDA3RkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJGYWNlYm9va19NZXNzZW5nZXIiLz48L2c+PC9nPjwvc3ZnPg==" alt="messenger" style="width:20px"></a>
            <a href="https://github.com/plharraud/edt" target="blank"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTI5Ni4xMzMsMzU0LjE3NGM0OS44ODUtNS44OTEsMTAyLjk0Mi0yNC4wMjksMTAyLjk0Mi0xMTAuMTkyICAgYzAtMjQuNDktOC42MjQtNDQuNDQ4LTIyLjY3LTU5Ljg2OWMyLjI2Ni01Ljg5LDkuNTE1LTI4LjExNC0yLjczNC01OC45NDdjMCwwLTE4LjEzOS01Ljg5OC02MC43NTksMjIuNjY5ICAgYy0xOC4xMzktNC45ODMtMzguMDktOC4xNjMtNTYuNjgyLTguMTYzYy0xOS4wNTMsMC0zOS4wMTEsMy4xOC01Ni42OTcsOC4xNjNjLTQzLjA4Mi0yOC41NjctNjEuMjItMjIuNjY5LTYxLjIyLTIyLjY2OSAgIGMtMTIuMjQxLDMwLjgzMy00Ljk4Myw1My4wNTctMi43MTgsNTguOTQ3Yy0xNC4wNjEsMTUuNDItMjIuNjc3LDM1LjM3OS0yMi42NzcsNTkuODY5YzAsODYuMTYzLDUzLjA1NywxMDQuMzAxLDEwMi45NDIsMTEwLjE5MiAgIGMtNi4zNDQsNS40NTItMTIuMjQxLDE1Ljg3My0xNC41MDcsMzAuMzg3Yy0xMi43MDIsNS40MzgtNDUuODA4LDE1Ljg3My02NS43NTgtMTguNTkyYzAsMC0xMS43OTUtMjEuMzEtMzQuMDEyLTIyLjY2OSAgIGMwLDAtMjIuMjI0LTAuNDUzLTEuODEzLDEzLjU5MmMwLDAsMTQuOTYsNi44MTIsMjQuOTQzLDMyLjY1M2MwLDAsMTMuNiw0My4wODksNzYuMTc5LDI5LjQ4djM4LjU0MyAgIGMwLDUuOTA2LTQuNTMsMTIuNzAyLTE1Ljg2NSwxMC44OUM5Ni4xMzksNDM4Ljk3NywzMi4yLDM1NC42MjYsMzIuMiwyNTUuNzdjMC0xMjMuODA3LDEwMC4yMTYtMjI0LjAyMiwyMjQuMDMtMjI0LjAyMiAgIGMxMjMuMzQ3LDAsMjI0LjAyMywxMDAuMjE2LDIyMy41NywyMjQuMDIyYzAsOTguODU2LTYzLjk0NiwxODIuNzU0LTE1Mi44MjgsMjEyLjY4OGMtMTEuMzQyLDIuMjY2LTE1Ljg3My00LjUzLTE1Ljg3My0xMC44OSAgIFYzOTUuNDVDMzExLjEsMzc0LjU3NywzMDQuMjg4LDM2MC45ODUsMjk2LjEzMywzNTQuMTc0TDI5Ni4xMzMsMzU0LjE3NHogTTUxMiwyNTYuMjNDNTEyLDExNC43MywzOTcuMjYzLDAsMjU2LjIzLDAgICBDMTE0LjczLDAsMCwxMTQuNzMsMCwyNTYuMjNDMCwzOTcuMjYzLDExNC43Myw1MTIsMjU2LjIzLDUxMkMzOTcuMjYzLDUxMiw1MTIsMzk3LjI2Myw1MTIsMjU2LjIzTDUxMiwyNTYuMjN6IiBmaWxsPSIjMEQyNjM2IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L2c+PC9zdmc+" alt="github" style="width:20px"></a>
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150664246-1"></script>
<script>
form = document.getElementsByTagName("form")[0];
url = document.getElementById("url");
options = {};

document.addEventListener("submit", e => {
    e.preventDefault();
});

document.addEventListener("change", e => {
    options[e.target.name] = e.target.value;

    let params = "";
    for (let k in options) {
        params += encodeURIComponent(k) + "=" + encodeURIComponent(options[k]) + "&"
    }
    url.value = window.location.href + "edt?" + params.slice(0, -1)
});

new ClipboardJS('.copy');

window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-150664246-1');
</script>
