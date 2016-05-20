<form action="{{ route($route, ['id' => $id]) }}" method="post" style="display: inline">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button class="ui button red tiny icon" type="submit"><i class="trash outline icon"></i></button>
</form>