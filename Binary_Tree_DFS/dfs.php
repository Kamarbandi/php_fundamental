<?php

function dfs($graph, $start, $visited = [])
{
    // Mark the current vertex as visited
    $visited[] = $start;
    echo $start . " "; // We output the vertex

    // Recursively visit all adjacent vertices
    foreach ($graph[$start] as $neighbor) {
        if (!in_array($neighbor, $visited)) {
            $visited = dfs($graph, $neighbor, $visited);
        }
    }

    return $visited;
}

// Example of a graph in the form of an adjacency list
$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D', 'E'],
    'C' => ['A', 'F'],
    'D' => ['B'],
    'E' => ['B', 'F'],
    'F' => ['C', 'E']
];

dfs($graph, 'A'); // Let's start from the top 'A'
