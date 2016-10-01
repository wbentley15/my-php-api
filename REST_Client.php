<html>
 <body>

<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_app") 
{
  $app_info = file_get_contents('http://172.23.112.90/api.php?action=get_app&id=' . $_GET["id"]);
  $app_info = json_decode($app_info, true);
  ?>
    <table>
      <tr>
        <td>OpenStack Release Name: </td><td> <?php echo $app_info["os_release_name"] ?></td>
      </tr>
      <tr>
        <td>Price: </td><td> <?php echo $app_info["app_price"] ?></td>
      </tr>
      <tr>
        <td>RPC Version: </td><td> <?php echo $app_info["rpc_version"] ?></td>
      </tr>
    </table>
    <br />
    <a href="http://172.23.112.90/REST_Client.php?action=get_app_list" alt="app list">Return to the app list</a>
  <?php
}
else // else take the app list
{
  $app_list = file_get_contents('http://172.23.112.90/api.php?action=get_app_list');
  $app_list = json_decode($app_list, true);
  ?>
    <ul>
    <?php foreach ($app_list as $app): ?>
      <li>
        <a href=<?php echo "http://172.23.112.90/REST_Client.php?action=get_app&id=" . $app["id"]  ?> alt=<?php echo "app_" . $app_["id"] ?>><?php echo $app["name"] ?></a>
    </li>
    <?php endforeach; ?>
    </ul>
  <?php
} ?>
 </body>
</html>