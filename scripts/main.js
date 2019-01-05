$(document).ready(() => {
    //DOM is fully loaded

    // Capitalize the first letter of Name
    $('#name').on('change', (e) => {
        let $this = $(this),
            val = $this.val();
        regex = /\b[a-z]/g;

        val = val.charAt(0).toUpperCase() + val.substr(1);
    });

    // Capitalize the first letter of Friend's Name
    $('#friend-name').on('change', (e) => {
        let $this = $(this),
            val = $this.val();
        regex = /\b[a-z]/g;

        val = val.charAt(0).toUpperCase() + val.substr(1);
    });

    //When form is submitted, grab data
    $('form').submit( (event) => {
                event.preventDefault();

                // Make the submit button load
                $('button').removeClass('btn-danger');
                $('button').toggleClass('btn-primary');
                $('button').html('Loading <span class="spinner"></span><i class="fa fa-spinner fa-spin"></i></span>');

                // put form data into letiables
                let name = $.trim(document.getElementById('name').value);
                let friendName = $.trim(document.getElementById('friendName').value);
                let phone = $.trim(document.getElementById('phone').value);

                let postData = `name=${name}&friendName=${friendName}&phone=${phone}`;

                // Send the Data to the Processor for processing
                $.ajax({
                    type: 'POST',
                    url: 'processor.php',
                    data: postData,
                    success: (result) => {
                        if(result == 'success') {
                            swal("Successfully Invited", "You friend has been invited to church", "success");
                            setTimeout(() => {
                                window.location = 'https://stbensonimoh.com/votage/invite'
                            }, 3000);
                        }
                    }
                });

    });

});