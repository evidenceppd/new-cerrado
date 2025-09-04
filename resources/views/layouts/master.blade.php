<!doctype html>
<html lang="pt-BR" class="no-js">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- jQuery -->
    {{-- <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=puqJuXzmFyT622ShNo9XFvgJ3PMUJ54Ib4x2Q-WfGGqJEgye8hXk-pIl6nbt2ckUY8su890CfDAX4w0Lu8752qA8Bx1Ik4kuZm-qxjY_aX3lyePdNsWNzSr1OptZ9R89Z383XdFnFkTqN4aKLDusJ5hLq5Ryk33usKO1SfCipTK0B0o-jvdURniyuE-xVw3gFm6UR2mgpStOGbixRyF8c-FGui8pMawsp5gyIi6-ltx3puzW8HmGcKVwM-pyMaJ4DTfbI1XdcFRe73o2g5wg2j3v1dKGUqMNFQ_orSnKFgvNHBTAV1BYrPzFqP9Moxv-8xh7go9aGE8Ne_L_SmXKsLR0oxZtQceMf41ZE8jAHkClwI3c6XKyhA1GOCTdGZ0WxEzpMnbCzFh3UM7zmL-4VA-EFqspfdseI33c_nG4rBTH8_AKVCaQFEQ6WPCsskqsESSQT5bXygcyo97jsvbTVz0UnwvIwM1-JmqZu_rmYp1aytPAh3GgbjuwL__ayKAnho6jp3kBE68NX2HJ8rX8sNDjKQxJsBkxNMRDaz2DBRjr8PEUovcadq_1cqcbhaqNZRGnF1GpDb6AHVIL4oQifVlBIPUjlBtTer6gz6rpdjhSD-F5qQXuF98xObSj8RNUHr7vaKXh5JKltzYwYsXqSXKs-MjPMXCDNXup0Ya3J1beWvudbYXNNKa38Jhgt9LOTXzTrlhNYPqpwZp85Q-HaJOKsgYXmgOYVVz6yo_WWiEmBZiMeoCmrB9RV_YS3aydBnUREvfoM1iaeuPIbnB3fpvNieaMYpUOADDnB3AaEHXoQzpqP-9AZBQviMQ9To6PSZGg_wmHUADaSLkEI33gnXCs4IqDk_n5H2sLUPse33s"
        charset="UTF-8"></script> --}}
    <script rel="preconnect" src="/assets/js/theme-jquery.min.js"></script>

    <!-- Favicon -->
    {{-- <meta name="theme-color" content="#018B82" /> --}}
    <meta name="apple-mobile-web-app-title" content="Cerrado Seguros e Consórcios" />
    <link rel="icon" type="image/png" href="/assets/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="shortcut icon" href="/assets/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-touch-icon.png" />
    <title>@yield('title')</title>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    @yield('seo')
    <style>
        img:is([sizes="auto" i],
        [sizes^="auto," i]) {
            contain-intrinsic-size: 3000px 1500px
        }
    </style>

    <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
    <link rel='stylesheet' href='/assets/css/bootstrap-grid.min.css' media='all' />
    <link rel='stylesheet' href='/assets/css/bootstrap-utilities.min.css' media='all' />
   
    <link rel='stylesheet' id='tm-lgpd-cookie-css' href='/assets/css/cookieModal.css' media='all' />
    <link rel='stylesheet' id='global-css' href='/assets/css/global.css' media='all' />
    <link rel='stylesheet' id='CookieConsent-css' href='/assets/css/cookie.css' media='all' />
    <link rel='stylesheet' id='home-css' href='/assets/css/home.css' media='all' />
    <link rel='stylesheet' id='swiper-css'
        href='https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css?ver=11.1.14' media='all' />
    <link rel='stylesheet' id='animate-css' href='/assets/css/animate.css' media='all' />
    <link rel='stylesheet' id='select2-css' href='/assets/css/select2.css' media='all' />
    <link rel='stylesheet' id='slick-css' href='/assets/css/slick.css' media='all' />
    <link rel='stylesheet' id='afinidades-css' href='/assets/css/afinidades.css' media='all' />
    <link rel='stylesheet' id='wp-block-library-css' href='/assets/css/style.min.css' media='all' />
    <style id='classic-theme-styles-inline-css' type='text/css'>
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <link rel='stylesheet' id='aviso-css' href='/assets/css/aviso.css' media='all' />
    <link rel='stylesheet' href='/assets/css/style.css' media='all' />
    <script type="text/javascript" src="/assets/js/conditionizr.min.js" id="conditionizr-js"></script>
    <script type="text/javascript" src="/assets/js/modernizr.min.js" id="modernizr-js"></script>
    <script type="text/javascript" src="/assets/js/faq.min.js" id="faq-js"></script>
    <script type="text/javascript" src="/assets/js/jquery.min.js" id="jquery-core-js"></script>
    <script type="text/javascript" src="/assets/js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    @yield('css')

    <style>
        
    </style>
</head>

<body class="home">
    <header>
        <div class="blackout display-none"></div>
        <nav class="navbar topbar">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 150 32" version="1.1">

                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Logo_BB_Amarela" transform="translate(0, 0.001)" fill-rule="nonzero">
                                    <polygon id="Fill-1" fill="#FFFFFF" opacity="0"
                                        points="0 31.3376323 150 31.3376323 150 0 0 0"></polygon>
                                    <path
                                        d="M7.83158303,11.9324353 L12.7353351,15.1850186 L18.6038151,11.2518974 L16.1523607,9.62602741 L19.3265176,7.49249469 L26.1976736,12.04628 L14.9523539,19.5853244 L17.4063382,21.2095079 L31.3375479,11.8691883 L19.5651697,4.06619292 L7.83158303,11.9324353 Z M31.3586303,19.7050721 L26.4523483,16.4516455 L20.5880848,20.3839235 L23.0378526,22.0106367 L19.8628524,24.1407963 L12.9959128,19.5903842 L24.2378594,12.052183 L21.7838751,10.4254697 L7.85266537,19.7683191 L19.6284167,27.5687846 L31.3586303,19.7050721 Z M31.3248985,7.29853717 L28.8801905,8.93789986 L26.4278928,7.31202986 L31.3164656,4.03499106 L31.3248985,7.29853717 Z M7.86531477,24.3364404 L10.3100228,22.6970777 L12.7606339,24.3229477 L7.87374771,27.5999865 L7.86531477,24.3364404 Z"
                                        id="Fill-4" fill="#005dab"></path>
                                    <g id="Group-23" transform="translate(36.7184, 7.7747)" fill="#005dab">
                                        <path
                                            d="M100.748114,15.5874383 L95.922788,15.600931 L95.916885,13.5905191 L100.464767,13.5778697 C100.96484,13.5770264 101.350225,13.4049945 101.628512,13.0634607 C101.89921,12.7219268 102.03751,12.2960635 102.035823,11.7808111 C102.034137,11.2056849 101.480093,10.6533276 100.378751,10.1347021 L97.3234987,8.70278962 C96.2179408,7.98599008 95.6638969,7.08703914 95.6613038,6.01015325 C95.6546207,3.65061785 97.2450724,2.46326051 100.435252,2.45398428 L104.353194,2.44302146 L104.35994,4.60859935 L100.854369,4.61787557 C99.7513408,4.62124875 99.2023567,5.08253033 99.2048866,6.00087703 C99.2065732,6.64515331 99.7589305,7.21521976 100.862802,7.71023309 C101.679953,8.07453591 102.426268,8.38065147 103.111866,8.62857978 C103.385936,8.73314818 103.65579,8.83181353 103.918054,8.92120265 C105.021926,9.61607655 105.576813,10.5259903 105.579421,11.6560037 C105.583559,13.3586134 105.080956,14.483567 104.072377,15.0241182 C103.377503,15.3934808 102.269415,15.5832218 100.748114,15.5874383"
                                            id="Fill-5"></path>
                                        <path
                                            d="M89.8611095,4.17740864 C90.635253,4.17573676 91.1361694,4.60665977 91.3596422,5.47019238 C91.4945692,5.98375817 91.5662491,7.18882467 91.5713089,9.09213826 C91.5763687,10.9979817 91.5114351,12.2055781 91.3798813,12.7174573 C91.1758042,13.5312356 90.6774177,13.9385464 89.8872517,13.941092 C89.1139514,13.9427629 88.6206247,13.5421984 88.4081147,12.7444427 C88.2723445,12.2350934 88.2074109,11.0182208 88.2023511,9.10141448 C88.1972913,7.23942229 88.2563219,6.03688566 88.388719,5.50055095 C88.5961692,4.61762259 89.0878093,4.17995323 89.8611095,4.17740864 M89.8931547,15.9094654 C92.1759504,15.9034204 93.6727965,15.1916806 94.37526,13.770731 C94.7926903,12.9324972 95.0009838,11.3656577 94.9942375,9.08286203 C94.9874911,6.72332662 94.771608,5.12022555 94.3491179,4.28030516 C93.6525574,2.89477383 92.1540248,2.20074322 89.8560498,2.20653566 C87.5740974,2.21339263 86.0839977,2.91501287 85.3933402,4.30476067 C84.9632605,5.17419634 84.7507505,6.77645412 84.7566536,9.11153401 C84.7633999,11.3833669 84.9843428,12.94346 85.418639,13.7943432 C86.1447148,15.2119197 87.6348145,15.9160698 89.8931547,15.9094654"
                                            id="Fill-7"></path>
                                        <path
                                            d="M84.3113103,15.6318799 L81.4567615,9.21947558 C83.0202278,8.92600942 83.7994311,7.81623509 83.7943713,5.88509282 C83.7909981,4.83603562 83.4924722,4.01045122 82.9089131,3.4091829 C82.3253539,2.80454142 81.5022994,2.5051722 80.4549288,2.50765498 L74.2921394,2.52456795 L74.3275577,15.6588653 L77.6965155,15.649589 L77.6670002,4.524017 L78.7674983,4.52064383 C79.332505,4.51895724 79.771861,4.70279524 80.0847229,5.06878465 C80.4043312,5.43646064 80.5628703,5.9011154 80.5645569,6.46274891 C80.5654002,6.96450858 80.4616751,7.39205842 80.2508517,7.74624172 C79.9919606,8.15186593 79.6251279,8.35847285 79.1537268,8.35931615 L78.2227307,8.36184603 L81.3159315,15.6403128 L84.3113103,15.6318799 Z"
                                            id="Fill-9"></path>
                                        <path
                                            d="M69.1707332,2.53865096 L69.196032,11.8140369 C69.1994052,13.1767993 68.701862,13.8607104 67.7042457,13.8632403 C66.6931367,13.8657702 66.1871606,13.1852322 66.1829441,11.8224698 L66.1584886,2.54708389 L62.8510912,2.55551683 L62.87639,11.9885987 C62.8806065,13.5225497 63.3089996,14.5901593 64.1615694,15.1922709 C64.8901751,15.7134264 66.0682562,15.9748474 67.7101488,15.9699978 C69.3124065,15.9655711 70.4845846,15.6940306 71.2317427,15.1543227 C72.0834692,14.5193227 72.5042727,13.4550862 72.500149,11.9624566 L72.4747574,2.52937473 L69.1707332,2.53865096 Z"
                                            id="Fill-11"></path>
                                        <path
                                            d="M61.3925307,6.49901054 C61.4658972,5.10588956 61.0585864,4.04165308 60.1638519,3.31051756 C59.3610365,2.64431564 58.2462024,2.31290127 56.8126033,2.31700075 C54.6352193,2.32302079 53.1796946,3.01030505 52.4502457,4.37475404 C51.9661952,5.26864522 51.7258565,6.8835524 51.7326029,9.21947558 C51.7393492,11.8210362 52.0783532,13.564124 52.7529881,14.4571719 C53.5305047,15.4893633 55.1099936,16.0037723 57.5007309,15.9980175 C58.2495755,15.9953394 59.5187324,15.84186 61.3166342,15.5340578 L61.2989251,9.03648088 L56.5756378,9.04913028 L56.5815409,10.9979817 L58.2369261,10.992922 L58.2445158,13.8508439 C58.0083936,14.0220324 57.6643298,14.1072051 57.2199141,14.1080484 C56.196999,14.1105783 55.5434465,13.5362954 55.2668462,12.3809832 C55.1589046,11.9230748 55.1032472,10.9237719 55.0990308,9.38897759 C55.093971,7.5649336 55.1732406,6.34806099 55.3284066,5.74679267 C55.5619989,4.82675939 56.0570123,4.36547781 56.8176631,4.36379122 C57.3177362,4.36210464 57.6938451,4.61087624 57.9426167,5.11010603 C58.127298,5.49043143 58.2225901,5.95424289 58.2242767,6.50744347 L61.3925307,6.49901054 Z"
                                            id="Fill-13"></path>
                                        <polygon id="Fill-15"
                                            points="50.9856134 15.7216906 50.9797104 13.7121221 46.2775054 13.7247715 46.2673859 10.0210261 50.4602415 10.0100633 50.4543385 8.044346 46.2614828 8.05530881 46.2530499 4.76562061 50.7798498 4.7529712 50.7739467 2.58823662 42.9414361 2.60931896 42.9768544 15.7436163">
                                        </polygon>
                                        <path
                                            d="M35.9264985,15.7628434 L30.0799442,15.7788659 L30.0740412,13.4134275 L35.548703,13.3982482 C36.8600245,13.394875 37.513577,12.7969799 37.5102039,11.6020329 C37.5085173,10.8548748 36.8313525,10.1600009 35.4761798,9.51994108 L31.7125606,7.73974836 C30.3590744,6.85007365 29.6810664,5.72512003 29.6775968,4.35982774 C29.6726334,2.70359918 30.2570359,1.52889124 31.4384902,0.82980087 C32.3669564,0.2884064 33.7373084,0.0177091649 35.5503896,0.0126494035 L40.4339027,0 L40.440649,2.61589665 L36.0285371,2.62770276 C35.3471559,2.63023264 34.8445529,2.74323397 34.5241013,2.96755006 C34.2044931,3.19102286 34.0459539,3.5789379 34.0467972,4.12707872 C34.0476405,4.53523281 34.2095528,4.94085701 34.5409672,5.34479463 C34.9111731,5.79174022 35.4154626,6.15688634 36.0614255,6.44697932 L39.8081788,8.14958903 C41.1582918,9.00131554 41.8371431,10.065552 41.8406075,11.3541046 C41.8455761,13.1789919 41.2265986,14.42032 39.9835839,15.0814622 C39.1436635,15.5284077 37.7901773,15.7577836 35.9264985,15.7628434"
                                            id="Fill-17"></path>
                                        <path
                                            d="M19.6758098,2.47607857 C20.1978086,2.48704139 20.6084925,2.69617819 20.8994288,3.10095911 C21.1625364,3.4551424 21.2924036,3.90799105 21.2941025,4.45950504 C21.2949335,4.93512261 21.1675962,5.37279198 20.9061752,5.77841618 C20.6051194,6.24054106 20.2256372,6.47244679 19.7643557,6.47329008 L19.687616,6.47413338 L17.6788907,6.47919314 L17.6679279,2.48113833 L19.6758098,2.47607857 Z M19.7306239,15.8068633 L20.1649201,15.80602 C23.8652923,15.7959005 25.7146351,14.3968764 25.7071148,11.614851 C25.7036723,10.3794259 25.4430946,9.44589991 24.9295288,8.81089985 C24.4168063,8.17674309 23.5507438,7.78292499 22.3288114,7.62607239 L22.3288114,7.58728088 C24.3864477,7.24153052 25.4135793,6.08453175 25.4085195,4.11206809 C25.404303,2.55366158 24.8915806,1.45063359 23.8627624,0.810573777 C23.0498274,0.302067756 21.8144023,0.0499229792 20.1623902,0.0539871592 L19.6893025,0.0558260342 L13.4666393,0.0718486119 L13.5096473,15.8237292 L19.7306239,15.8068633 Z M19.693519,8.91293837 C20.322616,8.95257317 20.8091964,9.17520267 21.1524169,9.57914029 C21.4947941,9.98645108 21.666826,10.5092931 21.6685512,11.1535694 C21.6718857,12.5306678 21.0183332,13.2727661 19.7053251,13.381551 L17.6965998,13.3866107 L17.685637,8.91884143 L19.693519,8.91293837 Z"
                                            id="Fill-19"></path>
                                        <path
                                            d="M6.22181994,0.0919189988 L0,0.10878487 L0.0421646784,15.8598221 L6.26482791,15.8429562 L6.69828081,15.842113 C10.398653,15.8319934 12.2471525,14.4338127 12.2388051,11.6509439 C12.2353464,10.4163621 11.9764552,9.48199287 11.4628895,8.84783611 C10.9476371,8.21367935 10.0807313,7.81901796 8.86385869,7.66300865 L8.86385869,7.62337385 C10.921495,7.27762349 11.9486266,6.12062471 11.9427235,4.14900435 C11.938507,2.58975455 11.424098,1.48672656 10.3978097,0.847510035 C9.58487469,0.338160721 8.34860632,0.0860159439 6.69406434,0.0900801256 L6.22181994,0.0919189988 Z M6.22013335,6.51022634 L4.21309466,6.5152861 L4.20213185,2.51807459 L6.20917054,2.51217154 C6.73454243,2.52313435 7.14185322,2.73227116 7.4327895,3.13705207 C7.6950538,3.49123537 7.8266076,3.94408401 7.82834192,4.49559801 C7.82998077,4.97121558 7.70011356,5.40888494 7.43953585,5.81450915 C7.13932334,6.27663402 6.75984124,6.50853975 6.29940295,6.50938305 L6.22013335,6.51022634 Z M4.21984101,8.95493439 L6.2268797,8.94987463 C6.8559767,8.98950943 7.3417138,9.21129564 7.68409099,9.61523326 C8.02984135,10.022544 8.20018665,10.5453861 8.20193317,11.1905056 C8.2060897,12.5667607 7.54916401,13.3088591 6.2395291,13.417644 L4.23249041,13.423547 L4.21984101,8.95493439 Z"
                                            id="Fill-21"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </li>
                    <li>
                        <div class="img-box-bb-consorcios">
                            <img src="/assets/images/icons/bb-consorcios.png" alt="Banco do Brasil Consórcios Logo">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdownMenu">
                        <a href="javascript:void(14)" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" role="button" aria-label="Parceiros" aria-expanded="false"
                            rel="noopener noreferrer" alt="Acesso Parceiros" title="Ir para Acesso Parceiros">
                            SEGUROS
                            <img class="arrow-down" src="/assets/images/icons/arrow-down.svg" alt="Acesso Parceiros"
                                title="Parceiros - Cerrado Seguros e Consórcios" height="20" width="10" />
                        </a>

                        <div class="dropdownmenusbar dropdown-menu" aria-label="dropdownMenu Button">
                            <ul class="">
                                <li class="divisor">
                                    <ul>
                                        <li style="font-weight: 600;border-bottom: 1px solid #6e6d6d36; padding: 15px 12px;"
                                            class="acesso-parceiros-lista"> Nossos
                                            parceiros</li>
                                        <li class="acesso-parceiros-lista"> <img class="arrow"
                                                src="/assets/images/icons/arrow-blue.svg" alt="Clique para ver"
                                                title="BB Consórcios"><a class="dropdown-item"
                                                aria-label="Ir para BB Consórcios"
                                                href="https://www.bb.com.br/site/pra-voce/consorcios/"
                                                title="Ir para BB Consórcios" target="_blank"
                                                rel="noopener noreferrer">BB Consórcios</a></li>
                                        <li class="acesso-parceiros-lista"> <img class="arrow"
                                                src="/assets/images/icons/arrow-blue.svg" alt="Clique para ver"
                                                title="BB Seguros"><a class="dropdown-item"
                                                aria-label="Ir para BB Seguros" href="https://www.bbseguros.com.br/"
                                                title="Ir para BB Seguros" target="_blank"
                                                rel="noopener noreferrer">BB Seguros</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li style="font-weight: 600;border-bottom: 1px solid #6e6d6d36; padding: 15px 12px;"
                                            class="acesso-parceiros-lista">Nossos seguros</li>
                                        @foreach ($categories as $categorie)
                                            <li class="acesso-parceiros-lista">
                                                <img class="arrow" src="/assets/images/icons/arrow-blue.svg"
                                                    alt="Clique para ver">
                                                <a href="{{ $categorie->link }}" class="dropdown-item"
                                                    aria-label="{{ $categorie->name }}"
                                                    rel="noopener noreferrer">{{ $categorie->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdownMenu">
                        <a href="javascript:void(14)" class="novo-btn-area-do-corretor" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" role="button" aria-label="Parceiros"
                            aria-expanded="false" rel="noopener noreferrer" alt="Acesso Parceiros"
                            title="Ir para Acesso Parceiros"><span><span class="only-desktop"><b>NOSSOS
                                </span>CORRETORES</b></span><img class="arrow-down"
                                data-src="https://www.tokiomarine.com.br/wp-content/themes/tokiomarine"
                                src="/assets/images/icons/arrow-down.svg" alt="Acesso nossos corretores"
                                title="Nossos corretores - Cerrado Seguros e Consórcios" height="20"
                                width="10" />

                        </a>

                        <div class="dropdownmenusbar nossos-corretores dropdown-menu"
                            aria-label="dropdownMenu Button">
                            <ul class="">
                                <li class="divisor">
                                    <ul>
                                        <li style="font-weight: 600;border-bottom: 1px solid #6e6d6d36; padding: 15px 12px;"
                                            class="acesso-parceiros-lista">Nossos corretores</li>

                                        @foreach ($corretores as $corretor)
                                            <li class="acesso-parceiros-lista">
                                                <img class="arrow" src="/assets/images/icons/arrow-blue.svg"
                                                    alt="Clique para ver">
                                                <a class="dropdown-item"
                                                    aria-label=" {{ $corretor->name }} - {{ $corretor->especialidade }}"
                                                    href="https://wa.me/55{{ $corretor->phone }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    {{ $corretor->name }} - {{ $corretor->especialidade }}
                                                </a>
                                            </li>
                                        @endforeach


                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a target="_blank" class="novo-btn-area-do-cliente" href="https://linktr.ee/cerradoconsorcio"
                            style="cursor: pointer;" rel="noopener noreferrer" role="button"
                            aria-label="Nossas redes" alt="Nossas redes Cerrado Consórcios e Seguros"
                            title="ir para Nossas redes sociais">
                            <img src="/assets/images/icons/share.svg" class="mr-2" alt="Nossas redes - Cerrado"
                                title="Nossas redes - Cerrado" width="20px" height="20px" />
                            <span><span class="only-desktop"><b>NOSSAS </span>REDES</b></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <nav class="menu fixed">


        <div class="container-fluid">
            <div class="header-navbar">
                <div class="btn-zap d-lg-none" style="position: absolute; right: 0; width: 35px;">
                    <a target="_blank" href="https://wa.me/556434130555">
                        <div>
                            <img src="/assets/images/icons/whatsapp-menu.svg" class="img-fluid" alt="Ícone Whatsapp">
                        </div>
                    </a>
                </div>
                <div class="logo" aria-label="Cerrado Consórcios e Seguros - Logo">
                    <a href="/" role="link" class="logo-all" title="Ir para Cerrado Consórcios e Seguros">
                        <img loading="lazy" class="logo-img" width="200px"
                            data-src="/assets/images/logo/logo-light.png" src="/assets/images/logo/logo-light.png"
                            title="Cerrado Consórcios e Seguros" alt="Cerrado Consórcios e Seguros" />
                        <img loading="lazy" class="logo-img logo-img-light" width="200px" height="auto"
                            data-src="/assets/images/logo/logo.png" src="/assets/images/logo/logo.png"
                            title="Cerrado Consórcios e Seguros" alt="Cerrado Consórcios e Seguros" />
                    </a>
                </div>

                <div class='cd-dropdown-wrapper mobile' data-id='screenMobile'>
                    <a class='cd-dropdown-trigger' id='mobile' href='#' title='Ir para Abrir/Fechar Menu'>
                        <img src="/assets/images/icons/open-menu.svg" alt="Abrir/Fechar Menu"
                            title="Abrir - Fechar Menu" width="26px" height="18px">
                    </a>

                    <nav class="cd-dropdown" id="mobileDrop">
                        <div class="logo-mobile">
                            <img width="200px" height="47px" src="/assets/images/logo/logo.png"
                                title="Logo titulo Cerrado Consórcios e Seguros"
                                alt="Logo Cerrado Consórcios e Seguros" />
                            <a href="#0" class="cd-close" title="Ir para fechar">Close</a>
                        </div>

                        <ul class="cd-dropdown-content">

                            <li id="menu-item-41621"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41621"><a
                                    href="/"
                                    title="Seguros de Afinidades &#8211; Clique para acessar">Início</a></li>
                            <li id="menu-item-41523"
                                class="full-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-41523">
                                <a href="/seguros"
                                    title="Voltar ao início do site. Clique aqui para voltar a página home">Seguros</a>
                                <div class="sub-menu-open"></div>
                                <ul class="sub-menu">
                                    @foreach ($categories_geral as $item)
                                        <li class="menu-item menu-item-has-children">
                                            <a href="{{ $item->link }}"
                                                title="assets/icons/common/menu/viagens/icon-menu-viagem2.svg">
                                                {{ $item->name }}
                                            </a>
                                            <div class="sub-menu-open"></div>
                                            <ul class="sub-menu">
                                                @foreach ($item->products as $productitem)
                                                    <li class="menu-item">
                                                        <a
                                                            href="/seguro/{{ $productitem->slug }}">{{ $productitem->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li id="menu-item-41523"
                                class="full-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-41523">
                                <a href="/seguros"
                                    title="Voltar ao início do site. Clique aqui para voltar a página home">Seguros para empresas</a>
                                <div class="sub-menu-open"></div>
                                <ul class="sub-menu">
                                    @foreach ($categories_para_empresa as $item)
                                        <li class="menu-item menu-item-has-children">
                                            <a href="{{ $item->link }}"
                                                title="assets/icons/common/menu/viagens/icon-menu-viagem2.svg">
                                                {{ $item->name }}
                                            </a>
                                            <div class="sub-menu-open"></div>
                                            <ul class="sub-menu">
                                                @foreach ($item->products as $productitem)
                                                    <li class="menu-item">
                                                        <a
                                                            href="/seguro/{{ $productitem->slug }}">{{ $productitem->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li id="menu-item-41523"
                                class="full-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-41523">
                                <a href="/seguros"
                                    title="Voltar ao início do site. Clique aqui para voltar a página home">Consórcios</a>
                                <div class="sub-menu-open"></div>
                                <ul class="sub-menu">
                                    @foreach ($categories_consorcios as $item)
                                        <li class="menu-item menu-item-has-children">
                                            <a href="{{ $item->link }}"
                                                title="assets/icons/common/menu/viagens/icon-menu-viagem2.svg">
                                                {{ $item->name }}
                                            </a>
                                            <div class="sub-menu-open"></div>
                                            <ul class="sub-menu">
                                                @foreach ($item->products as $productitem)
                                                    <li class="menu-item">
                                                        <a
                                                            href="/seguro/{{ $productitem->slug }}">{{ $productitem->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>

                <div class="desktop">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="display: flex;" class="no-children">
                            <a class="nav-item" href="/" title="Ir para Afinidades" id="btn-menu-afinidades">
                                Início </a>
                        </li>
                        <li class="has-children full-menu">
                            <div class="cd-dropdown-wrapper">
                                <a class="cd-dropdown-trigger" id="para-voce-2"
                                    title="Voltar ao início do site. Clique aqui para voltar a página home"
                                    href="/seguros" data-menu-items-target="menuItems-para-voce-2"
                                    data-submenu-full-width="true">
                                    Seguros </a>


                                <img class="arrow" alt="Ir para Seguros para Você - Cerrado Seguros e Consórcios"
                                    title="ir para Seguros para Você"
                                    src="https://www.tokiomarine.com.br/wp-content/themes/tokiomarine/images/home/arrow-preto.svg"
                                    height="40" width="10">

                            </div>
                        </li>
                        <li class="has-children full-menu">
                            <div class="cd-dropdown-wrapper">
                                <a class="cd-dropdown-trigger" id="para-a-sua-empresa-2"
                                    title="clique para ver mais no menu Para a sua Empresa" href="/seguros-empresas"
                                    data-menu-items-target="menuItems-para-a-sua-empresa-2"
                                    data-submenu-full-width="true">
                                    Para a sua Empresa </a>


                                <img class="arrow"
                                    alt="Ir para Seguros para sua empresa  - Cerrado Seguros e Consórcios"
                                    title="Ir para Seguros para sua empresa"
                                    src="https://www.tokiomarine.com.br/wp-content/themes/tokiomarine/images/home/arrow-preto.svg"
                                    height="40" width="10">

                            </div>
                        </li>
                        <li class="has-children full-menu">
                            <div class="cd-dropdown-wrapper">
                                <a class="cd-dropdown-trigger" id="consorcios-2"
                                    title="clique para ver mais no menu Para a sua Empresa" href="/consorcios"
                                    data-menu-items-target="menuItems-consorcios-2" data-submenu-full-width="true">
                                    Consócios </a>


                                <img class="arrow"
                                    alt="Ir para Seguros para sua empresa  - Cerrado Seguros e Consórcios"
                                    title="Ir para Seguros para sua empresa"
                                    src="https://www.tokiomarine.com.br/wp-content/themes/tokiomarine/images/home/arrow-preto.svg"
                                    height="40" width="10">

                            </div>
                        </li>

                        {{-- <li>
                            <button type="button" id="open-search-bar" role="search" class="btn btn-primary"
                                style="width: 50px;padding: 6px 12px;outline: none !important;">
                                <img data-src="https://www.tokiomarine.com.br/wp-content/themes/tokiomarine/images/icons/common"
                                    src="/assets/images/icons/lupa.svg" alt="Abrir caixa de busca" title="buscar"
                                    width="20px" height="20px">
                            </button>
                        </li> --}}
                        <li id="contact-li-menu">
                            <a target="_blank" href="https://wa.me/556434130555">
                                <div>
                                    <img src="/assets/images/icons/whatsapp-menu.svg" class="img-fluid"
                                        alt="Ícone Whatsapp">
                                </div>
                                <div>
                                    <div class="text-top">
                                        <h3>Fale conosco:</h3>
                                        <h4>64 3413-0555</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="menuItems" id="menuItems-para-voce-2" data-child-of="para-voce-2">
                <div class="row">
                    <div class="side col-md-4">
                        <ul aria-orientation="vertical" aria-controls="menu" role="listbox">
                            @foreach ($categories_geral as $item)
                                <li role="group">
                                    <a class="link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                        href="{{ $item->link }}" target="" alt="{{ $item->name }}"
                                        title="Ir para {{ $item->name }}"
                                        data-target="{{ $item->slug }}-{{ $item->id }}-items">
                                        <span>{{ $item->name }}</span>
                                        <img class="icon" src="/assets/images/icons/arrow-right-preto.svg"
                                            alt="Abrir" title="abrir" width="10px" height="10px">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="menu-items col-md-8">
                        @foreach ($categories_geral as $item)
                            <div id="{{ $item->slug }}-{{ $item->id }}-items"
                                class="menu-item menu-item{{ $loop->iteration }} {{ $loop->iteration == 1 ? 'active' : '' }} {{ isset($item->comunicado->name) ? 'half' : 'full' }}">
                                <ul class="submenu-items">
                                    @foreach ($item->products as $product_item)
                                        <li class="submenu-item">
                                            <a class="link" href="/seguro/{{ $product_item->slug }}"
                                                title="Ir para {{ $product_item->name }}">
                                                {{ $product_item->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @if (isset($item->comunicado) &&
                                        isset($item->comunicado->name) &&
                                        isset($item->comunicado->description) &&
                                        $item->comunicado->mostrar == 1)
                                    <div class="wrapper-comunicado">
                                        <div class="comunicado cinza"
                                            aria-label="Ir para Cotação do {{ $item->comunicado->name }}">

                                            @if ($item->icon_path != 'Nada enviado')
                                                <img class="icone"
                                                    style="{{ $item->icon_path == 'Nada enviado' ? 'display: none;' : '' }}"
                                                    src="{{ $item->icon_path }}" alt="{{ $item->comunicado->name }}"
                                                    title="{{ $item->comunicado->name }}">
                                            @endif


                                            <p class="title">{{ $item->comunicado->name }}</p>
                                            <p class="text">{{ $item->comunicado->description }}</p>

                                            <a class="btn" target="_self" title="Cote Agora" alt="Cote Agora"
                                                href="https://wa.me/556434130555?text=Olá,%20gostaria%20de%20fazer%20uma%20cotação%20do%20{{ $item->comunicado->name }}.">
                                                Cote
                                                Agora</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="menuItems" id="menuItems-para-a-sua-empresa-2" data-child-of="para-a-sua-empresa-2">
                <div class="row">
                    <div class="side col-md-4">
                        <ul aria-orientation="vertical" aria-controls="menu" role="listbox">
                            @foreach ($categories_para_empresa as $item)
                                <li role="group">
                                    <a class="link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                        href="{{ $item->link }}" target="" alt="{{ $item->name }}"
                                        title="Ir para {{ $item->name }}"
                                        data-target="{{ $item->slug }}-{{ $item->id }}-items">
                                        <span>{{ $item->name }}</span>
                                        <img class="icon" src="/assets/images/icons/arrow-right-preto.svg"
                                            alt="Abrir" title="abrir" width="10px" height="10px">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-items col-md-8">
                        @foreach ($categories_para_empresa as $item)
                            <div id="{{ $item->slug }}-{{ $item->id }}-items"
                                class="menu-item menu-item{{ $loop->iteration }} {{ $loop->iteration == 1 ? 'active' : '' }} {{ isset($item->comunicado->name) ? 'half' : 'full' }}">
                                <ul class="submenu-items">
                                    @foreach ($item->products as $product_item)
                                        <li class="submenu-item">
                                            <a class="link" href="/seguro/{{ $product_item->slug }}"
                                                title="Ir para {{ $product_item->name }}">
                                                {{ $product_item->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @if (isset($item->comunicado) &&
                                        isset($item->comunicado->name) &&
                                        isset($item->comunicado->description) &&
                                        $item->comunicado->mostrar == 1)
                                    <div class="wrapper-comunicado">
                                        <div class="comunicado cinza"
                                            aria-label="Ir para Cotação do {{ $item->comunicado->name }}">

                                            @if ($item->icon_path != 'Nada enviado')
                                                <img class="icone"
                                                    style="{{ $item->icon_path == 'Nada enviado' ? 'display: none;' : '' }}"
                                                    src="{{ $item->icon_path }}" alt="{{ $item->comunicado->name }}"
                                                    title="{{ $item->comunicado->name }}">
                                            @endif

                                            <p class="title">{{ $item->comunicado->name }}</p>
                                            <p class="text">{{ $item->comunicado->description }}</p>

                                            <a class="btn" target="_self" title="Cote Agora" alt="Cote Agora"
                                                href="https://wa.me/556434130555?text=Olá,%20gostaria%20de%20fazer%20uma%20cotação%20do%20{{ $item->comunicado->name }}.">
                                                Cote Agora
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="menuItems" id="menuItems-consorcios-2" data-child-of="consorcios-2">
                <div class="row">
                    <div class="side col-md-4">
                        <ul aria-orientation="vertical" aria-controls="menu" role="listbox">
                            @foreach ($categories_consorcios as $item)
                                <li role="group">
                                    <a class="link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                        href="{{ $item->link }}" target="" alt="{{ $item->name }}"
                                        title="Ir para {{ $item->name }}"
                                        data-target="{{ $item->slug }}-{{ $item->id }}-items">
                                        <span>{{ $item->name }}</span>
                                        <img class="icon" src="/assets/images/icons/arrow-right-preto.svg"
                                            alt="Abrir" title="abrir" width="10px" height="10px">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-items col-md-8">
                        @foreach ($categories_consorcios as $item)
                            <div id="{{ $item->slug }}-{{ $item->id }}-items"
                                class="menu-item menu-item{{ $loop->iteration }} {{ $loop->iteration == 1 ? 'active' : '' }} {{ isset($item->comunicado->name) ? 'half' : 'full' }}">
                                <ul class="submenu-items">
                                    @foreach ($item->products as $product_item)
                                        <li class="submenu-item">
                                            <a class="link" href="/seguro/{{ $product_item->slug }}"
                                                title="Ir para {{ $product_item->name }}">
                                                {{ $product_item->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @if (isset($item->comunicado) &&
                                        isset($item->comunicado->name) &&
                                        isset($item->comunicado->description) &&
                                        $item->comunicado->mostrar == 1)
                                    <div class="wrapper-comunicado">
                                        <div class="comunicado cinza"
                                            aria-label="Ir para Cotação do {{ $item->comunicado->name }}">

                                            @if ($item->icon_path != 'Nada enviado')
                                                <img class="icone"
                                                    style="{{ $item->icon_path == 'Nada enviado' ? 'display: none;' : '' }}"
                                                    src="{{ $item->icon_path }}" alt="{{ $item->comunicado->name }}"
                                                    title="{{ $item->comunicado->name }}">
                                            @endif

                                            <p class="title">{{ $item->comunicado->name }}</p>
                                            <p class="text">{{ $item->comunicado->description }}</p>

                                            <a class="btn" target="_self" title="Cote Agora" alt="Cote Agora"
                                                href="https://wa.me/556434130555?text=Olá,%20gostaria%20de%20fazer%20uma%20cotação%20do%20{{ $item->comunicado->name }}.">
                                                Cote Agora
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </nav>


    @yield('content')
    <section class="window-chat gradiente" id="myObject">
        <div>
            <a href="javascript:void(3);" title="ir para fechar" alt="fechar"><img class="img-lazy-loading fechar"
                    width="36px" height="36px" src="/assets/images/icons/icon-close.png"
                    alt="Cerrado Consórcios e Seguros." title="fechar"></a>
        </div>

        <div class="conteudo">
            <div class="padding-head">
                <div class="marina-dialogo">
                    <div class="marina-foto">
                        <img id="marinaFoto2" class="img-lazy-loading" src="/assets/images/icons/marina-foto.png"
                            alt="Resolva Aqui: Acesso rápido aos principais serviços e assistências para facilitar o seu dia-dia."
                            title="Marina chat">
                    </div>
                    <div class="marina-texto">
                        <p>Olá! Selecione a forma que vamos
                            conversar:</p>
                    </div>
                </div>
            </div>

            <div class="conteudo-box">
                <div class="item-chat shadow-sm">
                    <a href="https://wa.me/556434130555" target="_blank" alt="Whatsapp"
                        title="it para Whatsapp +55 11 99578-6546" rel="noopener noreferrer">
                        <img class="img-lazy-loading" width="25px" height="25px"
                            src="/assets/images/icons/whatsapp.png" title="Resolva Aqui" height="40"
                            width="10">
                        <br>
                        <p class="text-muted">WhatsApp</p>
                    </a>
                </div>

                <div class="item-chat shadow-sm">
                    <a href="https://www.instagram.com/cerradoconsorcio/" target="_blank" class="chat-online">
                        <img class="img-lazy-loading" width="25px" height="25px"
                            src="/assets/images/icons/instagramdirect.png"
                            alt="Resolva Aqui: Acesso rápido aos principais serviços e assistências para facilitar o seu dia-dia."
                            title="chat online" height="30" width="30">
                        <br>
                        <p class="text-muted">Instagram</p>
                    </a>
                </div>

                <div class="item-chat shadow-sm">
                    <a href="https://www.facebook.com/profile.php?id=100077922125536" target="_blank"
                        id="btn-menu-messenger" alt="Messenger" title="ir para Messenger" rel="noopener noreferrer">
                        <img class="img-lazy-loading" width="25px" height="25px"
                            src="/assets/images/icons/facebookmessenger.png"
                            alt="Resolva Aqui: Acesso rápido aos principais serviços e assistências para facilitar o seu dia-dia."
                            title="chat online" height="40" width="10">
                        <br>
                        <p class="text-muted">Facebook <br>Messenger</p>
                    </a>
                </div>
            </div>
        </div>
        <iframe class="chat-marina-iframe" name="iframe1" width="100%" height="770px"></iframe>
    </section>

    <a href="javascript:void(11);" id="chat-online-footer-btn"
        class="chama-chat float-marina customize-unpreviewable">
        <img id="marinaFoto" src="/assets/images/icons/marina-foto.png" alt="Chat Marina" title="Chat Marina">
    </a>

    <div class="chat-button-float" onclick="toggleGenesys()">
        <img class="img-lazy-loading" src="/assets/images/icons/chatoline.png" alt="Chat iniciado"
            title="Chat iniciado" />
    </div>

    <footer class="footer" role="contentinfo">
        <section class="sub-menu-footer">
            <div class="container">

            </div>
        </section>
        <aside class="widget-area" role="complementary">
            <div class="container">
                <div class="row resumo-menu">
                    <div class="col-md-4">
                        <img loading="lazy" class="hidden-mobile" style="margin-left:10px;"
                            src="/assets/images/logo/logo-light.png" style="" alt="" width="270">
                    </div>
                    <div class="col-md-8">
                        <div class="row">



                            <div class="col-md-3 col-xs-6 mt-4">
                                <a target="_blank" href="https://linktr.ee/cerradoconsorcio" role="link">Canais
                                    Digitais</a>
                                <br><br>
                                <a target="_blank" href="https://wa.me/556434130555" role="link">Fale Conosco /
                                    SAC</a>
                            </div>

                            <div class="col-md-3 col-xs-6 mt-4">
                                <a href="/seguros" role="link">Nossos seguros para você</a>
                                <br><br>
                                <a href="/seguros-empresas" role="link">Nossos seguros para a sua empresa</a>
                                <br><br>
                                <a href="/consorcios" role="link">Consórcios</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 siga-nos">
                    </div>
                </div>
                <div class="row mb-0 pb-0">
                    <div class="ver-mais-open-menu">
                        <div id="ver-mais" data-toggle="collapse" data-target="#demo" class="collapsed"
                            aria-expanded="false">

                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </aside>
        <aside class="widget-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 siga-nos">
                        <p class="title">Siga-nos:</p>
                        <a href="https://www.instagram.com/cerradoconsorcio/" role="button"
                            aria-expandedaria-label="Siga-nos Facebook"
                            alt="Siga Cerrado Seguros e Consórcios no Facebook" target="_blank">
                            <img loading="lazy" style="width: 45px;" src="/assets/images/icons/facebook-white.svg"
                                alt="Facebook" height="45" width="45">
                            <span alt="Facebook" style="visibility: hidden; display: none;">Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/cerradoconsorcio/" role="button"
                            aria-expandedaria-label="Siga-nos Instagram"
                            alt="Siga Cerrado Seguros e Consórcios no Instagram" target="_blank">
                            <img loading="lazy" style="width: 45px;" src="/assets/images/icons/insta-white.svg"
                                alt="Instagram" height="45" width="45">
                            <span alt="Instagram" style="visibility: hidden; display: none;">Instagram</span>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 cnpj ">
                        <p> © Cerrado Consórcios e Seguros 2025 - Todos os direitos reservados.</p>
                        <p> CNPJ 33.164.021/0001-00</p>
                        <p> Desenvolvido por <a href="https://agenciaevidence.com.br">Agência Evidence</a></p>
                    </div>
                </div>
            </div>
        </aside>
        <aside class="details-footer">

        </aside>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="module" src="/assets/js/aviso.js" id="aviso-js-module"></script>
    <script type="text/javascript" src="/assets/js/global.bundle.js" id="global_bundle-js"></script>
    <script type="text/javascript" src="/assets/js/footer.min.js" id="footer-js"></script>
    <script type="text/javascript" src="/assets/js/select2.min.js?ver=4.1.0" id="select2-js"></script>
    <script type="text/javascript" src="/assets/js/wow.min.js" id="wow-js"></script>
    <script type="text/javascript" src="/assets/js/home.min.js" id="home-js"></script>
    <script type="module" src="/assets/js/home-module.min.js" id="home_module-js"></script>
    <script type="text/javascript" src="/assets/js/slick.min.js" id="slick-js"></script>
    <script type="text/javascript" src="/assets/js/wp-polyfill.min.js" id="wp-polyfill-js"></script>

    <script type="text/javascript" src="/assets/js/main.js" id="tm-lgpd-main-js"></script>
    <script type="text/javascript" src="/assets/js/cookieFunctions.js" id="tm-lgpd-cookie-functions-js"></script>

    @yield('js')
</body>

</html>
