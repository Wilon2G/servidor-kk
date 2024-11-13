<?php
function printForm($arr,$backColor,$style,$values){
    print ("<div class=\"mainDetails\" style=\"background-color:".$backColor."\";><form  action=\"./comprobar.php\" method=\"POST\">");

    if (is_null($style)) {
      $style=[];
    }

    if (is_null($values)) {
      $values=defaultValues();
    }


    print("
        <label> ".$arr['name']."</label>
         <input class=\"".(array_key_exists("nombre",$style)?$style["nombre"]:"")."\" type=\"text\" name=\"nombre\" maxlength=\"30\" minlength=\"1\" value=\"".$values["nombre"]."\"  >
         <br><br>
         <label>".$arr['surname']."</label>
         <input class=\"".(array_key_exists("apellidos",$style)?$style["apellidos"]:"")."\" type=\"text\" name=\"apellidos\" maxlength=\"30\" minlength=\"1\"  value=\"".$values["apellidos"]."\"  >
         <br><br>
         <label>".$arr['id']."</label>
         <input class=\"".(array_key_exists("id",$style)?$style["id"]:"")."\" type=\"text\" name=\"id\" maxlength=\"9\" minlength=\"9\" value=\"".$values["id"]."\"  >
         <br><br>
          <label>".$arr['email']."</label>
         <input class=\"".(array_key_exists("correo",$style)?$style["correo"]:"")."\" type=\"email\" name=\"correo\" maxlength=\"30\" minlength=\"1\"   value=\"".$values["correo"]."\"   >
         <br><br>
         <label>".$arr['tlf']."</label>
         <input class=\"".(array_key_exists("tlfn",$style)?$style["tlfn"]:"")."\" type=\"tel\" name=\"tlfn\" maxlength=\"30\" minlength=\"1\"    value=\"".$values["tlfn"]."\"     >
         <br><br>");
         
         $sports=[$arr['subSports']["tennis"],$arr['subSports']["soccer"],$arr['subSports']["cycling"],$arr['subSports']["swimming"]];
         print("<label class=\"".(array_key_exists("deporte",$style)?$style["deporte"]:"")."\" >".$arr['sports']."</label>");
         
         foreach($sports as $sport){
          print("<input type=\"checkbox\" value=\"".$sport."\" name=\"deporte[]\"  ".( in_array($sport,$values["deporte"])? "checked" : "" ).">".$sport."</input>");
         }
         print("
         <br><br>");
         print("
         <label>".$arr['nac']."</label>
         <select  name=\"nacionalidad\">");
         $nacionalities=[$arr['subNac']["spanish"],$arr['subNac']["english"],$arr['subNac']["german"],$arr['subNac']["french"]];
         foreach($nacionalities as $nac){
          print(" <option value=\"".$nac."\"  ".( $nac==$values["nac"]? "selected" : "" )."  >".$nac."</option>");
         }
        print("</select>");
         
         print("
         <br><br>");
         print("
         <label>".$arr['lang']."</label>
         <br>
         <select class=\"".(array_key_exists("idioma",$style)?$style["idioma"]:"")."\" name=\"idioma[]\" multiple>");
         $languajes=[$arr['subNac']["spanish"],$arr['subNac']["english"],$arr['subNac']["german"],$arr['subNac']["french"]];
         foreach($languajes as $lang){
          print(" <option value=\"".$lang."\"   ".( in_array($lang,$values["idioma"])? "selected" : "" )."  >".$lang."</option>");                                                           //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         }
        print("</select>");
        
        print("
         <br><br>");
         print("
        <label>".$arr['englvl']."</label><br>
         <input id=\"nvl\" type=\"range\" name=\"nvling\"
         min=\"0\" max=\"100\" value=\"".$values["nvling"]."\">
         <p id=\"nivel\">".$values["nvling"]."</p>
         <script>
      addEventListener('load',inicio,false);
    
      function inicio()
      {
        document.getElementById('nvl').addEventListener('change',cambioNivel,false);
      }
    
      function cambioNivel()
      {    
        document.getElementById('nivel').innerHTML=document.getElementById('nvl').value;
      }
    </script> ");
        print("
         <br>");
         print("
         <label class=\"".(array_key_exists("sexo",$style)?$style["sexo"]:"")."\" >".$arr['sex']."</label>
         <input type=\"radio\" value=\"M\" name=\"sexo\" ". ( $values["sexo"]=="M"? "checked" : "" ) ." >".$arr['subSex']['female']."</input>
         <input type=\"radio\" value=\"H\" name=\"sexo\"    ". ( $values["sexo"]=="H"? "checked" : "" ) ."  >".$arr['subSex']['male']."</input>
         <input type=\"radio\" value=\"---\" name=\"sexo\"  ". ( $values["sexo"]=="---"? "checked" : "" ) ."  >".$arr['subSex']['NAN']."</input>
         <br><br>
         <label>".$arr['birthdate']."</label>
         <input class=\"".(array_key_exists("fechan",$style)?$style["fechan"]:"")."\" type=\"date\" value=\"\" name=\"fechan\" max=\"".date('Y-m-d')."\" value=\"".$values["fechan"]."\">
         <br><br>
         
         <input type=\"submit\" name=\"submit\" value=\"".$arr['genn']."\">
         </form></div>");
}


function defaultValues(){
return ["nombre"=>"","apellidos"=>"","id"=>"","correo"=>"","tlfn"=>"","deporte"=>[],"nac"=>"","idioma"=>[],"nvling"=>0,"sexo"=>"","fechan"=>date('Y-m-d')];
}


function checkError($val){
  if (is_array($val)) {
    return sizeof($val)==0;
  }
  
return $val=="";
}


function checkInput($postVar){

  if (!isset($_POST[$postVar])) {
    if ($postVar=="deporte"||$postVar=="idioma") {
      return [];
    }
    return null;
  }
  else {
    return $_POST[$postVar];
  }

}

function checkData(){
  
}

function printBody(){

  $sport="";
  foreach ($_POST["deporte"] as $key => $value) {
      $sport=$sport." <li> ".$value." </li> ";
  }
  
  $idiomas="";
  foreach ($_POST["idioma"] as $key => $value) {
      $idiomas=$idiomas." <li> ".$value." </li> ";
  }

  print('<body id="top">
<div id="cv" class="instaFade">
  <div class="mainDetails">
    <div id="headshot" class="quickFade">
      <img src="headshot.jpg" alt="Alan Smith" />
    </div>

    <div id="name">
      <h1 class="quickFade delayTwo">'.$_POST["nombre"].'</h1>
      <h2 class="quickFade delayThree">'.$_POST["apellidos"].'</h2>
    </div>

    <div id="contactDetails" class="quickFade delayFour">
      <ul>
        <li>email: <a href="'.$_POST["correo"].'" target="_blank">'.$_POST["correo"].'</a></li>
        <li>sexo: '.$_POST["sexo"].'</li>
        <li>Fecha nac: '.$_POST["fechan"].'</li>
        <li>tlf: '.$_POST["tlfn"].'</li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>

  <div id="mainArea" class="quickFade delayFive">


    <section>
      <div class="sectionTitle">
        <h1>Deportes que practico</h1>
      </div>
      <div class="sectionContent">
        <ul class="keySkills">
          '.$sport.'
        </ul>
      </div>
      <div class="clear"></div>
    </section>


    <section>
      <div class="sectionTitle">
        <h1>Nacionalidad</h1>
      </div>

      <div class="sectionContent">
        <article>
          <h2>'.$_POST["nacionalidad"].'</h2>
        </article>
      </div>
      <div class="clear"></div>
    </section>

    <section>
      <div class="sectionTitle">
        <h1>Idiomas</h1>
      </div>
      <div class="sectionContent">
        <ul class="keySkills">
          '.$idiomas.'
        </ul>
      </div>
      <div class="clear"></div>
    </section>

    <section>
      <div class="sectionTitle">
        <h1>Nivel de inglés</h1>
      </div>

      <div class="sectionContent">
        <article>
          <h2>'.$_POST["nvling"].'</h2>
        </article>
      </div>
      <div class="clear"></div>
    </section>

  </div>
</div>
<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-3753241-1");
  pageTracker._initData();
  pageTracker._trackPageview();
</script>
</body>

');


}

//Deprecated in this version (v2)
function languajeForm(){
  print("<div class=\"mainDetails\">");
  print('<h1>Seleccione sus ajustes:</h1>');
  print ("<div class=\"mainDetails\"><form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">");
  print('<label>Languaje:</label>');
  print('<input type="radio" name="languaje" value="es">Spanish</input>');
  print('<input type="radio" name="languaje" value="fr">French</input>');
  print('<input type="radio" name="languaje" value="de">German</input>');
  print('<input type="radio" name="languaje" value="zh">Chinesse</input>');
  print('<input type="radio" name="languaje" value="en">English</input><br><br>');
  print('<label>Color de fondo:</label>');
  print('<input type="radio" name="backColor" value="lightGrey">Gris</input>');
  print('<input type="radio" name="backColor" value="lightYellow">Amarillo</input><br><br>');
  print('<input type="submit" name="submitlang" value="confirm"></form>');
  // print('<a href="#"><button>Refresh</button> </a>');

  

print("</div>");
}


function checkAddCookies(){
  if (isset($_POST['languaje'])&&isset($_POST['backColor'])) {
    setcookie("languaje",$_POST['languaje']);
    setcookie("backColor",$_POST['backColor']);
    header("refresh:0");
    return true;
   }
   return false;
}

// function showCurriForm($cookiesLang,$cookiesColor){
//   if (isset($_POST["submit"])) {
//     if (!checkInputs()) {

//       printBody();
//     } else {
//       print ("<h1 class=\"mainDetails\">Error, por favor rellene todos los datos</h1>");
//       printForm($cookiesLang, $cookiesColor);
//     }

//   } else {
//     printForm($cookiesLang, $cookiesColor);
//   }



// }



  function checkId($dni){
    $letter = substr($dni, -1);
    $numbers = substr($dni, 0, -1);

    if ( !is_numeric($numbers)) {
      return false;
    }
  
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
      return true;
    }
    return false;
  }
  

function checkPhone($phone){
  if(preg_match('/^[0-9]{9}+$/', $phone)) {
    return true;
    } else {
    return false;
    }
}