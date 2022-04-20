<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Meeting Finished</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/28d953b416.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="finishandthank.css">
</head>
<body>
<!-- download page -->
<div class="card" id="downloadpage">
  <div class="container">
    <i class="fas fa-question-circle" style="font-size: 60px; margin-bottom: 20px; color: #0d6efd;"></i>
    <!-- <img src="qm.png" width="50" height="50"> -->
    <h2>Do you want to save this session ?</h2>
    <hr style="width: 50%; margin-left: auto; margin-right: auto;"> 
     <button type="button" class="btn btn-primary" onclick="yesbtn()"><i class="fas fa-save"></i> Yes</button> &nbsp; &nbsp;
     <button type="button" class="btn btn-danger" onclick="nobtn()"><i class="fas fa-times"></i> No</button>
  </div>
</div>

<script type="text/javascript">
    function yesbtn(){
        document.getElementById('downloadpage').style.display="none"
        document.getElementById('thankyoupage').style.display="block"
    }
    function nobtn(){
        document.getElementById('downloadpage').style.display="none"
        document.getElementById('thankyoupage').style.display="block"
    }
</script>

<!-- thank you page -->
<div style="display: none;" id="thankyoupage">
<div>
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" >
    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>

</div>
<div style="margin-top: -180px;">
<div style="font-size:30px;">
    <div>Thank you for attending this session</div>
<div> 
  <span>Have a Great day !!!</span>
</div>
<div>
    <button type="button" class="btn btn-primary "><i class="fas fa-home"></i> Back</button>
</div>
</div>
</div>
</div>

</body>
</html>