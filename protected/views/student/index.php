<?php
$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'Create Student','url'=>array('create')),
	array('label'=>'Manage Student','url'=>array('admin')),
);
?>

<h1>Students</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
