{!! Form::open(['route' => ['family.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('family.show', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" title="Show">
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('family.edit', $id) }}" class='btn btn-default btn-xs' title="Edit">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'title' => 'Delete',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return conformDel(this,event)"
    ]) !!}
</div>
{!! Form::close() !!}
