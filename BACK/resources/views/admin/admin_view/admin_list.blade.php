
<div  id="list" class="container d-block w-100 mt-5  ">
    <a class="btn btn-success mb-2" href="{{route('admin.create')}}">Novo administrador</a>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Açoes</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $admin)
                        <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>

                            <td>
                                <form method="POST" action="{{route('admin.destroy',['admin' => $admin->id])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" ></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
