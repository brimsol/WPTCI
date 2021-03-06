<?php

class Jpgraph {

    function piechart($ydata, $title = 'Line Chart', $filename = 'graph_image') {

        require_once ('jpgraph/jpgraph.php');
        require_once ('jpgraph/jpgraph_pie.php');
        require_once ('jpgraph/jpgraph_pie3d.php');

// Some data
        $data = $ydata;

// Create the Pie Graph. 
        $graph = new PieGraph(380, 300);

        $theme_class = new VividTheme;
        $graph->SetTheme($theme_class);

// Set A title for the plot
        $graph->title->Set($title);

// Create
        $p1 = new PiePlot3D($data);
        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetSliceColors(array('#97BCEF', '#EDC393', '#ABD595', '#B899D3', '#42AAB1', '#E56354', '#BDBDBD'));
        $p1->ExplodeSlice(1);

        $graph->Add($p1);
        //$graph->Stroke();
        //return $graph; // does PHP5 return a reference automatically?	
        $gdImgHandler = $graph->Stroke(_IMG_HANDLER);
// Stroke image to a file and browser
// Default is PNG so use ".png" as suffix
        $fileName = "./graph/$filename.png";
        $graph->img->Stream($fileName);
//print_r($graph);
        
        
    }

}
