<?php
function printForm($arr){
    print ("<div class=\"mainDetails\"><form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">");

    print("
        <label>".$arr['name']."</label>
         <input type=\"text\" name=\"nombre\" maxlength=\"30\" minlength=\"1\" required >
         <br><br>
         <label>".$arr['surname']."</label>
         <input type=\"text\" name=\"apellidos\" maxlength=\"30\" minlength=\"1\" required >
         <br><br>
          <label>".$arr['email']."</label>
         <input type=\"email\" name=\"correo\" maxlength=\"30\" minlength=\"1\" required >
         <br><br>
         <label>".$arr['tlf']."</label>
         <input type=\"tel\" name=\"tlfn\" maxlength=\"30\" minlength=\"1\" required >
         <br><br>");
         $sports=[$arr['subSports']["tennis"],$arr['subSports']["soccer"],$arr['subSports']["cycling"],$arr['subSports']["swimming"]];
         print("<label>".$arr['sports']."</label>");
         foreach($sports as $sport){
          print("<input type=\"checkbox\" value=\"".$sport."\" name=\"deporte[]\" >".$sport."</input>");
         }
         print("
         <br><br>");
         print("
         <label>".$arr['nac']."</label>
         <select name=\"nacionalidad\">");
         $nacionalities=[$arr['subNac']["spanish"],$arr['subNac']["english"],$arr['subNac']["german"],$arr['subNac']["french"]];
         foreach($nacionalities as $nac){
          print(" <option value=\"".$nac."\">".$nac."</option>");
         }
        print("</select>");
         
         print("
         <br><br>");
         print("
         <label>".$arr['lang']."</label>
         <br>
         <select name=\"idioma[]\" multiple>");
         $languajes=["Español","Inglés","Alemán","Francés"];
         foreach($languajes as $lang){
          print(" <option value=\"Inglés\">".$lang."</option>");
         }
        print("</select>");
        
        print("
         <br><br>");
         print("
        <label>".$arr['englvl']."</label><br>
         <input id=\"nvl\" type=\"range\" name=\"nvling\"
         min=\"0\" max=\"100\" value=\"0\">
         <p id=\"nivel\">0</p>
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
         <label>".$arr['sex']."</label>
         <input type=\"radio\" value=\"M\" name=\"sexo\">M</input>
         <input type=\"radio\" value=\"H\" name=\"sexo\">H</input>
         <input type=\"radio\" value=\"---\" name=\"sexo\">Prefiero no decirlo</input>
         <br><br>
         <label>".$arr['birthdate']."</label>
         <input type=\"date\" value=\"\" name=\"fechan\" max=\"".date('Y-m-d')."\">
         <br><br>
         
         <input type=\"submit\" name=\"submit\" value=\"Generar cv\">
         </form></div>");
}


function checkInputs(){
  return !isset($_POST["deporte"])|| !isset($_POST["nacionalidad"])|| !isset($_POST["idioma"])|| !isset($_POST["nvling"])|| !isset($_POST["sexo"])|| !isset($_POST["fechan"]);
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


function languajeForm(){
  print("<div class=\"mainDetails\">");
  print('<h1>Seleccione sus ajustes:</h1>');
  print ("<div class=\"mainDetails\"><form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">");
  print('<label>Languaje:</label>');
  print('<input type="radio" name="languaje" value="es">Spanish</input>');
  print('<input type="radio" name="languaje" value="en">English</input>');
  print('<input type="submit" name="submitlang" value="confirm"></form>');
  // print('<a href="#"><button>Refresh</button> </a>');

  

print("</div>");
}


function checkCookies(){
if (isset($_POST['languaje'])) {
 setcookie("languaje",$_POST['languaje']);
}
}



?>
