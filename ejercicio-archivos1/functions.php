<?php
function uploadImg($s,$imgname,$imgsurname){

    if (isset($_FILES[$s])) {
        print("Name: ".$_FILES[$s]['name']);
        print("<br>");
        print("Temp Name: ".$_FILES[$s]['tmp_name']);
        print("<br>");
        print("Size: ".$_FILES[$s]['size']);
        print("<br>");
        print("Type: ".pathinfo(str_replace('/','.', $_FILES[$s]['type']))['extension']);
        $filetype=pathinfo(str_replace('/','.', $_FILES[$s]['type']))['extension'];
        $allowed=['png','jpeg','gif'];
        if (in_array($filetype,$allowed)) {
            if (is_uploaded_file($_FILES[$s]['tmp_name'])) {
                $dirname="img";
                $ext= pathinfo(str_replace('/','.', $_FILES[$s]['type']))['extension'];
                
                if (is_dir($dirname)) {
                    $uniqueId=date('Y-m-d');
                    $fullName=$dirname."/".$uniqueId."-".trim($imgname).'-'.trim($imgsurname).'.'.$ext;
                    move_uploaded_file ($_FILES[$s]['tmp_name'],$fullName);
                    print("<p>Imagen subida con nombre: ".$fullName."</p>");
                    print("<a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>");
                
            }
            else {
                print("Error en el directorio de la imagen");
                print("<a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>");
            }
            }
            else {
                print("<p>Error al subir la imagen</p>");
                print("<a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>");
            }
        }
        else {
            print("<p>tipo de archivo incorrecto</p>");
            print("<a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>");
            
        }
        
        
    }
    else {
        print("Error en la funcion uploadImg");
        print("<a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>");

    }
}


function showImg($imgName,$imgsurname){
    $allImg=scandir('img/');
    $ext='';
    if (isset($_POST['format'])) {
        $ext=$_POST['format'];
    }
    $imgName="/".$imgName.'-'.$imgsurname.".".$ext."/";
    
    foreach ($allImg as $imgk => $img) {
        if (preg_match($imgName ,$allImg[$imgk])) {
            return "<h1>Imagen para: ".$imgName."</h1><img src=\"img/".$allImg[$imgk]."\" > <a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>";
            
        }
    }
    return "<h1>Imagen No Encontrada para el nombre: ".$imgName."</h1><br> <a href=\"".$_SERVER['PHP_SELF']."\"><button>Volver</button></a>";
    
    }

?>