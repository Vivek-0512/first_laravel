<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard">Home</a>
                    </li>
                    @if(!$user->active)
                    <li class="nav-item">
                        <a class="nav-link" href="user">User</a>
                    </li>
                    @endif
                    <li class="nav-item float-end">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
    <div>
    <form >
        @csrf
       <div class="card">
        <div class="card-header">
            Update User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-4 field">
                    <label for="exampleInputEmail1" class="form-label">User Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
                    <input type="hidden" name="id" id="id">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3 col-md-4 field">
                    <label for="email" class="form-label">Email active<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3 col-md-4 field">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" maxlength="10" id="phone" aria-describedby="emailHelp">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb-3 col-md-4 field">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" id="age" aria-describedby="emailHelp">
                    @if($errors->has('age'))
                        <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                </div>
                <div class="mb-3 col-md-4 field">
                    <label for="active" class="form-label">Access<span class="text-danger">*</span></label>
                    <select class="form-control" name="active" id="active" required>
                        <option value="1">No</option>
                        <option value="0">Yes</option>
                    </select>
                </div>
                @if($errors->has('active'))
                        <span class="text-danger">{{ $errors->first('active') }}</span>
                    @endif
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
       </div>
    </form>
    </div>
    <div>
    <table class="table table-success table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Access</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $valu)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$valu->name}}</td>
                <td>{{$valu->email}}</td>
                <td>{{$valu->age}}</td>
                <td>{{$valu->phone_number}}</td>
                <td>{{$valu->active==1?'No':'Yes'}}</td>
                <td><a href="#" class="btn btn-primary" id="editdata" data-info="{{$valu}}" onclick='useredit({{$valu}});' >Edit</a></td>
                <td><a href="#" class="btn btn-danger" id="editdata" data-info="{{$valu}}" onclick='userdelete({{$valu->id}});' >Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/js/app.js')
    @yield('scripts')
    
</body>
</html>
<script>
    function userdelete(edata){
        $.ajax({
                url: 'deleteuser',
                type: 'POST', 
                data: {
                    id: edata,
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    
                }
            });
	}
    function useredit(edata){
            $('#name').val(edata['name']);
            $('#age').val(edata['age']);
            $('#phone').val(edata['phone_number']);
            $('#email').val(edata['email']);
            $('#active').val(edata['active']);
            $('#id').val(edata['id']);
			}
    $(document).ready(function() {
        $('#submit').click(function() {
            if(!$('#id').val()){
                alert('You can only update')
                return;
            }
            $.ajax({
                url: 'createupdate',
                type: 'POST', 
                data: {
                    name: $('#name').val(),
                    age: $('#age').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    active: $('#active').val(),
                    id: $('#id').val(),
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                }
            });
        });
    });
</script>
<style>
    .field{
        padding: 0px 15px;
    }
</style>