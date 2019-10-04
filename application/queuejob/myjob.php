<?php
namespace app\queuejob;
use think\queue\Job;
use think\Log;

/**
 * job
 */
class myjob
{
	
	public function fire(Job $job,$data)
	{
		$isJobStillNeedToBeDone=$this->checkDatabaseToSeeIfJobNeedToBeDone($data);
		// if (!$isJobStillNeedToBeDone) {
		// 	$job->delete();
		// 	return;
		// }
		$isJobDone = $this->doMyJob($data);
		if ($isJobDone) {
			echo "<br>Job deleted<br>";
			$job->delete();
		}else{
			if ($job->attempts()>3) {
				echo "<br>Job deleted after 3 tries.<br>";
				$job->delete();
			}
		}

	}
	public function failed($data)
	{
		Log::write('failed.......');
	}
	public function doMyJob($data)	
	{
		echo("<br>............................<br>");
		dump($data);
		dump('<br>done done<br>');
		echo("............................<br>");
		return true;
	}
	public function checkDatabaseToSeeIfJobNeedToBeDone($data)
	{
		return true;
	}
}
