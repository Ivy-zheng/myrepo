<?php
class Node {
    public $value;
    public $left;
    public $right;
}
class BT {
    // 非递归
    // 前序遍历 根节点→左子树→右子树
    // 先访问根节点，再遍历左子树，最后遍历右子树；并且在遍历左右子树时，仍需先遍历根节点，然后访问左子树，最后遍历右子树
    public function preOrder($root) {
        $stack = array();
        array_push($stack, $root);
        while (!empty($stack)) {
            $center_node = array_pop($stack);
            echo $center_node->value . "  "; // 先输出根节点
            if ($center_node->right != null) {
                array_push($stack, $center_node->right); // 压入左子树
            }
            if ($center_node->left != null) {
                array_push($stack, $center_node->left);
            }
        }
    }

    // 递归
    // 前序遍历
    public function pre_order($root) {
        if ($root != null) {
            echo $root->value . " ";        // 根
            if ($root->left != null) {
                $this->pre_order($root->left);     //递归遍历左树
            }
            if ($root->right != null) {
                $this->pre_order($root->right);    //递归遍历右树
            }
        }
    }
}
// 测试
$a = new Node();
$b = new Node();
$c = new Node();
$d = new Node();
$e = new Node();
$f = new Node();

$a->value = "A";
$b->value = "B";
$c->value = "C";
$d->value = "D";
$e->value = "E";
$f->value = "F";

$a->left = $b;
$a->right = $c;
$b->left = $d;
$b->right = $e;
$c->left = $f;

$bst = new BT();
echo "----深度优先----";
echo "</br>";
echo "非递归--前序遍历：";
$bst->preOrder($a);
echo "</br>";
echo "递归--前序遍历：";
$bst->pre_order($a);