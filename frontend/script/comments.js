function addComment(user, text) {
    let html = $(`<div class="comment">
                                    <div class="user-info">
                                        <div><img src="/shop/frontend/imgs/avatar.png"></div>
                                        <div class="username">${user.userName}</div>
                                    </div>
                                    <div class="text">${text}</div>
                                </div>`);

    $(" .comments-list #comments").append(html);
}

$(document).ready(function () {


    $.ajax({
        type: "GET",
        url: `?model=comment&action=index&product_id=${parseInt($("input[name=product_id]").val())}`,
        dataType: "json",
        success: function (comments) {
            for (let i in comments) {
                let comment = comments[i];

                let user = {
                    userName: comment.username,
                    avatar: comment.avatar,
                };

                addComment(user, comment.comment);
            }
        },
        error: function (result) {
            console.error(result);
        }
    });


    $("#comment-form").submit(function (event) {
        event.stopPropagation();

        const _self = $(this);

        let user = {
            userName: $(this).find('input[name=username]').val(),
            email: $(this).find('input[name=email]').val(),
        };
        let text = $(this).find('textarea[name=message]').val();
        let product_id = $(this).find('input[name=product_id]').val();
        let comment = {
            product_id: product_id,
            username: user.userName,
            email: user.email,
            avatar: user.avatar,
            text: text,
        };

        $.ajax({
            type: "POST",
            url: '?model=comment&action=create',
            data: comment,
            dataType: "json",
            success: function (response) {
                if (response && response.result === 'ok') {

                    console.warn(response)

                    addComment(user, text);

                    _self.find('input[name=username]').val('');
                    _self.find('input[name=email]').val('')
                    _self.find('textarea[name=message]').val('')

                }
            },
            error: function (result) {
                console.error(result);
            }
        });

        return false;
    })


    // $("#comments .comment").each(function () {
    //     console.log($(this).find('.text').text())
    // })
});
