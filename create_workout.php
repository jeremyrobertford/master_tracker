<?php
include_once('header.php')
?>
  <head>
    <title>Create a New Workout</title>
  </head>
  <body>

    <nav>
      <h1>Create a New Workout:</h1>
    </nav>

    <form autocomplete="off" action="connect_workout_exercise.php" method="post">
      <div class="container">
        
        <div class="row">
          <label class="col-12">Workout</label>
          <input class="col-12" type="text" name="name" />
        </div>
        <div class="row">
          <label class="col-12">Difficulty</label>
          <select class="col-12" name="difficulty">
            <option value=" ">Select a difficulty</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Body Area Focus</label>
          <select class="col-12" name="area_focus">
            <option value=" ">Select a body area</option>
            <option value="Upper">Upper</option>
            <option value="Lower">Lower</option>
            <option value="Both">Both</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Body Part Focus</label>
          <select class="col-12" name="part_focus">
            <option value=" ">Select a body part</option>
            <option value="Shoulder">Shoulder</option>
            <option value="Chest">Chest</option>
            <option value="Back">Back</option>
            <option value="Arm">Arm</option>
            <option value="Abs">Abs</option>
            <option value="Hip">Hip</option>
            <option value="Butt">Butt</option>
            <option value="Leg">Leg</option>
            <option value="Multiple">Multiple</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Primary Function</label>
          <select class="col-12" name="func_focus">
            <option value=" ">Select a function</option>
            <option value="Push">Push</option>
            <option value="Pull">Pull</option>
            <option value="Pull">Both</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Primary Plane</label>
          <select class="col-12" name="plane_focus">
            <option value=" ">Select a plane</option>
            <option value="Vertical">Vertical</option>
            <option value="Horizontal">Horizontal</option>
            <option value="Both">Both</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Notes</label>
          <textarea class="col-12" name="notes" rows=5 cols=50></textarea>
        </div>

        <div class="row">
          <div class="col-3"></div>
          <input type="hidden" name="table" value="workout" />
          <input class="col-6" type="submit" value="Submit" />
          <div class="col-3"></div>
        </div>

      </div>
    </form>

  </body>

</html> 
