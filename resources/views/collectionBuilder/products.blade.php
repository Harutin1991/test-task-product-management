<?php $numberCount = 0; $theSameLinePr = []; foreach($products as $key=>$product):?>
<?php
    $number = (int)round($product['bbox'][1]);
    $theSameLinePr[] = $number;
    ?>
<?php endforeach;?>
<?php
$numberCount = array_count_values($theSameLinePr);
$productPxNumber = max($numberCount);
$minPx = array_key_first($numberCount);

?>

<section id="products-section" style="margin-left: {{ $right }}px; margin-top: {{ $top }}px; ">
    <?php $x = 0; ?>
<?php foreach($products as $key=>$product):?>

    <?php
    $margin = 'margin-top:';
    if((int)round($product['bbox'][1]) === $minPx ) {
        $margin.= round($product['bbox'][1]).'px';
    } else {
        $margin.= "initial";
    }

//    'x' => round($element['bbox'][0]),
//    'y' => round($element['bbox'][1]),
//    'h' => round($element['bbox'][3]),
//    'w' => round($element['bbox'][2]),

    //$img->crop(round($el['coordinates']['w']), round($el['coordinates']['h']), round($el['coordinates']['x']), round($el['coordinates']['y']));

    $img = \Intervention\Image\Facades\Image::make($image);
    // int $width, int $height, int $x = null, int $y = null
    $img->crop(round($product['child'][1]['bbox'][2]), round($product['child'][1]['bbox'][3]),
        round($product['child'][1]['bbox'][0]), round($product['child'][1]['bbox'][1]));
    $imageName = md5(time()).'_'.$key . '.jpg';
    $path = public_path('images' . DIRECTORY_SEPARATOR . $imageName);
    $img->save($path);
    ?>

    <div id="product-<?=$key?>" class="item collection-product"  style="{{ $margin }}; float: left;border: 1px solid;">
        <img src="{{asset('images/' . $imageName)}}" style="width: {{ $product['child'][1]['bbox'][2] }}px; height: {{ $product['child'][1]['bbox'][3] }}px;">
        <h3 class="title font-size-16">
            <a href="#" >Product {{  $key+1 }}</a>
        </h3>
        <div class="pricing lht" style="height: 22px;">
            <span class="price">Product {{ $key+1 }}</span>
        </div>

        <div class="actions">
            <button class="btn btn-success" type="submit">Add to Cart</button>
        </div>
    </div>
<?php endforeach;?>
</section>
