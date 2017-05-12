<!--//cadastro == 1
    // confirmacao final == 2
    //update == 3
-->
<link rel='stylesheet' href='../css/main.css'>
<?php
include_once("Sql.class.php");
$sql = new Sql;

if ($_SESSION['form'] == 1) {
  $tipo = "cadastro.php?acao=cadastro&passo=2";
} elseif ($_SESSION['form'] == 2) {
  $tipo = "cadastro.php?acao=cadastro&passo=5";
} else {
  $tipo = "cadastro.php?acao=cadastro&passo=1";
}

$maxPes = "SELECT MAX(pes_id) AS pes_id FROM pessoa";
$idPes = $sql->selecionar($maxPes);
$selPes = "SELECT * FROM pessoa WHERE pes_id='" . $idPes . "';";
$pessoa = $sql->fetch($selPes);

$maxEnd = "SELECT MAX(end_id) AS end_id FROM endereco";
$idEnd = $sql->selecionar($maxEnd);
$selEnd = "SELECT * FROM endereco WHERE end_id='" . $idEnd . "';";
$endereco = $sql->fetch($selEnd);
?>
<form class="Form" action="<?=$tipo?>" method="post">
  <h1 class="titulo">Cadastro de Pessoa</h1>
  <br>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Nome:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[1] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_nome" size="28"  <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Nome do pai:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[2] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_pai" size="28" <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Nome da mãe:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[3] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_mae" size="28" <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">RG:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[4] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_rg" size="28"  <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">CPF:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[4] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_cpf" size="28"  <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class lbl-extend-class">Data de Nascimento:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[5] . "\"";
        }
    ?>
    <input class="inp_class" type="date" name="pes_data" size="28"  <?=$dis . $val; ?>><br>
  </div>
    <div class="group-form group-form-cadastro">
    <label class="lbl_class">Email</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[6] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_email" size="28"  <?=$dis . $val; ?>><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Estado civil:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $sql->selectbox("estado_civil");
      } else {
        echo "<input class=\"inp_class\" type=\"text\" name=\"pes_estado_civil\" size=\"28\" disabled value=" . $pessoa[8] . "<br>";
      }
    ?>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Cidadania:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[9] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_cidadania" size="28" value="Brasileira"><br>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Gênero</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $sql->selectbox("genero");
      } else {
        echo "<input class=\"inp_class\" type=\"text\" name=\"pes_genero\" size=\"28\" disabled value=" . $pessoa[10] . "<br>";
      }
    ?>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Sexo biológico:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $sql->selectbox("sexo");
      } else {
        echo "<input class=\"inp_class\" type=\"text\" name=\"pes_sexo_biologico\" size=\"28\" disabled value=" . $pessoa[10] . "<br>";
      }
    ?>
  </div>
  <div class="group-form group-form-cadastro">
    <label class="lbl_class">Telefone:</label>
    <?php
        if ($_SESSION['form'] == 1) {
          $dis = "";
          $val = "";
        } else {
          $dis = " disabled";
          $val = " value=\"" . $pessoa[11] . "\"";
        }
    ?>
    <input class="inp_class" type="text" name="pes_telefone" size="15"><br>
  </div>
  <div class="extend group-form group-form-cadastro">
    <label class="lbl_class">Endereço:</label>
    <input id="autocomplete" class="inp_class" type="text" name="" size="28" value=""
    placeholder="Procurar endereço" onfocus="geolocate()"><br>
  </div>
  <!-- Seção Auto Endereço -->
  <div id="auto-endereco">
    <div id="route" class="group-form group-form-cadastro">
    <label class="lbl_class">Rua:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $dis = "";
        $val = "";
      } else {
        $dis = " disabled";
        $val = " value=\"" . $endereco[1] . "\"";
      }
    ?>
    <input class="inp_class" type="text" name="end_rua" size="28"  <?=$dis . $val; ?>><br>
  </div>
  <div id="street_number" class="group-form group-form-cadastro">
    <label class="lbl_class">Numero:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $dis = "";
        $val = "";
      } else {
        $dis = " disabled";
        $val = " value=\"" . $endereco[2] . "\"";
      }
    ?>
    <input class="inp_class" type="text" name="end_numero" size="28" <?=$dis . $val; ?>><br>
  </div>
  <div id="sublocality_level_1" class="group-form group-form-cadastro">
    <label class="lbl_class">Bairro:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $dis = "";
        $val = "";
      } else {
        $dis = " disabled";
        $val = " value=\"" . $endereco[3] . "\"";
      }
    ?>
    <input class="inp_class" type="text" name="end_bairro" size="28" <?=$dis . $val; ?>><br>
  </div>
  <div id="administrative_area_level_2" class="group-form group-form-cadastro">
    <label class="lbl_class">Cidade:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $sql->selectbox("cidade");
      } else {
        echo "<input class=\"inp_class\" type=\"text\" name=\"end_cidade\" size=\"28\" disabled value=" . $endereco[4] . "<br>";
      }
    ?>
  </div>
  <div id="administrative_area_level_1" class="group-form group-form-cadastro">
    <label class="lbl_class">Estado:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $sql->selectbox("estado");
      } else {
        echo "<input class=\"inp_class\" type=\"text\" name=\"end_estado\" size=\"28\" disabled value=" . $endereco[5] . "<br>";
      }
    ?>
  </div>

  <div id="postal_code" class="group-form group-form-cadastro">
    <label class="lbl_class">Cep:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $dis = "";
        $val = "";
      } else {
        $dis = " disabled";
        $val = " value=\"" . $endereco[6] . "\"";
      }
    ?>
    <input class="inp_class" type="text" name="end_cep" size="28" <?=$dis . $val; ?>><br>
  </div>
  <div id="country" class="group-form group-form-cadastro">
    <label class="lbl_class">País:</label>
    <?php
      if ($_SESSION['form'] == 1) {
        $dis = "";
        $val = "";
      } else {
        $dis = " disabled";
        $val = " value=\"" . $endereco[7] . "\"";
      }
    ?>
    <input class="inp_class" type="text" name="end_pais" size="28" <?=$dis . $val; ?>><br>
  </div>
  </div> <!-- Seção Auto Endereço FIM -->
  <?php
    if ($_SESSION['form'] == 2 || $_SESSION['form'] == 3) {
      echo "<input id=\"0\" type=\"button\" value=\"Alterar\">";
    }
    ?>
    <input class="inp_class submit" type="submit" value="Proximo"><br>
  </form>
}
