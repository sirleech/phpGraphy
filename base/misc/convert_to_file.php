<html>
<pre>
<?

/* This script isn't really part of phpgraphy, it's purpose is only to convert 
*  a MySQL database to the fast text database
* 
*  If you don't need it or if you've already used it, you can safely delete it
*
*  If you've moved the script from its original location, you'll need to change
*  the variable $include_pathbelow so the script is able to find 'config.inc.php'
*  and 'db_mysql.inc.php'
*/

// REMOVE THE FOLLOWING LINE TO RUN THE SCRIPT //
die("This is a protection to avoid others people to run this script, to run it, you need to edit the file and remove the line with this text");

// Include path to change if you've moved the script from its original location
$include_path="../";

// You shouldn't need to edit anything below

if (is_file($include_path."config.inc.php")) include_once $include_path."config.inc.php"; else die("Could not find config.inc.php, please modify include_path in the header section ");
if (is_file($include_path."db_mysql.inc.php")) include_once "../db_mysql.inc.php"; else die("Could not find db_mysql.inc.php, please modify the include_path in the header section");


if(!$confirm) {
?>
This script will convert all data in your MySQL database into the fast text file format that phpGraphy 0.9.8+ uses.

Be sure to have all your MySQL parameters set up correctly in the config.inc.php file.

To launch the conversion, click <a href="?confirm=1">here</a>.
<?
  exit;
}

// erase previous files
echo "Erasing previously generated files... "; flush();
$cmd="select * from $sTable";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $name=$config['pictures_dir'].$row["name"];
  @unlink(dirname($name)."/.thumbs/pictures.dat");
}
$cmd="select * from $sTableComments order by datetime";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $name=$config['pictures_dir'].$row["pic_name"];
  @unlink(dirname($name)."/.thumbs/comments.dat");
}
echo "done.\n"; flush();


// generates pictures data files
echo "Generating pictures data files... "; flush();
$cmd="select * from $sTable";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
while($row=mysql_fetch_array($res)) {
  $name=$config['pictures_dir'].$row["name"];
  @mkdir(dirname($name)."/.thumbs",0755);
  @$fh=fopen(dirname($name)."/.thumbs/pictures.dat","at");
  if($fh) {
    fwrite($fh,$row["name"]."|".addcslashes($row["descr"],"\0..\37!@\177..\377")."|".$row["seclevel"]."\n");
    fclose($fh);
  }
}
echo "done.\n"; flush();


// generates rating data file
echo "Generating rating data file... "; flush();
$cmd="select * from $sTableRatings";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
$fh=fopen($config['data_dir']."ratings.dat","wt");
while($row=mysql_fetch_array($res)) {
  fwrite($fh,$row["pic_name"]."|".$row["ip"]."|".$row["rating"]."\n");
}
fclose($fh);
echo "done.\n"; flush();

// generates comments data files
echo "Generating comments data files... "; flush();
$cmd="select * from $sTableComments order by datetime";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
$fhg=fopen($config['data_dir']."comments.dat","wt");
while($row=mysql_fetch_array($res)) {
  $name=$config['pictures_dir'].$row["pic_name"];
  @mkdir(dirname($name)."/.thumbs",0755);
  $fh=fopen(dirname($name)."/.thumbs/comments.dat","at");
  fwrite($fh,$row["pic_name"]."|".addcslashes($row["comment"],"\0..\37!@\177..\377")."|".$row["datetime"]."|".addcslashes($row["user"],"\0..\37!@\177..\377")."|".$row["ip"]."\n");
  fclose($fh);
  fwrite($fhg,$row["pic_name"]."|".$row["datetime"]."|".addcslashes($row["user"],"\0..\37!@\177..\377")."\n");
}
fclose($fhg);
echo "done.\n"; flush();

// generating user file
echo "Generating user file..."; flush();
$cmd="select * from $sTableUsers";
$res=mysql_db_query($config['db_name'],$cmd,$nConnection);
$fh=fopen($config['data_dir']."users.dat","wt");
while($row=mysql_fetch_array($res)) {
  fwrite($fh,$row["login"]."|".$row["pass"]."|".$row["cookieval"]."|".$row["seclevel"]."\n");
}
fclose($fh);
echo "done.\n"; flush();
?>

If there is some open files errors above, you'd better check file permissions of your pictures and data dirs.
Just make sure that the httpd user/group is able to read and write in those directories.

Otherwise, Now you can modify config.inc.php file so it looks like:
//$database_type="mysql";
$database_type="file";

And everything should works fine :)
</pre>
</html>
