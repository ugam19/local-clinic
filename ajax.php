<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12">

<h3 class="text-success text-
center">AJAX & PHP Form Submit </h3>

<form>
<div class="form-group">
<label for="name">Name</label>

<input type="text" name="" id="name" class="form-
control">

</div>
<div class="form-group">
<label for="email">Email</label>

<input type="text" name="" id="email" class="form-
control">

</div>
<div class="form-group">
<label>Choose State</label>

<select class="form-
control" onchange="selectstate(this.value)">

<option>Select State</option>
<option>Maharashtra</option>
<option>UP</option>
<option>Bihar</option>
</select>
</div>

<div class="form-group">
<label>Choose city</label>
<select class="form-control" id="city">
<option>Select City</option>

</select>
</div>

<button type="button" class="btn btn-
primary">Submit</button>

</form>
</div>
</div>
</div>
<script type="text/javascript">
function selectstate(state)
{
var req = new XMLHttpRequest();
req.open("GET","http://localhost/wdl/response.php?datavalue="+state,true);
req.send();
req.onreadystatechange = function(){
if(req.readyState==4 && req.status==200){
document.getElementById('city').innerHTML = req.responseText;
}
}
}
</script>
</body>
</html>