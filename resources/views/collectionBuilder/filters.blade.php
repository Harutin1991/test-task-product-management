<div style="margin-left: {{ $right }}px; margin-top: {{ $top }}px">
    <ul class="nav-level-2">
        <?php foreach ($filters as $filter):?>
        <li class="nav-item nav-level-1 nav-active nav-node">
            <a href="#"><?=$filter['name']?></a>
        </li>
        <?php endforeach;?>
    </ul>
</div>
