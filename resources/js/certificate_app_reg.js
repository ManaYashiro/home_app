
$(function() {
    // 期名称を選択した時
    $('#cohort_name').on('change',function(){
        var cohort_name = $('#cohort_name').val();
        $.ajax({
            url: '/search_user', // 検索を処理するルート
            type: 'GET',
            data: { cohort_name: cohort_name },
            success: function(response) {
                // 成功した場合の処理
                $('#select_username_id').empty();
                $('#select_username_id').append('<option value=""></option>');
                response.forEach(function(item) {
                    $('#select_username_id').append(new Option(item.username,item.id));
                });
            },
            error: function(xhr) {
                // エラー処理
                console.error(xhr.responseText);
                alert('ユーザー名の検索中にエラーが発生しました。');
            }
        });
    });

    //表示
    $('#select_username_id').on('change', function() {
        var username_id = $('#select_username_id').val();
        $.ajax({
            url: '/select_user',
            method: 'GET',
            data: {
                username_id: username_id
            },
            success: function(response) {
                $('.search-error-message').empty();
                $('#password').prop('disabled', false);
                $('#email').prop('disabled', false);
                $('#country').prop('disabled', false);
                $('#language').prop('disabled', false);
                $('#age').prop('disabled', false);
                $('#gender').prop('disabled', false);
                $('#japanese_level').prop('disabled', false);
                $('#live_class_lesson').prop('disabled', false);

                if (response) {
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
                }
            },
            error: function() {
            }
        });
    });

    // disabled判定(select)
    $('#select_username_id').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断
        $('#input_username').prop('disabled', isSelected); // 選択されていれば無効化
        $('#searchButton').prop('disabled', isSelected); // 選択されていれば無効化
    });

    // disabled判定(input)
    $('#input_username').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断
        $('#select_username_id').prop('disabled', isSelected); // 選択されていれば無効化
    });

    // 検索disabled判定
    $('#input_username').on('input', function () {
        // 入力フィールドが空でない場合、ボタンを有効にする
        if ($(this).val().trim() !== '') {
            $('#searchButton').prop('disabled', false);
        } else {
            $('#searchButton').prop('disabled', true);
        }
    });

    //検索を押すまでdisabled判定
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

    //入力データ全てリセット
    $('#resetButton').on('click', function() {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断
        $('#input_username').prop('disabled', isSelected); // 選択されていれば無効化
        $('#select_username_id').prop('disabled', isSelected); // 選択されていれば無効化
        $('.search-error-message').empty();
        $('#cohort_name').val('');
        $('#name').val('');
        $('#name_kana').val('');
        $('#username').val('');
        $('#select_username_id').val('');
        $('#input_username').val('');
        $('#password').val('');
        $('#email').val('');
        $('#country').val('');
        $('#language').val('');
        $('#age').val('');
        $('#gender').val('');
        $('#japanese_level').val('');
        $('#live_class_lesson').val('');

        // リセット時に再度disabledを設定
        $('#password').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#country').prop('disabled', true);
        $('#language').prop('disabled', true);
        $('#age').prop('disabled', true);
        $('#gender').prop('disabled', true);
        $('#japanese_level').prop('disabled', true);
        $('#live_class_lesson').prop('disabled', true);

        //リセット時は新規登録に切り替え
        $('#RegistrationUpdate').hide();
        $('#Registrationnew').show();
    });

    //削除
    $('#delete-certificate-button').on('click', function(event) {
        event.preventDefault(); // デフォルトの動作を防ぐ
        const userName = $('#select_username_id').val() || $('#input_username').val();
        if (!userName) {
            alert('削除するユーザー名をを選択してください');
            return;
        }
        // 隠しフィールドに値を設定
        $('#certificate_name_to_delete').val(userName);
        // 削除フォームを送信
        $('#delete-certificate-form').submit();
    });
});
