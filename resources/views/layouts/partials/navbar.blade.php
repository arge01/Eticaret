<span class="category-header">Kategoriler <i class="fa fa-list"></i></span>
<ul class="category-list">
    @foreach($kategoriler as $kategori)
        <li class="{{ count($kategori->children) == 0 ? '' : 'dropdown side-dropdown' }}">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $kategori->kategori_adi }} <i class="{{ count($kategori->children) == 0 ? '' : 'fa fa-angle-right' }}"></i></a>
            <div class="custom-menu">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-links">
                            @foreach($kategori->children as $altkategori)
                                <li><a href="{{ config('app.url').'kategori/'.$kategori->sef_link.'/'.$altkategori->sef_link }}">{!! $altkategori->kategori_adi.' / <span style="font-size: 8pt; font-weight: 500">'.count($altkategori->urunleri).' <span style="font-size: 7pt; font-weight: 300">içerik</span> '.'</span>' !!}</a></li>
                            @endforeach
                        </ul>
                        <hr class="hidden-md hidden-lg">
                    </div>
                </div>
                <div class="row hidden-sm hidden-xs">
                    <div class="col-md-12">
                        <hr>
                        <a class="banner banner-1" href="#">
                            @if($kategori->img != NULL)
                                <img src="{{ config('app.url') }}img/{{ $kategori->img }}" alt="">
                            @endif
                            <div class="banner-caption text-center">
                                {!! $kategori->img_text !!}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>