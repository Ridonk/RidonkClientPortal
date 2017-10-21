<?php
require_once (__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
use Ridonk\ClientPortal\Views;
use Ridonk\ClientPortal\Models;
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
new Views\DefaultView();
if(isset($_POST['start'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $register = new Views\RegisterView();
    if(isset($_POST['firstname'])) {
        /*
         * If the user registers, create a new registration model, connect with a new database model and pass the
         * registration model the post data.
         */
        $register->registerModel(new Models\DatabaseNewUser(new Models\DatabaseConnect(),$_POST)); // TODO: Unit test!!
    }
}
?>
</body>
</html>