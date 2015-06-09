<?php


                    echo "<table>";
                    while ($row = mysql_fetch_array($result)) {

                        echo "<tr> <td></td> <td><strong></strong></td> </tr>";
                        echo "<tr> <td></td> <td> Color: </td> </tr>";
                        echo "<tr> <td></td> <td> Tallas </td></tr>";
                        echo "<tr> <td></td> <td> Precio coste: </td></tr>";
                        echo "<tr> <td></td> <td> PVP: </td></tr>";
                        echo "<tr> <td></td> <td> Descripcion</td></tr>";
                    }
                    echo "</table>";


?>

                        echo "<tr> <td rowspan='6'><img class='bordeimagen' title='' src='img/nofoto.png' width='160' height='220'></td> <td><strong> Mod. " . $row["modelo"] . "</strong></td></tr>";
                        echo "<tr>  <td> Color: " . $row["color"] . "</td></tr>";
                        echo "<tr>  <td> Tallas " . $row["tallas"] . "</td></tr>";
                        echo "<tr>  <td> Precio coste: " . $row["precio_cost"] . "€" . "</td></tr>";
                        echo "<tr>  <td> PVP: " . $row["pvp"] . "€" . "</td></tr>";
                        echo "<tr>  <td> <br/>" . $row["descripcion"] . "</td></tr>";