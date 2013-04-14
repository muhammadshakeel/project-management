<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'company_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
