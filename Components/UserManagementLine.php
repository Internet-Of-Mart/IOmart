<?php
/** @var User $element */
/** @var int $even */
use model\User;
?>

<div class="user_line" style="<?php if ($even % 2 == 0) echo "background-color: #F2EFEB"?>">
    <label><?php echo $element->firstname . ' ' . $element->lastname ?></label>
    <label><?php echo $element->getPositionString()?></label>
    <label><?php echo $element->email?></label>
</div>


