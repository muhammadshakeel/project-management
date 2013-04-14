<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectManager
 *
 * @author mshakeel
 */
class ProjectManager
{
	private static $_instance;
	
	// Can't be created outside
	private function __construct()
	{}
	
	/**
	 * Returns the singleton object of this class
	 * @return ProjectManager
	 */
	public static function getInstance()
	{
		if (self::$_instance == null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	/**
	 * Saves the project object with related tables including ManyToMany
	 * @param Project $project
	 * @return bool
	 */
	public function saveProject($project)
	{
		Helper::getInstance()->printObj($project->studentIds); //exit;
		//$project->memebers = $project->studentIds;
		//$project->advisors = $project->internalAdvisorIds;
		$success = $project->save();
		
		if ($success)
		{
			$i = 0;
			foreach ($project->studentIds as $studentId)
			{
				$projectStudent = new StudentProjectGroup();
				$projectStudent->project_id = $project->id;
				$projectStudent->student_id = $studentId;
				$projectStudent->marks = $project->marks[$i];

				$success = $projectStudent->save(false);
				$i++;
			}
			
			foreach ($project->internalAdvisorIds as $internalAdvisorId)
			{
				$internalAdvisor = new ProjectAdvisor();
				$internalAdvisor->project_id = $project->id;
				$internalAdvisor->teacher_id = $internalAdvisorId;
				$internalAdvisor->type = AdvisorType::INTERNAL_ADVISOR;

				$success = $internalAdvisor->save(false);
			}
			
			foreach ($project->externalAdvisorIds as $externalAdvisorId)
			{
				$externalAdvisor = new ProjectAdvisor();
				$externalAdvisor->project_id = $project->id;
				$externalAdvisor->teacher_id = $externalAdvisorId;
				$externalAdvisor->type = AdvisorType::EXTERNAL_ADVISOR;

				$success = $externalAdvisor->save(false);
			}
		}
		
		return $success;
	}
}

?>
