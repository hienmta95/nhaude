<script type="text/javascript">
    var public_lang = "{{ trans('backLang.calendarLanguage') }}"; // this is a public var used in app.html.js to define path to js files
    var public_folder_path = "/public"; // this is a public var used in app.html.js to define path to js files
</script>
<script src="{{ nhaude_asset('backEnd/scripts/app.html.js') }}"></script>
{!! Helper::SaveVisitorInfo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") !!}