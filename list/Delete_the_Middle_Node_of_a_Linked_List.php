<?php

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteMiddle($head)
    {
        if ($head === null || $head->next === null) {
            return null;
        }

        $slower = $head;
        $faster = $head;
        $previous = null;

        while ($faster !== null && $faster->next !== null) {
            $previous = $slower;
            $slower = $slower->next;
            $faster = $faster->next->next;
        }

        $previous->next = $slower->next;

        return $head;
    }

    public function display($head)
    {
        $current = $head;
        while ($current !== null) {
            echo $current->val . ' -> ';
            $current = $current->next;
        }

        echo 'null' . PHP_EOL;
    }
}


$head = new ListNode(1, new ListNode(3, new ListNode(4, new ListNode(7, new ListNode(1, new ListNode(2, new ListNode(6)))))));
$solution = new Solution();
$head = $solution->deleteMiddle($head);

var_dump($solution->display($head));
