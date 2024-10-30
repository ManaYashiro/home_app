
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
                $('#select_username').empty();
                $('#select_username').append('<option value="">選択してください</option>');
                response.forEach(function(item) {
                    $('#select_username').append(new Option(item.username));
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
    $('#select_username').on('change', function() {
        var username = $('#select_username').val();

        $.ajax({
            url: '/select_user',
            method: 'GET',
            data: {
                username: username
            },
            success: function(response) {
                $('#errorMessages2').empty();
                $('#errorMessages3').empty();
                $('#errorMessages4').empty();
                $('#errorMessages5').empty();

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
                }
            },
            error: function() {
                alert('An error occurred while searching.');
            }
        });
    });

    // disabled判定
    $('#select_username').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断
        $('#input_username').prop('disabled', isSelected); // 選択されていれば無効化
        $('#searchButton').prop('disabled', isSelected); // 選択されていれば無効化
    });

    // disabled判定
    $('#input_username').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断

        $('#select_username').prop('disabled', isSelected); // 選択されていれば無効化
    });

    //削除
    $('#delete-certificate-button').on('click', function(event) {
        event.preventDefault(); // デフォルトの動作を防ぐ
        const userName = $('#select_username').val() || $('#input_username').val();

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
