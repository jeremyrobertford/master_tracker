<?php
include_once('header.php')
?>
  <head>
    <title>Connect Muscles</title>
  </head>
  <body>

    <nav>
      <h1>Connect Muscles to the Exercise:</h1>
    </nav>

    <form autocomplete="off" action="create_new.php" method="post">
      <div class="container">
        <?php
        foreach ($_POST as $key => $value) {
            echo '<input type="hidden" ';
            echo 'name="' . $key . '" ';
            echo 'value="' . $value . '" />';
        }
        ?>
        
        <table class="container">
          <thead class="row">
            <tr class="row">
              <th class="col-8">Muscle</th>
              <th class="col-2"></th>
              <th class="col-2">Emphasis</th>
            </tr>
          </thead>
          <tbody class="row">
            <?php
            include_once('get_values.php');
            $muscles = get_vals('muscle', array('ID', 'muscle'), 'muscle');
            $num_muscles = count($muscles);
            for ($i = 0; $i < $num_muscles; $i++) {
                echo '<tr class="row">';
                echo '<td class="col-8">' . $muscles[$i]['muscle'] . '</td>';
                echo '<td class="col-2">';
                echo '<input type="checkbox" name="muscle_list[]" value="' . $muscles[$i]['ID'] . '" />';
                echo '</td>';
                echo '<td class="col-2">';
                echo '<input type="checkbox" name="emphasis_list[]" value="' . $muscles[$i]['ID'] . '" />';
                echo '</td>';
                echo '</tr>';
            }
            ?>
          </tbody>
        </table>

        <div class="row">
          <div class="col-3"></div>
          <input class="col-6" type="submit" value="Submit" />
          <div class="col-3"></div>
        </div>

      </div>
    </form>

  </body>

</html> 
