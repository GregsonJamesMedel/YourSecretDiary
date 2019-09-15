<h2 class="shadow">Edit Post</h2>
<div class="forms">
    <form action="<?= base_url('Diary/EditPostAction/') . $id; ?>" method="post">
        <label for="title" >Title</label>
        <input type="text" name="title" value="<?= $title; ?>">
        <?= '<span class="error">' . form_error('title') . '</span>' ?>

        <label for="body">Body</label>
        <textarea name="body" cols="50" rows="10"><?= $body; ?></textarea>
        <?= '<span class="error">' . form_error('body') . '</span>' ?>

        <label for="datepost">Date</label>
        <input type="date" name="datepost" value="<?= $datepost; ?>">
        <?= '<span class="error">' . form_error('datepost') . '</span>' ?>

        <input class="button" type="Submit" value="Submit">
        
    </form>
</div>
