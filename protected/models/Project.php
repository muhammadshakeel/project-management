<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property string $id
 * @property string $title
 * @property string $code
 * @property string $location
 * @property string $company_id
 * @property string $category_id
 * @property string $batch_id
 * @property string $created_on
 * @property string $modified_on
 *
 * The followings are the available model relations:
 * @property ProjectAdvisor[] $projectAdvisors
 * @property Category $category
 * @property Company $company
 * @property Batch $batch
 * @property StudentProjectGroup[] $studentProjectGroups
 * @property StudentProjectGroup[] $members 
 */
class Project extends CActiveRecord
{
	public $studentIds = array();
	public $internalAdvisorIds = array();
	public $externalAdvisorIds = array();
	public $marks = array();
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, company_id, category_id, batch_id', 'required'),
			array('title', 'length', 'max'=>1000),
			array('code', 'length', 'max'=>20),
			array('location', 'length', 'max'=>200),
			array('company_id, category_id, batch_id', 'length', 'max'=>10),
			array('studentIds, internalAdvisorIds, externalAdvisorIds, marks', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, code, location, company_id, category_id, batch_id, created_on, modified_on', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'projectAdvisors' => array(self::HAS_MANY, 'ProjectAdvisor', 'project_id'),
			'advisors' => array(self::MANY_MANY, 'Teacher', 'project_advisors(project_id, teacher_id)'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
			'studentProjectGroups' => array(self::HAS_MANY, 'StudentProjectGroup', 'project_id'),
			'members' => array(self::MANY_MANY, 'Student', 'student_project_groups(project_id, student_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Project Title',
			'code' => 'Project #',
			'location' => 'Location',
			'company_id' => 'Company',
			'category_id' => 'Category',
			'batch_id' => 'Batch',
			'studentIds' => 'Students',
			'internalAdvisorIds' => 'Internal Advisors',
			'externalAdvisorIds' => 'External Advisors',
			'created_on' => 'Created On',
			'modified_on' => 'Modified On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('batch_id',$this->batch_id,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('modified_on',$this->modified_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors()
	{
		return array( 
			// Following behaviour will automatically adds the data in relational tables
			// currently we don't need this behaviour
			//'CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior'),
			); 
	}
}