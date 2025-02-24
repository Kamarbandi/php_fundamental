<?php

// https://leetcode.com/problems/path-sum-iii/solutions/6462513/dfs-with-prefix-sum-approaches-2ms-100-beats-php/

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
    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer
     */
    function pathSum($root, $targetSum)
    {
        // Hash map to store prefix sums
        $prefixSumCounts = [0 => 1];
        return $this->countPaths($root, $targetSum, 0, $prefixSumCounts);
    }

    /**
     * Recursive function to traverse the tree and count paths.
     *
     * @param TreeNode $node - Current node.
     * @param int $targetSum - Target sum.
     * @param int $currentSum - Current sum along the path.
     * @param array &$prefixSumCounts - Hash map of prefix sums.
     * @return int - Number of paths with sum $targetSum.
     */
    private function countPaths($node, $targetSum, $currentSum, &$prefixSumCounts)
    {
        if ($node === null) {
            return 0;
        }

        // Update the current sum
        $currentSum += $node->val;

        // Check if the difference between the current sum and $targetSum exists in the hash map
        $pathCount = $prefixSumCounts[$currentSum - $targetSum] ?? 0;

        // Update the hash map with the current sum
        $prefixSumCounts[$currentSum] = ($prefixSumCounts[$currentSum] ?? 0) + 1;

        // Recursively traverse the left and right subtrees
        $pathCount += $this->countPaths($node->left, $targetSum, $currentSum, $prefixSumCounts);
        $pathCount += $this->countPaths($node->right, $targetSum, $currentSum, $prefixSumCounts);

        // Remove the current sum from the hash map before returning
        $prefixSumCounts[$currentSum] -= 1;

        return $pathCount;
    }
}

$root = new TreeNode(10);
$root->left = new TreeNode(5);
$root->right = new TreeNode(-3);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(2);
$root->right->right = new TreeNode(11);
$root->left->left->left = new TreeNode(3);
$root->left->left->right = new TreeNode(-2);
$root->left->right->right = new TreeNode(1);

$solution = new Solution();
$targetSum = 8;
$result = $solution->pathSum($root, $targetSum);
echo "Number of paths: " . $result . "\n";
