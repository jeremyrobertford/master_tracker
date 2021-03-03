<?php
include_once('header.php')
?>
  <head>
    <title>Create a New Exercise</title>
  </head>
  <body>

    <nav>
      <h1>Create a New Exercise:</h1>
    </nav>

    <form autocomplete="off" action="connect_exercise_muscle.php" method="post">
      <div class="container">
        
        <div id="row">
          <label class="col-12">Exercise</label>
          <input class="col-12" type="text" name="exercise" />
        </div>
        <div id="row">
          <label class="col-12">Difficulty</label>
          <select class="col-12" name="difficulty">
            <option value="NULL">Select a difficulty</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </div>
        <div id="row">
          <label class="col-12">Primary Function</label>
          <select class="col-12" name="primary_func">
            <option value="NULL">Select a function</option>
            <option value="Push">Push</option>
            <option value="Pull">Pull</option>
            <option value="Pull">Push and Pull</option>
            <option value="Pull">Bend</option>
            <option value="Pull">Twist</option>
          </select>
        </div>
        <div id="row">
          <label class="col-12">Primary Plane</label>
          <select class="col-12" name="primary_plane">
            <option value="NULL">Select a plane</option>
            <option value="Vertical">Vertical</option>
            <option value="Horizontal">Horizontal</option>
            <option value="Both">Both</option>
          </select>
        </div>
        <div id="row">
          <label class="col-12">Notes</label>
          <textarea class="col-12" name="notes" rows=5 cols=50></textarea>
        </div>

        <div class="row">
          <div class="col-3"></div>
          <input type="hidden" name="table" value="exercise" />
          <input class="col-6" type="submit" value="Submit" />
          <div class="col-3"></div>
        </div>

      </div>
    </form>

  </body>

</html> 
