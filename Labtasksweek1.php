
        <?php
        function hello(){
            echo "Hello, World";
        }
        hello();
        ?>

        <?php
    $month = date("F");

if ($month == "August") {
    echo "It's August, so it's really hot.";
} else {
    echo "Not August, so at least not in the peak of the heat.";
}
?>

        <?php
function rectangleArea($width, $height) {
    $area = $width * $height;
    return "A rectangle of width $width and height $height has an area of $area.";
}
echo rectangleArea(5, 10);
?>
    
    