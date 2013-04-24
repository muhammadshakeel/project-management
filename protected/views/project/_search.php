<?php
/* @var $model Project */
?>
<?php
$companies = CHtml::listData(Company::model()->findAll(array('select'=>'id, name', 'order'=>'name')), 'id', 'name') ;
$categories = CHtml::listData(Category::model()->findAll(array('select'=>'id, name', 'order'=>'name')), 'id', 'name') ;
$batches = CHtml::listData(Batch::model()->findAll(array('select'=>'id, batch', 'order'=>'batch')), 'id', 'batch') ;
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'company_id', $companies,array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model,'category_id', $categories,array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model,'batch_id', $batches,array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
