<?php
$this->breadcrumbs=array(
	'Batches',
);

$this->menu=array(
	array('label'=>'Create Batch','url'=>array('create')),
	array('label'=>'Manage Batch','url'=>array('admin')),
);
?>

<h1>Batches</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
