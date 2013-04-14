<?php
// @property
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form TbActiveForm */
?>

<?php
$companies = CHtml::listData(Company::model()->findAll(array('select'=>'id, name', 'order'=>'name')), 'id', 'name') ;
$categories = CHtml::listData(Category::model()->findAll(array('select'=>'id, name', 'order'=>'name')), 'id', 'name') ;
$batches = CHtml::listData(Batch::model()->findAll(array('select'=>'id, batch', 'order'=>'batch')), 'id', 'batch') ;
//$students = CHtml::listData(Student::model()->findAll(array('select'=>'id, full_name, roll_no', 'order'=>'full_name')), 'id', 'full_name') ;
$students = array();
$teachers = CHtml::listData(Teacher::model()->findAll(array('select'=>'id, full_name', 'order'=>'full_name')), 'id', 'full_name');
//Helper::getInstance()->printObj($students);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'project-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaRow($model,'title',array('class'=>'span5','maxlength'=>1000, 'rows'=>5)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span2','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span4','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'company_id', $companies, array('empty'=>'Select Company', 'class'=>'span4')); ?>

	<?php echo $form->dropDownListRow($model,'category_id', $categories, array('empty'=>'Select Category', 'class'=>'span4')); ?>
	
	<?php echo $form->dropDownListRow($model,'batch_id', $batches, 
		array('prompt'=>'Select Batch', 'class'=>'span4', 'ajax' => array(
			'type'=>'POST', //request type
			'url'=>CController::createUrl('project/getStudents'), //url to call.
			//Style: CController::createUrl('currentController/methodToCall')
			'update'=>'[rel=\'ddlStudents\']', //selector to update
			//'data'=>'js:javascript statement' 
			//leave out the data key to pass all form values through
//			'success'=>'function (data) {
//					console.log(data);
//					alert($("[rel=\'ddlStudents\']").html());
//				}',
		))); ?>

<div class="control-group">	
	<?php echo CHtml::label('Student & marks', 'studentIds', array('class'=>'control-label')); ?>
	
	<div class="controls">
		<?php echo CHtml::activeDropDownList($model,'studentIds[0]', $students, array('class'=>'span3', 'rel'=>'ddlStudents')); ?>
		<?php echo CHtml::activeTextField($model,'marks[0]',array('class'=>'span2','maxlength'=>5)); ?>
	</div>
	<div class="controls">
		<?php echo CHtml::activeDropDownList($model,'studentIds[1]', $students, array('class'=>'span3', 'rel'=>'ddlStudents')); ?>
		<?php echo CHtml::activeTextField($model,'marks[1]',array('class'=>'span2','maxlength'=>5)); ?>
	</div>
	<div class="controls">
		<?php echo CHtml::activeDropDownList($model,'studentIds[2]', $students, array('class'=>'span3', 'rel'=>'ddlStudents')); ?>
		<?php echo CHtml::activeTextField($model,'marks[2]',array('class'=>'span2','maxlength'=>5)); ?>
	</div>
	<div class="controls">
		<?php echo CHtml::activeDropDownList($model,'studentIds[3]', $students, array('class'=>'span3', 'rel'=>'ddlStudents')); ?>
		<?php echo CHtml::activeTextField($model,'marks[3]',array('class'=>'span2','maxlength'=>5)); ?>
	</div>
</div>
	
	<?php echo $form->dropDownListRow($model,'internalAdvisorIds', $teachers, array('class'=>'span4', 'multiple'=>true)); ?>
	
	<?php echo $form->dropDownListRow($model,'externalAdvisorIds', $teachers, array('class'=>'span4', 'multiple'=>true)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>