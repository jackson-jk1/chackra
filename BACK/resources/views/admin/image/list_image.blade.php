
<div  id="list" class="container d-block w-100 mt-5  ">
    <a class="btn btn-success mb-2" href="{{route('imagen.create')}}">Nova imagem</a>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="category">Categoria</th>
                        <th>Imagem</th>
                        <th>açoes</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($images as $imagen)
                        <tr>
                            <td class="category">{{$imagen->name}}</td>
                                <td>

                                    <img class="center_image" src="{{asset('storage/'.$imagen->path)}}" height="250" width="300">

                                </td>

                            <td>

                                <a  class="btn btn-success mb-2" href="{{route('imagen.edit',$imagen->id)}}"><i class="fa fa-edit"></i></a><br>
                                <form method="POST" action="{{route('imagen.destroy',['imagen'=>$imagen->id])}}">
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

