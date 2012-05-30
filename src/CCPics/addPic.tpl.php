<?php if($usercheck['groups'][0]['idGroups'] == "1"):?>

<?=$form->GetHTML()?>

<class='smaller-text silent'><a href='<?=create_url("pics")?>'>Tillbaka till bilder</a></p>
<?php else:?>
<h3>Du har inte behörighet för denna sidan</h3>
<?php endif;?>
