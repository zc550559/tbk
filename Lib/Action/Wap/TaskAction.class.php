<?php
class TaskAction extends Action{
	function index(){
		header('Content-type:text/html;charset=utf-8');
		echo('<meta http-equiv="refresh" content="1">');
		//$taskArr = M('task')->field('task.*,task_sub.status as s_status,task_sub.utime as s_utime')->join('task_sub on task.id=task_sub.tid')->select();
		$taskArr = M('task')->select();
		foreach ($taskArr as $task) {
			print_r($task);
			$taskSubArr = M('task_sub')->where('tid='.$task['id'])->select();
			foreach ($taskSubArr as $taskSub) {
				print_r($taskSub);
				echo '<br />';
			}
			echo '<br />';
		}
	}
}