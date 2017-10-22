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
    $register = new \Ridonk\ClientPortal\Controllers\NewUserController();
    if (isset($_POST['firstname'])) {
        $register->addNewUser($_POST);
    }
}
?>
</body>
</html>