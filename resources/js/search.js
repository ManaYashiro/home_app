// //検索表示
$(function() {
    $('#searchButton').on('click', function() {
        var username = $('#input_username').val();
        console.log(username);

        $.ajax({
            url: '/search',
            method: 'GET',
            data: {
                username: username
            },
            success: function(response) {
                console.log(response);
                $('.search-error-message').empty();

                // 検索結果がある場合
                if (response && Object.keys(response).length > 0) {
                    $('#cohort_name').val(response.cohort_name);
                    $('#name').val(response.name);
                    $('#name_kana').val(response.name_kana);
                    $('#password').val(response.password);
                    $('#email').val(response.email);
                    $('#country').val(response.country);
                    $('#language').val(response.language);
                    $('#age').val(response.age);
                    $('#gender').val(response.gender);
                    $('#japanese_level').val(response.japanese_level);
                    $('#live_class_lesson').val(response.live_class_lesson);

                    // 更新用の見出しを表示し、新規用は非表示
                    $('#RegistrationUpdate').show();
                    $('#Registrationnew').hide();
                } else {
                    // 検索結果がない場合、新規用の見出しを表示し、更新用は非表示
                    $('#RegistrationUpdate').hide();
                    $('#Registrationnew').show();
                }
            },
            error: function() {
                alert('An error occurred while searching.');
            }
        });
    });
});

