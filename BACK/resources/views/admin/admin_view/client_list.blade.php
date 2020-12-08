

<div  id="list" class="container d-block w-100 mt-5  ">
    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalForm">
       <span>Novo evento</span>
    </button>
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('event.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title"><h3>Nome do evento</h3></label>
                            <input type="text" class="form-control" id="title" placeholder="nome" name="title">
                        </div>
                        <div class="form-group">
                            <label for="start"><h3>Inicio do evento</h3></label>
                            <input type="datetime-local" class="form-control" id="start" placeholder="Data de inicio" name="start">
                        </div>
                        <div class="form-group">
                            <label for="end"><h3>Fim do evento</h3></label>
                            <input type="datetime-local" class="form-control" id="end" placeholder="Data final" name="end">
                        </div>
                        <div class="form-group">
                            <input type="color" class="form-control" id="color"  name="color"> </input>
                        </div>
                        <button type="submit" class="btn btn-success">Success</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li><p>{{$error}}</p></li>
            @endforeach
                <li>O evento nao foi cadastrado</li>
        </ul>
    @endif
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Açoes</th>

                </tr>
                </thead>

                <tbody>
               @foreach($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{date( 'd/m/Y H:i:s' , strtotime($event->start))}}</td>
                    <td>{{date( 'd/m/Y H:i:s' , strtotime($event->end))}}</td>
                    <td>
                        <a class="btn btn-success mb-2" href="{{route('event.edit',$event)}}"><i class="fa fa-edit"></i></a><br>
                        <a class="btn btn-danger" href="{{route('event.destroy',['event'=>$event->id])}}"><i class="fa fa-times-circle-o" ></i></a>
                    </td>

                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>

