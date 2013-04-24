<?php
/* @var $this ProjectController */
/* @var $model Project */
$this->layout = 'column1';
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Project','url'=>array('index')),
	array('label'=>'Create Project','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'project-grid',
	'type'=>'bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'header'=>'Sr./Grp #',
			'value'=>'$row+1',
		),
		array(
			'header' => 'Roll No.',
			'type' => 'raw',
			'value' => array($this, 'gridRollNo'),
		),
		array(
			'header' => 'Group Members',
			'type' => 'raw',
			'value' => array($this, 'gridStudents'),
		),
		array(
			'header'=>'Project Title',
			'name'=>'title',
		),
		'code',
		'location',
		array(
			'header' => 'Company',
			'name' => 'company.name',
		),
		array(
			'header' => 'Category',
			'name' => 'category.name',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
	),
)); ?>
