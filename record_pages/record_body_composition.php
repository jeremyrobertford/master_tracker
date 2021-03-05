<?php
include_once('header.php')
?>
  <head>
    <title>Record Body Composition</title>
  </head>
  <body>

    <nav>
      <h1>Record Body Composition:</h1>
    </nav>

    <form autocomplete="off" action="create_new.php" method="post">
      <div class="container">
        
        <div class="row">
          <label class="col-12">Age</label>
          <input class="col-12" type="text" name="age" />
        </div>
        <div class="row">
          <label class="col-12">Gender</label>
          <select class="col-12" name="gender">
            <option value="m">Male</option>
            <option value="f">Female</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Height</label>
          <input class="col-11" type="text" name="height" />
          <label class="col-1">in</label>
        </div>
        <div class="row">
          <label class="col-12">Weight</label>
          <input class="col-11" type="text" name="weight" />
          <label class="col-1">lb</label>
        </div>
        <div class="row">
          <label class="col-12">Fat %</label>
          <input class="col-12" type="text" name="fat_percent" />
        </div>
        <div class="row">
          <label class="col-12">Water %</label>
          <input class="col-12" type="text" name="water_percent" />
        </div>
        <div class="row">
          <label class="col-12">Activity Level</label>
          <select class="col-12" name="activity_level">
            <option value="1.2004">Sedentary: little or no exercise</option>
            <option value="1.3755">Light: exercise 1-3 times / week</option>
            <option value="1.4655">Moderate: exercise 4-5 times / week</option>
            <option value="1.5505">Active: daily exercise or intense exercise 3-4 times / week</option>
            <option value="1.7256">Very Active: intense exercise 6-7 times / week</option>
            <option value="1.9006">Extra Active: very intense exercise daily or physical job</option>
          </select>
          <label class="col-12">Exercise: 15-30 minutes of elevated heart rate</label>
          <label class="col-12">Intense Exercise: 45-120 minutes of elevated heart rate</label>
          <label class="col-12">Very Intense Exercise: 2+ hours of elevated heart rate</label>
        </div>
        <div class="row">
          <label class="col-12">Face Skin Rating</label>
          <select class="col-12" name="face_skin_rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
        <div class="row">
          <label class="col-12">Body Skin Rating</label>
          <select class="col-12" name="body_skin_rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>

        <div class="row">
          <div class="col-3"></div>
          <input type="hidden" name="table" value="body_composition" />
          <input class="col-6" type="submit" value="Submit" />
          <div class="col-3"></div>
        </div>

      </div>
    </form>

  </body>

</html> 
