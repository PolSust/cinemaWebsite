<?php $pageTitle = "Cinema - Login" ?>
<?php $title = "Login" ?>


<div class="d-flex justify-content-center">
    <form method="POST" class="col-3">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="example@email.com" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <button type="submit" name="submited" class="btn btn-primary col-12">Login</button>
        <p class="text-center">or</p>
        <a href="index.php?controller=users&action=signup" class="btn btn-outline-primary col-12">Signup</a>
    </form>
</div>

<div class="d-flex justify-content-center">
    <?php
    if ($error != "") {
    ?>
        <div class="alert alert-danger text-center col-5" role="alert">
            <?= $error ?>
        </div>
    <?php
    }
    ?>
</div>