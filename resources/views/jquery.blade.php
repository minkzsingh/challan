<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" href="{{ asset('/css/style.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/css/app.css')}}" rel="stylesheet">
</head>
<style>

</style>

<body>
    <div class="calculator">
        <form>
            <div class="form-group">
                <h1 class="text-center display-4 font-primary h"><em>Calci</em></h1>
                <input type="text" class="calc-display font" style="font-size:50px;color: #495057;" value="0" readonly>
            </div>

        </form>
        <table class="font">
            <tr>
                <td><input type="button" value="C" onclick="clr();"></td>
                <td><input type="button" value="/" onclick="clr()"></td>
                <td><input type="button" value="<" onclick="del(7)"></td>
                <td><input type="button" value="*" onclick="insert('*')"></td>
            </tr>
            <tr>
                <td><input type="button" value="7" onclick="insert(7)"></td>
                <td><input type="button" value="8" onclick="insert(8)"></td>
                <td><input type="button" value="9" onclick="insert(9)"></td>
                <td><input type="button" value="-" onclick="insert('-')"></td>
            </tr>
            <tr>
                <td><input type="button" value="6" onclick="insert(6)"></td>
                <td><input type="button" value="5" onclick="insert(5)"></td>
                <td><input type="button" value="4" onclick="insert(4)"></td>
                <td><input type="button" value="+" onclick="insert('+')"></td>
            </tr>
            <tr>
                <td><input type="button" value="3" onclick="insert(3)"></td>
                <td><input type="button" value="2" onclick="insert(2)"></td>
                <td><input type="button" value="1" onclick="insert(1)"></td>
                <td rowspan="2"><input type="button" style="height:120px;" value="=" onclick=" eq()"></td>
            </tr>
            <tr>
                <td><input type="button" value="00" onclick="insert('00')"></td>
                <td><input type="button" value="0" onclick="insert(0)"></td>
                <td><input type="button" value="." onclick="insert('.')"></td>
            </tr>

        </table>
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {


        console.log('Ready')


    });

    function eq() {
        $('.calc-display').val(eval($('.calc-display').val()));
    }

    function insert(num) {
        if ($('.calc-display').val() == 0) {
            $('.calc-display').val('');
        }

        $('.calc-display').val($('.calc-display').val() + num)
    }

    function clr() {
        $('.calc-display').val(0);
    }
    </script>
</body>

</html>