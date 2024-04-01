<script>
$(document).ready(function() {
    $('#province').on('change', function() {
        var provinceID = $(this).val();

        if (provinceID) {
            $.ajax({
                url: 'ajax/ajax_get_district.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    provinceID: provinceID
                },
                success: function(data) {
                    $('#district').empty();

                    $.each(data, function(i, district) {
                        $('#district').append($('<option>', {
                            value: district.id,
                            text: district.name
                        }))
                    })
                    $('#award').empty();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
            $('#wards').empty();
        } else {
            $('$district').empty();
        }

    });
});
</script>