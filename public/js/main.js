
    $('input#amount_to_change').on('keyup', function () {


        let amount   = $('input#amount_to_change').val();
        let currency = $( "#myselect" ).val();
        let total_amount = 0;
        let formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: currency,
            });

     

    if (amount) {

        if (currency == 'USD') {

            total_amount  = parseInt(amount) * 0.96;
            console.log(total_amount);

        } else if(currency == 'KES'){

            total_amount  = parseInt(amount) * 115;
            console.log(total_amount);

        }else if(currency == 'EUR'){

            total_amount  = parseInt(amount) * 0.88;
            console.log(total_amount);

        }else if(currency == 'GBP'){

            total_amount  = parseInt(amount) * 0.78;
            console.log(total_amount);

        }else if(currency == 'GHS'){

            total_amount  = parseInt(amount) * 5.95;
            console.log(total_amount);

        } else {

            total_amount  = parseInt(amount) * 485;
            console.log(total_amount);
        }

    }

       
        let _html = formatter.format(total_amount);
        
        $('#total_amount_to_pay').html(_html);




    });


   

   //Other function 




    $('#myselect').on('change', function () {


        let amount   = $('input#amount_to_change').val();
        let currency = $( "#myselect" ).val();
        let total_amount = 0;
        let formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: currency,
            });

     

    if (amount) {

        if (currency == 'USD') {

            total_amount  = parseInt(amount) * 0.96;
            console.log(total_amount);

        } else if(currency == 'KES'){

            total_amount  = parseInt(amount) * 116;
            console.log(total_amount);

        }else if(currency == 'EUR'){

            total_amount  = parseInt(amount) * 0.88;
            console.log(total_amount);

        }else if(currency == 'GBP'){

            total_amount  = parseInt(amount) * 0.78;
            console.log(total_amount);

        }else if(currency == 'GHS'){

            total_amount  = parseInt(amount) * 5.9;
            console.log(total_amount);

        } else {

            total_amount  = parseInt(amount) * 485;
            console.log(total_amount);
        }

    }

       
        let _html = formatter.format(total_amount);
        
        $('#total_amount_to_pay').html(_html);




    });

v