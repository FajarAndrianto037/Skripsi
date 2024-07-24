<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script>
$(document).ready(function() {

    $('#input').keyup(function() { //saat ngetik langsung terjemah
        translate();
    });

    $('#bahasa').change(function() { //saat bahasa diubah langsung terjemahkan
        translate();
    });

    $('#tingkat').change(function() { //saat tingkat diubah langsung terjemahkan
        translate();
    });

});

function translate() {
    var kal = document.getElementById('input').value;
    var bahasa = document.getElementById('bahasa').value;
    var tingkat = document.getElementById('tingkat').value;

    document.getElementById('terjemahan').innerHTML = "<font color='red'><blink>Sedang Menerjemahkan...</blink></font>";

    if (bahasa != '1') {
        $('#terjemahan').load('madura-indonesia.php', 'kalimat=' + kal);
    } else {
        $('#terjemahan').load('indonesia-madura.php', 'kalimat=' + kal + '&tingkat=' + tingkat);
    }
}
</script>

<script type="text/javascript">
function cek_bahasa() {
    var pil = document.getElementById("bahasa").value
    if (pil == 2) {
        document.getElementById("tingkat").disabled = true
    } else {
        document.getElementById("tingkat").disabled = false
    }
}
</script>
<table width="70%" border="0" align="center">
    <tr>
        <td colspan="3">Masukkan Kalimat</td>
    </tr>
    <form action="" method="post" onsubmit="return false">
        <tr align="center">
            <td colspan="3">
                <textarea name="kalimat" cols="70" rows="5"
                    id="input"><?php echo stripslashes($_POST['kalimat']);?></textarea>
                <input type="button" onclick="karakter_e()" value="karakter &egrave;" />
                <input type="button" onclick="karakter_a()" value="karakter &acirc;" />
                <script>
                function karakter_e() {
                    teks = document.getElementById("input").value
                    document.getElementById("input").value = teks + "è"
                    document.getElementById("input").focus()
                    return false
                }

                function karakter_a() {
                    teks = document.getElementById("input").value
                    document.getElementById("input").value = teks + "â"
                    document.getElementById("input").focus()
                    return false
                }
                </script>

                <hr />
            </td>
        </tr>
        <tr>

            <td>Terjemahan :
                <select name="bahasa" id="bahasa" onchange="cek_bahasa()">
                    <?php if($_POST['bahasa']==1 || $_POST['bahasa']==""){ ?>
                    <option value="1" selected="selected">Indonesia-Madura</option>
                    <option value="2">Madura-Indonesia</option>
                    <?php }else{?>
                    <option value="1">Indonesia-Madura</option>
                    <option value="2" selected="selected">Madura-Indonesia</option>
                    <?php } ?>
                </select>

            <td>Tingkatan :
                <select name="tingkat" id="tingkat">
                    <?php if($_POST['tingkat']==1 || $_POST['tingkat']==""){ ?>
                    <option value="1" selected="selected">Enje'-Iyah</option>
                    <option value="2">Engghi-Enten</option>
                    <option value="3">Engghi-Bhunten</option>
                    <?php }elseif($_POST['tingkat']==2){?>
                    <option value="1">Enje'-Iyeh</option>
                    <option value="2" selected="selected">Engghi-Enten</option>
                    <option value="3">Engghi-Bhunten</option>
                    <?php }else{ ?>
                    <option value="1">Enje'-Iyeh</option>
                    <option value="2">Engghi-Enten</option>
                    <option value="3" selected="selected">Engghi-Bhunten</option>
                    <?php } ?>
                </select>
            </td>


        </tr>
    </form>

    <tr>
        <td colspan="3">
            <hr />
            <fieldset>
                <legend>Hasil Terjemahan</legend>
                <p id="terjemahan">
                    .::Belum Ada Inputan::.
                </p>
            </fieldset>
        </td>
    </tr>
</table>
<br /><br />