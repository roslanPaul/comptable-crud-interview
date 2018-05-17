<li class="{{ Request::is('comptables*') ? 'active' : '' }}">
    <a href="{!! route('comptables.index') !!}"><i class="fa fa-edit"></i><span>Comptables</span></a>
</li>

<li class="{{ Request::is('pointages*') ? 'active' : '' }}">
    <a href="{!! route('pointages.index') !!}"><i class="fa fa-edit"></i><span>Pointages</span></a>
</li>

