<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting Results</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    {{ HTML::style('css/styles.css'); }}

</head>

<body>
    <div class="container">

        <h1 class="text-center">Colors</h1>

        <p class="lead text-center center-block">
            Click on the Color Name to see how many votes for that color.
            Click on Total and the sum of all votes will show.
        </p>

        <table class="table center-block">
            <thead>
                <tr>
                    <td>Color</td>
                    <td>Votes</td>
                </tr>
            </thead>
            <tbody>

                @foreach($colors as $color)
                <tr data-color-id="{{ $color->id }}">
                    <td><a class="color-name" href="#">{{ $color->name }}</td>
                    <td class="votes" id="votes-for-color-id-{{ $color->id}}"></td>
                </tr>
                @endforeach

                <tr class="active">
                    <td><a id="calculate-total" href="#">Total</a></td>
                    <td id="total"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
    // click on color name
    $('table tr > td > a.color-name').click(
        function() {
            var $tr = $(this).parents('tr');
            var colorId = $tr.data('color-id');

            $.ajax({
                    url: 'votes/color-count/' + colorId,
                    }).done(function(msg) {
                        $tr.find('.votes').text(msg.votes);
                    });

            return false;

        });

    // calculate total
    $('#calculate-total').click(function() {
        var $dataRows=$("table td.votes");
        var total = 0;

        $dataRows.each(function() {
            var votes = parseInt($(this).text());
            if (votes >= 0) {
                total += votes;
            }
        });

        $('#total').text(total);
        $('#total').parents('tr').addClass('info');

        return false;

    });
});
</script>
