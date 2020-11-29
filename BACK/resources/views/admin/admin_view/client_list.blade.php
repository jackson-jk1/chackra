

<div  id="list" class="container d-block w-100 mt-5  ">
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
                    <td><a href="{{route('')}}"><i class="fa fa-eye"></i></a>/
                        <a  href="{{route('')}}"><i class="fa fa-edit"></i></a>/
                        <a  href="{{route('')}}"><i class="fa fa-times-circle-o" ></i></a>
                    </td>

                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>

