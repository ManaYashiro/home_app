//検索
$('#searchButton').on('click', function() {
    var username = $('#username').val();

    // サーバーにAJAXリクエストを送信
    $.ajax({
        url: '/search', // 検索を処理するルート
        type: 'GET',
        data: { username: username },
        success: function(response) {
            // 成功した場合の処理
            console.log(response); // レスポンスの構造を確認
            $('#results').empty(); // 前の結果をクリア
            if (response.length > 0) {
                response.forEach(function(item) {
                    $('#results').append('<div>' + item.username + '</div>'); // 必要に応じてカスタマイズ
                });
            }
        },
        error: function(xhr) {
            // エラー処理
            console.error(xhr.responseText);
            alert('ユーザー名の検索中にエラーが発生しました。');
        }
    });
});

//表示
$(function() {
    $('#searchButton').on('click', function() {
        var username = $('#username').val();

        $.ajax({
            url: '/search',
            method: 'GET',
            data: {
                username: username
            },
            success: function(response) {
                $('#errorMessages').empty();
                $('#errorMessages2').empty();
                $('#errorMessages3').empty();
                $('#errorMessages4').empty();
                $('#errorMessages5').empty();

                if (response) {
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
                }
            },
            error: function() {
                alert('An error occurred while searching.');
            }
        });
    });
});
