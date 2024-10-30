
$(function() {
    // 期名称を選択した時
    $('#certificate_name').on('change',function(){
        var certificate_name = $('#certificate_name').val();
        $.ajax({
            url: '/search_user', // 検索を処理するルート
            type: 'GET',
            data: { certificate_name: certificate_name },
            success: function(response) {
                // 成功した場合の処理
                console.log(response); // レスポンスの構造を確認
                $('#username2').empty();
                $('#username2').append('<option value="">選択してください</option>');
                response.forEach(function(item) {
                    $('#username2').append(new Option(item.username));
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
        $('#username2').on('change', function() {
            var username = $('#username2').val();

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
    $('#username2').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断
        $('#username').prop('disabled', isSelected); // 選択されていれば無効化
        $('#searchButton').prop('disabled', isSelected); // 選択されていれば無効化
    });
    // disabled判定
    $('#username').on('change', function () {
        const isSelected = $(this).val() !== ''; // 空でない場合は選択されていると判断

        $('#username2').prop('disabled', isSelected); // 選択されていれば無効化
    });

    //削除
    $('#delete-certificate-button').on('click', function(event) {
        event.preventDefault(); // デフォルトの動作を防ぐ
        const userName = $('#username2').val() || $('#username').val();

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
