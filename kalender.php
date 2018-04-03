<?php
include 'connect.php';
    echo "<table width=\"200\">\n";
    echo "<tr><td class=\"kalalg\">";

    /* Start weergave berekeningsdeel */
    $this_month = date("n");
    $month_name = date("F");
    $this_year = date("Y");

    /* Navigatie deel */
    $last_month = $this_month - 1;
    $next_month = $this_month + 1;
    /* Navigatie deel beveiligen tegen mogelijke fouten*/
    if ($last_month == 12) {
        $last_year = $this_year - 1;
    } else {
        $last_year = $this_year;
        }
    if ($next_month == 1) {
        $next_year = $this_year + 1;
    } else {
        $next_year = $this_year;
        }

    /* Hoofdtitel aanmaken */
    echo "<table width=\"100%\">\n";
    echo "<tr><td class=\"kalalg\">";
    echo "<center>$month_name $this_year</center>";
    echo "</td></tr>\n";
    echo "</table>\n";

    /* Titels aanmaken voor de kalender */
    echo "<table width=\"100%\" border=\"0\">\n";
    echo "<tr><td class=\"kaltit\"> </td>\n";
    echo "<td class=\"kaltit\">Zo</td>\n";
    echo "<td class=\"kaltit\">Ma</td>\n";
    echo "<td class=\"kaltit\">Di</td>\n";
    echo "<td class=\"kaltit\">Wo</td>\n";
    echo "<td class=\"kaltit\">Do</td>\n";
    echo "<td class=\"kaltit\">Vr</td>\n";
    echo "<td class=\"kaltit\">Za</td>\n";
    echo "</td></tr>\n";

    /* Voorberekenen voor het tekenen */
    $first_day = date("w", mktime(0, 0, 0, $this_month, 1, $this_year));
    $total_days = date("t", mktime(0, 0, 0, $this_month, 1, $this_year));
    $week_num = 1;
    $day_num = 1;
    $the_day = " ";

    /* Doorloop het aantal weergeven weken (primaire teller in het proces) */
    while ($week_num <= 6) {
           echo "<tr>\n";

           if (($the_day-1)>0) {
                if ($the_day>$total_days) {
                    echo "<td class=\"kaltit\"> </td>";
                } else {
                    echo "<td class=\"kaltit\">".date("W",mktime(0,0,0,$this_month,$the_day+2,$this_year))."</td>";
                    }
           } else {
                echo "<td class=\"kaltit\">".date("W",mktime(0,0,0,$this_month,1,$this_year))."</td>";
                }

           /* Loop door de weekdagen */
           for ( $i = 0; $i <= 6; $i++ ) {
                 if ($week_num == 1) {
                     if ($i < $first_day)
                          $the_day = " ";
                     else if ($i == $first_day) {
                          $the_day = 1;
                          }
                     } else {
                         if ($the_day > $total_days)
                             $the_day = " ";
                     }
                 /* Weekdag weergeven */
                 echo "<td class=\"kaltexr\">$the_day</td>\n";

                 /* Tellen naar de volgende weekdag */
                 if ($the_day != " ")
                     $the_day++;
                 }

          /* Volgende week doorlopen */
          echo "</tr>\n";

          $week_num++;
          }

    /* Afronden van alle tags */
    echo "</table>\n";
    echo "</td></tr>\n";
    echo "</table>\n";
    ?>