<?php

class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    private $head;

    public function __construct()
    {
        $this->head = null;
    }


    public function append($node)
    {
        $newNode = new Node($node);
        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }


    public function prepend($node)
    {
        $newNode = new Node($node);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    // Remove element by value
    public function delete($data)
    {
        if ($this->head === null) {
            return;
        }

        // If the element to be removed is at the beginning
        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        // If element found
        if ($current->next !== null) {
            $current->next = $current->next->next;
        }
    }

    public function display()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . ' -> ';
            $current = $current->next;
        }

        echo 'null' . PHP_EOL;
    }

}


$list = new LinkedList();

// Add elements to the end
$list->append(10);
$list->append(20);
$list->append(30);

//Add an element to the beginning
$list->prepend(5);

// Output the elements
$list->display(); // Output: 5 -> 10 -> 20 -> 30 -> null

// Delete the element
$list->delete(20);

// Displaying elements after deletion
$list->display(); // Output: 5 -> 10 -> 30 -> null
