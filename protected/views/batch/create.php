<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Batch','url'=>array('index')),
	array('label'=>'Manage Batch','url'=>array('admin')),
);
?>

<h1>Create Batch</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>