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
*  $Id: db_mysql.inc.php 421 2007-11-30 12:08:38Z oniryx $
*
*/

// MySQL access layer functions


/*****
*
* Variables previously hold in the config.inc.php, don't change them as you'll break
* the compatibility and won't be upgrade using the standard procedure later on.
*
*****/

$sTableDescr = "descr";
$sTableUsers = "users";
$sTableComments = "comments";
$sTableRatings = "ratings";



function quote_smart($value)
{
    // Stripslashes (Commented out because we've handled this at the user input validation level)
    /*
    if (get_magic_quotes_gpc()) {
    $value = stripslashes($value);
    }
    */

    $value = "'" . mysql_real_escape_string($value) . "'";

    return $value;
}

// To ensure compatibility with PHP < 4.3.0, we'll create a mysql_real_escape_string() equiv
// TODO


function db_get_title($nom)
{
    global $config, $nConnection, $sTableDescr;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableDescr.' WHERE name='.quote_smart($nom);

    $res=mysql_db_query($config['db_name'],$query,$nConnection);

    if (mysql_error()) {
        trigger_error("An error has occured while executing $query_name", ERROR);
        trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", DEBUG);
        return false;
    }

    if (!$res) return;

    $row=mysql_fetch_array($res);

    return $row["descr"];

}

/**
 * Return average rating and numbers of votes for a given file
 * This function is called by get_rating()
 * Return indexed array with two columns (avg_rating, nb_votes)
 */
function db_get_rating($filename)
{
    global $config , $nConnection, $sTableRatings;

    $query='SELECT AVG(rating) as avg_rating, COUNT(*) as nb_votes FROM '.$config['db_prefix'].$sTableRatings.' WHERE pic_name='.quote_smart($filename);

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    if (!$res) return;
    $row=mysql_fetch_array($res);

    if (!$row['avg_rating']) return; else return ($row);
}

function already_rated($nom)
{
    global $config ,$nConnection, $sTableRatings;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableRatings.' WHERE pic_name='.quote_smart($nom)." and ip='".getenv("REMOTE_ADDR")."'";

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    if (!$res) return;
    $row=mysql_fetch_array($res);
    return($row);
}

function get_level_db($name)
{
    global $config, $nConnection, $sTableDescr;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableDescr.' WHERE name='.quote_smart($name);

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    if (!$res) return;
    $row=mysql_fetch_array($res);
    return (int)$row["seclevel"];
}

function get_nb_comments($name)
{
    global $config, $nConnection, $sTableComments;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableComments.' WHERE pic_name='.quote_smart($name);

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    return mysql_num_rows($res);
}

function db_get_user_comments($id)
{
    global $config, $nConnection, $sTableComments;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableComments.' WHERE pic_name='.quote_smart($id).' ORDER BY datetime';

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    if (!$res) return;
    $i=0;
    while($row=mysql_fetch_array($res)) {
        $ret[$i]['user']=$row["user"];
        $ret[$i]['datetime']=$row["datetime"];
        $ret[$i]['text']=$row["comment"];
        $ret[$i]['ip']=$row["ip"];
        $ret[$i]['id']=$row["id"];
        $i++;
    }
    return $ret;
}

function db_get_last_commented($dir = null, $nb_last_commented = 15, $seclevel = 0, $from=0)
{
    global $config, $nConnection, $sTableComments, $sTableDescr;

    $dir=stripcslashes($dir);
    if ($dir == "/") unset($dir);
    if (!isset($seclevel)) $seclevel=0;
    $nb_last_commented += $from;

    /*
    As we have to stay compatible with MySQL below 4.1, we have to treat returned data
    To avoid bad performance on database with lot of entries, enabling the use of limit
    and deal with the fact that the same picture commented several times must only
    appear once and also some might not pass the security level check.
    A factor of 10 seem to be a good compromise.
    */
    $limit=(int)$nb_last_commented * 10;

    $query='SELECT pic_name as picname, datetime, user FROM '.$config['db_prefix'].$sTableComments;
    if ($dir) $query.=" WHERE pic_name LIKE ".quote_smart($dir . '%');
    $query.=" ORDER BY datetime desc";
    if ($nb_last_commented) $query.=" LIMIT ".$limit;

    $res=mysql_db_query($config['db_name'],$query,$nConnection);
    // DEBUG
    // echo $query."<br>";
    // echo mysql_error();
    // echo "Size:".mysql_num_rows($res)."<br>";
    // EOF DEBUG
    if (!$res) return;
    $i=0;
    $j=0;

    $_duplicate = array();

    // Code below is to remove duplicate pictures and check inherited level
    while(($row=mysql_fetch_array($res)) && ($i < $nb_last_commented))
    {
        if(isset($_duplicate[ $row["picname"] ])) {
            continue;
        } else {
            $_duplicate[ $row["picname"] ] = true;
        }

        if (get_level($row["picname"]) <= $seclevel) {
            if (is_readable($config['pictures_dir'].$row["picname"])) {
                if($i>=$from) {
                    $ret[$j]['picname'] = $row["picname"];
                    $ret[$j]['datetime'] = $row["datetime"];
                    $ret[$j]['by'] = $row["user"];
                    $j++;
                }
                $i++;
            } else trigger_error("DEBUG: skipping ".stripcslashes($row["picname"]).", file not found - Your DB is not uptodate, you should re-synchronize", DEBUG);
        }
    }

    return $ret;
}

function db_get_top_ratings($dir = null, $nb_top_rating = 10, $seclevel = 0, $from = 0)
{

    global $config, $nConnection, $sTableDescr, $sTableRatings;

    $dir=stripcslashes($dir);
    if ($dir == "/") unset($dir);
    if (!isset($seclevel)) $seclevel=0;
    if (!$nb_top_rating) $nb_top_rating = 10;

    $nb_top_rating += $from;
    $query='SELECT pic_name, avg(rating) AS avg_rating, COUNT(pic_name) as nb_votes FROM '.$config['db_prefix'].$sTableRatings;
    if ($dir) $query.=" WHERE pic_name LIKE ".quote_smart($dir . '%');
    $query.=" GROUP BY pic_name ORDER BY avg_rating DESC, nb_votes";
    if ($nb_top_rating) $query.=" LIMIT ".$nb_top_rating;

    $res=mysql_db_query($config['db_name'],$query,$nConnection);

    if ($mysql_error = mysql_error()) {
        trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", E_USER_NOTICE);
        return false;
    }

    if (!$res) return;

    $i=0;
    $j=0;
    while (($row = mysql_fetch_array($res)) && ($i < $nb_top_rating)) {
        if($j>=$from) {
            $result[$i]['filename'] = $row['pic_name'];
            $result[$i]['avg_rating'] = $row['avg_rating'];
            $result[$i]['nb_votes'] = $row['nb_votes'];
            $i++;
        }
        $j++;
    }

    return $result;

}

function db_add_rating($display,$rating)
{

    global $config, $nConnection, $sTableRatings;

    $query='INSERT INTO '.$config['db_prefix'].$sTableRatings.' (datetime, pic_name, ip, rating) VALUES (now(), '.quote_smart($display).", '".$_SERVER['REMOTE_ADDR']."', ".quote_smart($rating).")";

    $cmd=mysql_db_query($config['db_name'],$query,$nConnection);

    if ($mysql_error = mysql_error()) {
        trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", E_USER_NOTICE);
        return false;
    }

    return true;

}

function db_add_user_comment($picname,$comment,$user)
{

    global $config, $nConnection, $sTableComments;

    $query='INSERT INTO '.$config['db_prefix'].$sTableComments." VALUES (0, ".quote_smart($picname).", ".quote_smart($comment).",'".date("Y-m-d H:i:s")."', ".quote_smart($user).", '".$_SERVER['REMOTE_ADDR']."')";

    $res = mysql_db_query($config['db_name'],$query,$nConnection);

    if (mysql_error()) {

        trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", E_USER_NOTICE);
        return false;

    } else return true;

}

function db_is_login_ok($user,$pass)
{

    global $config, $nConnection, $sTableUsers;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableUsers." WHERE login=".quote_smart($user)." and pass=".quote_smart($pass);

    $res = mysql_db_query($config['db_name'], $query, $nConnection);

    trigger_error("DEBUG: Executing SQL query '".$query."'", DEBUG);

    if (mysql_error()) {
        trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", E_USER_NOTICE);
        return false;
    }


    if(!$res || mysql_num_rows($res)==0 ) 
    {
      if(is_password_encrypted($pass)) return $emptyarray;
      else return db_is_login_ok($user, encrypt_password($pass));
    }

    return mysql_fetch_array($res);

}

/**
 * Return true if password is hashed
 */
function db_is_password_hashed($user)
{

// For now, we can't handle hashed password with MySQL since the password field isn't big enough
// TOTO: Add support for encrypted password with MySQL once database structure change has occured

    return false;

}

function db_get_login($LoginValue)
{

    global $config, $nConnection, $sTableUsers;

    $query="SELECT * FROM ".$config['db_prefix'].$sTableUsers." WHERE cookieval=".quote_smart($LoginValue);

    $res = mysql_db_query($config['db_name'],$query,$nConnection);

    if($res && mysql_num_rows($res)>0 ) return mysql_fetch_array($res);
    return $emptyarray;

}

function db_update_pic($display,$dsc,$lev) {

    global $config, $nConnection, $sTableDescr;

    // FIXME: use UPDATE instead of REPLACE ?
    $query='REPLACE INTO '.$config['db_prefix'].$sTableDescr." VALUES(".quote_smart($display).", ".quote_smart($dsc).", ".quote_smart($lev).")";

    mysql_db_query($config['db_name'],$query,$nConnection);

}

function db_delete_pic($display)
{

    global $config, $nConnection, $sTableDescr, $sTableComments, $sTableRatings;

    // Deleting from the description table
    $query='DELETE FROM '.$config['db_prefix'].$sTableDescr.' WHERE name='.quote_smart($display);
    $db=mysql_db_query($config['db_name'],$query,$nConnection);

    if ($error = mysql_error()) {
        trigger_error("An error has occured while removing the entry from the database", WARNING);
        trigger_error("DEBUG: MySQL Error: $mysql_error while processing '$query'", E_USER_NOTICE);
        return false;
    }

    // Deleting from the comments table
    $query='DELETE FROM '.$config['db_prefix'].$sTableComments.' WHERE pic_name='.quote_smart($display);
    $db=mysql_db_query($config['db_name'],$query,$nConnection);

    if ($error = mysql_error()) {
        trigger_error("An error has occured while removing the entry from the database", WARNING);
        trigger_error("DEBUG: MySQL Error: $mysql_error while processing '$query'", E_USER_NOTICE);
        return false;
    }

    // Deleting from the ratings table
    $query='DELETE FROM '.$config['db_prefix'].$sTableRatings.' WHERE pic_name='.quote_smart($display);
    $db=mysql_db_query($config['db_name'],$query,$nConnection);

    if ($error = mysql_error()) {
        trigger_error("An error has occured while removing the entry from the database", WARNING);
        trigger_error("DEBUG: MySQL Error: $mysql_error while processing '$query'", E_USER_NOTICE);
        return false;
    }

}

function db_del_user_comment($pic,$delcom)
{

    global $config, $nConnection, $sTableComments;

    // FIXME: Is the $pic var not needed
    $query='DELETE FROM '.$config['db_prefix'].$sTableComments.' where id='.quote_smart($delcom);

    $res = mysql_db_query($config['db_name'],$query,$nConnection);

    if(mysql_error()) {
        trigger_error("DEBUG: ".mysql_error()." while executing ''".$query."'", E_USER_NOTICE);
        return false;
    }

}

// User Management

function get_all_user_information()
{
    global $config, $nConnection, $sTableUsers;

    $query = 'SELECT * FROM '.$config['db_prefix'].$sTableUsers;
    $res = mysql_db_query($config['db_name'], $query, $nConnection);

    if(mysql_error()) {
        trigger_error("DEBUG: ".mysql_error()." while executing ''".$query."'", E_USER_NOTICE);
        return false;
    }

    while($user=mysql_fetch_object($res)) {

        $allLoginPassword[] = array('login'=>trim($user->login), 'password'=>trim($user->pass), 'security_level'=>trim($user->seclevel), 'cookie_value'=>trim($user->cookieval));

    }

    return $allLoginPassword;
}


function delete_user($uid)
{

    global $config, $nConnection, $sTableUsers;

    $users = get_all_user_information();

    if(isSet($users[$uid])) {

        $query = 'DELETE FROM '.$config['db_prefix'].$sTableUsers.' WHERE login="'.$users[$uid]['login'].'" AND pass="'.$users[$uid]['password'].'" AND seclevel='.$users[$uid]['security_level'].' AND cookieval='.$users[$uid]['cookie_value'];

        $res = mysql_db_query($config['db_name'], $query, $nConnection);

        if (mysql_error()) {
            trigger_error("DEBUG: ".mysql_error()." while executing ''".$query."'", E_USER_NOTICE);
            return false;

        }
    }
}

function save_user_information($all_user_info)
{

    global $config, $nConnection, $sTableUsers;

    foreach($all_user_info as $line) {

        $res = mysql_db_query($config['db_name'],'SELECT COUNT(*) AS NBR FROM '.$config['db_prefix'].$sTableUsers.' WHERE cookieval="'.$line['cookie_value'].'"');
        $row = mysql_fetch_array($res);

        if($row['NBR']) {

            $query = 'UPDATE '.$config['db_prefix'].$sTableUsers.' SET login="'.$line['login'].'", pass="'.$line['password'].'", cookieval="'.$line['cookie_value'].'", seclevel='.$line['security_level'].' WHERE cookieval="'.$line['cookie_value'].'"';
            $res = mysql_db_query($config['db_name'], $query, $nConnection);

        } else {

            $query = 'INSERT INTO '.$config['db_prefix'].$sTableUsers.' VALUES ("'.$line['login'].'","'.$line['password'].'","'.$line['cookie_value'].'",'.$line['security_level'].')' ;
            $res = mysql_db_query($config['db_name'], $query, $nConnection);

        }

        if (mysql_error()) {
            trigger_error("Error while saving user information", E_USER_ERROR);
            trigger_error("DEBUG: ".mysql_error()." while executing ''".$query."'", E_USER_NOTICE);
            return false;
        }

    }
    return true;
}

// Database check (connection and structure)

function db_check_struct()
{
    // Return false if check failed and true if successful
    // This test that you've created the tables by testing the access to one of those

    global $config, $nConnection, $sTableDescr, $sTableUsers, $sTableComments, $sTableRatings;

    $tables_list=array("sTableDescr", "sTableUsers", "sTableComments", "sTableRatings");

    // $query="SELECT * FROM ".$sTable." LIMIT 0,1";
    foreach ($tables_list as $table) {

        $query='SELECT * FROM '.$config['db_prefix'].$$table." LIMIT 0,1";
        $res = mysql_db_query($config['db_name'],$query,$nConnection);
        if (mysql_error()) {
            trigger_error("DEBUG: Could not find table ".$config['db_prefix'].$$table, E_USER_NOTICE);
            return false;
        }

    }

    return true;

}

function db_check_admin()
{
    // This function check if there's at least one administrator account
    // Return true if yes, false if not

    global $config, $nConnection, $sTableUsers;

    $query='SELECT * FROM '.$config['db_prefix'].$sTableUsers.' WHERE seclevel = 999';

    $res = mysql_db_query($config['db_name'],$query,$nConnection);
    if (mysql_error()) {
        trigger_error("DEBUG: ".mysql_error()." while executing ''".$query."'", E_USER_NOTICE);
        return false;
    }

    if (mysql_num_rows($res) >= 1) {

        return true;

    } else {

        return false;

    }

}

function db_create_struct_from_file()
{

    // This function is now obsolete and the new db_create_struct() should be used instead

    global $config, $nConnection;

    define("DB_STRUCT_FILE", "misc/phpgraphy_struc.sql");

    $phpgraphy_struct = file_get_contents(DB_STRUCT_FILE);

    $queries = explode(";", $phpgraphy_struct);

    foreach ($queries as $query) {

        // This is to avoid trying executing the empty string (previously EOF)
        if (ord($query[0]) == 32) continue;

        $res = mysql_db_query($config['db_name'], $query, $nConnection);

        if (mysql_error()) {

            trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", E_USER_NOTICE);
            return false;
        }
    }
    return true;

}

function db_create_struct() {

    global $config, $nConnection, $sTableDescr, $sTableUsers, $sTableComments, $sTableRatings;

    $queries['create_descr'] = "CREATE TABLE ".$config['db_prefix'].$sTableDescr." (
   name varchar(255) NOT NULL,
   descr text NOT NULL,
   seclevel int(11) DEFAULT '0' NOT NULL,
   PRIMARY KEY (name)
);";

    $queries['create_comments'] = "CREATE TABLE ".$config['db_prefix'].$sTableComments." (
   id int(11) NOT NULL auto_increment,
   pic_name varchar(251) NOT NULL,
   comment text NOT NULL,
   datetime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
   user text NOT NULL,
   ip varchar(16) NOT NULL,
   PRIMARY KEY (id),
   KEY pic_name (pic_name)
);";

    $queries['create_users'] = "CREATE TABLE ".$config['db_prefix'].$sTableUsers." (
   login char(20) NOT NULL,
   pass char(55) NOT NULL,
   cookieval char(128) NOT NULL,
   seclevel int(11) DEFAULT '0' NOT NULL,
   PRIMARY KEY (login)
);";

    $queries['create_ratings'] = "CREATE TABLE ".$config['db_prefix'].$sTableRatings." (
  id int(11) NOT NULL auto_increment,
  datetime datetime NOT NULL default '0000-00-00 00:00:00',
  pic_name varchar(251) NOT NULL default '',
  ip varchar(16) NOT NULL default '',
  rating int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY pic_name (pic_name)
);";

    foreach ($queries as $query_name => $query) {

        $res = mysql_db_query($config['db_name'], $query, $nConnection);

        if (mysql_error()) {
            trigger_error("An error has occured while executing $query_name", ERROR);
            trigger_error("DEBUG: MySQL Error: ".mysql_error(). " while processing '".$query."'", DEBUG);
            return false;
        }

    }

    return true;

}

/**
 * Initialize connection to the MySQL database
 *
 * Initialize a $nConnection variable and if an error occur, feel $mysql_error
 * Every error will be output with a DEBUG level so that we can handle it
 * case by case in the app.
 */
function mysql_db_connect($db_host, $db_name, $db_user, $db_pass)
{
    global $nConnection, $mysql_error, $config;

    // First, we try to use pconnect as it does give better performances (unless config specify not to use it)
    if (function_exists('mysql_pconnect') && $config['db_use_mysql_pconnect']) {

        if (!$nConnection = mysql_pconnect($db_host, $db_user, $db_pass)) {
            trigger_error("DEBUG:mysql_pconnect() FAILED", DEBUG);
            $mysql_error = mysql_error();
            return false;
        }

    } else {
        // Ok pconnect seems to have been disabled, fall back to a normal connect

        if (!$nConnection = mysql_connect($db_host, $db_user, $db_pass)) {
            trigger_error("DEBUG:mysql_connect() FAILED", DEBUG);
            $mysql_error = mysql_error();
            return false;
        }

    }

    // Now, we'll try to acces the database itself
    if (!mysql_select_db($db_name, $nConnection)) {
        trigger_error("DEBUG:mysql_select_db($db_name) FAILED", DEBUG);
        $mysql_error = mysql_error();
        return false;
    }

    // If we're here, everything went fine
    return true;

}

?>
