<?php
include_once('header.php')
?>
  <head>
    <title>Create a New Food</title>
    <script>
      function showSubCats() {
        category = document.getElementById('category');
        if (category.selectedIndex == 0) {
          return;
        }
        subcategory = document.getElementById('subcategory');
        subcategory.removeAttribute('disabled');
        subcategory.innerHTML = '';
	    option = document.createElement('option');
	    option.setAttribute('value', '');
	    option.innerHTML = 'Select sub-category';
	    subcategory.appendChild(option);
        switch (category.options[category.selectedIndex].text) {
          case 'Beverage':
            subcats = [
              'Beer',
              'Cocktail',
              'Coffee',
              'Diet Energy Drink',
              'Diet Soft Drink',
              'Diet Sports Drink',
              'Energy Drink',
              'Flavored Water',
              'Liquor',
              'Nutritional Beverage',
              'Soft Drink',
              'Sports Drink',
              'Tea',
              'Wine',
              'Water'
            ]
            break;
          case 'Condiment or Dressing':
            subcats = [
              'Butter',
              'Cream',
              'Gravy',
              'Mayonnaise',
              'Mustard',
              'Salad Dressing',
              'Sauce',
              'Soy-based Condiment',
              'Tomato-based Condiment',
              'Vegetable Oil'
            ]
            break;
          case 'Dairy':
            subcats = [
              'Cheese', 
              'Milk', 
              'Yogurt'
            ];
            break;
          case 'Dessert':
            subcats = [
              'Brownie',
              'Cake',
              'Candy',
              'Cookie',
              'Dessert',
              'Doughnut',
              'Gelatin',
              'Honey',
              'Ice Cream or Frozen Yogurt',
              'Pastries',
              'Pie',
              'Pudding'
            ]
            break;
          case 'Eggs':
            subcats = [
              'Eggs'
            ]
            break;
          case 'Grain':
            subcats = [
              'Bagel',
              'Bread',
              'Breakfast Cereal',
              'French Toast',
              'Muffin',
              'Nutrition Bar',
              'Oatmeal',
              'Pancake',
              'Pasta',
              'Rice',
              'Tortilla',
              'Waffle'
            ]
            break;
          case 'Fruit':
            subcats = [
              'Apple',
              'Banana',
              'Berry',
              'Citrus Fruit',
              'Dried Fruit',
              'Fruit Juice',
              'Fruit Salad',
              'Melon',
              'Peach and Nectarine'
            ]
            break;
          case 'Meat':
            subcats = [
              'Beef',
              'Fish',
              'Game',
              'Lamb or Goat',
              'Organ',
              'Pork',
              'Poultry',
              'Shellfish'
            ]
            break;
          case 'Mixed Dish':
            subcats = [
              'Burger',
              'Burrito',
              'Meat Mixed Dish',
              'Meat Salad',
              'Pasta Mixed Dish',
              'Pizza',
              'Rice Mixed Dish',
              'Sandwich',
              'Soup',
              'Taco',
              'Vegetable Mixed Dish'
            ]
            break;
          case 'Nuts, Seeds, Soy':
            subcats = [
              'Nut',
              'Seed',
              'Soy'
            ]
            break;
          case 'Snack':
            subcats = [
              'Cracker',
              'Nacho',
              'Popcorn',
              'Potato Chip',
              'Pretzel',
              'Tortilla or Corn Chip'
            ]
            break;
          case 'Vegetable':
            subcats = [
              'Beans, Peas, Legumes',
              'Corn',
              'Dark Green Vegetable',
              'Onion',
              'Potato',
              'Red or Orange Vegetable',
              'Salad',
              'String Bean',
              'Tomato Sauce',
              'Vegetable Juice'
            ]
            break;
        }
		for (sc of subcats) {
		  option = document.createElement('option');
		  option.setAttribute('value', sc);
		  option.innerHTML = sc;
		  subcategory.appendChild(option);
		}
      }
    </script>
  </head>
  <body>

    <nav>
      <h1>Create a New Exercise:</h1>
    </nav>

    <form autocomplete="off" action="create_new.php" method="post">
      <div class="container">
        
        <div class="row">
          <label class="col-6">Food</label>
          <input class="col-6" type="text" name="food" />
        </div>
        <div class="row">
          <label class="col-6">Servings Size</label>
          <input class="col-6" type="text" name="serving_size" />
        </div>
        <div class="row">
          <label class="col-6">Unit of Measurement</label>
          <input class="col-6" type="text" name="serving_uom" />
        </div>
        <div class="row">
          <label class="col-6">Carbs</label>
          <input class="col-5" type="text" name="carbs" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Protein</label>
          <input class="col-5" type="text" name="protein" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Fats</label>
          <input class="col-5" type="text" name="fats" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Calories</label>
          <input class="col-5" type="text" name="calories" />
          <label class="col-1">kcal</label>
        </div>
        <div class="row">
          <label class="col-6">Brand</label>
          <input class="col-6" type="text" name="brand" />
        </div>
        <div class="row">
          <label class="col-6">Cooking Type</label>
          <select class="col-6" name="cooking_type">
            <option value="">Select cooking type</option>
            <option value="Beverage">Beverage</option>
            <option value="Fast Food">Fast Food</option>
            <option value="Home">Home Cooking</option>
            <option value="Microwave">Microwave</option>
            <option value="Restaurant">Restaurant</option>
            <option value="Snack Food">Snack Food</option>
          </select>
        </div>
        <div class="row">
          <label class="col-6">Category</label>
          <select id="category" class="col-6" name="category" onchange="showSubCats()">
            <option value="">Select food category</option>
            <option value="Dairy">Dairy</option>
            <option value="Meat">Meat</option>
            <option value="Mixed Dish">Mixed Dish</option>
            <option value="Nuts, Seeds, Soy">Nuts, Seeds, Soy</option>
            <option value="Eggs">Eggs</option>
            <option value="Grain">Grain</option>
            <option value="Dessert">Dessert</option>
            <option value="Snack">Snack</option>
            <option value="Fruit">Fruit</option>
            <option value="Vegetable">Vegetable</option>
            <option value="Condiment or Dressing">Condiment or Dressing</option>
            <option value="Beverage">Beverage</option>
          </select>
        </div>
        <div class="row">
          <label class="col-6">Sub-Category</label>
          <select disabled="disabled" id="subcategory" class="col-6" name="subcategory">
          </select>
        </div>
        <div class="row">
          <label class="col-6">Fiber</label>
          <input class="col-5" type="text" name="fiber" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Sugar</label>
          <input class="col-5" type="text" name="sugar" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Saturated Fats</label>
          <input class="col-5" type="text" name="saturated_fats" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Monounsaturated Fats</label>
          <input class="col-5" type="text" name="monounsaturated_fats" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Polyunsaturated Fats</label>
          <input class="col-5" type="text" name="polyunsaturated_fats" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Trans Fats</label>
          <input class="col-5" type="text" name="trans_fats" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Omega 3 Fats</label>
          <input class="col-5" type="text" name="omega_3" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Omega 6 Fats</label>
          <input class="col-5" type="text" name="omega_6" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Cholesterol</label>
          <input class="col-5" type="text" name="cholesterol" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Histidine</label>
          <input class="col-5" type="text" name="histidine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Isoleucine</label>
          <input class="col-5" type="text" name="isoleucine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Leucine</label>
          <input class="col-5" type="text" name="leucine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Lysine</label>
          <input class="col-5" type="text" name="lysine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Methionine</label>
          <input class="col-5" type="text" name="methionine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Phenylalanine</label>
          <input class="col-5" type="text" name="phenylalanine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Threonine</label>
          <input class="col-5" type="text" name="threonine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Tryptophan</label>
          <input class="col-5" type="text" name="tryptophan" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Valine</label>
          <input class="col-5" type="text" name="valine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Arginine</label>
          <input class="col-5" type="text" name="arginine" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin A</label>
          <input class="col-5" type="text" name="vitamin_a" />
          <label class="col-1">iu</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B1 - Thiamine</label>
          <input class="col-5" type="text" name="vitamin_b1" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B2 - Riboflavin</label>
          <input class="col-5" type="text" name="vitamin_b2" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B3 - Niacin</label>
          <input class="col-5" type="text" name="vitamin_b3" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B5 - Panthothenic Acid</label>
          <input class="col-5" type="text" name="vitamin_b5" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B6 - Pyridoxine</label>
          <input class="col-5" type="text" name="vitamin_b6" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B7 - Biotin</label>
          <input class="col-5" type="text" name="vitamin_b7" />
          <label class="col-1">mcg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B9 - Folic Acid</label>
          <input class="col-5" type="text" name="vitamin_b9" />
          <label class="col-1">mcg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin B12 - Cobalamin</label>
          <input class="col-5" type="text" name="vitamin_b12" />
          <label class="col-1">mcg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin C</label>
          <input class="col-5" type="text" name="vitamin_c" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin D</label>
          <input class="col-5" type="text" name="vitamin_d" />
          <label class="col-1">iu</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin E</label>
          <input class="col-5" type="text" name="vitamin_e" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Vitamin K</label>
          <input class="col-5" type="text" name="vitamin_k" />
          <label class="col-1">mcg</label>
        </div>
        <div class="row">
          <label class="col-6">Calcium</label>
          <input class="col-5" type="text" name="calcium" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Iron</label>
          <input class="col-5" type="text" name="iron" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Potassium</label>
          <input class="col-5" type="text" name="potassium" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Selenium</label>
          <input class="col-5" type="text" name="selenium" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Sodium</label>
          <input class="col-5" type="text" name="sodium" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Zinc</label>
          <input class="col-5" type="text" name="zinc" />
          <label class="col-1">mg</label>
        </div>
        <div class="row">
          <label class="col-6">Alcohol</label>
          <input class="col-5" type="text" name="alcohol" />
          <label class="col-1">g</label>
        </div>
        <div class="row">
          <label class="col-6">Caffeine</label>
          <input class="col-5" type="text" name="caffeine" />
          <label class="col-1">mg</label>
        </div>

        <div class="row">
          <div class="col-3"></div>
          <input type="hidden" name="table" value="food" />
          <input class="col-6" type="submit" value="Submit" />
          <div class="col-3"></div>
        </div>

      </div>
    </form>

  </body>

</html> 
