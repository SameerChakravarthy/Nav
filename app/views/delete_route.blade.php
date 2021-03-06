 <?php 
 $city = Session::get('editCity');
 $trans = Session::get('editTrans'); 
 $table = $city.'_'.$trans.'_route';
 $routes = DB::table($table)->select('route')->distinct()->orderBy('route', 'asc')->get();
 $i = 0;
foreach($routes as $route){
    $routes_data[$i] = $route->route;
    $i = $i+1;
}
 ?>
 
 <style>
 .cell{
     -ms-word-break: break-all;
     word-break: break-all;
     word-break: break-word;

-webkit-hyphens: auto;
   -moz-hyphens: auto;
        hyphens: auto;
 max-width: 150px; 
 }
 
 #route td:hover{color:#1E90FF;}

 </style>
@include('up_map')
<title>Delete Route Selection</title>
<script>
  $(function() {
    var availableroute = <?php echo json_encode($routes_data)?>;
    $( "#route" ).autocomplete({
      source: availableroute
    });
  });
</script>
<div style="width: 100%;" >


<div id="section" style="margin-left:40px;" > 
<h1><u> Select the route </u></h1>
{{ Form::open(array('url'=>'delete_route','method' => 'POST','class'=>'navbar-form navbar-left','style'=>'display:inline-block')) }}
  {{ Form::label('routes', 'Route: ') }}
  <input type="text" id = "routes" name="routes" required style="height:40px;width:400px;display:inline-block;">
  <button type="submit" class="btn btn-primary btn-md " value="Submit">Go</button>
{{ Form::close() }}
<br><br><br><br><h1><u> The following routes are available </u></h1><br>
     <table id = "route" style = "font-size:24px;width:100%; " class="table table-bordered table-condensed f11"></table>
</div>
</div>
     <script>
   	var routes = <?php echo json_encode($routes_data)?>;
   	var newdiv ="<tr>"; 
   	for(var m in routes){
   		
   		if(m%7==0 && m!=0){
   			newdiv += '</tr><tr><td class="cell">{{ Form::open(array("url"=>"delete_route","method" => "POST","class"=>"navbar-form navbar-left","style"=>"display:inline-block")) }}<label class="hidden" for="route">Route Number </label> <input type="submit" style = "background-color: Transparent;background-repeat:no-repeat;border: none; text-transform: capitalize;width: 100px;word-break: break-word;" id = "route" name="route" value=\"' ;
   			newdiv += routes[m] + '\"/>{{ Form::close() }}</td>';
   		}
   		else{
   			newdiv += '<td class="cell">{{ Form::open(array("url"=>"delete_route","method" => "POST","class"=>"navbar-form navbar-left","style"=>"display:inline-block")) }}<label class="hidden" for="route">Route Number </label> <input type="submit" style = "background-color: Transparent;background-repeat:no-repeat;border: none; text-transform: capitalize;width: 100px;word-break: break-word;" id = "route" name="route" value=\"' ;  
   			newdiv += routes[m] + '\"/>{{ Form::close() }}</td>';
   		}
   	}

   	$('table#route').append(newdiv);
   	jQuery(function($) {
   	$('.expandable').bind('click', function () {
        $(this).children().toggle();
    	});
	});
   </script>
