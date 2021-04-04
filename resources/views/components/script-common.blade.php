<!-- js -->
<script src="{{ asset('js/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('js/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('js/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('js/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('js/plugins/axios/dist/axios.js') }}"></script>
<script>
    $(document).ready(function (){
        let user_id = {!! session()->get('account.emp_id') !!} ;
        let url = '/api/message/';
        let currentMessage = [];
        let dataMessage = [];

        setInterval(function (){
            axios({
                method: 'get',
                url: url+user_id,
            }).then(function (res){
                dataMessage = res.data;
            }).catch(function (error){
                console.log(error);
            });

            if(dataMessage.length > 0){
                if(dataMessage.length > currentMessage.length){
                    $('.buzz').addClass('shake');
                    $('.user-notification .dropdown-toggle .badge').show().addClass('notification-active');
                }
                currentMessage = dataMessage;
                $('#message_render').html('');
                currentMessage.forEach(value => {
                    $('#message_render').append("<li>"+value.task_title+"</li>")
                })
            }else {
                $('#message_render').html('<li>No Message</li>');
            }
        },5000)

        $('.buzz').on('click',function (){
           $(this).removeClass('shake');
            $('.user-notification .dropdown-toggle .badge').hide().removeClass('notification-active');
        });
    })
</script>
