<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/svn-gilroy" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
        <link rel="stylesheet" href="assets/css/preloader.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/swiper-bundle.css">
        <link rel="stylesheet" href="assets/css/backToTop.css">
        <link rel="stylesheet" href="assets/css/fontAwesome5Pro.css">
        <link rel="stylesheet" href="assets/css/elegantFont.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->
        <main>
            <!-- page title area start -->
            <section 
                class="page__title-area page__title-height d-flex align-items-center" 
                data-background="{{ $banner 
                    ? url('storage/banners/'.$banner->image)
                    : 'assets/img/banner/banner.png' }}"
            >
            </section>
            <!-- page title area end -->

            <!-- about area start -->
            <section class="about__area pt-120 pb-100">
                <div class="container">
                    <div class="row text-center">
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/page-title/title.png" alt="">
                        </div>
                        <div class="promotion-sub-title mt-2">
                            <span>Chương trình khuyến mãi diễn ra hàng tuần tại BKNS</span>
                        </div>
                    </div>

                    @foreach ($promotions as $promotion)
                        @include('widgets.promotion', [
                            'imagePosition' => $promotion->image_position,
                            'image' => $promotion->image,
                            'content' => $promotion->content
                        ])
                    @endforeach
                </div>
            </section>
            <!-- about area end -->

            <!-- brand area start -->
            <section class="brand__area pb-110">
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/brand/all-product-title.png" alt="">
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="promotion-sub-title mt-2">Từ dịch vụ best seller cho đến dịch vụ mới ra mắt</span>
                        </div>
                    </div>

                    <div class="tab d-flex justify-content-center flex-wrap pt-50">
                        @foreach ($categories as $cate)
                            <button class="tablinks width-230" onclick="openService(event, 'cate_{{$cate->id}}')" id="defaultOpen"><img src="{{ url('storage/categories/'.$cate->image) }}" alt=""></button>
                        @endforeach
                    </div>

                    @foreach ($categories as $cate)
                    <div id="cate_{{$cate->id}}" class="tabcontent pt-50">          
                        <div class="container owl-carousel owl-theme">
                            <!-- <div class="row"> -->
                                    @foreach ($cate->products as $prod)
                                        <!-- <div class="col-sm-6 col-md-6 col-lg-3"> -->
                                            <div class="item item-tab">
                                                <div class="product__name text-center mb-10">{{$prod->name}}</div>
                                                <div class="product_description text-center mb-25">{{$prod->description}}</div>
                                                <div class="price__area text-center">
                                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                                        <div class="cost">{{ number_format($prod->cost) }} VNĐ</div>
                                                        <div class="btn-sale">Giảm giá {{$prod->discount}}%</div>
                                                    </div>
                                                    <div class="current-price">
                                                        <span class="highlight-price">{{ number_format(($prod->cost / 100) * $prod->discount) }}</span> <span class="text-vnd">VNĐ/th</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="option__list style__show">
                                                    @foreach ($prod->options as $option)
                                                        <div class="option__item">
                                                            @if ($option->use_option == 1)
                                                                <div style="width: 48px;">
                                                                    <img src="assets/img/icon/check.png" alt="">
                                                                </div>
                                                                
                                                            @else
                                                                <span style="width:48px; height:48px"></span>
                                                            @endif
                                                                
                                                            {{$option->name_option}}: <span class="text-line-through">{{$option->old_value_option}}</span> <span class="font-600 ml-2">{{$option->value_option}}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="d-flex justify-content-center" style="margin-top: -20px; height: 70px">
                                                    @if ( count($prod->options) > 8 )
                                                        <div style="width: 70px; height: 70px; cursor: pointer" class="show__more" id="bkc01">
                                                            <img src="assets/img/icon/chevron-down.png" alt="">
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                                <div>
                                                    <select name="" id="" class="select-month">
                                                        @for ($i=1; $i<= 12; $i++)
                                                            <option value="{{$i}}">{{$i}}th x {{ number_format(($prod->cost / 100) * $prod->discount) }}đ = {{ number_format(($prod->cost / 100) * $prod->discount * $i) }}đ</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div>
                                                    <button class="btn-register">đăng ký ngay</button>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    @endforeach
                            <!-- </div> -->
                        </div>
                    </div>
                    @endforeach
                    

                    <div id="domain" class="tabcontent pt-50">
                        <h3>domain</h3>
                        <p>Paris is the capital of France.</p> 
                    </div>

                    <div id="vps" class="tabcontent pt-50">
                        <h3>vps</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>
                    <div id="email" class="tabcontent pt-50">
                        <h3>email</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>
                    <div id="server" class="tabcontent pt-50">
                        <h3>server</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>
                    <div class="row pt-60">
                        <div class="container">
                                <div class="note-area style-italic">
                                    <p stat>Lưu ý:</p>
                                    <ul class="pl-50">
                                        <li class="mb-1">
                                            Trên đây là <span class="text-highlight-black">bảng giá gốc</span>. Mỗi tuần sẽ có 
                                            <span class="text-highlight-black">khuyến mại sản phẩm</span> kèm theo 
                                            <span class="text-highlight-black">voucher giảm giá khác nhau</span>. 
                                            Khách hàng có thể lựa chọn gói dịch vụ phù hợp và áp dụng khuyến mại theo từng tuần. 
                                        </li>
                                        <li class="mb-1">Chương trình khuyến mại <span class="text-highlight-black">áp dụng trên giá gốc</span></li>
                                        <li class="mb-1">Chương trình chỉ <span class="text-highlight-black">áp dụng cho ĐĂNG KÝ MỚI</span></li>
                                        <li class="mb-1">Chương trình <span class="text-highlight-black">KHÔNG</span> áp dụng cho <span class="text-highlight-black">ĐẠI LÝ, GIA HẠN</span></li>
                                        <li>Chương trình khuyến mại <span class="text-highlight-black">KHÔNG áp dụng đồng thời</span> với các chương trình khác</li>
                                    </ul>
                                </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- brand area end -->

        </main>

        <!-- footer area start -->
        <footer>
        <div class="footer__area footer-bg">
            <div class="footer__top pt-80 pb-20">
                <div class="container">
                    <div class="row mb-40">
                        <div class="d-flex justify-content-center mb-20">
                            <img src="assets/img/events/register-text.png" alt="">
                        </div>
                        <p class="sale-text text-center">Khuyến Mại Giảm Giá Kịch Trần Tại BKNS</p>
                    </div>
                    <div class="row form-register">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                                    <form class="width-full">
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control radius-12 height-50" placeholder="Họ và tên">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="phone" class="form-control radius-12 height-50" placeholder="Số điện thoại">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control radius-12 height-50" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select radius-12 height-50" aria-label="Default select example">
                                                <option selected>Dịch vụ</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-center pt-10">
                                            <button type="submit" class="btn btn-receive uppercase">đăng ký ngay</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-around align-items-center">
                                    <div>
                                        <img src="assets/img/events/image-form-register.png" alt="">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-70">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="footer__widget mb-50">
                                    <div class="footer__widget-head mb-22">
                                        <h3 class="footer__contact-title">{{$information->name}}</h3>
                                    </div>
                                    <div class="footer__widget-body">
                                        <table>
                                            @foreach ($address as $add)
                                                @if ($add)
                                                    <tr>
                                                        <td width="5%">
                                                            <div class="icon-ft mr-2">
                                                                <img src="assets/img/icon/address.png" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="pa-1">
                                                            <div class="footer__contact-detail">{{$add}}</div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <div class="icon-ft mr-2">
                                                        <img src="assets/img/icon/phone.png" alt="">
                                                    </div>
                                                </td>
                                                <td class="pa-1">
                                                    <div class="footer__contact-detail text-line-under">{{$information->phone}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icon-ft mr-2">
                                                        <img src="assets/img/icon/mail.png" alt="">
                                                    </div>
                                                </td>
                                                <td class="pa-1">
                                                    <div class="footer__contact-detail">Email liên hệ: <span class="text-line-under">{{$information->email}}</span></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1" style="margin: 0 auto">
                                <div class="footer__widget mb-50">
                                    <div class="footer__widget-body">
                                        <div>
                                            <img src="assets/img/about/qr.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="footer__widget mb-50">
                                    <div class="footer__widget-head mb-22">
                                        <h3 class="footer__contact-title">Liên Hệ Với Chúng Tôi :</h3>
                                    </div>
                                    <div class="footer__widget-body">
                                        
                                        <div class="footer__social">
                                            <ul>
                                                <li><a href="{{$socialNetworks->face}}"><i class="social_facebook"></i></a></li>
                                                <li><a href="{{$socialNetworks->twitter}}" class="tw"><i class="social_twitter"></i></a></li>
                                                <li><a href="{{$socialNetworks->instagram}}" class="pin"><i class="social_instagram"></i></a></li>
                                                <li><a href="{{$socialNetworks->youtube}}" class="youtube"><i class="social_youtube"></i></a></li>
                                                <li><a href="{{$socialNetworks->pinterest}}" class="pin"><i class="social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
        </div>
        </footer>
        <!-- footer area end -->

        <!-- JS here -->
        <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.meanmenu.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/parallax.min.js"></script>
        <script src="assets/js/backToTop.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/ajax-form.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/main.js"></script>

        <script>
            function openService(evt, category) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(category).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>
