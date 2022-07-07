    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <script src="{{ asset('js/popup.js') }}" defer></script>
    <div class="overlay_popup"></div>
    <div class="popup" id="popup1">
        <div class="object">
            @include('components.calendar-full')
{{--            <form action= "" method= "">--}}
{{--                <p>Имя: </p>--}}
{{--                <p><input type= "text" name= "name"></p>--}}
{{--                <p>E-mail: </p><p> <input type= "text" name= "email"></p>--}}
{{--                <p>Сообщение: </p>--}}
{{--                <p><textarea rows= "10" cols= "45" name= "message"></textarea></p>--}}
{{--                <input type= "submit" value= "Отправить">--}}
{{--            </form>--}}
            <a onclick="$('#popup1').popup('hide')" href="javascript:void(0);">close</a>
        </div>

    </div>

