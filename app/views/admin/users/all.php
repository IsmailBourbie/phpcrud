<?php require_once(App\Config::ROOT('APP') . "views/includes/head.php") ?>

<!-- Include navbar -->
<?php require_once(App\Config::ROOT('APP') . "views/includes/navbar.php") ?>

<div class="container users">

    <header class="users-header">
        <h2 class="title">Users</h2>    
    </header>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr data-href="<?=$user->id?>">
                        <td><?= ++$i ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->fname ?></td>
                        <td><?= $user->lname ?></td>
                        <td><?= $user->age ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once(App\Config::ROOT('APP') . "views/includes/footer.php") ?>