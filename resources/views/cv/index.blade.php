@extends ('layouts.layout')

@section('head')
    <title>{{ __('messages.page_name') }}</title>
    <meta name="description" content="{{ __('messages.page_name') }}"/>
    <link rel="canonical" href="{{ route('cv.index') }}">
@endsection

@section ('content')
<div class="container mt-3">
	<div class="container-fluid mb-2 divCenter">
		<div class="row">
			<div class="col-md-12 four justify-content-center">
				<h1>{{ __('messages.nav_cv') }}</h1>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col md-12">
            <h1>{{ __('messages.cv_name') }}</h1>
            <h2 class="cvH2">{{__('messages.cv_position') }}</h2>
						<a class="linkColor" target="_blank"
							 @if(App::isLocale('ru'))
							 href="/Yantsevich_Yulia-PHP-Developer_ru.pdf"
							 @elseif(App::isLocale('pl'))
							 href="/Jancewicz_Julia-Programista_PHP_pl.pdf"
							 @else
							 href="/Yantsevich_Yulia-PHP-Developer_en.pdf"
							 @endif
							 ><img class="downloadImg" alt="download" src="/img/download.png">{{ __('messages.cv_download') }}</a>
					<hr>
            <div class="row">
							<div class="col-md-6">
								<div class="cvMain">
									<b>{{__('messages.cv_tel') }}:</b> <a target="_blank" class="linkColor" href ="tel:+48793330740">+48 793-330-740</a>
									(<a target="_blank" href="https://t.me/Klipe_LD" class="linkColor"><span class="label">Telegram</span></a>,
									<a target="_blank" href="https://wa.me/48793330740" class="linkColor"><span class="label">WhatsApp</span></a>)
									<br>
									<b>E-mail:</b> <a target="_blank" class="linkColor" href ="mailto:contact@klipeld.pl">contact@klipeld.pl</a>
									<br>
									<b>Skype:</b> <a target="_blank" class="linkColor" href ="skype://klipe_ld?chat">KlipeLD</a>
									<br>
									<b>GitHub:</b> <a target="_blank" class="linkColor" href ="https://github.com/KlipeLD">KlipeLD</a>
									<br>
									<b>Bitbucket:</b> <a target="_blank" class="linkColor" href ="https://bitbucket.org/Klipe_LD/">Klipe_LD</a>
									<br>
									<b>LinkedIn:</b> <a target="_blank" class="linkColor" href="https://www.linkedin.com/in/klipe-ld/">klipe-ld</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="cvMain">
									<b class="text-decoration-underline">{{ __('messages.cv_languages') }}:</b><br>
									<b>{{ __('messages.cv_lang_ru') }}</b> — Native<br>
									<b>{{ __('messages.cv_lang_by') }}</b> — Native<br>
									<b>{{ __('messages.cv_lang_en') }}</b> — B2 — Upper Intermediate<br>
									<b>{{ __('messages.cv_lang_pl') }}</b> — C1 — Advanced<br>
								</div>
							</div>
							<hr class="mt-3">
							<div class="cvMain">
								<b class="text-decoration-underline">{{ __('messages.cv_about_me') }}:</b><br>
								{!! __('messages.cv_about_me_text') !!}
							</div>
							<hr class="mt-3">
							<div class="cvMain">
								<b class="text-decoration-underline">{{ __('messages.cv_education') }}:</b><br>
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_education_type') }}<br>
										2018<br>
									</div>
									<div class="col-md-10">
										<b>{{ __('messages.cv_university_name') }}</b>, {{ __('messages.cv_university_city') }}<br>
										{{ __('messages.cv_faculty') }}<br>
										<br>
										{{ __('messages.cv_speciality') }}<br>
									</div>
								</div>
							</div>
							<hr class="mt-3">
							<div class="cvMain">
								<b class="text-decoration-underline">{{ __('messages.cv_work_experience') }}:</b><br>
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_january') }} 2023 —<br>
										{{ __('messages.cv_april') }}<br>
										4 {{ __('messages.cv_months') }}<br>
									</div>
									<div class="col-md-10">
										<b>A.H.U. ADAR Dariusz Adamiec (Poland)</b><br>
										<b>Informatyk, PHP-Developer</b><br><br>
										• Projects on PHP 8 + Laravel 8<br>
										• Projects on VBA<br>
										• Projects on C#<br>
										(SQL(MySQL/SQLite/Microsoft SQL) + HTML + Javascript + JQuery + AJAX + Unix-hosting)<br>
									</div>
								</div>
								<hr class="hrRed">
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_may') }} 2021 —<br>
										{{ __('messages.cv_december') }} 2022<br>
										1 {{ __('messages.cv_year') }} 7 {{ __('messages.cv_months') }}<br>
									</div>
									<div class="col-md-10">
										<b>One Dollar Sp z o.o. (Poland)</b><br>
										<b>Informatyk, PHP-Developer</b><br><br>
										• Projects on PHP 8 + Laravel 8<br>
										• Projects on VBA<br>
										• Projects on C#<br>
										(SQL(MySQL/SQLite/Microsoft SQL) + HTML + Javascript + JQuery + AJAX + Unix-hosting)<br>
									</div>
								</div>
								<hr class="hrRed">
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_january') }} 2021 — <br>
										{{ __('messages.cv_may') }} 2021<br>
										4 {{ __('messages.cv_months') }}<br>
									</div>
									<div class="col-md-10">
										<b>KIO Technical Support (Serbia)</b><br>
										<b>PHP Developer</b><br><br>
										• Projects on pure PHP 5 - 7.4<br>
										• Projects on Laravel 7<br>
										(SQL(MySQL/Oracle) + HTML + Javascript + JQuery + AJAX + Windows-hosting).<br>
									</div>
								</div>
								<hr class="hrRed">
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_january') }} 2019 — <br>
										{{ __('messages.cv_january') }} 2022<br>
										3 {{ __('messages.cv_years') }}<br>
									</div>
									<div class="col-md-10">
										<b>OOO "Belspecavtoevakuaciya" (Minsk, Belarus)</b><br>
										<b>Network administrator (Developer)</b><br><br>
										• Writing a website belspecauto.by from scratch<br>
										(Tow truck ordering service, a platform for electronic auctions)<br>
										(pure php 5.6 -> 7.4 + SQL + HTML + Javascript + JQuery + Unix-hosting).<br>
										(Writing a website system.belspecauto.by from scratch<br>
										(Evacuation and storage of vehicles under Decree 36 and 348))<br>
										(php 8.0 + SQL(MySQL) + Laravel 8 + REST API + Javascript + JQuery + AJAX + Windows-hosting).<br>
										• Development chat-bots in Telegram/ Yandex.<br>
										• Development of modules for the 1C program.<br>
									</div>
								</div>
								<hr class="hrRed">
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_october') }} 2018 — <br>
										{{ __('messages.cv_september') }} 2019<br>
										1 {{ __('messages.cv_year') }}<br>
									</div>
									<div class="col-md-10">
										<b>ChUP "Poligrafkomponent" (Pleshchenitsy, Belarus)</b><br>
										<b>System administrator (Security specialist)</b><br><br>
										Building, configuration and troubleshooting of server and desktop hardware.( Windows Server 2012 R2).<br>
										Designing, implementing and managing Active Directory.<br>
										Development of modules for the 1C program.<br>
									</div>
								</div>
								<hr class="hrRed">
								<div class="row">
									<div class="col-md-2">
										{{ __('messages.cv_may') }} 2018 —<br>
										{{ __('messages.cv_january') }} 2019<br>
										9 {{ __('messages.cv_months') }}<br>
									</div>
									<div class="col-md-10">
										<b>ООО "Maksdrajv" (Minsk, Belarus)</b><br>
										<b>System administrator (PHP-Developer)</b><br><br>
										• Site administration on PHP(CMS Drupal 7, OpenCart 2.3, OpenCart 1.5)<br>
										• Writing/Connection/Editing modules for the above CMS<br>
										• Seo-promotion and optimization<br>
									</div>
								</div>
							</div>
						</div>
        </div>
    </div>
	</div>
<img src="/img/kodik.png" class="kodikImg" alt="Fail Site Studio - Kodik">
@endsection
