<?php
namespace Ridonk\ClientPortal\Views\Templates;
?>
<main>
<h1>The Default View</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="submit" id="start=true" name="start" value="true">
</form>
</main>
