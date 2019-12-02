
                    
          
<!-- .//This variable get App\Providers\AppServiceProvider -->
          
              

            

        
            
 <script>

  $(document).ready(function () {

      // notice click event

    $('.notice').click(function () {
        
        // notice date and title, description

            var title= $(this).text();

            var date = $(this).attr('data-id');

            var description = $(this).attr('data-content');



            // notice header and body

            var notice_date = $('#notice_date');

            var notice_header = $('#notice_header');

            var notice_body = $('#notice_body');



            var notice_file = $('#notice_file');

            var notice_file_container = $('#notice_file_container');





            var file = $(this).attr('data-key');

            if(file==1){

                var file_path = $(this).attr('data-title');

        // remove hidden class

                notice_file_container.removeClass('hidden');

                notice_file.attr('href', file_path);

            }else{

                notice_file.removeAttr('href');

                notice_file_container.addClass('hidden');

      }





      // replace modal header and body

            notice_date.html('');

            notice_date.html(date);

            notice_header.html('');

            notice_header.html(title);

            notice_body.html('');

            notice_body.html(description);

        });

    });



</script>       