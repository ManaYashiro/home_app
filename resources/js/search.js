$(function() {
    // 初期状態でのdisabled判定
    checkSearchButtonState();

    // 検索ボタンがクリックされた際に入力フィールドを有効化
    $('#searchButton').on('click', function() {
        $('#password').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#country').prop('disabled', false);
        $('#language').prop('disabled', false);
        $('#age').prop('disabled', false);
        $('#gender').prop('disabled', false);
        $('#japanese_level').prop('disabled', false);
        $('#live_class_lesson').prop('disabled', false);
    });

    // 検索フィールドの入力を監視してボタンの有効/無効を管理
    $('#input_username').on('input', function () {
        checkSearchButtonState();
    });

    // 検索ボタンの状態をチェックする関数
    function checkSearchButtonState() {
        var username = $('#input_username').val().trim();

        // 入力フィールドが空でない場合、ボタンを有効にする
        if (username !== '') {
            $('#searchButton').prop('disabled', false);
        } else {
            $('#searchButton').prop('disabled', true);
        }
    }

    // 検索ボタンを押すときの処理
    $('#searchButton').on('click', function() {
        var username = $('#input_username').val();

        $.ajax({
            url: '/search',
            method: 'GET',
            data: {
                username: username
            },
            success: function(response) {
                $('.search-error-message').empty(); // エラーメッセージをリセット
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

                    // 検索フィールドを無効化
                    $('#input_username').prop('disabled', true);

                    // 更新用の見出しを表示
                    $('#RegistrationUpdate').show();
                    $('#Registrationnew').hide();
                } else {
                    // 検索結果がない場合
                    $('#RegistrationUpdate').hide();
                    $('#Registrationnew').show();
                }
            },
            error: function(xhr) {
                var errorMsg = '検索中にエラーが発生しました。';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                $('.search-error-message').text(errorMsg);

                // 検索エラー時に入力フィールドを再度有効化
                $('#input_username').prop('disabled', false);
            }
        });
    });
});


