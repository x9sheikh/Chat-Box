//append();
var count = 0;

var id = null;
function send_message(reciever_ids){         // This function take a unique reciever id getting from friend list
    id = reciever_ids;
}

function check(recieve_id){
    if (id == null){
        id = document.getElementById('first_id').innerHTML;
        if (count == 0){
            count = count +1;
            send();
        }

    }
    else {
        if (count == 0){
            count = count +1;
            send();
        }
    }
}

function send() {
    jQuery('#send_message_'+id).click(function (e) {
        e.preventDefault();
        //append();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        jQuery.ajax({
            url: '/store',
            method: 'post',
            data: {
                sender_id: document.getElementById('sender_id').innerHTML,
                reciever_id: id,
                text: jQuery('#send_message_text_'+id).val(),
            },
            dataType: "json",
            success: function (data) {
                console.log('success: ' + data.flash_message);
                $('#send_message_text_'+id).val("");
                append();
            },
            error: function (data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });

    });

}



function append() {
    let sender_id = document.getElementById('my_turn_id').innerHTML;
    alert(sender_id)
    if (sender_id == 0){
        $('#append').append('<li></li><li>\n' +
            '                                                                <div class="content">\n' +
            '                                                                    <div class="message">\n' +
            '                                                                        <div class="bubble">\n' +
            '                                                                            <p>00000{{$chat_list_detail[$i]->text}}, ( {{$chat_list_detail[$i]->sender_id}} )</p>\n' +
            '                                                                        </div>\n' +
            '                                                                    </div>\n' +
            '                                                                    <span>{{$chat_list_detail[$i]->created_at}}</span>\n' +
            '                                                                </div>\n' +
            '                                                            </li>');
    }
    else {
        $('#append').append('<li></li><li>\n' +
            '                                                                <div class="content">\n' +
            '                                                                    <div class="message">\n' +
            '                                                                        <div class="bubble">\n' +
            '                                                                            <p>1111{{$chat_list_detail[$i]->text}}, ( {{$chat_list_detail[$i]->sender_id}} )</p>\n' +
            '                                                                        </div>\n' +
            '                                                                    </div>\n' +
            '                                                                    <span>{{$chat_list_detail[$i]->created_at}}</span>\n' +
            '                                                                </div>\n' +
            '                                                            </li>');
    }
}

