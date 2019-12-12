<?php 
//require('simple_html_dom.php');
require_once __DIR__ . '/simple_html_dom.php';
class ugcnet{
	
	private $q_html;
	private $q_html_text;
	private $a_html;
	private $a_html_text;
	private $question_link;
	private $answer_link;
	private $questions=array();
	private $questions_list=array();
	private $answers=array();
	private $answers_list=array();
	private $answerd_correctly=0;
	private $answered_wrongly;
	private $not_answer;
	
	function __construct($question_link,$answer_link){
		//echo 'Contructor initialized';
		$this->question_link=$question_link;
		//echo 'Question link set';
		$this->answer_link=$answer_link;
		//echo 'Answered link set';
		self::set_html();
		//echo 'Html set';
		//echo 'set question begin';
		self::set_question();
		//echo 'set question end';
		//echo 'set answer begin';
		self::set_answer();
		//echo 'set question end';
		//echo 'calculate score';
		self::calculate_score();
		//echo 'calcualte socre end';
		
	}
	function get_link($options){
		return ($option==0)?$this->question_link:$this->answer_link;
	}
	function set_html(){
		$this->a_html = file_get_html($this->answer_link);
		$this->q_html = file_get_html($this->question_link);
		
	}
	function get_html($option){
		return ($option==0)?$this->q_html:$this->a_html;
		
	}
	function get_choosen_option_id($options,$choosen){
		if($choosen == 0)return 0;
		
		return $options[$choosen+1];
	}
	function get_choosen_options($choosen){
		$status = explode('Status',$choosen);
		
		if (strpos($status[1], 'Answered') !== false) {
			return substr(trim(explode('Option',$status[1])[1],' '),1,1);
		}
		return 0;
	}
	function set_question(){
		$this->q_html_text=self::get_html(0)->plaintext;
		$htmlX=explode('</tr>',$this->q_html_text);
		
		foreach($htmlX as $htm){
			$this->questions_list[]=explode('ID',$htm);
		}
		
		foreach($this->questions_list as $que){
			if(sizeof($que)==6){
				$q=trim($que[1]," ");
				$q=substr($q,1,strlen($q));
				$q=substr($q,0,strpos($q, "Option"));
				$choosen=self::get_choosen_option_id($que,self::get_choosen_options($que[5]));
				$choosen=trim($choosen,' ');
				$choosen=substr($choosen,1,strlen($choosen));
				if (strpos($choosen, 'Option') !== false) {
					$choosen=substr($choosen,0,strpos($choosen,'Option'));
				}
				
				if (strpos($choosen, 'Status') !== false) {
					$choosen=substr($choosen,0,strpos($choosen,'Status'));
				}
				
				//$q=substr($que[1],2,strlen($que[1]));
			
				$this->questions[]=array($q=>$choosen);
			}
		}
		
		
		
	}
	function get_questions(){
		return $this->questions;
	}
	function set_answer(){
		echo "LInk=>".self::get_link(1);
		echo 'HTML=>'.self::get_html(1);
		$this->a_html_text=self::get_html(1)->plaintext;
		$htmlX=explode('Computer Science and Applications',$this->a_html_text);
		print_r($htmlX);
		foreach($htmlX as $htm){
			
			$this->answers_list[]=preg_split('/\s+/', $htm);
		}
		foreach($this->answers_list as $ans){
			if(sizeof($ans)==7){
				$q=trim($ans[1],' ');
				$a=trim($ans[2],' ');
				$this->answers[]=array($q=>$a);
			}
			
		}
		
		//echo $this->a_html_text;
		
	}
	function get_answers(){
		return $this->answers;
	}
	
	function calculate_score(){
		$this->answerd_correctly=0;
		foreach($this->answers as $key=>$ans){
			//print_r($ans);
			
			foreach($this->questions as $ques){
				
				if ($ans == $ques){
					$this->answerd_correctly++;
				}
			}
			
		}
	}
	function get_score(){
		return $this->answerd_correctly;
	}
	
}
?>