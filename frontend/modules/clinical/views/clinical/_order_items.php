<?php
use common\models\Concept;
?>
<p>
<?php
 $orderable_model=Concept::getConceptSet($concepts_id);
  foreach($orderable_model as $rows){ 
   $name=$rows["name"];
   $concepts_id=$rows["id"];
    
 echo '<div class="cat comedy">
    <label>
       <input type="checkbox" name="order_data[]" value="'.$concepts_id.'"><span>'.strtoupper($name).'</span>
    </label>
 </div>';
  }
  ?>
 
 
       </p>