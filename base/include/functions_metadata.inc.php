<?php
/*
*  Copyright (C) 2002-2007 JiM / aEGIS
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
* $Id: functions_metadata.inc.php 408 2007-02-03 17:17:06Z jim $
*
*/

/**
 * phpGraphy metadata EXIF/IPTC functions
 *
 * External file 'sensors.dat' highly recommended to get 35mm equivalent with more cameras
 * See http://phpgraphy.sourceforge.net/tools/35mm-equivalent-focal-lenght-calculator.php
 */

function get_exif_ref() {

// EXIF -> phpGraphy reference array (Only a selection of EXIF metadata are supported)
// NOTE: This function is used during the documentation build process

  $exif_ref=array(
		'Exif.Make',			        // Camera Brand
		'Exif.Model',			        // Camera Model
		'Exif.ExposureTime',	        // Exposure Time (in seconds)
		'Exif.FNumber',			        // F Number (Aperture)
		'Exif.FocalLength',		        // Focal Length (in mm)
		'Exif.FocalLengthIn35mmFilm',	// Focal Length (in mm, using the 35mm equivalent)
		'Exif.ISO',			            // ISO Speed Number (numeric value)
		'Exif.Flash',			        // Flash status (set if flash was fired)
		'Exif.DateTime', 		        // Picture DateTime (YYYY-MM-DD HH:II:SS)
		'Exif.UserComment',             // Picture's UserComment
		'Exif.ImageDescription',        // Picture's Description/Title
		'Exif.JpegComment'              // Jpeg Comment (Which is not truly EXIF but can be read by the function)

		);

return $exif_ref;

}

function get_exif_data($image_path) {

// This function read EXIF data from a picture, format the data and return a formatted array
// See get_exif_ref() for the naming convention used with the returned array

if (!function_exists('exif_read_data')) {
    cust_error('00304');
    //trigger_error('The exif related functions are not available on this server, disable the use of exif in the configuration', ERROR);
    return false;
}

$exif_header=@exif_read_data($image_path,'EXIF');

if (!is_array($exif_header)) return false;

// Formatting Exif.Make
$Make=ucfirst(strtolower($exif_header["Make"]));
if (stristr($Make,"Nikon")) $Make="Nikon";
else if (stristr($Make,"Olympus")) $Make="Olympus";
else if (stristr($Make,"Minolta") && !stristr($Make,"Konica")) $Make="Minolta";
else if (stristr($Make,"Minolta")) $Make="Konica Minolta";
else if (stristr($Make,"Kodak")) $Make="Kodak";
else if (stristr($Make,"Asahi") || stristr($Make,"Pentax")) $Make="Pentax";
else if (stristr($Make,"Casio")) $Make="Casio";
else if (stristr($Make,"Hewlett-packard")) $Make="HP";
if ($Make) $result['Exif.Make']=$Make;


// Getting and Formatting Exif.Model - Get camera's model and eliminate brand's double
if ($exif_header["Model"]) {

    $Model=$exif_header["Model"];
    if (stristr(strtolower($Model),strtolower($Make))) $Model=eregi_replace($Make,'',$Model);

    // Special for Nikon Coolpix
    if ($Make=="Nikon" && ereg("E([0-9])",$Model)) $Model=eregi_replace('E','CoolPix ',$Model);

    // Special for HP cameras
    if ($Make=="HP") {
        // Remove double brand
        $Model = str_replace('HP ','', $Model);
        // Remove firmware version from the model
        $Model = preg_replace('/\(V[0-9]{2}\.[0-9]{2}\)$/', '', $Model);
    }
}

if ($Model) $result['Exif.Model']=trim($Model);


// Getting and Formatting Exif.ExposureTime

if ($exif_header['ExposureTime']) {
   list($div,$ExposureTime)=split("/", $exif_header['ExposureTime']);
   $ExposureTime=$div/$ExposureTime;
   if ($ExposureTime < 1) $ExposureTime="1/".round(1/$ExposureTime,2);
   }
elseif ($exif_header['ShutterSpeedValue']) {
   list($ExposureTime,$div)=split("/", $exif_header['ShutterSpeedValue']);
   $ExposureTime=($div/10)/$ExposureTime;
   if ($ExposureTime < 1) $ExposureTime="1/".round(1/$ExposureTime,2);
   }
elseif ($exif_header["COMPUTED"]["ExposureTime"]) {
	ereg(".*\((.*)\)",$exif_header["COMPUTED"]["ExposureTime"], $res);
	$WorkingExposureTime=$res[1];
	}


if ($ExposureTime) $result['Exif.ExposureTime']=$ExposureTime;


// Getting and Formatting Exif.FNumber
if ($exif_header["FNumber"]) {
    list($FNumber,$div)=split("/", $exif_header["FNumber"]);
    $FNumber=round($FNumber/$div,1);
    }
    else if ($exif_header["COMPUTED"]["ApertureFNumber"]) $FNumber=$exif_header["COMPUTED"]["ApertureFNumber"];
if ($FNumber) $result['Exif.FNumber']=$FNumber;


// Getting and Formatting Exif.FocalLength
if ($exif_header["FocalLength"]) {
   list($FocalLength,$div)=split("/", $exif_header["FocalLength"]);
   $FocalLength=round($FocalLength/$div,2);
if ($FocalLength) $result['Exif.FocalLength']=$FocalLength;

// Try to get or calculate Exif.FocalLengthIn35mmFilm (35mm film equivalent of FocalLength)
// For the calcul, the model need to be registered in sensors.dat
if ($exif_header['FocalLengthIn35mmFilm']) $result['Exif.FocalLengthIn35mmFilm']=$exif_header['FocalLengthIn35mmFilm'];
else if ($sensor_size=get_sensor_size($exif_header["Make"],$exif_header["Model"])) $result['Exif.FocalLengthIn35mmFilm']=round(($FocalLength*43.27)/$sensor_size,0);
   }

// Getting and Formatting Exif.ISO (ISO sensitivity)
if ($exif_header["ISOSpeedRatings"]) $result['Exif.ISO']=$exif_header["ISOSpeedRatings"];
else {
     // Not standard exif... trying to get Make's specific data
     // Canon Stuff
     if ($Make == "Canon") {
        if (isset($exif_header["ModeArray"][16])) {
	   switch ($exif_header["ModeArray"][16]) {
		case 15:
		  $result['Exif.ISO']="Auto";
		  break;
		case 16:
		  $result['Exif.ISO']=50;
		  break;
		case 17:
		  $result['Exif.ISO']=100;
		  break;
		case 18:
		  $result['Exif.ISO']=200;
		  break;
		case 19:
		  $result['Exif.ISO']=400;
		  break;
		} // eo switch
	   } // eo isset fi
	} // eo make fi
     } // eo else

// Getting and Formatting Exif.Flash (set to 0 or 1)
/*
   On old Digital SLR, the field was just set to 1 if flash but now it's a little bit more complicated
   Seem that the value 16 mean no flash and 24 or 25 (depending SLR) mean with flash
   This routine surely need to be optimised
   On Canon 24 mean flash not used and 25 flash used
*/
if ($exif_header["Flash"] == 1 || $exif_header["Flash"] == 25) $result['Exif.Flash']=1;
else $result['Exif.Flash']=0;

// Getting and Formatting Exif.DateTime 
if ($exif_header['DateTimeOriginal'])  {
   $result['Exif.DateTime']=ereg_replace("([0-9]{4}):([0-9]{2}):([0-9]{2})()","\\1-\\2-\\3\\4",$exif_header['DateTimeOriginal']);
   }

// Getting Exif.JpegComment
if ($exif_header['COMMENT']) {
    // So far, I've only seen row in the COMMENT array such, no loop has been implemented
    $result['Exif.JpegComment'] = $exif_header['COMMENT'][0];
}

// Getting Exif.UserComment
if ($exif_header['COMPUTED']['UserComment']) {
    $result['Exif.UserComment'] = $exif_header['COMPUTED']['UserComment'];
}

// Getting Exif.ImageDescription
if ($exif_header['COMPUTED']['ImageDescription']) {
    $result['Exif.ImageDescription'] = $exif_header['COMPUTED']['ImageDescription'];
}



if (is_array($result)) return $result;
}

function get_sensor_size($Make,$Model) {

    global $config, $error_handler;

    $datname = DATA_DIR . 'sensors.dat';

    // Make errors silent
    if ($error_handler) $error_handler->disableDisplay();

    if (!is_readable($datname)) {
        trigger_error(__FUNCTION__.'(): Unable to the sensors file "'.$datname.'"', E_USER_NOTICE);
        return false;
    }

    $fh=fopen($datname,"rt");
    while(!feof($fh)) {

        $line=fgets($fh,4096);
        if(!$line || preg_match('/^(#| )/', $line)) continue;
        $a=explode("|",$line);
        $found=0;

        if(trim($a[0])==trim($Make) && trim($a[1])==trim($Model)) {

            $found=1;

        } elseif (trim($a[0])==trim($Make) && trim($a[1])==trim(preg_replace('/\(V[0-9]{2}\.[0-9]{2}\)$/', '', $Model))) {
            // Give a second try without any firmware info (like those found in HP/Kodak cameras)
            $found = 1;
        }

        if ($found && preg_match('/[0-9]{1,10}.?[0-9]{0,10}$/',$a[2])) {

            if ($error_handler) $error_handler->setDisplay(1);
            fclose($fh);
            return($a[2]);

        }


    }

    trigger_error("DEBUG:".__FUNCTION__."($Make,$Model) returned no result", DEBUG);

    $error_handler->restoreDisplay();

}

function reformat_exif_txt($text, $exif_header=array()) {

  global $txt_exif_missing_value, $txt_exif_flash;

// This function convert KEYWORDS into VALUES found in $exif_header
// if the value isn't found, it will replace it with $txt_exif_missing_value

// Setting default text values if not already set
if (!isset($txt_exif_missing_value)) $txt_exif_missing_value="";
if (!isset($txt_exif_flash)) $txt_exif_flash="with flash";
if (!isset($text)) $text="%Exif.Make% %Exif.Model% %Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso%Exif.ISO% %Exif.Flash%";
  $exif_ref=get_exif_ref();

  $special_char="%";
  $temp_array=explode($special_char, $text);

  for ($i=0;$i<sizeof($temp_array);$i++) {
      unset($keywordfound);
      foreach ($exif_ref as $exif_key)
	 {
	 if ($temp_array[$i] == $exif_key)
	    {
	    // Found a valid keyword, trying to get it's value and then continue to parse
	    if (isset($exif_header[$exif_key]))
		{
		if ($exif_key == "Exif.Flash")
		   {
		   if ($exif_header[$exif_key] != 0) $keywordfound=$txt_exif_flash; else $keywordfound="";
		   }
		   else {
			$keywordfound=html_safe($exif_header[$exif_key]); 
			$okforoutput=1; // This is set so we know we have at least something interessant
			}
		}
	    	else $keywordfound=$txt_exif_missing_value;
	    break;
	    }
	 }
      if (isset($keywordfound)) $result.=$keywordfound; else $result.=$temp_array[$i];
      }

  if ($okforoutput) return $result;

}

function get_exif_data_raw($image_path) {

// This function is for debugging only

$exif_header=@exif_read_data($image_path,'EXIF');

if (is_array($exif_header)) return $exif_header;

}

function get_iptc_ref() {

// IPTC -> phpGraphy reference array (Only a selection of IPTC metadata are supported)
// NOTE: This function is used during the documentation build process

  $iptc_ref=array(
		'1#090' => 'Iptc.Envelope.CharacterSet',// Character Set used (32 chars max)
		'2#005' => 'Iptc.ObjectName',           // Title (64 chars max)
		'2#015' => 'Iptc.Category',             // (3 chars max)
		'2#020' => 'Iptc.Supplementals',        // Supplementals categories (32 chars max)
		'2#025' => 'Iptc.Keywords',             // (64 chars max)
		'2#040' => 'Iptc.SpecialsInstructions', // (256 chars max)
		'2#055' => 'Iptc.DateCreated',          // YYYYMMDD (8 num chars max)
		'2#060' => 'Iptc.TimeCreated',          // HHMMSS+/-HHMM (11 chars max)
		'2#062' => 'Iptc.DigitalCreationDate',  // YYYYMMDD (8 num chars max)
		'2#063' => 'Iptc.DigitalCreationTime',  // HHMMSS+/-HHMM (11 chars max)
		'2#080' => 'Iptc.ByLine',               // Author (32 chars max)
		'2#085' => 'Iptc.ByLineTitle',          // Author position (32 chars max)
		'2#090' => 'Iptc.City',                 // (32 chars max)
		'2#092' => 'Iptc.Sublocation',          // (32 chars max)
		'2#095' => 'Iptc.ProvinceState',        // (32 chars max)
		'2#100' => 'Iptc.CountryCode',          // (32 alpha chars max)
		'2#101' => 'Iptc.CountryName',          // (64 chars max)
		'2#105' => 'Iptc.Headline',             // (256 chars max)
		'2#110' => 'Iptc.Credits',              // (32 chars max)
		'2#115' => 'Iptc.Source',               // (32 chars max)
		'2#116' => 'Iptc.Copyright',            // Copyright Notice (128 chars max)
		'2#118' => 'Iptc.Contact',              // (128 chars max)
		'2#120' => 'Iptc.Caption',              // Caption/Abstract (2000 chars max)
		'2#122' => 'Iptc.CaptionWriter'         // Caption Writer/Editor (32 chars max)
		);

  return $iptc_ref;
}

function get_iptc_data($image_path) {

// Read the IPTC header of a picture and return an array formatted from
// a specific manner so it can be handled to print out the way you want.

// Load the IPTC reference array

  $iptc_ref=get_iptc_ref();

	$separator=",";

// Extracting IPTC header and put it in the formatted array

  getimagesize($image_path, $imageinfo);

  if (is_array($imageinfo)) {

      $iptc_header=iptc_parse($imageinfo["APP13"]);
     }

  if (is_array($iptc_header)) {

     $result=array();
     foreach ($iptc_header as $key => $value) {

        if (!isset($iptc_ref[$key])) {
            trigger_error('DEBUG: '.__FUNCTION__.'(): Unsupported IPTC record of type('.$iptc_record_type.') found, skipping...', DEBUG);
            continue;
        }

        // Getting all the values of the array into a single variable
        unset($temp_value);
        foreach ($value as $subvalue) {
            if (!$temp_value) $temp_value=$subvalue; else $temp_value.=$separator.$subvalue;
        }

        $result= $result + array($iptc_ref[$key] => trim($temp_value));
     }
  }

return $result;

}


function reformat_iptc_txt($text, $iptc_header_formated=array()) {

  global $txt_iptc_missing_value;

// This function convert KEYWORDS into VALUES found in $iptc_header
// if the value isn't found, it will replace it with $txt_iptc_missing_value

// Setting to default value if passed as a null var
if (!isset($txt_iptc_missing_value)) $txt_iptc_missing_value="";
if (!isset($text)) $text="Caption: %Iptc.Caption%\nKeywords: %Iptc.Keywords%\nTime Created: %Iptc.TimeCreated%\n";

  $iptc_ref=get_iptc_ref();

  $special_char="%";
  $temp_array=explode($special_char, $text);

  for ($i=0;$i<sizeof($temp_array);$i++) {

    // Skip blank entries
    if (!$temp_array[$i]) continue;

    unset($keywordfound);

    if ($key = array_search($temp_array[$i], $iptc_ref)) {

        // Double checking the result to avoid false positive caused by small words
        if ($iptc_ref[$key] != $temp_array[$i]) continue;

        // Found a vavlid keyword, trying to get it's value and then continue to parse
        if ($iptc_header_formated[$temp_array[$i]] != "") {

            $keywordfound = html_safe($iptc_header_formated[$temp_array[$i]]); 
            $okforoutput=1; // This is set so we know we have at least something interessant

        } else $keywordfound=$txt_iptc_missing_value;

    }

     if (isset($keywordfound)) $result .= $keywordfound; else $result .= $temp_array[$i];

  }

  if ($okforoutput) return $result;

}

/**
 * Return an array with all IPTC metadata found in the picture
 * This function is reserved for debugging purposes
 */
function get_iptc_data_raw($image_path)
{
    $size = getimagesize ( $image_path, $info);

    if(is_array($info)) {
        $iptc = iptcparse($info["APP13"]);
    }

    return($iptc);
}

/**
 * Get the title from the picture's metadata and set it into the database, and return it.
 * It uses the metadafield defined in $config['metadata_title_field']
 */
function import_metadata_title($image_path)
{
    global $config;

    // trigger_error('DEBUG:'.__FUNCTION__.'('.$image_path.')', DEBUG);

    if (!preg_match('/^(Exif|Iptc)\./', $config['metadata_title_field'], $matches)) {
        trigger_error('DEBUG:'.__FUNCTION__.'(): Incorrect value for config directive "metadata_title_field"', DEBUG);
        return;
    }

    if (!preg_match('/\.jpe?g$/i',$image_path)) {
        trigger_error('DEBUG:'.__FUNCTION__.'('.$image_path.'): picture type is not handled', DEBUG);
        return;
    }

    // Getting metadata headers if not already loaded
    if ($config['use_exif']) {
        $exif_header=get_exif_data($config['pictures_dir'].$image_path);
    }
    if ($config['use_iptc']) {
        $iptc_header=get_iptc_data($config['pictures_dir'].$image_path);
    }

    // Getting title
    if ($matches[1] == "Exif" && $exif_header) {
        $metadata_title = $exif_header[$config['metadata_title_field']];
    } elseif ($matches[1] == "Iptc" && $iptc_header) {
        $metadata_title = $iptc_header[$config['metadata_title_field']];
    }

    // If we found a title, set it inside the DB
    if ($metadata_title) {
        if (!db_update_pic($image_path, $metadata_title,0)) {
            trigger_error('FAILED to set title from '.$config['metadata_title_field'].' field for '.basename($image_path), WARNING);
        } else $title = $metadata_title;
    }

    // Return the title we've found
    if ($title) return $title;

}

/**
 * Rewrite of the PHP iptcparse() function for phpGraphy
 *
 * Strongly inspired from get_IPTC() of the PHP JPEG Metadata Toolkit (http://electronics.ozhiker.com)
 *
 * Take raw data as input (ideally an IPTC Header)
 * Return an indexed array with all the IPTC tags found in the same format as itpcparse()
 * and recognized by phpGraphy
 */
function iptc_parse($iptc_header_raw) {

    // Most common character sets types
    // (Selected from http://www.iptc.org/IIM/4.1/specification/IIMV4.1.pdf - Appendix C)
    $iptc_charset_ref = array(
        100 => 'iso-8859-1',
        101 => 'iso-8859-2',
        109 => 'iso-8859-3',
        110 => 'iso-8859-4',
        111 => 'iso-8859-5',
        125 => 'iso-8859-7',
        127 => 'iso-8859-6',
        138 => 'iso-8859-8',
        196 => 'utf-8'
        );

    // We're going to call it often, pickup a shorter name
    $data = $iptc_header_raw;

    // Ok now, we're going to parse the data and try to identify sections
    // by using those keys

    $i = 0;

    while ($i < strlen($data)) {

        // Try to find an IPTC record tag marker
        if (ord(substr($data,$i)) != 28) {
            $i++;
            continue;
        }

        // Ok we found one, unpack it
        $iptc_record_raw = unpack( "Ctag_marker/Crecord_no/Cdataset_no/nsize", substr($data,$i) );

        // Skip position over the unpacked data
        $i += 5;

        // Construct the IPTC type string to our internal standard (eg: 2#105)
        $iptc_record_type = sprintf("%01d#%03d", $iptc_record_raw['record_no'], $iptc_record_raw['dataset_no']);

        trigger_error('DEBUG: '.__FUNCTION__.'(): Found IPTC record type('.$iptc_record_type.') size('.$iptc_record_raw['size'].') offset('.$i.')', E_USER_NOTICE);

        // Check if there is sufficient data for reading the record contents
        if (strlen(substr($data, $i, $iptc_record_raw['size'])) !== $iptc_record_raw['size'])
        {
                trigger_error(__FUNCTION__."(): Not enough data left, assuming it's corrupted, exiting", E_USER_NOTICE);
                if ($iptc_header_formated) return $iptc_header_formated; else return false;
        }

        // Is this the character set record ?
        if ($iptc_record_type == "1#090") {

            // Convert the value to human readable format
            //$temp = unpack('Hcharset_code', substr($data, $i, 2));
            //$iptc_record_charset = $temp['charset_code'];
            if (isset($iptc_charset_ref[ord(substr($data, $i + 1, 1))])) {
                $iptc_record_charset = $iptc_charset_ref[ord(substr($data, $i + 1, 1))];
                trigger_error('DEBUG: '.__FUNCTION__.'(): Found recognized IPTC charset definition record ('.$iptc_record_charset.')', E_USER_NOTICE);
            } else {
                $iptc_record_charset = ord(substr($data, $i + 1, 1));
                trigger_error('DEBUG: '.__FUNCTION__.'(): Found unrecognized IPTC charset definition record ('.$iptc_record_charset.')', E_USER_NOTICE);
            }

            $iptc_record_data = $iptc_record_charset;

        } else {
            // Just put the content into a variable
            $iptc_record_data = substr($data, $i, $iptc_record_raw['size']);
        }

        // Add record to the output array
        $iptc_header_formated[$iptc_record_type][] = $iptc_record_data;

        // Skip over the IPTC record data
        $i += $iptc_record_raw['size'];


    } //while

    return $iptc_header_formated;

}

?>
