<h2 class="shadow">Add New Post</h2>
<div class="forms">
    <form action="<?= base_url('Diary/AddNewAction') ?>" method="post">
        <label for="title" >Title</label>
        <input type="text" name="title">
        <?= '<span class="error">' . form_error('title') . '</span>' ?>

        <label for="body">Body</label>
        <textarea name="body" cols="50" rows="10"></textarea>
        <?= '<span class="error">' . form_error('body') . '</span>' ?>

        <label for="datepost">Date</label>
        <input type="date" name="datepost">
        <?= '<span class="error">' . form_error('datepost') . '</span>' ?>

        <input class="button" type="Submit" value="Submit">
        <input class="button" type="Submit" value="Cancel">
        
    </form>
</div>
