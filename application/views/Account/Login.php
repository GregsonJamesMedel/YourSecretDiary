<h1 class="shadow">Your Secret Diary</h1>
<div class="forms">
    <form action="<?= base_url('Account/LoginAction'); ?>" method="post">
        <?php if($wrongUserPass){ echo '<span class="error">Wrong Username and Password</span>'; } ?>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?= set_value('username') ?>" required minlength="5" maxlength="25">
        <?= '<span class="error">' . form_error('username') . '</span>' ?>

        <label for="password">Password</label>
        <input type="password" name="password" value="<?= set_value('password') ?>" required minlength="5" maxlength="25">
        <?= '<span class="error">' . form_error('password') . '</span>' ?>

        <input class="button" type="Submit" value="Submit">
    </form>
</div>
