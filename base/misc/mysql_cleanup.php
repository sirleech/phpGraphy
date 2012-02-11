<html>
<pre>
<?

/*
* This script will clean your phpGraphy MySQL database from erronous entries
*  
* It check that every entry in your database is valid by verifying that the file 
* its pointing does really exists
* 
*  If you've moved the script from its original location, you'll need to change
*  the variable $include_pathbelow so the script is able to find 'config.inc.php'
*  and 'db_mysql.inc.php'
*/

// COMMENT OUT THE FOLLOWING LINE TO RUN THE SCRIPT //
die("This is a protection to avoid others people to run this script, to run it, you need to edit the file and remove the line with this text");

// Include path to change if you've moved the script from its original location
$include_path="../";

// You shouldn't need to edit anything below

if (is_file($include_path."config.inc.php")) include_once $include_path."config.inc.php"; else die("Could not find config.inc.php, please modify include_path in the header section ");
if (is_file($include_path."include/db_mysql.inc.php")) include_once $include_path."include/db_mysql.inc.php"; else die("Could not find db_mysql.inc.php, please modify the include_path in the header section");

// Modifying the value of root_dir
if (!preg_match("/^\/.+/", $config['pictures_dir'])) {
    // Assuming root_dir is not absolute and such modifying its value to handle the relative path
    $config['pictures_dir'] = $include_path . $config['pictures_dir'];
}

if(!$_GET['confirm']) {
?>
This script will clean your phpGraphy MySQL database from erronous entries.<br>
It will check for the existance of files in your root_dir which is actually set to: <?php echo $config['pictures_dir'] ?>
Be sure to have a <b><u>valid BACKUP</u></b> of your database before you continue.

To launch the process, <a href="?confirm=1">click here</a>.
<?
  exit;
}

echo "<h4>Checking that your \$config['pictures_dir']($config['pictures_dir']) does exists... <b>[";
if (is_dir($config['pictures_dir'])) {
    echo "OK]</b></h4>";
} else {
    echo "FAILED]</b></h4>";
    die;
}

echo "<h4>Checking table <b>$sTableRatings</b>...</h4>";

$cmd="select * from $sTableRatings";
$res=mysql_db_query($sDB,$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $filename=$config['pictures_dir'].$row["pic_name"];
    if (!is_file($filename)) {
        echo "Removing entry '$filename' <b>[";
        $cmd="DELETE FROM $sTableRatings WHERE pic_name = '".$row["pic_name"]."'";
        if (@mysql_db_query($sDB,$cmd,$nConnection)) echo "OK"; else echo "FAILED";
        echo "]</b><br />";
    }
}

echo "<h4>Checking table <b>$sTableComments</b>...</h4>";

$cmd="select * from $sTableComments";
$res=mysql_db_query($sDB,$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $filename=$config['pictures_dir'].$row["pic_name"];
    if (!is_file($filename)) {
        echo "Removing entry '$filename' <b>[";
        $cmd="DELETE FROM $sTableComments WHERE pic_name = '".$row["pic_name"]."'";
        if (@mysql_db_query($sDB,$cmd,$nConnection)) echo "OK"; else echo "FAILED";
        echo "]</b><br />";
    }
}

echo "<h4>Checking table <b>$sTable</b>...</h4>";

$cmd="select * from $sTable";
$res=mysql_db_query($sDB,$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $filename=$config['pictures_dir'].$row["name"];
    if (!is_file($filename)) {
        echo "Removing entry '$filename' <b>[";
        $cmd="DELETE FROM $sTable WHERE name = '".$row["name"]."'";
        if (@mysql_db_query($sDB,$cmd,$nConnection)) echo "OK"; else echo "FAILED";
        echo "]</b><br />";
    }
}

echo "<b>Done.</b>\n"; flush();
?>
</pre>
</html>
