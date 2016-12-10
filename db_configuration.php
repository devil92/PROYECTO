<?php
  //Checking if we are into the OpenShift App
  if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
    $db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']; //Openshift db name OPENSHIFT_MYSQL_DB_USERNAME
    $db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST']; //Openshift db host OPENSHIFT_MYSQL_DB_HOST
    $db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']; //Openshift db password OPENSHIFT_MYSQL_DB_PASSWORD
    $db_name=$_ENV['OPENSHIFT_MYSQL_DB_NAME']; //Openshift db password OPENSHIFT_MYSQL_DB_PASSWORD
  } else {
    $db_user="adminz2xUtyZ"; //my db user
    $db_host="https://openshift.redhat.com/app/console/application/56d5afa02d527177590001bf-phplolo"; //my db host
    $db_password="w3z4Rg5Rx-zQ"; //my db password
    $db_name="phplolo"; //my db name
  }
?>
