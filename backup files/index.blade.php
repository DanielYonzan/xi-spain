<?php
$lang = \Illuminate\Support\Facades\Session::get('language');
$data = [
    'en'=>[
        'menuitems' => ['HOME','PRODUCTS','PARTNER WITH US','MEET US','CONTACT'],
        'service'=>[
            'title'=>'WHAT WE DO',
            'subtitle'=>'Know more about our activities'
        ],
        'product'=>[
            'title'=>'OUR PRODUCTS:',
            'subtitle'=>'Quality foods and drinks from selected producers.'
        ],
        'catalogInfo'=>'Please <a href="#contact" class="page-scroll">get in touch with us</a> to request our product catalogues and price lists.',
        'partners'=>[
            'title'=>'OUR PARTNERS',
            'subtitle'=>'Our major country links',
        ],
        'beAgent'=>[
            'title'=>'BECOME OUR PARTNER OR AGENT<br>AT YOUR COUNTRY',
            'subtitle'=>'We are constantly looking for committed companies or agents who wish to closely cooperate with us with the objective of building mutually beneficial business relationships based in import-export and local marketing activities.<br>We are keen to know about you or your company by filling in the following form:'
        ],
        'events'=>[
            'title'=>'MEET US IN THE FOLLOWING EVENTS',
            'subtitle'=>'Xi-Spain participates in some of the most important international food and beverages exhibitions and travels to different countries to held business meetings.<br><a href="#contact" class="page-scroll">Do not hesitate to get touch with us</a> to arrange a business meeting in any of the places indicated below:'
        ],
        'address'=>'XI-SPAIN LTD | PHONE: +44 (0) 7594529345 | WEB: WWW.XI-SPAIN.COM | EMAIL: INFO@XI-SPAIN.COM |<br>ADDRESS: 68 WINDSOR DR. ORPINGTON BR66HD, GREATER LONDON (UK) | C/ NUEVA 2, 23001 JAÉN (SPAIN)',
        'info_register'=>'',
    ],
    'sp'=>[
        'menuitems' => ['HOME','PRODUCTOS','PARTNERS','PRÓXIMOS EVENTOS','CONTACTO'],
        'service'=>[
            'title'=>'CONÓZCANOS',
            'subtitle'=>'Promoviendo las ventas internaciones'
        ],
        'product'=>[
            'title'=>'NUESTROS PRODUCTOS:',
            'subtitle'=>'Alimentos y bebidas de calidad de productores españoles seleccionados'
        ],
        'catalogInfo'=>'Por favor, <a href="#contact" class="page-scroll">póngase en contacto con nosotros</a> para solicitar nuestros catálogos de productos y listas de precios.',
        'partners'=>[
            'title'=>'NUESTROS PARTNERS',
            'subtitle'=>'Nuestros principales vínculos con los países',
        ],
        'beAgent'=>[
            'title'=>'SEA NUESTRO SOCIO O AGENTE<br>EN SU PAÍS',
            'subtitle'=>'Estamos constantemente buscando empresas o personas que deseen ser nuestros socios locales o agentes representativos en todo el mundo.<br>Estamos interesados en saber sobre usted o su empresa. Para ello puede hacer uso del siguiente formulario:'
        ],
        'events'=>[
            'title'=>'EVENTOS',
            'subtitle'=>'Xi-Spain participa en las más importantes ferias internacionales de alimentos y bebidas. En muchos casos organizamos "exhibiciones multiproducto" que permiten la participación de pequeños y medianos productores a un coste mínimo.<br>Si desea exhibir sus productos en alguno de nuestros eventos no dude en <a href="#contact" class="page-scroll">ponerse en contacto con nosotros</a> para obtener más información.'
        ],
        'address'=>'XI-SPAIN LTD | +44(0)7594529345 | WWW.XI-SPAIN.COM | INFO@XI-SPAIN.COM<br>VAT NR. 253975373 | 68 WINDSOR DR., ORPINGTON BR66HD, LONDRES (REINO UNIDO)',
        'info_register'=>'Registre su interés en que Xi-Spain represente a su empresa o productos en otros eventos o mercados internacionales a través de nuestro <a href="#contact"  class="page-scroll">formulario de contacto</a>',
    ]
];
function getData($obj,$key){
    $lang = \Illuminate\Support\Facades\Session::get('language');
    $key = $key.'_'.$lang;
    return $obj->$key;
}
?>
<!DOCTYPE html>
<html lang="{{$lang}}">
<head>
    <title>Xi-Spain Agencia Import Export</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Xi-Spain is a leading Food & Drinks import export agency">
    <meta name="keywords" content="Xi-Spain, import export agency business">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/bootstrapv3.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{asset('css/agency.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via  -->

    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!--favicon-->
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png" sizes="16x16">
</head>

@if (session('message'))
<style>
    .alert{margin:0; text-align: center}
    .navbar{top:100px}
</style>
<div class="alert alert-{{session('alert-class')}}" role="alert">
    {!! session('message') !!}
</div>
@endif

<body id="page-top">
<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container"><!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top"> <img src="{{asset('img/logo.png')}}" class="img-responsive" alt="{{config('app.name')}}"> </a> </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden"> <a href="#page-top"></a> </li>
                <li><a class="page-scroll" href="#services">{{$data[$lang]['menuitems'][0]}}</a></li>
                <li><a class="page-scroll" href="#portfolio">{{$data[$lang]['menuitems'][1]}}</a></li>
                <li><a class="page-scroll" href="#map">{{$data[$lang]['menuitems'][2]}}</a></li>
                <li><a class="page-scroll" href="#event">{{$data[$lang]['menuitems'][3]}}</a></li>
                <li><a class="page-scroll" href="#contact">{{$data[$lang]['menuitems'][4]}}</a> </li>
                <li class="dropdown language"> <button class="dropdown-toggle active {{$lang}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button></button>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('changeLanguage','en')}}" class="en">English</a></li>
                        <li><a href="{{route('changeLanguage','sp')}}" class="sp">Spanish</a></li>
                    </ul>
                </li>
                </li>
                <!--/language-->
            </ul>
        </div>

        <!-- /.navbar-collapse --></div>

    <!-- /.container-fluid -->

</nav>

<!-- Header -->
@php($hometitle = ['en'=>['intro1'=>'','intro2'=>'Wines & Foods<br>Import Export Trading'],'sp'=>['intro1'=>'','intro2'=>'Wines & Foods<br>Import Export Trading']])
<header>
    <div class="container">
        <div class="intro-text">
            <br>
            <div class="intro-heading">{!! $hometitle[$lang]['intro1'] !!}</div>
            <div class="intro-lead-in">{!! $hometitle[$lang]['intro2'] !!}</div>
            <br>
            <br>
            <br>
            <br>
            <a href="#services" class="page-scroll btn btn-xl">@if($lang=='sp')Dime más @else Tell me more @endif</a></div>
    </div>
</header>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{!! $data[$lang]['service']['title'] !!}</h2>
                <h3 class="section-subheading text-muted">{!! $data[$lang]['service']['subtitle'] !!}</h3>
            </div>
        </div>
        <div class="row text-center">
            <?php
            $i=1;
            foreach($features as $feature){ ?>
                <div class="col-md-4">
                        <img src="{{asset('img/feature/'.$feature->image)}}" class="img-responsive" alt="{{getData($feature,'name')}}">
                        <h4 class="service-heading">{{getData($feature,'name')}}</h4>
                        <p class="text-muted">{!! getData($feature,'short_description') !!}</p>
                </div>
            <?php if ($i++%3==0){?>
                <div class="clearfix"></div>
            <?php }} ?>
        </div>
    </div>
</section>

<!-- Portfolio Grid Section -->

<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{!! $data[$lang]['product']['title'] !!}</h2>
                <h3 class="section-subheading text-muted">{!! $data[$lang]['service']['subtitle'] !!}</h3>
            </div>
        </div>
        <div class="row">
            @foreach($categorys as $category)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal" data-category="{{$category->id}}">
                        <div class="portfolio-hover">
                          <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                        </div>
                        <img src="{{asset('img/category/'.$category->image)}}" class="img-responsive" alt="{{getData($category,'name')}}">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{getData($category,'name')}}</h4>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="text-center">{!! $data[$lang]['catalogInfo'] !!}</div>
        <div> </div>
    </div>
</section>

<!--Map Section-->

<section id="map" class="map text-center">
    <h2 class="section-heading">{!! $data[$lang]['partners']['title'] !!}</h2>
    <h3 class="section-subheading text-muted">{!! $data[$lang]['partners']['subtitle'] !!}</h3>
    <figure> <img src="img/world-map.png" class="img-responsive" height="650" width="1366" alt="world-map">
        <ul class="list-unstyled">
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Germany</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">United Kingdom</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Switzerland</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">China</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Hong Kong</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Japan</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">India</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Colombia</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Peru</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Mexico</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">United States</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Singapur</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Korea</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Panama</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Nigeria</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Argeria</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Angola</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">Qatar</a></li>
            <li><a href="#mapModal" data-toggle="modal" class="btn btn-xl">United Arab Emirates</a></li>
        </ul>
    </figure>
</section>

<!--Join Us Section-->

<section id="join-us" class="bg-light-gray">
    <div class="container">
        <h2 class="section-heading text-center">{!! $data[$lang]['beAgent']['title'] !!}</h2>
        <p class="text-center">{!! $data[$lang]['beAgent']['subtitle'] !!}</p>
        <div class="col-sm-6 col-sm-offset-3">
            <form method="post" action="{{route('contact_me')}}" name="partnerinfo" id="partnerinfo" class="validate" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="join_us_form" value="1">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    @if($errors->has('name')) <div class="error">{{$errors->first('name')}}</div> @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="companyname" id="companyname" placeholder="Company Name *" required data-validation-required-message="Please enter your Company name.">
                    @if($errors->has('companyname')) <div class="error">{{$errors->first('companyname')}}</div> @endif
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email *" required data-validation-required-message="Please enter your Email address.">
                    @if($errors->has('email')) <div class="error">{{$errors->first('email')}}</div> @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone *" required data-validation-required-message="Please enter your Phone no.">
                    @if($errors->has('phone')) <div class="error">{{$errors->first('phone')}}</div> @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address *" required data-validation-required-message="Please enter your Address.">
                    @if($errors->has('address')) <div class="error">{{$errors->first('address')}}</div> @endif
                </div>
                <div class="form-group">
                    <select name="country" id="country" class="form-control" data-validation-required-message="Please enter your Country." required>
                        <option value="">-- Select Country --</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                    @if($errors->has('country')) <div class="error">{{$errors->first('country')}}</div> @endif
                </div>
                <div class="form-group" >
                    <label>Attach CV/ Company Profile</label>
                    <input type="file" name="cv" id="cv">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Your Comment" rows="7" required></textarea>
                    @if($errors->has('message')) <div class="error">{{$errors->first('message')}}</div> @endif
                </div>
                <div class="form-group">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-xl">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!--Event Section-->

<section id="event" class="text-center">
    <div class="container">
        <h2 class="section-heading">{!! $data[$lang]['events']['title'] !!}</h2>
        <p>{!! $data[$lang]['events']['subtitle'] !!}</p>
        <br>
        @foreach($events as $event)
            <div class="row event-panel">
                <div class="col-md-4 img-container">
                    <div class="event-img">
                        <img src="{{asset('img/event/'.$event->image)}}" class="img-responsive" width="360" height="200" alt="{{$event->name}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>{{$event->name}}</h4>
                    <p>{{getData($event,'short_description')}}</p>
                    <div class="eventdate">{{$event->date}}</div>
                    @if($lang == 'sp')
                        <h3 class="price">€{{$event->price}}</h3>
                        <a href="{{route('event.checkout',$event->id)}}" class="btn btn-xl btn-pay">Pay to Participate</a>
                    @endif
                </div>
            </div>
        @endforeach
        @if($data[$lang]['info_register'])
            <br>
            <br>
            <br>
            <br>
            <div>{!! $data[$lang]['info_register'] !!}</div>
        @endif
    </div>
</section>

<!-- Clients Aside -->

<aside class="company-intro bg-light-gray">
    <div class="container">
        <h4>{!! $data[$lang]['address'] !!}</h4>
    </div>
</aside>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">@if($lang=='sp')CONTÁCTENOS @else CONTACT US @endif</h2>
                <h3 class="section-subheading text-muted invisible"></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('contact_me')}}" name="sentMessage" id="contactForm" class="validate">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *" id="name2" name="c_name" required data-validation-required-message="Please enter your name.">
                                @if($errors->has('c_name')) <div class="error">{{$errors->first('c_name')}}</div> @endif
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email2" name="c_email" required data-validation-required-message="Please enter your email address.">
                                @if($errors->has('c_email')) <div class="error">{{$errors->first('c_email')}}</div> @endif
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone2" name="c_phone" required data-validation-required-message="Please enter your phone number.">
                                @if($errors->has('c_phone')) <div class="error">{{$errors->first('c_phone')}}</div> @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message2" name="c_message" required data-validation-required-message="Please enter a message."></textarea>
                                @if($errors->has('c_message')) <div class="error">{{$errors->first('c_message')}}</div> @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">@if($lang=='sp')Enviar mensaje @else Send Message @endif</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4"> <span class="copyright">Copyright ® Xi-Spain Ltd 2014</span> </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="https://twitter.com/XiSpain" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
                    <li><a href="https://www.linkedin.com/in/juan-fernandez-b89544135?trk=hp-identity-name" target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#privacy-policy" data-toggle="modal">Privacy Policy</a></li>
                    <li><a href="#termsofuse" data-toggle="modal">Terms of Use</a> </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->

<!-- Portfolio Terms -->
<div class="portfolio-modal modal fade" id="termsofuse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"> </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-body">
                        <h3>TERMS AND CONDITIONS</h3>

                        <!-- Project Details Go Here -->

                        <p>1.1 This legal notice (hereinafter, the “Terms”) applies to the entire contents of the website under the domain name <a href="www.xi-spain.com" target="_blank">www.xi-spain.com</a> (the “Website”) and to any correspondence between you and the Company (as defined below). Please read these Terms carefully before using the Website. Using the Website indicates that you accept these Terms regardless of whether or not you choose to register your information with us. If you do not accept these Terms, do not use the Website.</p>
                        <p>1.2 You may access the Website (excluding websites to which links are provided on the Website and which may be subject to their own terms of use) without registering your details with us. The Company may revise this legal notice at its sole and absolute discretion and without prior notice from time to time, by updating these Terms. You should therefore check the Website from time to time to review these Terms, because, by accessing and continuing to use the Website, you will be deemed to have accepted that you are bound by the Terms appearing on the Website at the time of your access. Certain of these Terms may, however, be superseded by expressly designated legal notices or terms located on particular pages within the Website.</p>
                        <p>1.3 This legal notice is issued by, and the Website is provided by, XI GLOBAL TRADE BROKERING, S.L. (the “Company”), a company incorporated in Spain under Tax ID number B86630100 and whose registered office is based in Madrid (Spain), calle Vicente Blasco Ibañez, 13, and registered at the Madrid Commercial Registry, at Book number 30.616, Page number 130, and Sheet number 551050. All references to “us” and “our” are references to the Company. You may contact the Company through the CONTACT US page.</p>
                        <p>2.1 You are permitted to print and download extracts from the Website for your own use on the following basis: (a) no documents or related graphics on the Website are modified in any way; (b) no graphics on the Website are used separately from the corresponding text; and (c) the Company’s copyright and trade mark notices and this permission notice appear in all copies.</p>
                        <p>2.2 Unless otherwise stated, the copyright, trademarks, database rights and other intellectual property rights in all content and material on the Website (including without limitation photographs and graphical images) are proprietary rights owned by the Company or its licensors. For the purposes of these Terms, any use of extracts from the Website other than in accordance with clause 2.1 for any purpose is prohibited. If you breach any of these Terms, your permission to use the Website automatically terminates and you must immediately destroy any downloaded or printed extracts from the Website.</p>
                        <p>2.3 Subject to clause 2.1, no part of the Website may be reproduced or stored in any other website or included in any public or private electronic retrieval system or service without the Company’s prior written permission.</p>
                        <p>2.4 Any rights not expressly granted in these terms are reserved.</p>
                        <p>2.5 The Website may not be used in connection with any other commercial purpose except those that are specifically endorsed or approved by the Company. Appropriate legal action may be taken by the Company for any illegal or unauthorized use of the Website.</p>
                        <p>In accordance to Organic Law 15/1999, of December 13th, on Personal Data Protection, and in its developing regulation (Royal Decree 1720/2007), the Company hereby informs that your personal data that we may collect (hereinafter, the “Data”) will be part of a personal data file owned and controlled by the Company, whose registered office is based in Madrid (Spain), calle Vicente Blasco Ibañez, 13.<br>
                            The Data will be processed by the Company with the only purpose of attending your request of information. We also inform you that the Data may be used to maintain you informed of news and/or events related to the Company and/or its sector.</p>
                        <p>You may exercise your right to access, modify, cancel or oppose to the Data processing, subject to the terms and conditions set forth in the applicable regulation, by requestin the Company in writing to the corporate address mentioned above, or by sending an e-mail to the following address: <a href="mailto:info@xi-spain.com" target="_blank">info@xi-spain.com</a></p>
                        <p>4.1 Other than personally identifiable information, which is covered under our Privacy clause (see Clause nº 3), any material you may transmit or post to the Website shall be considered non-confidential and non-proprietary. The Company shall have no obligations with respect to such material. The Company and its designees shall be free to copy, disclose, distribute, incorporate and otherwise use such material and all data, images, sounds, text and other things embodied therein for any and all commercial or non-commercial purposes.</p>
                        <p>4.2 You are prohibited from posting or transmitting to or from the Website any material : (a) that is threatening, defamatory, obscene, indecent, seditious, offensive, pornographic, abusive, liable to incite racial hatred, discriminatory, menacing, scandalous, inflammatory, blasphemous, in breach of confidence, in breach of privacy or which may cause annoyance or inconvenience; or (b) for which you have not obtained all necessary licences and/or approvals; or (c) which constitutes or encourages conduct that would be considered a criminal offence, give rise to civil liability, or otherwise be contrary to the law of or infringe the rights of any third party, in any country in the world; or (d) which is technically harmful (including, without limitation, computer viruses, logic bombs, Trojan horses, worms, harmful components, corrupted data or other malicious software or harmful data).</p>
                        <p>4.3 You may not misuse the Website (including, without limitation, by hacking).</p>
                        <p>4.4 The Company shall fully co-operate with any law enforcement authorities or court order requesting or directing the Company to disclose the identity or locate anyone posting any material in breach of clause 4.2 or clause 4.3.</p>
                        <p>5.1 Links to third party websites may be provided on the Website solely for your convenience. If you use these links, you leave the Website (linked sites will generally open a new window, the Website remaining open). The Company has not reviewed all of these third party websites and does not control and is not responsible for these websites or their content or availability. The Company therefore does not endorse or make any representations about them, or any material found there, or any results that may be obtained from using them. If you decide to access any of the third party websites linked to the Website, you do so entirely at your own risk.</p>
                        <p>6.1 The Company does not guarantee, represent or warrant that your use of the Website will be uninterrupted or error-free. While the Company endeavours to ensure that the Website is normally available 24 hours a day, the Company shall not be liable if for any reason the Website is unavailable at any time or for any period. Access to the Website may be suspended temporarily and without notice in the case of system failure, maintenance or repair or for reasons beyond the Company’s control.</p>
                        <p>6.2 You expressly agree that your use of, or inability to use, the Website is at your sole risk. The material on the Website is provided “as is”, without any conditions, warranties or other terms of any kind. Accordingly, to the maximum extent permitted by law, the Company provides you with the Website on the basis that the Company excludes all representations, conditions and other terms and expressly disclaims any warranty of any kind, either express or implied, including all implied warranties of satisfactory quality, fitness for a particular purpose, suitability, reliability, timeliness, accuracy, completeness, security, title and non-infringement which, but for this legal notice, might have effect in relation to the Website.</p>
                        <p>6.3 In no case shall the Company, any other party (whether or not involved in creating, producing, maintaining or delivering the Website), its directors, officers, employees, affiliates, agents, contractors or licensors be liable to you or any third party for any direct, indirect, incidental, punitive, special or consequential loss or damages including without limitation any loss of use, profits or data arising from your use of the Website or for any other claim related in any way to your use of the Website including but not limited to any errors or omissions in any content or any loss or damage of any kind incurred as a result of the use of, or inability to use, any content posted, transmitted or otherwise made available via the Website or from the conduct of any users of the Website, whether online or offline, the deletion of your data , information or content stored on the Website, even if advised of their possibility whether such losses or damages arise in contract, negligence, tort or otherwise.</p>
                        <p>6.4 The Company does not represent or guarantee that the Website will be free from loss, corruption, attack, viruses, interference, hacking or other security intrusion, and the Company disclaims any liability relating thereto. You shall be responsible for backing up your own system and if your use of material on the Website results in the need for servicing, repair or correction of equipment, software or data, you assume all costs thereof.</p>
                        <p>6.5 While the Company endeavours to ensure that the information on the Website is correct, the Company does not warrant the accuracy and completeness of the material on the Website. The Company may make changes to the material on the Website, or to the products and any prices described in it, at any time without notice. The material on the Website may be out of date, and the Company makes no commitment to update such material.</p>
                        <p>6.6 If you are dissatisfied with any part of the Website or with this agreement, your sole and exclusive remedy is to discontinue using the Website.</p>
                        <p>By using the Website, you agree to indemnify and hold the Company, its directors, officers, employees, affiliates, agents, contractors, and licensors harmless with respect to any claims arising out of your breach of these Terms, your use of the Website, any action taken by the Company as part of its investigation of a suspected breach of this agreement or as a result of its finding or decision that a breach of these Terms has occurred.</p>
                        <p>The Website uses cookies.  By using the Website and agreeing to this Terms, you consent to Company’s use of cookies in accordance with the terms of this policy.<br>
                            Cookies are files sent by web servers to web browsers, and stored by the web browsers.<br>
                            The information is then sent back to the server each time the browser requests a page from the server.  This enables a web server to identify and track web browsers.<br>
                            There are two main kinds of cookies: session cookies and persistent cookies.  Session cookies are deleted from your computer when you close your browser, whereas persistent cookies remain stored on your computer until deleted, or until they reach their expiry date.</p>
                        <p><strong>Cookies on our website</strong></p>
                        <p>The Website uses Google Analytics to analyse the use of this website. Google Analytics generates statistical and other information about Website use by means of cookies, which are stored on users’ computers.  The information generated relating to our Website is used to create reports about the use of the Website. Google will store and use this information.  Google’s privacy policy is available at:http://www.google.com/privacypolicy.html.</p>
                        <p><strong>Refusing cookies</strong></p>
                        <p>Most browsers allow you to refuse to accept cookies.</p>
                        <ul>
                            <li>In Internet Explorer, you can refuse all cookies by clicking “Tools”, “Internet Options”, “Privacy”, and selecting “Block all cookies” using the sliding selector.</li>
                            <li>In Firefox, you can adjust your cookies settings by clicking “Tools”, “Options” and “Privacy”.</li>
                        </ul>
                        <p>Blocking cookies will have a negative impact upon the usability of some websites.</p>
                        <p>These Terms are between you and the Company and are governed by the laws of Spain. Disputes arising in connection with this legal notice shall be subject to the exclusive jurisdiction of the courts based in the city of Madrid (Spain).</p>
                        <p>The Company may delay enforcing its rights under these Terms without losing them.</p>
                        <p>You agree that the Company may sub-contract the performance of any of its obligations or may assign this agreement or any of its rights or obligations without giving you notice. The Company will not be liable to you for any breach of these Terms which arises because of any circumstances that the Company cannot reasonably be expected to control.</p>
                        <p>These Terms form the entire understanding between you and the Company concerning your use of the Website and supersede all previous agreements relating to the Website. If any part of these Terms is determined to be legally invalid or unenforceable, then the invalid or unenforceable provision will be deemed superseded by a valid, enforceable provision that most closely matches the intent of the original provision and the remainder of these Terms shall continue in effect.</p>
                        <br>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Privacy Policy -->
<div class="portfolio-modal modal fade" id="privacy-policy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"> </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-body">
                        <h3>Privacy Policy</h3>

                        <!-- Project Details Go Here -->

                        <p>This privacy policy has been compiled to better serve those who are concerned with how their 'Personally identifiable information' (PII) is being used online. PII, as used in US privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.</p>
                        <p><strong>What personal information do we collect from the people that visit our blog, website or app?</strong></p>
                        <p>When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, phone number, Company name or other details to help you with your experience.</p>
                        <p><strong>When do we collect information?</strong></p>
                        <p>We collect information from you when you fill out a form or enter information on our site.</p>
                        <p><strong>How do we use your information?</strong></p>
                        <p>We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:</p>
                        <ul>
                            <li>To administer a contest, promotion, survey or other site feature.</li>
                            <li>To send periodic emails regarding your order or other products and services.</li>
                        </ul>
                        <p><strong>How do we protect visitor information?</strong></p>
                        <p>We do not use vulnerability scanning and/or scanning to PCI standards.<br>
                            We do not use Malware Scanning.<br>
                            We do not use an SSL certificate<br>
                            • We do not need an SSL because:<br>
                            We never ask for private information like credit card numbers.</p>
                        <p><strong>Do we use 'cookies'?</strong></p>
                        <p>We do not use cookies for tracking purposes</p>
                        <p>You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser's Help menu to learn the correct way to modify your cookies.</p>
                        <p>If you disable cookies off, some features will be disabled that make your site experience more efficient and some of our services will not function properly.</p>
                        <p>However, you can still place orders .</p>
                        <p><strong>Third Party Disclosure</strong></p>
                        <p>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information unless we provide you with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others' rights, property, or safety. </p>
                        <p>However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>
                        <p><strong>Third party links</strong></p>
                        <p>Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.</p>
                        <p><strong>Google</strong></p>
                        <p>Google's advertising requirements can be summed up by Google's Advertising Principles. They are put in place to provide a positive experience for users. <a href="https://support.google.com/adwordspolicy/answer/1316548?hl=en ">https://support.google.com/adwordspolicy/answer/1316548?hl=en</a> </p>
                        <p>We have not enabled Google AdSense on our site but we may do so in the future.</p>
                        <p><strong>COPPA (Children Online Privacy Protection Act)</strong></p>
                        <p>When it comes to the collection of personal information from children under 13, the Children's Online Privacy Protection Act (COPPA) puts parents in control. The Federal Trade Commission, the nation's consumer protection agency, enforces the COPPA Rule, which spells out what operators of websites and online services must do to protect children's privacy and safety online.</p>
                        <p>We do not specifically market to children under 13.</p>
                        <p><strong>CAN SPAM Act</strong></p>
                        <p>The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have emails stopped from being sent to them, and spells out tough penalties for violations.</p>
                        <p><strong>We collect your email address in order to:</strong></p>
                        <p><strong>To be in accordance with CANSPAM we agree to the following:</strong></p>
                        <p><strong>If at any time you would like to unsubscribe from receiving future emails, you can email us at</strong><br>
                            and we will promptly remove you from <strong>ALL</strong> correspondence.</p>
                        <p><strong>Contacting Us</strong></p>
                        <p>If there are any questions regarding this privacy policy you may contact us using the information below.</p>
                        <p><a href="http://www.xi-spain.com" target="_blank">www.xi-spain.com</a><br>
                            68 Windsor Drive<br>
                            Orpington, BR66HD<br>
                            United Kingdom<br>
                            <a href="mailto:info@xi-spain.com" target="_blank">info@xi-spain.com</a></p>
                        <p>Last Edited on 2015-09-23</p>
                        <br>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"> </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-body">
                        <h3></h3>
                        <br>
                        <div class="modal-body-inner content-aligned-left">
                        </div>
                        <br>
                        <p class="text-center back-button hide">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"> </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-body">
                        <h3></h3>
                        <br>
                        <div class="modal-body-inner content-aligned-left">
                        </div>
                        <br>
                        <p class="text-center back-button hide">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->

<script src="{{asset('js/bootstrapv3.min.js')}}"></script>

<!-- Plugin JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/cbpAnimatedHeader.js')}}"></script>


<!-- DataTables with exporting -->
<script src="{{asset('dataTable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dataTable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dataTable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dataTable/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('dataTable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('dataTable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('dataTable/js/buttons.html5.min.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.validate').each(function() {
            $(this).validate({
                errorElement: "div"
            });
        });
    });

    setTimeout(function() {
        $('.alert').fadeOut('fast');
        $('.navbar').css('top',0);
    }, 5000);

    function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, 400, img.height * (400/img.width));
        return canvas.toDataURL("image/png");
    }

    var myGlyph = new Image();

    $(function() {
        var category = country = button = null;

        $('#portfolioModal1').on('show.bs.modal', function (event) {
            button = $(event.relatedTarget);
            category = button.data('category');
            var modal = $(this);
            modal.find('h3').text('Product Catalogue - ' + button.parent().find('h4').text());
            var input = '<div class="text-center">\n' +
                '                                <p>You must verify that you are our partner to view the product catalog.</p>\n' +
                '                                <input id="code" type="text" class="form-control" name="code" style="max-width: 200px; margin:0 auto" placeholder="Enter code">\n' +
                '                                <br>\n' +
                '                                <input id="verify" type="submit" class="btn btn-primary" value="Verify Now" data-category="">\n' +
                '                            </div>';
            modal.find('.modal-body-inner').html(input);
            $('.back-button').addClass('hide');
        });

        $('body').on('click', '#verify', function () {
            var code = $('#code').val();
            $.ajax({
                url: '/getCatalogue',
                type: 'post',
                data: {'_method': 'post', '_token': '<?php echo csrf_token() ?>', 'code': code, 'category': category},
                success: function (response) {
                    $('#portfolioModal1 .modal-body-inner').html(response.table);

                    var table = $('.advanced-table').dataTable({
                        "responsive": true,
                        "order": [],
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false,
                            "className": "text-center",
                        }]
                    });

                    if (table.length) {
                        new $.fn.dataTable.Buttons(table, {
                            buttons: [{
                                extend: 'pdfHtml5',
                                text: '<i class="fa fa-file-pdf-o"></i> Generate PDF',
                                title: 'Product Catalogue - ' + button.parent().find('h4').text(),
                                titleAttr: 'Generate PDF',
                                customize: function (doc) {
                                    doc.images = doc.images || {};
                                    for (var i = 1; i < doc.content[1].table.body.length; i++) {
                                        doc.content[1].table.body[i][2].width = 70;
                                        myGlyph.src = response.images[i - 1];
                                        delete doc.content[1].table.body[i][2].text;
                                        doc.content[1].table.body[i][2].image = getBase64Image(myGlyph);
                                    }
                                },
                                exportOptions: {
                                    stripHtml: false,
                                }
                            }]
                        }).container().appendTo('.table-tools');
                    }
                    $('.back-button').removeClass('hide');
                },
                error: function (errors) {
                    alert('Invalid Code!');
                }
            });
        });

        $('#mapModal').on('show.bs.modal', function (event) {
            button = $(event.relatedTarget);
            country = button.parent('li').index()+1;
            var modal = $(this);
            modal.find('h3').text('Partner - ' + button.text());
            var input = '<div class="text-center">\n' +
                '                                <p>You must verify that you are our partner to view the agent list.</p>\n' +
                '                                <input id="code2" type="text" class="form-control" name="code" style="max-width: 200px; margin:0 auto" placeholder="Enter code">\n' +
                '                                <br>\n' +
                '                                <input id="verify_for_agent" type="submit" class="btn btn-primary" value="Verify Now" data-category="">\n' +
                '                            </div>';
            modal.find('.modal-body-inner').html(input);
            $('.back-button').addClass('hide');
        });

        $('body').on('click', '#verify_for_agent', function () {
            var code = $('#code2').val();
            $.ajax({
                url: '/getAgent',
                type: 'post',
                data: {'_method': 'post', '_token': '<?php echo csrf_token() ?>', 'code': code, 'country': country},
                success: function (response) {
                    $('#mapModal .modal-body-inner').html(response);

                    $('.back-button').removeClass('hide');
                },
                error: function (errors) {
                    alert('Invalid Code!');
                }
            });
        });
    });
</script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/agency.js')}}"></script>
</body>
</html>
