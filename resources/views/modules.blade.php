@if(empty($modules))
    <h1>No hay módulos instalados</h1>
@else
    @foreach($modules as $module)
        <form action=" {{ route('delete', $module) }} " method="post">
            @csrf
            <table border="1">
                <tr>
                    <th>Module</th>
                    <th>Acción</th>
                </tr>
                <tr>
                    <td> {{ $module }} </td>
                    <td><input type="submit" value="Eliminar"></td>
                </tr>
            </table>
        </form>
    @endforeach
@endif