<?php

/**
 * This is the model class for table "students".
 *
 * The followings are the available columns in table 'students':
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 * @property string $roll_no
 * @property string $batch_id
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, full_name, roll_no, batch_id', 'required'),
			array('first_name, last_name', 'length', 'max'=>30),
			array('full_name', 'length', 'max'=>60),
			array('roll_no', 'length', 'max'=>10),
			array('batch_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, full_name, roll_no, batch_id', 'safe', 'on'=>'search'),
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
			'batch'=>array(self::BELONGS_TO, 'Batch', 'batch_id'),
			'projects' => array(self::MANY_MANY, 'Project', 'student_project_groups(student_id, project_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'full_name' => 'Full Name',
			'roll_no' => 'Roll No',
			'batch_id' => 'Batch',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('roll_no',$this->roll_no,true);
		$criteria->compare('batch_id',$this->batch_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}