<?php

class Node
{
	public $data;
	public $prev;
	public $next;

	public function __construct($data)
	{
		$this->data = $data;
		$this->next = null;
		$this->prev = null;
	}

}


class DoubleLinkList
{
	private $head;    // 头节点

    function __construct($data) {
        $this->head = new Node($data);
    }

	public function add($value)
	{

		$node = new Node($value);
		$current = $this->head;
		while(!is_null($current->next))
		{
			$current = $current->next;
		}
		$current->next = $node;
		$node->prev = $current;
	}



	public function show()
	{
		$current = $this->head;
		while($current->next != null)
		{
			echo $current->data.'<br/>';
			$current = $current->next;
		}
		echo $current->data.'<br/>';
	}

	// 显示链表中的元素
    public function display() {
        $current = $this->head;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    }

    public function insert($value,$item)
	{
		$node = new Node($value);
		$current = $this->head;
		while($current->data != $item)
		{
			$current = $current->next;
		}
		if($current->next != null)
		{
			$current->next->prev = $node;
			$node->next = $current->next;
		}
		$node->prev = $current;
		$current->next = $node;
	}
}

$list = new DoubleLinkList('header');
$list->add('k1');
$list->add('k2');
$list->add('k3');
$list->show();
$list->insert('m1',"k1");
$list->insert('m2',"k2");
$list->insert('m3',"k3");
$list->display();