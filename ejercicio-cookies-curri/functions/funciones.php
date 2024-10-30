<?php
function printForm($arr,$backColor){
    print ("<div class=\"mainDetails\" style=\"background-color:".$backColor."\";><form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">");

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
         $languajes=[$arr['subNac']["spanish"],$arr['subNac']["english"],$arr['subNac']["german"],$arr['subNac']["french"]];
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
         <input type=\"radio\" value=\"M\" name=\"sexo\">".$arr['subSex']['female']."</input>
         <input type=\"radio\" value=\"H\" name=\"sexo\">".$arr['subSex']['male']."</input>
         <input type=\"radio\" value=\"---\" name=\"sexo\">".$arr['subSex']['NAN']."</input>
         <br><br>
         <label>".$arr['birthdate']."</label>
         <input type=\"date\" value=\"\" name=\"fechan\" max=\"".date('Y-m-d')."\">
         <br><br>
         
         <input type=\"submit\" name=\"submit\" value=\"".$arr['genn']."\">
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
  print('<input type="radio" name="languaje" value="en">English</input><br><br>');
  print('<label>Color de fondo:</label>');
  print('<input type="radio" name="backColor" value="lightGrey">Gris</input>');
  print('<input type="radio" name="backColor" value="lightYellow">Amarillo</input><br><br>');
  print('<input type="submit" name="submitlang" value="confirm"></form>');
  // print('<a href="#"><button>Refresh</button> </a>');

  

print("</div>");
}


function addCookies(){
  if (isset($_POST['languaje'])&&isset($_POST['backColor'])) {
    setcookie("languaje",$_POST['languaje']);
    setcookie("backColor",$_POST['backColor']);
    header("refresh:0");
    
   }
}

function showCurriForm($cookiesLang,$cookiesColor){
  if (isset($_POST["submit"])) {
    if (!checkInputs()) {

      printBody();
    } else {
      print ("<h1 class=\"mainDetails\">Error, por favor rellene todos los datos</h1>");
      printForm($cookiesLang, $cookiesColor);
    }

  } else {
    printForm($cookiesLang, $cookiesColor);
  }



}


// {
//   "es": {
//       "name": "Nombre:",
//       "surname": "Apellidos:",
//       "email": "Correo Electrónico:",
//       "tlf": "Teléfono:",
//       "sports": "Deportes:",
//       "subSports": {
//           "tennis": "tenis",
//           "soccer": "Fútbol",
//           "cycling": "Ciclismo",
//           "swimming": "Natación"
//       },
//       "nac": "Nacionalidad:",
//       "subNac": {
//           "spanish": "Español",
//           "english": "Inglés",
//           "german": "Alemán",
//           "french": "Francés"
//       },
//       "lang": "Idiomas:",
//       "subLang": {
//           "spanish": "Español",
//           "english": "Inglés",
//           "german": "Alemán",
//           "french": "Francés"
//       },
//       "englvl": "Nivel de Inglés:",
//       "sex": "Sexo:",
//       "subSex": {
//           "male": "H",
//           "female": "M",
//           "NAN": "Prefiero No Decirlo"
//       },
//       "birthdate": "Fecha de Nacimiento:",
//       "genn": "Generar CV"
//   },
//   "en": {
//       "name": "Name:",
//       "surname": "Surnames:",
//       "email": "Email:",
//       "tlf": "Phone number:",
//       "sports": "Sports:",
//       "subSports": {
//           "tennis": "tennis",
//           "soccer": "Soccer",
//           "cycling": "Cycling",
//           "swimming": "Swimming"
//       },
//       "nac": "Nationality:",
//       "subNac": {
//           "spanish": "Spanish",
//           "english": "English",
//           "german": "German",
//           "french": "French"
//       },
//       "lang": "Languages:",
//       "subLang": {
//           "spanish": "Spanish",
//           "english": "English",
//           "german": "German",
//           "french": "French"
//       },
//       "englvl": "English Level:",
//       "sex": "Sex:",
//       "subSex": {
//           "male": "M",
//           "female": "F",
//           "NAN": "NAN"
//       },
//       "birthdate": "Birth Date:",
//       "genn": "Build CV"
//   },
//   "fr": {
//       "name": "Nom:",
//       "surname": "Prénoms:",
//       "email": "Email:",
//       "tlf": "Numéro de téléphone:",
//       "sports": "Sports:",
//       "subSports": {
//           "tennis": "tennis",
//           "soccer": "Football",
//           "cycling": "Cyclisme",
//           "swimming": "Natation"
//       },
//       "nac": "Nationalité:",
//       "subNac": {
//           "spanish": "Espagnol",
//           "english": "Anglais",
//           "german": "Allemand",
//           "french": "Français"
//       },
//       "lang": "Langues:",
//       "subLang": {
//           "spanish": "Espagnol",
//           "english": "Anglais",
//           "german": "Allemand",
//           "french": "Français"
//       },
//       "englvl": "Niveau d'anglais:",
//       "sex": "Sexe:",
//       "subSex": {
//           "male": "H",
//           "female": "F",
//           "NAN": "Préférer ne pas dire"
//       },
//       "birthdate": "Date de naissance:",
//       "genn": "Générer CV"
//   },
//   "de": {
//       "name": "Name:",
//       "surname": "Nachnamen:",
//       "email": "E-Mail:",
//       "tlf": "Telefonnummer:",
//       "sports": "Sportarten:",
//       "subSports": {
//           "tennis": "Tennis",
//           "soccer": "Fußball",
//           "cycling": "Radfahren",
//           "swimming": "Schwimmen"
//       },
//       "nac": "Nationalität:",
//       "subNac": {
//           "spanish": "Spanisch",
//           "english": "Englisch",
//           "german": "Deutsch",
//           "french": "Französisch"
//       },
//       "lang": "Sprachen:",
//       "subLang": {
//           "spanish": "Spanisch",
//           "english": "Englisch",
//           "german": "Deutsch",
//           "french": "Französisch"
//       },
//       "englvl": "Englisch Niveau:",
//       "sex": "Geschlecht:",
//       "subSex": {
//           "male": "M",
//           "female": "W",
//           "NAN": "Bevorzugen Sie es nicht zu sagen"
//       },
//       "birthdate": "Geburtsdatum:",
//       "genn": "Lebenslauf erstellen"
//   },
//   "zh": {
//       "name": "姓名:",
//       "surname": "姓氏:",
//       "email": "电子邮件:",
//       "tlf": "电话号码:",
//       "sports": "运动:",
//       "subSports": {
//           "tennis": "网球",
//           "soccer": "足球",
//           "cycling": "骑自行车",
//           "swimming": "游泳"
//       },
//       "nac": "国籍:",
//       "subNac": {
//           "spanish": "西班牙语",
//           "english": "英语",
//           "german": "德语",
//           "french": "法语"
//       },
//       "lang": "语言:",
//       "subLang": {
//           "spanish": "西班牙语",
//           "english": "英语",
//           "german": "德语",
//           "french": "法语"
//       },
//       "englvl": "英语水平:",
//       "sex": "性别:",
//       "subSex": {
//           "male": "男",
//           "female": "女",
//           "NAN": "更愿意不说"
//       },
//       "birthdate": "出生日期:",
//       "genn": "生成简历"
//   }
// }



?>
