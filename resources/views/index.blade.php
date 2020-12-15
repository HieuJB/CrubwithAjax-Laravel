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

<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_data">
    @csrf
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
{{--  //edit-modal  --}}
<div class="modal fade" id="exampleModal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="edit-data-form">
             @csrf
                <div class="modal-body">                 
                    <div class="form-group">
                    <input type="hidden" id="id">
                    <label for="">Tên</label>
                    <input type="text"
                        class="form-control" name="" id="name-edit" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="">Tuổi</label>
                    <input type="text"
                        class="form-control" name="" id="age-edit" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"
                        class="form-control" name="" id="email-edit" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                <button  type="submit" class="btn btn-primary" >Thêm dữ liệu</button>
                </form>  
            </div>        
            </div>
        </div>
    </div>
{{--  end-edit-modal  --}}
    <table class="table" id="add_data_TB">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr id="id{{$users->id}}">
                <td>{{$users->name}}</td>
                <td>{{$users->age}}</td>
                <td>{{$users->email}}</td>
                <td><a herf="javascript:void(0)" onclick="edit_Data({{$users->id}})"><button type="button" class="btn btn-primary" >Edit</button></a></td>
                <td><a herf="javascript:void(0)" onclick="remove_Data({{$users->id}})"><button type="button" class="btn btn-primary" >Remove</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
<script type="text/javascript">
        $("#add_data").submit(function(e){
            e.preventDefault();
            var name = $('#name').val();
            var age = $('#age').val();
            var email = $('#email').val();
            var _token = $("input[name=_token]").val();
    
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
            });
        });
    function edit_Data(id){
            $.get('/edit/'+id,function(edit_data_form){
                $('#id').val(edit_data_form.id);
                $('#name-edit').val(edit_data_form.name);
                $('#age-edit').val(edit_data_form.age);
                $('#email-edit').val(edit_data_form.email);
                $('#exampleModal-edit').modal('show');
            });
        };
        $('#edit-data-form').submit(function(e){
            e.preventDefault();
            var id = $('#id').val();
            var name = $('#name-edit').val();
            var age = $('#age-edit').val();
            var email =$('#email-edit').val();
            let _token = $("input[name=_token]").val();
            $.ajax({
                url:"{{route('edit.data')}}",
                type:"PUT",
                data:{
                    id:id,
                    name:name,
                    age:age,
                    email:email,
                    _token:_token
                },
                success:function(edit_data_suc){
                    $('#id' + edit_data_suc.id + ' td:nth-child(1)').text(edit_data_suc.name);
                    $('#id' + edit_data_suc.id + ' td:nth-child(2)').text(edit_data_suc.age);
                    $('#id' + edit_data_suc.id + ' td:nth-child(3)').text(edit_data_suc.email);
                    $("#edit-data-form")[0].reset(); 
                    $("#exampleModal-edit").modal('hide');              
                }
            })
        });
        function remove_Data(id){
            var _token=$('input[name=_token]').val();
            if(confirm("Delete")){
                $.ajax({
                    url:'/delete/'+id,
                    type:'DELETE',
                    data:{
                        _token : _token
                    },
                    success:function(remove_Data_form){
                        $('#id'+id).remove();
                    }
                });
            }
        }
</script>
