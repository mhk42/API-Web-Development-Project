<?php
$a1 = [10.001, 11.591, 0.011, 5.991, 16.121, 0.131, 100.981, 1.001];
$a2 = [1.99, 1.99, 0.99, 1.99, 0.99, 1.99, 0.99, 0.99];
$a3 = [0.01, 0.01, 0.01, 0.01, 0.01, 0.01, 0.01, 0.01, 0.01, 0.01];
$a4 = [10.01, -12.22, 0.23, 19.20, -5.13, 3.12];
function getTotal($arr) {
    echo "<br>Processing Array:<br><pre>" . var_export($arr, true) . "</pre>";
    $total = 0.00;
    //note: use the $arr variable, don't directly touch $a1-$a4
    //TODO do adding here
    //TODO do rounding stuff here (round to two decimals i.e., 0.10, 0.01, 0.00)

    ////mhk42, 9/22/23, a for loop is used to go through the array, then each number of the array is added to $total 
    //the last line uses the round function to round up to two decimal places, and the number format is used to ensure it shows up 2 demical places
    for($i = 0; $i < count($arr); $i++)
    {
        $total += $arr[$i];
    }


    echo "The total is " . var_export(number_format(round($total, 2), 2), true);
}
echo "Problem 2: Adding Floats<br>";
?>
<table>
    <thread>
        <th>A1</th>
        <th>A2</th>
        <th>A3</th>
        <th>A4</th>
    </thread>
    <tbody>
        <tr>
            <td>
                <?php getTotal($a1) ?>
            </td>
            <td>
                <?php getTotal($a2) ?>
            </td>
            <td>
                <?php getTotal($a3) ?>
            </td>
            <td>
                <?php getTotal($a4); ?>
            </td>
        </tr>
</table>
<style>
    table {
        border-spacing: 2em 3em;
        border-collapse: separate;
    }

    td {
        border-right: solid 1px black;
        border-left: solid 1px black;
    }
</style>