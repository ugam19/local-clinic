</body>
</html>
<?php
$state = $_GET['datavalue'];
$a = array('Pune','Mumbai','Nagpur','Nashik','Aurangabad','Solapur','Kohla
pur','Amravati');
$b = array('Kanpur','Lucknow','Prayagraj','Agra','Varanasi','Noida','Meeru
t','Ghaziabad');
$c = array('Patna','Muzaffarapur','Gaya','Nalanda','Munger','Hajipur','Cha
pra','Motihari');

if($state=="Maharashtra"){
foreach($a as $aone){
echo "<option> $aone </option>";
}
}
if($state=="UP"){
foreach($b as $bone){
echo "<option> $bone </option>";
}
}
if($state=="Bihar"){
foreach($c as $cone){
echo "<option> $cone </option>";
}
}
?>