<!-- main page content -->
<!-- single page content -->
<div class="emraceFull">
    <div class="embrace clear singlePage">
        <div class="loginBox clear">
            <form action="user/signup" id="form_reg" method="post">
                <div class="input-label">
                    <input type="text" name="email" id="reg_email" placeholder="Print email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email']:''?>">
                </div>
                <div class="input-label">
                    <input type="password" name="pass" id="reg_pass" placeholder="Enter password">
                </div>
                <div class="input-label">
                    <input type="password" name="pass_again" id="reg_pass_again" placeholder="Password again">
                </div>
                <button class="button confirm" type="submit" >Sign up</button>
            </form>
            <p class="notice" id="helpBlock2">
            <?php if(isset($_SESSION['error'])):?>
            <?=$_SESSION['error']?>
            <?php endif;?>
            <?php if(isset($_SESSION['success'])):?>
                <?=$_SESSION['success']?>
            <?php endif;?>
            </p>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data'])?>
