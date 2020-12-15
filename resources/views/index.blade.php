<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('Css/css.css')}}">   
     <title>Document</title>
</head>
<body>
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
    ADD-DATA
    </button>

<!-- Modal -->
<form id="add_data">
    @csrf
<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
                <div class="modal-body">
                    
                        
                    <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text"
                        class="form-control" name="" id="name" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="">Tuổi</label>
                    <input type="text"
                        class="form-control" name="" id="age" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"
                        class="form-control" name="" id="email" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                <button  type="submit" class="btn btn-primary" >Thêm dữ liệu</button>
            </div>
           
            </div>
        </div>
    </div>
</form>  
    <table class="table" id="add_data_TB">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->age}}</td>
                <td>{{$users->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
<script type="text/javascript">
        $("#add_data").submit(function(e){
            e.preventDefault();
            let name = $('#name').val();
            let age = $('#age').val();
            let email = $('#email').val();
            let _token = $("input[name=_token]").val();
           

            $.ajax({
                url:"{{route('add.form')}}",
                type:"POST",
                data:{
                    name:name,
                    age:age,
                    email:email,
                    _token:_token
                },
                success:function(add_data_DB){
                    if(add_data_DB){
                        $('#add_data_TB tbody').prepend('<tr><td>'+add_data_DB.name+'</td><td>'+add_data_DB.age+'</td><td>'+add_data_DB.email+'</td>  </tr>')
                        $("#add_data")[0].reset();
                        $("#exampleModal").modal('hide');
                      

                    }
                },
                error:function(add_data_DB_err){
                    if(add_data_DB_err){
                        alert('them that bai');
                    }
                }
            })    ;
        });
</script>
