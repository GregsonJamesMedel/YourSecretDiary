<div class="topnav" id="myTopnav">
    <a href="<?= base_url('Diary/AddNew'); ?>">New Post</a>
    <a href="<?= base_url('Account/Logout'); ?>">Logout</a>
</div>

<div id="sidebar" class="borderwhite">
    <p class="centerAlign shadow">My Diary</p>
    <hr>
    <ul id="sidebarList">
        <?php foreach($Posts as $Post):?>
            <li Id="<?= $Post->Id; ?>" >
                <a href="" id="post" class="shadow tooltip" data-body="<?= $this->encryption->decrypt($Post->Body); ?>"  title="<?= $this->encryption->decrypt($Post->Title); ?>"><?= $Post->DatePost; ?></a>
                <a href="" id="edit" class="edit shadow">E</a>
                <a href="" id="delete" class="delete shadow">D</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div id="diarydiv" class="borderwhite" >
    <h1 id="diaryTitle" class="shadow centerAlign">Hi <?= $this->session->userdata('currentUser')->Firstname; ?>!</h1>
    <p id="diaryBody" class="shadow">How are you today? tell me something! :D</p>
</div>