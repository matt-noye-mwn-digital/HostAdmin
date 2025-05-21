<div class="container-fluid px-lg-0">
    <div class="card pageHeroBanner px-0">
        <div class="card-header transparent-bg no-border px-2">
            @if($displayButton == 'Yes' || $displayButton == 'yes')
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h1 class="@if(!$content) mb-0 @endif offBlack">{{ $title }}</h1>
                        @if($content)
                            <p>{{ $content }}</p>
                        @endif
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="{{ $buttonLink }}" class="primarySolidBtn">{!! $buttonIcon !!} {{ $buttonContent }}</a>
                    </div>
                </div>
            @else
                <h1 class="@if(!$content) mb-0 @endif offBlack">{{ $title }}</h1>
                @if($content)
                    <p>{{ $content }}</p>
                @endif
            @endif
        </div>
    </div>
</div>
