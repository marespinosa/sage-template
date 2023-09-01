<?php

$email_template_social_medias = get_field('general_social_media', 'option');
?>

<div class="border-t copyright-wrap">
    <div class="copyright block items-center justify-center container py-6">
        <div class="copyright-website flex items-center justify-center  flex-col-reverse sm:flex-row ">
            <span class="text-black">© {!! date("Y") !!} {!! $siteName !!}</span>

            @if ($copyright)
            @foreach ($copyright as $page)
            <a class=" mb-4 sm:mb-0 sm:ml-6 link-on-hover" href="{!! get_the_permalink($page['page']->ID) !!}">{!!
                $page['page']->post_title !!}</a>
            @endforeach
            @endif
        </div>
        <div class="copyright-legend flex items-center justify-center mt-12 md:mt-0">
            <p class="mr-2 text-black">Proudly made by</p>
            <a href="https://legendhasit.co.nz/" target="_blank" aria-label="Web developer: Legend has it" rel="partner" class="text-black">
                @include('sections.footer.legend-logo')
            </a>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($email_template_social_medias)) {?>

            <ul class="socials-icons sm:w-72 lg:w-64">

            <?php foreach ($email_template_social_medias as $item) {?>

                <?php $img_src = get_social_media_img($item['item']);?>

                <li class="float-left p-3 m-2 rounded-3xl"> 
                    <a href="<?php echo $item['item']; ?>">
                    <img src="<?php echo \Roots\asset('images/email/' . $img_src . '.png') ?>" width="24" height="24" />
                </a></li>


             <?php }?>

            </ul>

        <?php }?>

    </div>


</div>