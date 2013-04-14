<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'roll_no',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model, 'batch_id', 
			CHtml::listData(Batch::model()->findAll(), 'id', 'batch'), 
			array('empty'=>'Select Batch')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
