<?php
foreach($message as $message_item):
?>
<div class="main">
<h4></h4>
<ul class=list>

    <li>
    <label for="content"><?php echo $message_item['username']?></label>
<p  name="content"><?php echo $message_item['content']?></p>
<span class=date><?php echo $message_item['date']?></span>
</li>

</ul>
</div>
<?php endforeach?>
