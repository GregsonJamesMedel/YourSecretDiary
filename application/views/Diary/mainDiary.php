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
    <h1 id="diaryTitle" class="shadow centerAlign">Your Title</h1>
    <p id="diaryBody" class="shadow">beatae in, vero velit quas est magni rem totam nulla optio! sit amet Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores, natus. Obcaecati voluptas tenetur accusantium eligendi, ad inventore fugiat vitae voluptatem ratione ipsum suscipit, laborum cupiditate distinctio nobis illo, commodi sed cumque tempora doloribus velit illum nulla quos sapiente harum! Quam facere corrupti maiores asperiores impedit doloribus quaerat quasi illo obcaecati dignissimos accusamus nulla tenetur maxime odio similique vel quis minus aliquid harum rerum, amet possimus deserunt quas. Delectus animi, voluptatem error molestiae dignissimos aperiam alias eaque tenetur beatae, magnam iste eum, odio ducimus? Dolore, recusandae illo. Accusantium, fugiat. Commodi minus exercitationem cum labore repellat qui. Nisi odio reiciendis consequatur vitae! consectetur adipisicing elit. Nam quaerat laborum, excepturi minus enim labore, totam consequatur magni ratione accusantium dolore deleniti, necessitatibus vero reprehenderit quibusdam. Magni autem nulla aut ipsum iste hic exercitationem at animi facere eius perspiciatis ab ducimus excepturi molestiae suscipit rem, maxime nemo omnis quibusdam veritatis numquam ipsam. Explicabo, mollitia reiciendis. Iure est maiores dolores eos repellat facilis, minus nulla corrupti suscipit consectetur dicta illo, neque magnam? In voluptas corporis asperiores praesentium eveniet eum ullam aspernatur necessitatibus illo dolorem reprehenderit, eos sequi provident voluptates perspiciatis quibusdam distinctio cupiditate nam iste. Accusantium nisi temporibus magni ipsam laborum? ipsum dolor sit amet consectetur adipisicing elit. Culpa, odit! Modi ea quas, reiciendis provident eos similique recusandae dolorem ratione, asperiores autem quam mollitia cumque ducimus sed quidem? Harum dignissimos dolor illum, et quis sint atque ab, sed aut nemo ad tempora fugiat quibusdam eius vero recusandae, unde veniam? Sunt voluptates, impedit cum aperiam excepturi officiis itaque odio? Nulla dicta veniam reiciendis voluptatum repellat iste nostrum veritatis ut saepe, necessitatibus itaque aperiam, quas voluptatibus sequi reprehenderit praesentium. Quas alias dolorum praesentium sequi ullam! Dolore molestiae suscipit, quasi commodi cupiditate quae tempore a, fugit optio eligendi iste architecto soluta! Soluta, excepturi.</p>
</div>