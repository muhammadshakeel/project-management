<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Batch','url'=>array('index')),
	array('label'=>'Create Batch','url'=>array('create')),
	array('label'=>'View Batch','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Batch','url'=>array('admin')),
);
?>

<h1>Update Batch <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>