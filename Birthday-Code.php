<?php
                  echo '</select>';
                  echo '<select name="day">';
                  echo '<option></option>';
                  for ($i = 1; $i <= 31; $i++) {
                      $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                      echo "<option value='$i'>$i</option>";
                      $i = $day;
                  }

                  echo '</select>';
                  echo '<select name="month">';
                 echo '<option></option>';
                    for ($i = 1; $i <= 12; $i++) {
                        $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                        echo "<option value='$i'>$i</option>";
                        $i = $month;
                    }
                  echo '</select>';
                 echo '<select name="year">';
                 echo '<option></option>';
                 for ($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--) {
                     echo "<option value='$i'>$i</option>";
                     $i = $year;
?>
