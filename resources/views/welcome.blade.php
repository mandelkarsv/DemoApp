<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<meta name="csrf_token" content="{{csrf_token()}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<style>
				.file-upload{
	height: 433px;
    width: 435px;
    margin: 40px auto;
    border: 1px solid #f0c0d0;
    border-radius: 0px;
    overflow: hidden;
    position: relative;
}
.file-upload input{
	position:absolute;
	height:400px;
	width:400px;
	left:0px;
	top:15px;
	background:transparent;
	opacity:0;
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);  
}
.file-upload img{
	height:400px;
	width:400px;
	margin:15px;
}
		</style>

        
    </head>
    <body  class=" file-upload">
        <center>
    
  
<div class="row ">
 
  
  <img id="img_prv"  class="img-thumbnail" src="{{url('../Images/user.jpg')}}">
 
  
  
</div>
<div class="row">
  <label>Image upload</label>
  <input type="file" name="file_img" id="img_file_upid">
 
  <span id="mgs_ta">
    
  </span>
</div>
</center>
    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
 <script type="text/javascript">
  $('#img_file_upid').on('change',function(ev){
    console.log("here inside");
 
    var filedata=this.files[0];
    var imgtype=filedata.type;
 
 
    var match=['image/jpeg','image/jpg'];
 
    if(!(imgtype==match[0])||(imgtype==match[1])){
        $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
 
    }else{
 
      $('#mgs_ta').empty();
    
 
    //---image preview
 
    var reader=new FileReader();
 
    reader.onload=function(ev){
      $('#img_prv').attr('src',ev.target.result);
    }
    reader.readAsDataURL(this.files[0]);
 
    /// preview end
 
        //upload
 
        var postData=new FormData();
        postData.append('file',this.files[0]);
 
        var url="{{url('uploadimage')}}";
 
        $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData,
        processData:false,
        success:function(){
          console.log("success");
        }
 
 
        });
 
    }
 
  });
 
</script>
 
</html>
