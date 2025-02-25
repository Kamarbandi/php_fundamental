<?php

function bfs($graph, $start)
{
    $visited = []; // Array for visited vertices
    $queue = new SplQueue(); // Queue for vertices

    // Let's start from the initial peak
    $queue->enqueue($start);
    $visited[] = $start;

    while (!$queue->isEmpty()) {
        $vertex = $queue->dequeue(); // Extract a vertex from the queue
        echo $vertex . " "; // We output the vertex

        // Add all adjacent vertices to the queue
        foreach ($graph[$vertex] as $neighbor) {
            if (!in_array($neighbor, $visited)) {
                $visited[] = $neighbor;
                $queue->enqueue($neighbor);
            }
        }
    }
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

bfs($graph, 'A'); // Let's start from the top 'A'