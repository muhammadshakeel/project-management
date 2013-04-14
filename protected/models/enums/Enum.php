<?php
/**
 * @class Enum
 * @description A base class to facilitate the Enums within application, it uses a singleton pattern to access the
 * instances of child classes.
 *
 * @property array() $_enums Protected property to be set within child classes' constructor
 * @property array() $_instances Private property to be used for singleton instance of each child class
 *
 * How To Use:
 * ----------
 * Just need to inherit a class from Enum and define $_enums property within child class then all the methods will be
 * available.
 *
<code>
class AdvisorType extends Enum
{

	const INTERNAL_ADVISOR = 1;
	const EXTERNAL_ADVISOR = 2;

	public function AdvisorType()
	{
		$this->_enums = array(
			self::INTERNAL_ADVISOR => 'Internal Advisor',
			self::EXTERNAL_ADVISOR => 'External Advisor',
		);
	}

}

AdvisorType::getInstance()->getAll();
</code>
 *
 * @author Muhammad Shakeel
 */
class Enum
{
    protected $_enums;

    // Singletons of every enum subclass
    private static $_instances = array( );

    /**
     * Prevent creating from outside. Catches all enum values defined in subclass
     */
    private function __construct()
    {}

    /**
     * Prevent cloning from outside
     */
    private function __clone()
    {}

    /**
     * Get the Name of the Ename against the value attribute
     * @param $id Value of the enum to get
     * @return mixed
     */
    public function getName($id)
    {
        return $this->_enums[$id];
    }

    /**
     * Get all the id=>value pair array for the current child class enum
     * @return mixed
     */
    public function getAll()
    {
        return $this->_enums;
    }

    /**
     * Getter for instance
     * @return Enum
     */
    public static function getInstance()
    {
        $enumName = get_called_class();
        if( !isset( self::$_instances[$enumName] ) )
        {
            self::$_instances[$enumName] = new $enumName;
        }
        return self::$_instances[$enumName];
    }
}