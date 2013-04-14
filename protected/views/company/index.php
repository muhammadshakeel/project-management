<?php
$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create Company','url'=>array('create')),
	array('label'=>'Manage Company','url'=>array('admin')),
);
?>

<h1>Companies</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
