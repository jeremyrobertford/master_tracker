<?php
include_once('header.php')
?>
  <head>
    <title>Connect Exercises</title>
    <script>
      exer_id = 1;
      function addToExerciseList() {
        select = document.getElementById('exercise_select');
        sel_option = select.options[select.selectedIndex];

        if (select.selectedIndex == 0) {
            return;
        }

        exer_table = document.getElementById('exercise_table');
        exer_row = document.createElement('tr');
        exer_row.setAttribute('class', 'row');
        exer_row.setAttribute('id', 'exer' + exer_id.toString());
        
        exer_name = document.createElement('td');
        exer_name.setAttribute('class', 'col-5');
        exer_name_l = document.createElement('label');
        exer_name_l.setAttribute('class', 'col-12');
        exer_name_l.innerHTML = sel_option.text;
        exer_name_i = document.createElement('input');
        exer_name_i.setAttribute('type', 'hidden');
        exer_name_i.setAttribute('name', 'exercise_list[]');
        exer_name_i.setAttribute('value', sel_option.value);
        exer_name.appendChild(exer_name_l);
        exer_name.appendChild(exer_name_i);

        exer_sets = document.createElement('td');
        exer_sets.setAttribute('class', 'col-1');
        exer_sets_i = document.createElement('input');
        exer_sets_i.setAttribute('class', 'col-12');
        exer_sets_i.setAttribute('type', 'text');
        exer_sets_i.setAttribute('name', 'sets_list[]');
        exer_sets_i.setAttribute('value', ' ');
        exer_sets.appendChild(exer_sets_i);

        exer_reps = document.createElement('td');
        exer_reps.setAttribute('class', 'col-1');
        exer_reps_i = document.createElement('input');
        exer_reps_i.setAttribute('class', 'col-12');
        exer_reps_i.setAttribute('type', 'text');
        exer_reps_i.setAttribute('name', 'reps_list[]');
        exer_reps_i.setAttribute('value', ' ');
        exer_reps.appendChild(exer_reps_i);

        exer_rest = document.createElement('td');
        exer_rest.setAttribute('class', 'col-1');
        exer_rest_i = document.createElement('input');
        exer_rest_i.setAttribute('class', 'col-10');
        exer_rest_i.setAttribute('type', 'text');
        exer_rest_i.setAttribute('style', 'display:block;float:left;');
        exer_rest_i.setAttribute('name', 'rest_list[]');
        exer_rest_i.setAttribute('value', ' ');
        exer_rest_uom = document.createElement('p');
        exer_rest_uom.setAttribute('class', 'col-2');
        exer_rest_uom.setAttribute('style', 'margin:0;display:block;float:left;');
        exer_rest_uom.innerHTML = 's';
        exer_rest.appendChild(exer_rest_i);
        exer_rest.appendChild(exer_rest_uom);

        exer_reason = document.createElement('td');
        exer_reason.setAttribute('class', 'col-3');
        exer_reason_s = document.createElement('select');
        exer_reason_s.setAttribute('class', 'col-12');
        exer_reason_s.setAttribute('name', 'reason_list[]');
        reasons = ['Select a reason', 'Strength', 'Size', 'Endurance', 'Supportive Strength', 'Posture'];
        for (reason of reasons) {
			exer_reason_o = document.createElement('option');
			exer_reason_o.setAttribute('value', reason);
			exer_reason_o.innerHTML = reason;
            exer_reason_s.appendChild(exer_reason_o);
        }
        exer_reason.appendChild(exer_reason_s);

        exer_notes = document.createElement('td');
        exer_notes.setAttribute('class', 'col-1');
        exer_notes.setAttribute('style', 'padding-top:5px');
        exer_notes_i = document.createElement('textarea');
        exer_notes_i.setAttribute('id', 'exer' + exer_id.toString() + 'notes');
        exer_notes_i.setAttribute('class', 'col-12');
        exer_notes_i.setAttribute('style', 'visibility: hidden;height: 0;');
        exer_notes_i.setAttribute('name', 'notes_list[]');
        exer_notes_i.setAttribute('value', ' ');
        exer_notes_b = document.createElement('button');
        exer_notes_b.setAttribute('class', 'col-12');
        exer_notes_b.setAttribute('type', 'button');
        exer_notes_b.setAttribute('style', 'height: 100%');
        var notes_button_f = 'showNotes(' + 'exer'+exer_id+'notes' + ', ' + sel_option.value + ',"' + sel_option.text + '")';
        exer_notes_b.setAttribute('onclick', notes_button_f);
        exer_notes.appendChild(exer_notes_b);

        exer_row.appendChild(exer_name);
        exer_row.appendChild(exer_sets);
        exer_row.appendChild(exer_reps);
        exer_row.appendChild(exer_rest);
        exer_row.appendChild(exer_reason);
        exer_row.appendChild(exer_notes);
        exer_row.appendChild(exer_notes_i);
        exer_table.appendChild(exer_row);

        select.selectedIndex = 0;
        exer_id++;
      }
      function showNotes(notes, value, text) {
        notes.setAttribute('style', 'visibility: auto;height: auto;');
      }
    </script>
  </head>
  <body>

    <nav>
      <h1>Connect Exercises to the Workout:</h1>
    </nav>

    <div class="container">
      <div class="row">
        <select class="col-12" id="exercise_select" onchange="addToExerciseList()">
          <option value="NULL">Select an exercise</option>
          <?php
          include('get_values.php');
          $exercises = get_vals('exercise', array('ID', 'exercise'), 'exercise'); 
          $num_exercises = count($exercises);
          for ($i = 0; $i < $num_exercises; $i++) {
              echo '<option value="' . $exercises[$i]['ID'] . '">' . $exercises[$i]['exercise'] . '</option>' . "\n";
          }
          ?>
        </select>
	  </div>
    </div>

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
              <th class="col-5">Exercise</th>
              <th class="col-1">Sets</th>
              <th class="col-1">Reps</th>
              <th class="col-1">Rest</th>
              <th class="col-3">Reason</th>
              <th class="col-1">Notes</th>
            </tr>
          </thead>
          <tbody id="exercise_table" class="row">
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
