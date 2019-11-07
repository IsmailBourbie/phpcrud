<?php require_once(App\Config::ROOT('APP') . "views/includes/head.php") ?>

<!-- Include navbar -->
<?php require_once(App\Config::ROOT('APP') . "views/includes/navbar.php") ?>

    <div class="container add-users">
        <h1>Add User by Admin</h1>

        <div class="new-user-form">
            <form action="<?=App\Config::ROOT("URL")?>admin/users/add" method="post">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="input-group-addon" id="basic-addon1"></span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"></span>
                    <input type="text" name="fname" class="form-control" placeholder="First name" required>
                    <span class="input-group-addon" id="basic-addon1"></span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"></span>
                    <input type="text" name="lname" class="form-control" placeholder="Last name" required>
                    <span class="input-group-addon" id="basic-addon1"></span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"></span>
                    <input type="number" name="age" class="form-control" placeholder="Age" min="10" max="100" required>
                    <span class="input-group-addon" id="basic-addon1"></span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn">Add</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php require_once(App\Config::ROOT('APP') . "views/includes/footer.php") ?>