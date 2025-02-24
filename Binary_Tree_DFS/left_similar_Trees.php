<?php

// Task
// https://leetcode.com/problems/leaf-similar-trees/solutions/6460615/dfs-based-approach-leaf-similar-trees-0-ms-beats-100-00-php/?envType=study-plan-v2&envId=leetcode-75


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

class Solution
{

    function goodNodes($root) {
        return $this->dfs($root, $root->val);
    }

    /**
     * A recursive function to traverse a tree and count good nodes.
     *
     * @param TreeNode $node - Current node.
     * @param int $maxValue - Current maximum value on the path.
     * @return int - Number of good nodes.
     */
    private function dfs($node, $maxValue) {
        if ($node === null) {
            return 0;
        }

        // If the current node is good, increase the counter
        $count = 0;
        if ($node->val >= $maxValue) {
            $count = 1;
            $maxValue = $node->val; // Updating the maximum
        }

        // Recursively traverse the left and right subtrees
        $count += $this->dfs($node->left, $maxValue);
        $count += $this->dfs($node->right, $maxValue);

        return $count;
    }
}


$root1 = new TreeNode(3,
    new TreeNode(5, new TreeNode(6), new TreeNode(2, new TreeNode(7), new TreeNode(4))),
    new TreeNode(1, new TreeNode(9), new TreeNode(8))
);

$root2 = new TreeNode(3,
    new TreeNode(5, new TreeNode(6), new TreeNode(7)),
    new TreeNode(1, new TreeNode(4), new TreeNode(2, new TreeNode(9), new TreeNode(8)))
);

$solution = new Solution();
echo $solution->goodNodes($root1);