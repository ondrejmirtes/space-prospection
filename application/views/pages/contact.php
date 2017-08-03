<div id="body">
    <div class="header">
        <div class="contact">
            <h1>Contact</h1>
            <h2>DO NOT HESITATE TO CONTACT US</h2>
            <form>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="" 
                    placeholder="Name" 
                > 
                <input 
                    type="text"  
                    name="email" 
                    id="email" 
                    value="" 
                    placeholder="Email Address" 
                > 
                <input 
                    type="text" 
                    name="subject" 
                    id="subject" 
                    value="" 
                    placeholder="Subject"
                >
                <textarea 
                    name="message" 
                    id="message" 
                    cols="50" 
                    rows="7"
                    placeholder="Message"
                ></textarea>
                <input type="button" value="Send" id="submit">
            </form>
            <div id="alert-mesage"></div>
            <script>
                $('#submit').click(function()
                {
                    var form_data = {
                        name:    $('#name').val(),
                        email:   $('#email').val(),
                        subject: $('#subject').val(),
                        message: $('#message').val()
                    };
                    $.ajax(
                    {
                        url: '<?=site_url('ajax/submit/contact_form');?>',
                        type: 'POST',
                        data: form_data,
                        success: function(message)
                        {
                            if(message == 'YES')
                            {
                                alert('Mail is successfully sent.');
                                $('#alert-mesage').html('<div class="alert alert-danger"></div>');
                                $('#name').val('');
                                $('#email').val('');
                                $('#subject').val('');
                                $('#message').val('');
                            }
                            else if (message == 'NO')
                            {
                                alert('Mail has not been sent!');
                                $('#alert-mesage').html('<div class="alert alert-danger"></div>');
                                $('#name').val('');
                                $('#email').val('');
                                $('#subject').val('');
                                $('#message').val(''); 
                            }
                            else
                            {
                                //alert(message);
                                $('#alert-mesage').html('<div class="alert alert-danger">' + message + '</div>');
                            }
                        },
                        error: function()
                        {
                            alert('ERROR');
                        }
                    }
                    );
                    return false;
                });
            </script>
        </div>
    </div>
</div>