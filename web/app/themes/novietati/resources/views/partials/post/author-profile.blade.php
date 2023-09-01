<div
    class="author-profile flex items-center flex-wrap md:flex-nowrap  justify-center md:justify-start text-center md:text-left  p-8 rounded-lg">
    <figure class="author-profile-thumbail shrink-0 mr-0 md:mr-8 ">
        <img src="{!! get_avatar_url($authorID) !!}" class="rounded-lg" alt="{!! $authorName !!} - Author Profile"
            width="96" height="96" />
    </figure>
    <div class="author-profile-content">
        <span class="label">Author</span>
        <h2 class="title paragraph-text-medium mb-2 link-on-hover"><a href="{!! $authorPage !!}">{!! $authorName !!}</a>
        </h2>
        <p class="content">{!! $authorBio !!}</p>

        <div class="mt-4 flex justify-between">
            @if ($authorSocialMedias)
            <div class="social-media-loop flex">
                @foreach ($authorSocialMedias as $item)
                @php($media = get_social_media_img($item['item']))
                <a target="_blank" data-tooltip="View my {!! ucfirst($media == 'default' ? 'media' : $media) !!}"
                    class="social-media-loop-item mr-4 use-tippy-tooltip" href="{!! $item['item'] !!}">
                    {{-- <img src="@asset('images/social-media/' . $media . '.png')" width="24" height="24"
                        alt="{!! $media !!}" /> --}}
                    @svg('images.social-media.' . $media, ['w-5 h-5 color-mainBrand transition-3s'])
                </a>
                @endforeach
            </div>
            @endif
            <a class="author-profile-count-post inline-block px-4 py-1 rounded-3xl text-sm " href="{!! $authorPage !!}">
                {!! $authorPostsCount !!}
            </a>
        </div>
    </div>
</div>