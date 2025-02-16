<select class="form-control col-md-10 select2" id="part1" name="part1">
    <option disabled selected>-- Pilih --</option>
</select>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script>
    $(document).ready(function() {
        $('#part1').select2({
            ajax: {
                url: '/suku-cadang/json',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function(data) {
                    console.log(data); // Debug data
                    return {
                        results: data,
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            placeholder: 'Pilih suku cadang',
            templateResult: function(item) {
                return item.text;
            },
            templateSelection: function(item) {
                return item.text;
            }
        });
    });
</script>