<?php

class Node
{
	var $value;
	var $next;

	public function __contruct($value = null)
	{
		$this.value = $value;
		$this.next = null;
	}
}

/**
 *  
 */
class SingleLinkList
{
	var $head;
	public function __construct($head)
	{
		$head = new Node();
	}

	public function count()
	{
		$current = $this->head;
		$i = 0 ;
		while(!is_null($current->next))
		{
			$i ++;
			$current = $current->next;
		}
		return $i;
	}

	public function add($v)
	{
		$current = $this->head;
		while(!is_null($current->next))
		{
			$current = $current->next;
		}
		$v = new Node($v);
		$current->next = $node;
	}

	public function del($no)
	{
		if ($no > $this->count())
            return false;
		$current = $this->head;

		for($i = 0;$i<$no-1;$i++)
		{
			$current = $current->next;
		}
		$current->next = $current->next->next;
		return true;
	}
}