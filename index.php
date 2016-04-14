<!DOCTYPE html>
<?php require('db_access.php'); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Sarcastic Josh</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 formContainer">
      <form id='joshForm' class="col-md-6 selection">
        <fieldset id="selectionField">
          <legend>
            Choose Mood
          </legend>
          <?php
            $num_selections = get_pix_count($conn);
            $count = 1;
            while($count <= $num_selections){
              echo '<label class="radio"><input type="radio" name="joshMood" value="' . $count . '">' . get_name($conn, $count) . '</label>';
              $count += 1;
            }
          ?>
        </fieldset>
      </form>
    </div>
    <script src="/js/jquery-2.2.2.js"></script>
    <script src="ajax.js"></script>
  </body>
</html>
