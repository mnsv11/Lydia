<?php if($contents != null):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <?php foreach($contents as $val):?>

	  <?php if($contents['title']): ?>
		    <h2><?=esc($val['title'])?></h2>
		    
		    <p class='smaller-text'><em>Posted on <?=$val['created']?> by <?=$val['owner']?></em></p>
		    <p><?=filter_data($val['data'], $val['filter'])?></p>
		     
	       <?php if($usercheck['acronym'] == $val['owner'] || $usercheck['groups'][0]['idGroups'] == "1"):?>
	       	
		    <p class='smaller-text silent'><a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a>
		   

	  <?php endif;?>  
	  </div>
<class='smaller-text silent'><a href='<?=create_url("page")?>'>Tilbaka till nyheter</a></p>
	  <?php endif;?>
	       <?php if($usercheck['acronym']):?>
	       <?=$form->GetHTML()?>
	       <?php endif;?>
	  
	       
	       
	       
<?php 
$check = false;
foreach($entries as $val)
{
      if($val['key'] == $contents['id'])
      {
      	     $check = true;
      }
}
?>

<?php if($check == true):?>
<h2>Kommentarer</h2>
<?php endif;?>

<?php foreach($entries as $val):?>
  <?php if($val['key'] == $contents['id']):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <p><?=htmlent($val['data'])?></p>
  <p>At: <?=$val['created']?></p>
</div>
  <?php endif;?>
<?php endforeach;?>

	  
	  
	  
	    
  <?php endforeach; ?>

<?php else:?>
  <p>404: No such pages exists.</p>
<?php endif;?>
