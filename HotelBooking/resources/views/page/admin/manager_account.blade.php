@extends('layouts.admin_app')
@section('content')


	<div class="card pt-3">
		<h4 class="m-3">Team manager</h4>
		<span id="mess_output"></span>
		<div class="table-responsive">
			<table class="table table-hover">
		    	<thead>
		    		<tr>
		    			<th>No.</th>	
		    			<th>Name</th>    			
		    			<th>Email</th>
		    			<th>Role</th>    			
		    			<th>Remove</th>
		    			<th>Delete</th>
		    		</tr>
		    	</thead>
		    	<tbody id='account-manager'>    		
		    		@foreach($acc as $i=>$r)    
		    		<tr>
		    			<td>{{$i+1}}</td>
		    			<td>{{$r->name}}</td>
		    			<td>{{$r->email}}</td>   
		    			@if($r->group_id == 2) 			
		    				<td>{{$r->group_name}}</td>
		    				<td><a href="#" id='{{$r->id}}' class="remove-role btn btn-danger pb-2 pt-2 pl-1 pr-1">Remove</a></td>    	
		    				<td><a href="#" id='{{$r->id}}' class="delete-acc btn btn-danger pb-2 pt-2 pl-1 pr-1">Delete</a></td> 			
		    			@else
		    				<td>{{$r->group_name}}</td>
		    			@endif	
		    		</tr>    		
		    		@endforeach
		    	</tbody>
		    </table>
	    </div>
    </div>

    <div class="col-12 mt-4 mb-4 p-2 card">		
		<button class="add-new btn-admin col-5 p-2">+ Add new manager</button>
		<div class="content-collapse">
			<div class="input-field mt-3 mb-5"> 
                <label for="search">Search</label>
                <input id="search" type="text" placeholder="Enter name or email" required autofocus>
            </div>

            <table class="table table-hover">
		    	<thead>
		    		<tr>
		    			<th>No.</th>	
		    			<th>Name</th>    			
		    			<th>Email</th>
		    			<th></th> 
		    		</tr>
		    	</thead>
		    	<tbody id="tb-search">    			    		
		    	</tbody>
		    </table>
	    </div>
	</div>

    <script type="text/javascript">
    	$(document).ready(function(){

    		function fetch_user_data(query = '')
			{
				$.ajax({
					url:"{{ route('live_search') }}",
					method:'GET',
					data:{query:query},
					dataType:'json',
					success:function(data)
					{
						console.log(data);
						$('#tb-search').html(data.table_data);						
					}
				});
			}

			function getAccount()
			{
				$.ajax({
					url:"{{ route('get_account') }}",
					method:'GET',
					data:{},
					dataType:'json',
					success:function(data)
					{						
						$('#account-manager').html(data.table_data);			
					}
				})
			};

	    	$(".add-new").click(function () {
			    $header = $(this);
			    $content = $header.next();
			    $content.slideToggle(500, function () {
			        $header.text(function () {
			            return $content.is(":visible") ? "- Collapse" : "+ Add new manager";
			        });
			    });
			    fetch_user_data();
			});

			$(document).on('keyup', '#search', function(){
				var query = $(this).val();
				fetch_user_data(query);
			});

			$(document).on('click', '.add-role', function(){
				var id = this.id;
				$('#mess_output').html('');
				if(confirm("Are you sure you want to add this records to manager team?"))
				{
					$.ajax({
						url:"{{route('add_role')}}",
						method:'POST',
						data:{id:id, _token: '{{csrf_token()}}'},
						dataType: 'json',
						success:function(data)
						{	
							$('#mess_output').html(data);
						}
					});
					getAccount();
					fetch_user_data();
				}
			});

			$(document).on('click', '.remove-role', function(){
				var id = this.id;
				$('#mess_output').html('');
				if(confirm("Are you sure you want to remove role of this records?"))
				{
					$.ajax({
						url:"{{route('remove_role')}}",
						method:'POST',
						data:{id:id, _token: '{{csrf_token()}}'},
						dataType: 'json',
						success:function(data)
						{	
							$('#mess_output').html(data);
						}
					});
					getAccount();
					fetch_user_data();
				}
			});

			$(document).on('click', '.delete-acc', function(){
				var id = this.id;
				$('#mess_output').html('');
				if(confirm("Are you sure you want to delete this records?"))
  				{
					$.ajax({
						url:"{{route('delete_acc')}}",
						method:'POST',
						data:{id:id, _token: '{{csrf_token()}}'},
						dataType: 'json',
						success:function(data)
						{	
							$('#mess_output').html(data);
						}
					});
					getAccount();
					fetch_user_data();
				}
			});
		});
			

    </script>
@endsection