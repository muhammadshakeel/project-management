<?php
$this->breadcrumbs=array(
	'Teachers'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Teacher','url'=>array('index')),
	array('label'=>'Create Teacher','url'=>array('create')),
	array('label'=>'View Teacher','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Teacher','url'=>array('admin')),
);
?>

<h1>Update Teacher <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>