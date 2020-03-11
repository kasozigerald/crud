
<html>

<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
    <span class="help-block"><?php echo $name_err;?></span>
</div>


</html>