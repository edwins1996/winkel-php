<?php
include 'connect.php';
?>
<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a><br><br />

<form action='overzichtenpdfdaily.php' method='POST'>

<span>Dag/Maand/Jaar: </span><br />
<select name='dag' required>
    
<option value=''></option>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>

    
</select>
    
 <select name='maand' required>
    
<option value=''></option>
<option value='1'>Januari</option>
<option value='2'>Februari</option>
<option value='3'>Maart</option>
<option value='4'>April</option>
<option value='5'>Mei</option>
<option value='6'>Juni</option>
<option value='7'>Juli</option>
<option value='8'>Augustus</option>
<option value='9'>September</option>
<option value='10'>Oktober</option>
<option value='11'>November</option>
<option value='12'>December</option>
    
</select>   

<select name='jaar' required>
  <option value=''></option>
<?php
    
for($x = date('Y')-10; $x <= date('Y'); $x++){
    
    echo "<option value='$x'>$x</option>";
    
}    
    
?>    
    
</select>    
    
<input type='submit' value='Opvragen' />
    
</form>


<br /><br />
<br /><br />

<form action='overzichtenpdfweekly.php' method='POST'>
<span>Week/Jaar: </span><br />
    <select name='week' required>
<option value=''></option>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
<option value='32'>32</option>
<option value='33'>33</option>
<option value='34'>34</option>
<option value='35'>35</option>
<option value='36'>36</option>
<option value='37'>37</option>
<option value='38'>38</option>
<option value='39'>39</option>
<option value='40'>40</option>
<option value='41'>41</option>
<option value='42'>42</option>
<option value='43'>43</option>
<option value='44'>44</option>
<option value='45'>45</option>
<option value='46'>46</option>
<option value='47'>47</option>
<option value='48'>48</option>
<option value='49'>49</option>
<option value='50'>50</option>
<option value='51'>51</option>
<option value='52'>52</option>

    
</select>

    <select name='jaar' required>
  <option value=''></option>
<?php
    
for($x = date('Y')-10; $x <= date('Y'); $x++){
    
    echo "<option value='$x'>$x</option>";
    
}    
    
?>    
    
</select>  
    <input type='submit' value='Opvragen' />
</form>