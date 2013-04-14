<?php
$this->breadcrumbs=array(
	'Teachers'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Teacher','url'=>array('index')),
	array('label'=>'Create Teacher','url'=>array('create')),
	array('label'=>'Update Teacher','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Teacher','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Teacher','url'=>array('admin')),
);
?>

<h1>View Teacher #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'first_name',
		'last_name',
		'full_name',
	),
)); ?>
