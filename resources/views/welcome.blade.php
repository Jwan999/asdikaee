<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    {{--    <link rel="stylesheet" href="css/app.css">--}}
    <title>Asdikaee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'El Messiri', sans-serif;
        }

        .fade-enter-active, .fade-leave-active {
            transition: opacity .5s;
        }

        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
        {
            opacity: 0;
        }

        .english-font {
            font-family: 'Work Sans', sans-serif;
        }

        .zaincash-btn {
            background: #191817; /* Old browsers */
            border-radius: 30px;
            border: none;
            outline: none;
            padding-right: 15px;
            padding-left: 15px;
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .zaincash-btn:hover {
            background: #333231;
            transition: all 0.2s;
            color: #fff;
            border-radius: 30px;
            border: none;
            outline: none;
        }

        .zaincash-btn > img {
            width: 160px;
        }


    </style>
</head>
<body dir="rtl" class="bg-gray-100">
<div id="app" class="w-full min-h-screen">
    {{--    @include('components.navbar')--}}
    {{--    {{Auth::user()->phone}}--}}
    {{--    {{Auth::guard('customer')->user()->name}}--}}

    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>


</div>

{{--footer--}}
<div dir="ltr" class="mt-20">

    <div class="flex space-x-16 bg-gray-700 rounded-t-3xl px-6 text-white lg:py-6 pt-6 pb-14">
        <div class="grid grid-cols-1 gap-3 english-font">
            <h1 class="text-white text-lg">
                Reach out
            </h1>
            <a class="text-gray-200 text-sm flex items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 icon icon-tabler icon-tabler-phone"
                     width="44"
                     height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#C2C5CC" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path
                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"/>
                </svg>

                +9647721216699
            </a>
            <a
                class="text-gray-200 text-sm flex items-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 icon icon-tabler icon-tabler-brand-whatsapp"
                     width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#C2C5CC" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"/>
                    <path
                        d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1"/>
                </svg>


                +9647838441100
            </a>
            <a class="text-gray-200 text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 icon icon-tabler icon-tabler-mail"
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="#C2C5CC" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                    <polyline points="3 7 12 13 21 7"/>
                </svg>

                ceo@asdikaee.com
            </a>

        </div>
        <div class="english-font">
            <h1 class=" text-white text-lg">
                Asdikaee Social Media
            </h1>
            <div class="flex justify-start space-x-3 mt-4">
                <a target="_blank" href="https://www.instagram.com/asdikaee_magazine/" class="text-gray-100 text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class=" text-red-500 w-7 h-7 mr-2 icon icon-tabler icon-tabler-brand-instagram"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="#C2C5CC" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="4" y="4" width="16" height="16" rx="4"/>
                        <circle cx="12" cy="12" r="3"/>
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"/>
                    </svg>

                    {{--                    asdikaee_magazine--}}
                </a>
                <a target="_blank" href="https://www.facebook.com/%D9%85%D8%AC%D9%84%D8%A9-%D8%A3%D8%B5%D8%AF%D9%82%D8%A7%D8%A6%D9%8A-%D9%84%D9%84%D8%A7%D8%B7%D9%81%D8%A7%D9%84-Asdikaee-Magazine-420270078445817"
                   class="text-gray-100 text-sm flex items-center">
                    <svg class=" text-red-500 w-7 h-7 mr-2 icon icon-tabler icon-tabler-brand-facebook"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="#C2C5CC" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"/>
                    </svg>
                    {{--                    Asdikaee Magazine--}}
                </a>
                <a target="_blank" href="https://t.me/+SyGTMux8WA1QVDEy" class="text-gray-100 text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class=" text-red-500 w-7 h-7 mr-2 icon icon-tabler icon-tabler-brand-telegram"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="#C2C5CC" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"/>
                    </svg>
                    {{--                    Telegram channel--}}
                </a>
                <a target="_blank" href="https://www.facebook.com/دار-الصفار-للنشر-والأعلام-Dar-Al-Saffar-For-Publishing-and-Media-107970188620189/"
                   class="text-gray-100 text-sm flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 icon icon-tabler icon-tabler-book"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="#C2C5CC" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                        <line x1="3" y1="6" x2="3" y2="19"/>
                        <line x1="12" y1="6" x2="12" y2="19"/>
                        <line x1="21" y1="6" x2="21" y2="19"/>
                    </svg>
                </a>
            </div>


        </div>

    </div>


</div>

<script>
    @if($zain)
        window.zain = @json($zain)
    @endif
</script>
<script src="/js/app.js"></script>

</body>
</html>
