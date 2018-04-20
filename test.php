<?php
class My extends Thread{
	private $i;
	public function __construct($i){
		$this->i = $i;
	}
	public function run(){
		$wait = rand(1,9);
		//$wait = 100;
		$wait *=10;
		usleep($wait*1000);
		echo $this->i;
		echo '---wait:'.$wait.'0ms,';
		echo '---threadId:'.Thread::getCurrentThreadId();
		echo "\n";
		//flush();
	}
}
for ($i=1; $i <= 9; $i++) {
	$my = new My($i);
	$my->join();
	$my->start();
}