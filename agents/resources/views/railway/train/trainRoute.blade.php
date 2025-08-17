<table class="table">
    <thead>
    <tr>
        <th colspan="2">{{ trans('trainRoute.number')}}: {{ $routes->getTrainRoute()->getNumber() }}</th>
        <th colspan="2">
            <i class="fas fa-map-pin"></i>
            {{  implode("--->", $routes->getTrainRoute()->getRoutes()->toArray()) }}
        </th>
    </tr>
    <tbody>
    @foreach($routes->getRoutes() as $route)
        <tr>
            <td colspan="2">
                {{ $route->getTitle() }}
            </td>
            <td colspan="2">
                <i class="fas fa-map-pin"></i>
                {{  implode("--->", $route->getRoute()->toArray()) }}
            </td>
        </tr>
        <tr>
            <td><strong>{{ trans('trainRoute.station') }}</strong></td>
            <td><strong>{{ trans('trainRoute.arv time') }}</strong></td>
            <td><strong>{{ trans('trainRoute.waiting time') }}</strong></td>
            <td><strong>{{ trans('trainRoute.dep time') }}</strong></td>
        </tr>

        @foreach($route->getStop() as $stop)
            <tr>
                <td><strong class="mobile only">{{ trans('trainRoute.station') }}</strong> {{ $stop->getStation() }}
                </td>
                <td>{{ $stop->getArvTime() }}</td>
                <td>{{ $stop->getWaitingTime() }}</td>
                <td>{{ $stop->getDepTime() }}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
