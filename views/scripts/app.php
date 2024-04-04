<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>
    $(document).ready(function() {
        link = '<?= BASE_URL . '?action=ajax-district' ?>';
        console.log(link);
        $('#province').on('change', function() {
            let provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    url: link,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        id: provinceID
                    },
                    success: function(data) {
                        $('#district').empty();
                        $.each(data, function(index, district) {
                            $('#district').append($('<option>', {
                                value: district.id,
                                text: district.name
                            }));
                        });
                        $('#wards').empty();
                    }
                });
            } else {
                $('#district').empty();
                $('#wards').empty();
            }
        });

    });
    $(document).ready(function() {
        link2 = '<?= BASE_URL . '?action=ajax-ward' ?>';
        $('#district').on('change', function() {
            let districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    url: link2,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        id: districtID
                    },
                    success: function(data) {
                        $('#wards').empty();
                        $.each(data, function(index, ward) {
                            $('#wards').append($('<option>', {
                                value: ward.id,
                                text: ward.name
                            }));
                        });
                    }
                });
            } else {
                $('#wards').empty();
            }
        });
    });
</script>