<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{-- offline bootstrap --}}
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- custom css --}}
{{-- <link href="{{ asset('custom.css') }}" rel="stylesheet"> --}}


</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
						{{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i><span>Recycle Bin</span></a>						 --}}
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Image</th>
						<th>View</th>

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $data)
						<tr>
							<td><a href="">{{$data->name}}</a></td>
							<td>{{$data->description}}</td>
							<td>#{{$data->price}}</td>
							<td>{{$data->stock}}</td>
							<td><img src="{{ asset('product/' . $data->image) }}" alt="Product Image" width="40" height="40"></td>
							<td><a href="{{url('/display-product', $data->id)}}" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a></td>
							<td>
								<a href="#editEmployeeModal" 
								class="edit" 
								data-toggle="modal"
								data-id="{{ $data->id }}" 
								data-name="{{ $data->name }}" 
								data-description="{{ $data->description }}" 
								data-price="{{ $data->price }}" 
								data-stock="{{ $data->stock }}" 
								data-image="{{ $data->image }}">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

								<a href="#deleteEmployeeModal"
								 class="delete" data-toggle="modal"
								 data-id="{{ $data->id }}" >
								 <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> --}}
		</div>
	</div>        
</div>
<!-- Add Product Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form  action="{{url('/add-product')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">		
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" class="form-control" step="0.01" name="price" required>
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="number" class="form-control" name="stock" required>
					</div>	
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" name="image" required>
					</div>	
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" name="add-product-btn" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Product Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('/edit-product')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" id="edit-id" class="form-control" name="id" hidden>
					</div>					
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="edit-name" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" id="edit-description" name="description" required></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" id="edit-price" class="form-control" step="0.01" name="price" required>
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="number" id="edit-stock" class="form-control" name="stock" required>
					</div>	
					<div class="form-group">
                        <label>Current Image</label>
                        <img id="edit-image-preview" src="" alt="Product Image" width="40" height="40">
                    </div>
					<div class="form-group">
						<label>Change Image</label>
						<input type="file" id="edit-image" class="form-control" name="image">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('/delete-product')}}" method="get">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="form-group">
					<input type="text" id="delete-id" class="form-control" name="id" hidden>
				</div>	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
{{-- custom js --}}
<link href="{{ asset('custom.js') }}" rel="stylesheet">
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>

<script>
	$(document).ready(function(){
    $('.edit').on('click', function() {
        // Get data attributes from the clicked edit button
        var id = $(this).data('id');
        var name = $(this).data('name');
        var description = $(this).data('description');
        var price = $(this).data('price');
        var stock = $(this).data('stock');
        var image = $(this).data('image');

        // Set values inside the modal form fields
        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-description').val(description);
        $('#edit-price').val(price);
        $('#edit-stock').val(stock);

        // Update the image preview
        if (image) {
            $('#edit-image-preview').attr('src', "{{asset('product')}}/" + image);
        } else {
            $('#edit-image').attr('src', "{{ asset('default-image.jpg') }}"); // Fallback image
        }
    });



	$('.delete').on('click', function() {
        // Get data attributes from the clicked edit button
        var id = $(this).data('id');

        // Set values inside the modal form fields
        $('#delete-id').val(id);
    });
});
</script>
</html>