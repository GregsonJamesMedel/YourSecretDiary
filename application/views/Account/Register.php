<h1 class="shadow">Your Secret Diary</h1>
<div class="forms">
    <form action="<?= base_url('Account/RegistrationAction'); ?>" method="post">
        <label for="username" class="shadow">Username</label>
        <input type="text" name="username" value="<?= set_value('username') ?>" required minlength="5" maxlength="25">
        <?php echo '<span class="error">' . form_error('username') . '</span>'; ?>

        <label for="password">Password</label>
        <input type="password" name="password" value="<?= set_value('password') ?>" required minlength="5" maxlength="25">
        <?php echo '<span class="error">' . form_error('password') . '</span>'; ?>

        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" value="<?= set_value('firstname') ?>" required minlength="5" maxlength="25">
        <?php echo '<span class="error">' . form_error('firstname') . '</span>'; ?>

        <label for="middlename">Middlename</label>
        <input type="text" name="middlename" value="<?= set_value('middlename') ?>" minlength="1" maxlength="25">
        <?php echo '<span class="error">' . form_error('middlename') . '</span>'; ?>

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?= set_value('lastname') ?>" required minlength="5" maxlength="25">
        <?php echo '<span class="error">' . form_error('lastname') . '</span>'; ?>

        <input class="button" type="Submit" value="Submit">
    </form>
</div>