<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Batch', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/batch/create')),
					array('label'=>'Manage', 'url'=>array('/batch/admin')),
				)),
				array('label'=>'Student', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/student/create')),
					array('label'=>'Manage', 'url'=>array('/student/admin')),
				)),
				array('label'=>'Teacher', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/teacher/create')),
					array('label'=>'Manage', 'url'=>array('/teacher/admin')),
				)),
				array('label'=>'Category', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/category/create')),
					array('label'=>'Manage', 'url'=>array('/category/admin')),
				)),
				array('label'=>'Company', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/company/create')),
					array('label'=>'Manage', 'url'=>array('/company/admin')),
				)),
				array('label'=>'Project', 'url'=>'#', 'items'=>array(
					array('label'=>'Create', 'url'=>array('/project/create')),
					array('label'=>'Manage', 'url'=>array('/project/admin')),
				)),
                //array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by NED University of Engineering & Tech.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
