$(function() {
    const successMessage = $('#success-message');
    if (successMessage.length) {
        setTimeout(function() {
            successMessage.fadeOut(1000, function() { // 1000ms（1d秒）でフェードアウト
                $(this).remove(); // フェードアウト後に要素を削除
            });
        }, 3000); // 3秒後にフェードアウト開始
    }
});
