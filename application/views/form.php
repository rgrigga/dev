
    <?php echo Form::open('my/route'); ?>
    <!-- username field -->
    <?php echo Form::label('username', 'Username'); ?>
    <?php echo Form::text('username'); ?>
    <!-- password field -->
    <?php echo Form::label('password', 'Password'); ?>
    <?php echo Form::password('password'); ?>
    <!-- login button -->
    <?php echo Form::submit('Login');
    <?php echo Form::close(); ?>