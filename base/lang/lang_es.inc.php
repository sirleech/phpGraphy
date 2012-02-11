<?php

/*
*  Copyright (C) 2004-2005 JiM / aEGIS (jim@aegis-corp.org)
*  Copyright (C) 2000-2001 Christophe Thibault
* 
*  This program is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2, or (at your option)
*  any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
*
*  $Id: lang_es.inc.php 231 2005-11-14 00:05:24Z jim $
*
*/

/* phpGraphy archivo de idioma
*
*  Por favor NO MODIFIQUE este fichero directamente.
*  Puede uarlo como referencia para crear un fichero en otro idioma
*  o construir su propio fichero de idioma.
*  Para mas detalles mire la documentacion.
*
*/

$language_file_info = array(
    'language_name_english' => 'Spanish',
    'language_name_native'  => 'Español',
    'country_code'          => 'es',
    'charset'               => 'iso-8859-1',
    'for_version'           => '0.9.10',
    'translator_name'       => 'V',
    'translator_email'      => 'vicente [at] estilovirtual [dot] com'
    );

// Tag TITLE
$txt_site_title="Mi Web phpGraphy";

// txt_root_dir: especifica el directorio raiz de tu web
$txt_root_dir="Inicio";

// las siguientes variables define el texto usado para la navegacion por la galeria
// ud. puede cambiarlas segun sus necesidad y/o usar imagenes (http://tofz.org/style)
// e.j: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';

// Imagenes/Viñetas visualizar/navegacion
$txt_files='im&aacute;gene(s)';
$txt_dirs='carpeta(s)';
$txt_last_commented="&uacute;ltimas im&aacute; comentadas";

// Votacion (si esta activo)
$txt_no_rating="";
$txt_thumb_rating="Votos :";
$txt_pic_rating="<br />Media: ";
$txt_option_rating="Votar esta imagen";

$txt_back_dir=' ^Subir^ ';
$txt_previous_image=' &lt;- Anterior ';
$txt_next_image=' Siguiente -&gt; ';
$txt_hires_image=' +Alta res+ ';
$txt_lores_image=' -Baja res- ';

$txt_previous_page=' &lt;- P&aacute;gina Anterior -| ';
$txt_next_page=' |- P&aacute;gina siguiente -&gt; ';

$txt_x_comments="comentario(s)";

$txt_comments="Comentarios :";
$txt_add_comment="A&ntilde;adir comentario";
$txt_comment_from="De: ";
$txt_comment_on=" en ";

// Pagina de ultimas imagenes comentadas
$txt_last_commented_title="Ultimas ".$nb_last_commented." im&aacute;genes comentadas:";
$txt_comment_by="por";

// Imagenes mas votadas
$txt_top_rated_title="Im&aacute;genes ".$nb_top_rating." m&aacute;s votadas :";

$txt_go_back="Volver";


// Menu superior derecha 
$txt_login="Login";
$txt_logout="Salir";
$txt_random_pic="Imagen aleatoria";


// Pagina de identificacion
$txt_login_form_login="Usuario:";
$txt_login_form_pass="Clave:";


// Añadir comentario
$txt_comment_form_name="Nombre/Nick:";
$txt_remember_me="Recuerdame";
$txt_comment_form_comment="Comentario:";


// seccion metadatos (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: Ud puede tematizar la forma en que se muestra la informacion
*
* las palabras clave estan entre '%' para apuntar a las palabras clave soportadas
* Consulte la documentacion para completar la lista de palabras clave disponibles
*
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% con %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// Si no se encuntra la petici&oacute; a EXIF requested muestra esta frases
$txt_exif_flash="con flash"; // Muestra si se disparo el flash

$txt_iptc_custom="%Iptc.City% por %Iptc.ByLine%";
$txt_iptc_missing_value="";	// Si la peticion de IPTC no se encuentra, muestra esta variable

$txt_show_me_more="Mostrar m&aacute;s";

/********************************************************************************
* PANEL DE ADMINISTRADOR
* Este texto se muestra solamente si entras como administrador (999)
*********************************************************************************/

// Menu superior derecha
$txt_create_dir="Crear carpeta";
$txt_upload="Subir im&aacute;genes";
$txt_gen_all_pics="Crear vi&ntilde;etas";


// Imagenes/Viñetas visualizacion/navegacion
$txt_description="Descripci&oacute;n:";
$txt_sec_lev="Privilegios: ";
$txt_dir_sec_lev="Privilegios: ";
$txt_inh_lev=" Hereda: ";
$txt_change="Guardar";
$txt_delete_photo="Borrar imagen";
$txt_delete_photo_thumb="Crear vi&ntilde;eta";
$txt_delete_directory_text="Borrar Carpeta";
$txt_edit_welcome="<button>Editar descripci&oacute;n</button>";
$txt_del_comment="Borrar";

// Confirmacion
$txt_ask_confirm="&iquest; Estas seguro ?";
$txt_delete_confirm="&iquest; Realmente deseas borrarlo ?";

// Rotacion de imagenes (si esta activada en config.inc.php)
$txt['Rotate 90'] = 'Rotar 90°';
$txt['Rotate 180'] = 'Rotar 180°';
$txt['Rotate 270'] = 'Rotar 270°';


// Modificar el fichero .welcome
$txt_editing="Editando";
$txt_in_directory="en la carpeta";
$txt_save="Grabar";
$txt_cancel="Cancelar";
$txt_clear_all="Limpiar todo";


// Pagina para crear carpetas
$txt_dir_to_create="Crear carpeta:";


// Pagina de subir ficheros
$txt_current_dir="Carpeta actual :";
$txt_file_to_upload="Im&aacute;gene(s) a subir:";
$txt_upload_file_from_user="Subir im&aacute;gene(s) desde tu ordenador";
$txt_upload_file_from_url="Subir im&aacute;genes desde una URL";
$txt_upload_change = "Cambiar el n&uacute;mero de ficheros requiere que selecciones de nuevo las im&aacute;genes. Le recomendamos que suba las imagenes seleccionadas y cambie el n&uacute;mero de ficheros la pr&oacute;xima vez.&iquest;Deseas continuar?";

// Administracion de usuarios
$txt_user_management = 'Usuarios';
$txt_add_user = 'A&ntilde;adir usuario';
$txt_back_user_list = 'Volver a la lista de usuarios';
$txt_confirm_del_user = '&iquest; Deseas borrar este usuario?';
$txt_user_info = 'Informaci&aacute;n del usuario';
$txt_login_rule = 'El nombre del usuario debe tener un m&aacute;ximo de 20 car&aacute;cteres';
$txt_pass_rule = 'La clave debe tener un m&aacute;ximo de 32 car&aacute;cteres';
$txt_sec_lvl_rule = 'Los privilegios deben estar entre 1 y 999';

$txt_um_login = 'Login';
$txt_um_pass = 'Clave';
$txt_um_sec_lvl = 'Privilegios';
$txt_um_edit = 'Editar';
$txt_um_del = 'Borrar';

// Matriz de mensajes de error

$txt_error=array(
        // Los 8xx identifica la administracion de usuarios 
        "00800" => "ERROR:",
        "00801" => "Uid is no establecido",
        "00802" => "Uid is no es numerico",
        "00803" => "Usuario debe constar de 1 a 20 de estos car&aacte;cteres: 0-9 a-z @ - _",
        "00804" => "Usuario no establecido",
        "00805" => "Clave debe contener de 1 a 32 de estos car&aacute;cteres: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #",
        "00806" => "Clave no establecida",
        "00807" => "Privilegios deben estar entre 1 y 999",
        "00808" => "Privilegios no establecidos"
        );
?>
