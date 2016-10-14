<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.

function get_app_by_id($id)
{
  $app_info = array();

  // normally this info would be pulled from a database.
  // build JSON array.
  switch ($id){
    case 1:
      $app_info = array("os_release_name" => "Icehouse", "app_price" => "Free", "rpc_version" => "9.0"); 
      break;
    case 2:
      $app_info = array("os_release_name" => "Juno", "app_price" => "Free", "rpc_version" => "10.0");
      break;
    case 3:
      $app_info = array("os_release_name" => "Kilo", "app_price" => "Free", "rpc_version" => "11.0");
      break;
    case 4:
      $app_info = array("os_release_name" => "Libety", "app_price" => "Free", "rpc_version" => "12.0");
      break;
    case 5:
      $app_info = array("os_release_name" => "Mitaka", "app_price" => "Free", "rpc_version" => "13.0");
      break;
    case 6:
      $app_info = array("os_release_name" => "Newton", "app_price" => "Free", "rpc_version" => "14.0");
      break;
    case 7:
      $app_info = array("os_release_name" => "Ocata", "app_price" => "Free", "rpc_version" => "15.0");
      break;
  }

  return $app_info;
}

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Icehouse"), array("id" => 2, "name" => "Juno"), array("id" => 3, "name" => "Kilo"), array("id" => 4, "name" => "Liberty"), array("id" => 5, "name" => "Mitaka"), array("id" => 6, "name" => "Newton"), array("id" => 7, "name" => "Ocata")); 

  return $app_list;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";	

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

//return JSON array
exit(json_encode($value));
?>