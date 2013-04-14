<?php
/**
 * AdvisorType Enum
 *
 * @author Muhammad Shakeel
 */
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