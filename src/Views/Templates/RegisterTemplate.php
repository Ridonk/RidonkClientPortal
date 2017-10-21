<main role="main">
    <form action="<?php echo $this->controller; ?>" method="post"> <?php // TODO: link controller ?>
        <label for="firstname">First Name: </label>
        <input name="firstname" id="firstname" type="text" placeholder="Jane" required><br>
        <label for="lastname">Last Name: </label>
        <input name="lastname" id="lastname" type="text" placeholder="Doe" required><br>
        <label for="email">E-Mail: </label>
        <input name="email" id="email" type="email" placeholder="janedoe@example.com" required><br>
        <label for="password">Password: </label>
        <input name="password" id="password" type="password" placeholder="*********" required><br>
        <input type="submit" name="submit" value="Register Now">
    </form>
</main>
