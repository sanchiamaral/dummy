<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Project Dummy</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <?php 
                if($this->session->flashdata('message')){
                    echo '
                    <div class="alert alert-success">
                    '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                ?>
                <form method="post" action="<?php echo base_url(); ?>register/validation">
                <div class="form-group">
                    <label>Enter Username</label>
                    <input type="text" name="user_username" class="form-control" value="<?php echo set_value('user_username'); ?>" />
                    <span class="text-danger"><?php echo form_error('user_username'); ?></span>
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                    <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="Register" class="btn btn-info" />
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>