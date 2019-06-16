<?php
/**
 * php用数组实现队列:先进先出FIFO
    1. getLength(): 获得队列的长度
    2. isEmpty(): 判断队列是否为空
    3. enqueue(): 入队，在队尾加入数据。
    4. dequeue(): 出队，返回并移除队首数据。队空不可出队。
    5. show(): 遍历队列，并输出
    6. clear(): 清空队列
 */
class Queue {
    // 队列数组
    public $dataStore = array();

    // 获得队列的长度
    public function getLength() {
        return count($this->dataStore);
    }
    // 判断队列是否为空
    public function isEmpty() {
        return $this->getLength() === 0;
    }
    // 入队，在队尾加入数据。
    public function enqueue($element) {
        $this->dataStore[] = $element;
        // array_push($this->dataStore, $element);
    }
    // 出队，返回并移除队首数据。队空不可出队。
    public function dequeue() {
        if (!$this->isEmpty()) {
            return array_shift($this->dataStore);
        }
        return false;
    }
    // 遍历队列，并输出
    public function show() {
        if (!$this->isEmpty()) {
            for ($i = 0; $i < $this->getLength(); $i++) {
                echo $this->dataStore[$i] . PHP_EOL;
            }
        } else {
            return "空";
        }
    }
    // 清空队列
    public function clearQueue() {
        unset($this->dataStore);
        // $this->dataStore = array();
    }
}
// 测试
$q = new Queue();
$q->enqueue('a');
$q->enqueue('b');
$q->enqueue('c');
echo '队列的长度为：' . $q->getLength();
echo "</br>";
echo '队列为：';
$q->show();
echo "</br>";
$q->dequeue();
echo "</br>";
echo "a出队，队列为：";
$q->show();
$q->clearQueue();
echo "清空队列后，队列为" . $q->show();