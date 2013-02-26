<div id="add">
<?php
$attributes=array('class'=>'setForm');
echo validation_errors();
echo form_open('message/add',$attributes);
?>
<form class=setForm>
<label for="content" class=setLabel>content:</label>
<textarea  name="content" rows="10" cols="100"></textarea>
<input class=setInput type="submit" name="submit"value="submit"/>
</form>
</div>
