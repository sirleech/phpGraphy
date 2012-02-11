<?php
/*
*  Copyright (C) 2004-2007 JiM / aEGIS and the phpGraphy DevTeam
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
*  $Id: db_file.inc.php 426 2008-02-19 22:16:05Z oniryx $
*
*/

// This emulates a database using simple pipe separated values text files
// It uses php arrays for caching data


$users_filepath    = $config['data_dir']."users.dat";
$rating_filepath   = $config['data_dir']."ratings.dat";
$comments_filepath = $config['data_dir']."comments.dat";


function quote_smart($input)
{

    // This function is an 'equivalent' to the quote_smart for MySQL
    // It escape all dangerous ASCII characters and also
    // encode the pipe character as it's used as field separator

    $output = str_replace("|", "%7C", $input);
    $output = addcslashes($output,"\0..\37!@\177..\377");

    return $output;

}

function unquote_smart($input)
{

    $output = stripcslashes($input);
    $output = str_replace('%7C', '|', $output);

    return $output;

}


function get_picture_data($name) {

  global $db_picdata,$db_datloaded;
  global $config;

  $datname=$config['pictures_dir'].dirname($name)."/.thumbs/pictures.dat";

  if($db_datloaded[$datname]) return $db_picdata[$name];

	if(!file_exists($datname)) return;

	$fh=fopen($datname,"rt");
	if ($config['use_flock']) flock($fh,LOCK_SH);

	while(!feof($fh)) {
      $line=fgets($fh,4096);
      if(!$line) continue;
      $a=explode("|",$line);
      $db_picdata[$a[0]]=$a;
	    }

  fclose($fh);
  $db_datloaded[$datname]=1;
  return $db_picdata[$name];
}

function load_rating_data() {

    global $db_ratingdata,$db_ratingloaded,$db_ratingip;
    global $config, $rating_filepath;

    $db_ratingloaded=1;
    $datname = $rating_filepath;

    if(!file_exists($datname)) return;

    $fh=fopen($datname,"rt");
    if($fh!==false) {
    
      if ($config['use_flock']) flock($fh,LOCK_SH);
  
      while(!feof($fh)) {
          $line=fgets($fh,4096);
          if(!$line) continue;
          $a=explode("|",$line);
          $db_ratingdata[$a[0]][0]+=$a[2];
          $db_ratingdata[$a[0]][1]++;
          $db_ratingip[$a[1]][$a[0]]=1;
      }
  
      fclose($fh);
  
      trigger_error('DEBUG: '.__FUNCTION__.'() - Loaded '.count($db_ratingdata).' records', DEBUG);

    }
    return 1;
}

function get_rating_data($name) {
  global $db_ratingdata,$db_ratingloaded,$db_ratingip;
  global $config;
  if(!$db_ratingloaded) load_rating_data();
  return $db_ratingdata[$name];
}

function db_get_title($nom)
{
  $data=get_picture_data($nom);
  if(!$data) return;
  return unquote_smart($data[1]);
}

/**
 * Return average rating and numbers of votes for a given file
 * This function is called by get_rating()
 * Return indexed array with two columns (avg_rating, nb_votes)
 */
function db_get_rating($picname)
{

    $data=get_rating_data($picname);

    if(!$data) return false;

    $avg_rating = $data[0] / $data[1];

    $output = array('avg_rating' => $avg_rating, 'nb_votes' => $data[1]);

    return $output;
}

function already_rated($nom)
{
  global $db_ratingdata,$db_ratingloaded,$db_ratingip;
  global $config;
  if(!$db_ratingloaded) load_rating_data();
  if($db_ratingip[getenv("REMOTE_ADDR")][stripslashes($nom)]) return 1;
  return 0;
}

function get_level_db($nom)
{
//  echo "getlev: $nom<br>";
  $data=get_picture_data($nom);
  if(!$data) return 0;
  return $data[2];
}

function load_user_comments_data($datname) {

	global $db_comdata,$db_nbcomdata,$db_datloaded;
	global $config;

	if(!file_exists($datname)) return;

	$fh=fopen($datname,"rt");
	if($fh!==false) {
	  if ($config['use_flock']) flock($fh,LOCK_SH);

	  while(!feof($fh)) {
	    $line=fgets($fh,4096);
	    if(!$line) continue;
	    $a=explode("|",$line);
	    $i=(int)($db_nbcomdata[$a[0]]++);
	    $db_comdata[$a[0]][$i]['user']=unquote_smart($a[3]);
	    $db_comdata[$a[0]][$i]['datetime']=$a[2];
	    $db_comdata[$a[0]][$i]['text']=unquote_smart($a[1]);
	    $db_comdata[$a[0]][$i]['ip']=$a[4];
	    $db_comdata[$a[0]][$i]['id']=$i+1;
	  }

	  fclose($fh);
	  $db_datloaded[$datname]=1;
	}
  return 1;
}

function get_nb_comments($name)
{
  global $db_comdata,$db_nbcomdata,$db_datloaded;
  global $config;
  $datname=$config['pictures_dir'].dirname($name)."/.thumbs/comments.dat";
  if(!$db_datloaded[$datname])
    if(!load_user_comments_data($datname)) return 0;
  return (int)$db_nbcomdata[$name];
}

function db_get_user_comments($name) {
  global $db_comdata,$db_nbcomdata,$db_datloaded;
  global $config;
  $datname=$config['pictures_dir'].dirname($name)."/.thumbs/comments.dat";
  if(!$db_datloaded[$datname])
    if(!load_user_comments_data($datname)) return $emptyarray;
  return $db_comdata[$name];
}

function db_get_last_commented($dir = "/", $nb_last_commented = 15, $seclevel = 0, $from = 0)
{

    // Rewrite of get_last_user_comments with 2 more arguments: seclevel and nb_last_commented
    // With those changes, we won't have to worry during the display phase

    global $config, $comments_filepath;

    if (!$dir) $dir="/";

    $dir=stripcslashes($dir);
    $datname=$comments_filepath;
    if(!file_exists($datname)) {
        trigger_error("DEBUG: $datname does not exists", DEBUG);
        return;
        }

    $nb_last_commented += $from;

    // Retrieve 5 times more entries than requested to handle
    // the eventual files discarded by the security level check
    if ($dir == "/") {
        $nb_lines_to_parse = $nb_last_commented * 5;
    } else {
        // Increase multiplicator factor by 10 if directory filterting is enabled
        // Note that this will slow down the process and there is no other way around this
        // MySQL is recommended for bigger pictures/commentes collection
        $nb_lines_to_parse = $nb_last_commented * 50;
    }
    // Set this to a minimum
    if ($nb_lines_to_parse < 50) $nb_lines_to_parse = 50;

    $last_commented = read_n_lastlines($datname, $nb_lines_to_parse);

    $i =0;
    $j =0;
    foreach ($last_commented as $line) {

        $a = explode("|",$line);

        if (strstr(dirname($a[0]).'/',$dir)) {
            if (is_readable($config['pictures_dir'].stripcslashes($a[0]))) {
                if (get_level($a[0])<=(int)$seclevel) {

                    if($i>=$from) {
                        // Assign name to each field to handle future changes at the code level
                        $ret[$j]['picname'] = $a[0];
                        $ret[$j]['datetime'] = $a[1];
                        $ret[$j]['by'] = unquote_smart($a[2]);
                        $j++;
                    }
                    $i++;
                    // $ret[] = $a;

                } // else skipping because of it's security level
            } else trigger_error("DEBUG: skipping ".stripcslashes($a[0]).", file not found - Your DB is not uptodate, you should re-synchronize", DEBUG);
        } // else skipping because it's not within the requested diretory

    }

    // If no result, return n0w !
    if (!$ret) return;

    // Sorting result to have picture only once

    $ret2=array();
    $nb_last_commented-=$from;
    if (sizeof($ret) < $nb_last_commented) $nb_last_commented = sizeof($ret);
    
    // Remove duplicate pictures and keep only the latest comment
    foreach ($ret as $data) {

        if (!array_search_r($data['picname'],$ret2)) $ret2[]=$data;

    }

    // Keep only the $nb_last_commented
    $ret2=array_slice($ret2, 0, $nb_last_commented);

    return $ret2;

}

function array_search_r($needle, $haystack){
  foreach($haystack as $value) {
    if(is_array($value)) $match=array_search_r($needle, $value);
    if($value==$needle) $match=1;
    if($match) return 1;
  }
return 0;
}


function db_get_top_ratings($dir = "/", $nb_top_rating = 10, $seclevel = 0, $from = 0)
{

    global $db_ratingdata,$db_ratingloaded;
    global $config;

    if(!$db_ratingloaded) load_rating_data();

    if (!$db_ratingdata) return;

    reset($db_ratingdata);

    $i=0;
    foreach ($db_ratingdata as $key => $val) {

        if (strstr(dirname($key).'/',$dir)) {
                $ret[$i]['filename'] = $key;
                $ret[$i]['avg_rating'] = $val[0] / $val[1];
                $ret[$i]['nb_votes'] = $val[1];
                $i++;
        }

    }

    // Sort the array a first time to keep the best challengers
    usort($ret,'avg_rating_cmp');

    // Limit the number of entries (We must do this at the end because of avg rating calcul)
    $ret=array_slice($ret,$from,$nb_top_rating);

    return $ret;
}

/**
 * Comparison function to be used along with a array sorting function
 * This function is the same as rating_cmp but with a different arrays's key
 */
function avg_rating_cmp($a, $b) {
    if($a['avg_rating'] == $b['avg_rating']) return 0;
    return ($a['avg_rating'] < $b['avg_rating'])?1:-1;
}


function db_add_rating($display,$rating)
{

    global $db_ratingloaded,$db_ratingdata;
    global $config, $rating_filepath;

    $datname = $rating_filepath;

    if (is_file($datname) && !is_writable($datname)) {

        if ($config['debug_mode'] > 2) {
            trigger_error("DEBUG: Unable to open file ".$datname." for writing", DEBUG);
        } else trigger_error("Unable to open rating file for writing, please check the permissions", WARNING);

        return false;
    }

    $fh=fopen($datname,"a+");
    if ($config['use_flock']) flock($fh,LOCK_EX);
    fseek($fh,0,SEEK_END);
    fwrite($fh,stripslashes($display)."|".getenv("REMOTE_ADDR")."|".quote_smart($rating)."\n");
    fclose($fh);

    $db_ratingloaded=0;
    unset($db_ratingdata);

    return true;
}

function db_add_user_comment($picname,$comment,$user) {

  global $db_comdata,$db_nbcomdata,$db_datloaded;
  global $config, $comments_filepath;

  $datname=$config['pictures_dir'].dirname($picname)."/.thumbs/comments.dat";

  if (is_file($datname) && !is_writable($datname)) {

        if ($config['debug_mode'] > 2) {
            trigger_error("DEBUG: Unable to open file ".$datname." for writing", DEBUG);
        } else trigger_error("Unable to open the users file for writing, please check the permissions", WARNING);

		return false;
    }

  $fh=fopen($datname,"a+");
  if ($config['use_flock']) flock($fh,LOCK_EX);
  fseek($fh,0,SEEK_END);
  fwrite($fh,$picname."|".quote_smart($comment)."|".date("Y-m-d H:i:s")."|".quote_smart($user)."|".getenv("REMOTE_ADDR")."\n");
  fclose($fh);

  unset($db_datloaded[$datname]);

  $datname=$comments_filepath;

  if (is_file($datname) && !is_writable($datname)) {

        if ($config['debug_mode'] > 2) {
            trigger_error("DEBUG: Unable to open file ".$datname." for writing", DEBUG);
        } else trigger_error("Unable to open the users file for writing, please check the permissions", WARNING);

		return false;
    }

  $fh=fopen($datname,"a+");
  if ($config['use_flock']) flock($fh,LOCK_EX);
  fseek($fh,0,SEEK_END);
  fwrite($fh,$picname."|".date("Y-m-d H:i:s")."|".quote_smart($user)."\n");
  fclose($fh);

}

function db_is_login_ok($user,$pass)
{
    global $users_filepath;

    $datname = $users_filepath;

    if (!is_readable($datname)) {
        trigger_error("DEBUG: Unable to open ".$datname, DEBUG);
        return false;
    }


    $fh=fopen($datname,"rt");
    if($fh!==false) {
      while(!feof($fh)) {
        $line=fgets($fh,4096);
        if(!$line) continue;
        $a=explode("|",$line);
        if($a[0]==$user && $a[1]==$pass) {
          $a["login"]=$a[0];
          $a["seclevel"]=$a[3];
          $a["cookieval"]=$a[2];
          fclose($fh);
          return $a;
        }

      }

      fclose($fh);
    }
    return $emptyarray;
}

/**
 * Return true if password is hashed, false if not
 */
function db_is_password_hashed($user)
{

// For now, we can't handle hashed password with MySQL since the password field isn't big enough
// TOTO: Add support for encrypted password with MySQL once database structure change has occured

    global $users_filepath;

    $datname = $users_filepath;

    if (!is_readable($datname)) {
        trigger_error("DEBUG: Unable to open ".$datname, DEBUG);
        return false;
    }


    $fh=fopen($datname,"rt");
    if($fh!==false) {
        while(!feof($fh)) {
            $line=fgets($fh,4096);
            if(!$line) continue;
            $a=explode("|",$line);
            if($a[0]==$user) {
                if (is_password_encrypted($a[1])) {
                    $pass_hashed = 1;
                    break;
                }
            }

        }

        fclose($fh);
    }
    if ($pass_hashed) return true; else return false;

}

function db_get_login($LoginValue)
{

    global $users_filepath;

    $datname = $users_filepath;

    if (!is_file($datname)) {
        trigger_error(sprintf("DEBUG: File not found '%s'", $users_filepath), DEBUG);
        return false;
    }

    if (!is_readable($datname)) {
        trigger_error(sprintf("Unable to open the users file, please check permissions of '%s'", $users_filepath), ERROR);
        return false;
    }

    $fh=fopen($datname,"rt");
    if($fh!==false) {
        while(!feof($fh)) {
            $line=fgets($fh,4096);
            if(!$line) continue;
            $a=explode("|",$line);
            if($a[2]==$LoginValue) {
                $a["login"]=$a[0];
                $a["seclevel"]=$a[3];
                $a["cookieval"]=$a[2];
                fclose($fh);
                return $a;
            }
        }

        fclose($fh);
    }
    return $emptyarray;
}

function db_update_pic($display,$dsc,$lev) {

	global $db_picdata,$db_datloaded;
    global $config;

  $display=stripslashes($display);
  $datname=$config['pictures_dir'].dirname($display)."/.thumbs/pictures.dat";

    if (!is_readable(dirname($datname))) {
        if (!@mkdir(dirname($datname),0755)) {
            trigger_error("Unable to create ".dirname($datname).", check permissions of the parent directory", WARNING);
			return false;
		}
        if ($config['default_file_permissions']) chmod(dirname($datname), $config['default_file_permissions']);
	}

    if (is_file($datname) && !is_writable($datname)) {
        trigger_error("File $datname is not writable, check permissions of the file", ERROR);
        return false;
	}

	$fh=fopen($datname,"a+");

	if ($config['use_flock']) {
		 if (!flock($fh,LOCK_EX)) trigger_error("Unable to obtain LOCK on $datname", WARNING);
	}

    if (!rewind($fh)) {
        trigger_error("Unable to SEEK on $datname", ERROR);
		return false;
	}

    $i=0;
    while(!feof($fh)) {
        $line=fgets($fh,4096);
        if(!$line) continue;
        $a=explode("|",$line);
        if($a[0]!=$display) $comm[$i++]=$line;
    }

    if (!ftruncate($fh,0)) {
        trigger_error("Unable to TRUNCATE $datname", ERROR);
    }

    for ($i=0;$i<sizeof($comm);$i++) fwrite($fh,$comm[$i]);

    if (!fwrite($fh,$display."|".quote_smart($dsc)."|".quote_smart($lev)."\n")) {
        trigger_error("Unable to WRITE in $datname", ERROR);
    }

    fclose($fh);
    $db_datloaded[$datname]=0;
	return true;

}

function db_delete_pic($display) {

  global $db_picdata,$db_datloaded;
  global $config;

  $display=stripslashes($display);
  $datname=$config['pictures_dir'].dirname($display)."/.thumbs/pictures.dat";

  if (!is_file($datname)) return true;

  if (!is_writable($datname)) {
     trigger_error("Unable to write to $datname, check permissions of the file", ERROR);
     return false;
     }

  $fh=fopen($datname,"a+");

	if ($config['use_flock']) {
		 if(!flock($fh,LOCK_EX)) trigger_error("Unable to obtain LOCK on $datname", WARNING);
	   }

  if (!rewind($fh)) {
		 trigger_error("Unable to SEEK on $datname", ERROR);
		 return false;
	   }

    $i=0;
    while(!feof($fh)) {
      $line=fgets($fh,4096);
      if(!$line) continue;
      $a=explode("|",$line);
      if($a[0]!=$display) $comm[$i++]=$line;
     }
    ftruncate($fh,0);
    for($i=0;$i<sizeof($comm);$i++)
      fwrite($fh,$comm[$i]);

	fclose($fh);

// Now deleting comments
db_del_user_comment($display,"all");

}

function db_del_user_comment($pic,$delcom)
{
    global $db_comdata,$db_nbcomdata,$db_datloaded;
    global $config, $comments_filepath;

// If delcom is equal to "all" then will delete all matching comments

    $datname=$config['pictures_dir'].dirname($pic)."/.thumbs/comments.dat";
    if (is_file($datname) && !is_writable($datname)) {
        trigger_error("Unable to write to $datname, check permissions of the file", ERROR);
        return false;
    }

    $fh=fopen($datname,"a+");
	if ($config['use_flock']) {
        if(!flock($fh,LOCK_EX)) trigger_error("Unable to obtain LOCK on $datname", WARNING);
	}

    if (!rewind($fh)) {
        trigger_error("Unable to SEEK on $datname", ERROR);
        return false;
    }

    $i=0; $j=0;
    while(!feof($fh)) {
      $line=fgets($fh,4096);
      if(!$line) continue;
      $a=explode("|",$line);
      if($a[0]==$pic) {
        if($j==(($delcom)-1) || $delcom == "all") { $todel=$a; }
        else $comm[$i++]=$line;
        $j++;
      } else $comm[$i++]=$line;
    }
    ftruncate($fh,0);
    for($i=0;$i<sizeof($comm);$i++)
      fwrite($fh,$comm[$i]);

    fclose($fh);
    $db_datloaded[$datname]=0;
    if($todel || $delcom == "all") {
    unset($comm);
    // update last user comments file
    $datname=$comments_filepath;
		if (is_file($datname) && !is_writable($datname)) {
			trigger_error("Unable to write to $datname, check permissions of the file", ERROR);
			return false;
			}
    $fh=fopen($datname,"a+");
	if ($config['use_flock']) {
		 if(!flock($fh,LOCK_EX)) trigger_error("Unable to obtain LOCK on $datname", WARNING);
	   }

  if (!rewind($fh)) {
		 trigger_error("Unable to SEEK on $datname", ERROR);
		 return false;
	   }

    $i=0;
    while(!feof($fh)) {
        $line=fgets($fh,4096);
        if(!$line) continue;
        $a=explode("|",$line);
        if($a[0]==$pic && ($a[1]==$todel[2] || $delcom == "all")) { }
        else $comm[$i++]=$line;
      }
      ftruncate($fh,0);
      for($i=0;$i<sizeof($comm);$i++)
        fwrite($fh,$comm[$i]);

		fclose($fh);
  }
}

// User management

function get_all_user_information()
{
    global $users_filepath;

    if (!is_readable($users_filepath)) {
        trigger_error("DEBUG: Unable to open ".$users_filepath, DEBUG);
        return false;
    }

    $users = file($users_filepath);

    foreach($users as $value) {
        list($login, $passwd, $cki, $sec_lvl) = explode('|',$value);
        $allLoginPassword[] = array('login'=>trim($login), 'password'=>trim($passwd), 'security_level'=>trim($sec_lvl), 'cookie_value'=>trim($cki));
    }

    return $allLoginPassword;
}

function delete_user($uid) {

    $all_user_info = get_all_user_information();

    if(isSet($all_user_info[$uid])) {
        unset($all_user_info[$uid]);
        save_user_information($all_user_info);
    }
}

function save_user_information($all_user_info)
{
	global $config, $users_filepath;

    $data = '';
    foreach($all_user_info as $line) {
        $data .= quote_smart($line['login']).'|'.quote_smart($line['password']).'|'.quote_smart($line['cookie_value']).'|'.quote_smart($line['security_level'])."\n";
    }

    if (!$fd = fopen($users_filepath,'w')) {
      trigger_error('Unable to open users file for writing', ERROR);
      return false;
    }

    if ($config['use_flock'] && file_exists($users_filepath)) flock($fd, LOCK_EX);

    if (!fwrite($fd, $data)) {
      trigger_error('Unable to write the users file', ERROR);
      return false;
    }

    fclose($fd);
    return true;
}
?>
