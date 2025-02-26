<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function searchBST($root, $val) {
        // if tree is empty or the current node is equal searched value
        if($root == null || $root->val == $val) {
            return $root;
        }

        // If the value being sought is less than the value of the current node, we search in the left subtree
        if($root->val < $val) {
            return $this->searchBST($root->left, $val);
        }

        // If the value being sought is greater than the value of the current node, we search in the right subtree
        return $this->searchBST($root->right, $val);
    }
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->right = new TreeNode(5);
$root->right->right = new TreeNode(4);


$solution = new Solution();
var_dump($solution->searchBST($root, 2));

