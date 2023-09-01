<?php
if (is_front_page()) { ?>
<div class="page-header page-header-full thumbnail-holder ">
    <div class="absolute header-full" >
        @if (!my_wp_is_mobile())
        <div class="page-header-gradient"></div>
        {!! $featuredMobile !!}
        @endif
    </div>
    
    
     <div class="container page-header-full-content pb-12 sm:pb-0 pt-20 sm:pt-0 block sm:flex items-center  animate hide relative z-10 color-white py-14 m-4 <?php echo is_front_page() ? 'height-hero' : ''; ?> clear-both overflow-hidden lg:mt-12">
        <div class=" w-full text-center m-0 m-auto white-background">
            <div class="p-3">
                <div class="p-20 border-1">
                    @if (!empty($uppertitle) && !isset($uppertitle)  )
                    <p class="upper-title color-black-font">{!! $uppertitle !!}</p>
                    @endif
                    <h1 class="title break-spaces mb-6 h1-lesser color-black-font ">{!! $title !!}</h1>
                    <p class="description break-spaces color-black-font">{{ $description }}</p>

                    @if ($buttons)
                    <div class="centred-btn mt-12 flex items-center {!! my_wp_is_mobile() ? 'justify-center' : '' !!} ">
                        @foreach ( $buttons as $key => $btn)
                        <x-button target="{!! isset($btn['link']['target']) ? $btn['link']['target'] : false !!}"
                            class="uppercase {!! $btn['appearance'] !!} {!! ($key != 0 ? 'ml-4' : '') !!}"
                            href="{!! $btn['link']['url'] !!} ">{!! $btn['link']['title'] !!}</x-button>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

              </div>
         </div>
    </div>
</div>
    
<?php } 

else { ?>

<div class="page-header page-header-full thumbnail-holder default-header ">
    <div class="absolute" >
        @if (!my_wp_is_mobile())
        <div class="page-header-gradient"></div>
        {!! $featuredMobile !!}
        @endif
    </div>

     <div class="page-header-full-content block sm:flex items-center  animate hide relative z-10 color-white py-14 <?php echo is_front_page() ? 'height-hero' : ''; ?> clear-both overflow-hidden h-52">
        <div class="container w-full md:w-10/12 lg:w-5/12 text-center m-0 m-auto relative">
                    <h1 class="title break-spaces h1-lesser color-black-font mb-5">{!! $title !!}</h1>
                    
                        <div class="breadcrumbs text-center m-0 mr-auto ml-auto w-36 overflow-hidden">
                            <ul>
                                <li><a href="<?php echo home_url(); ?>"><strong>Home</strong></a></li>
                                <?php if (is_page()) { ?>
                                    <li><strong>/</strong></li>
                                    <li><strong><?php echo get_the_title(); ?></strong></li>
                                <?php } ?>
                            </ul>
                        </div>

                    @if ($buttons)
                    <div class="centred-btn mt-12 flex items-center {!! my_wp_is_mobile() ? 'justify-center' : '' !!} ">
                        @foreach ( $buttons as $key => $btn)
                        <x-button target="{!! isset($btn['link']['target']) ? $btn['link']['target'] : false !!}"
                            class="uppercase {!! $btn['appearance'] !!} {!! ($key != 0 ? 'ml-4' : '') !!}"
                            href="{!! $btn['link']['url'] !!} ">{!! $btn['link']['title'] !!}</x-button>
                        @endforeach
                    </div>
            </div>
            @endif
        </div>
         </div>
    </div>
</div>
    


<?php
}
?>
