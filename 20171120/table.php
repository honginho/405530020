<style>
  p {
    padding: 10px;
  }
</style>

<?php
    $data = array(
        array("Volvo", 22, 18),
        array("BMW", 15, 13),
        array("Saab", 5, 2),
        array("Land Rover", 17, 15)
    );
?>

<p> for
<table border="1">
    <tr>
        <td>Name</td>
        <td>Stock</td>
        <td>Sold</td>
    </tr>

    <?php
        for ($i = 0; $i < count($data); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($data[$i]); $j++)
                echo "<td>" . $data[$i][$j] . "</td>";
            echo "</tr>";
        }
    ?>
</table>
</p>

<p> foreach
<table border="1">
    <tr>
        <td>Name</td>
        <td>Stock</td>
        <td>Sold</td>
    </tr>

    <?php
        foreach ($data as $value0) {
            echo "<tr>";
            foreach ($value0 as $value)
                echo "<td> $value </td>";
            echo "</tr>";
        }
    ?>
</table>
</p>

<p> array_map + join
<table border="1">
    <tr>
        <td>Name</td>
        <td>Stock</td>
        <td>Sold</td>
    </tr>

    <?php
        function addTd($data2nd) {
            $value = "<tr>";
                $join = join("</td><td>", $data2nd);
                $value .= "<td>" . $join . "</td>";
            $value .= "</tr>";
            return $value;
        }
        echo join("", array_map("addTd", $data));
    ?>
</table>
</p>
