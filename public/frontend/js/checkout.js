$(document).ready(function () { 
    $('.razorpay_btn').click(function (e) { 
        e.preventDefault();
        
        
        var firstname = $('.firstname').val();
        var lastname = $('.lname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();

        if(!firstname) {
            fname_error = "First Name is required";
            $('#fname_error').html(''); // This line might be incorrect, see below
            $('#fname_error').html(fname_error);
        }else{
            fname_error = "";
            $('#fname_error').html('');
        }

        if(!lastname) {
            lname_error = "Last Name is required";
            $('#lname_error').html(''); 
            $('#lname_error').html(lname_error);
        }else{
            lname_error = "";
            $('#lname_error').html('');
        }

        if(!email) {
            email = "Email is required";
            $('#email_error').html(''); // This line might be incorrect, see below
            $('#email_error').html(email_error);
        }else{
            email = "";
            $('#email_error').html('');
        }

        if(!phone) {
            phone = "Phone is required";
            $('#phone_error').html(''); // This line might be incorrect, see below
            $('#phone_error').html(phone_error);
        }else{
            phone = "";
            $('#phone_error').html('');
        }

        if(!address1) {
            address1 = "Address 1  is required";
            $('#address1_error').html(''); // This line might be incorrect, see below
            $('#address1_error').html(address1_error);
        }else{
            address1 = "";
            $('#address1_error').html('');
        }

        if(!address2) {
            address2 = "Address 2 is required";
            $('#address2_error').html(''); // This line might be incorrect, see below
            $('#address2_error').html(address2_error);
        }else{
            address2 = "";
            $('#address2_error').html('');
        }

        if(!city) {
            city = "city is required";
            $('#city_error').html(''); // This line might be incorrect, see below
            $('#city_error').html(city_error);
        }else{
            city = "";
            $('#city_error').html('');
        }

        if(!state) {
            state = "state is required";
            $('#state_error').html(''); // This line might be incorrect, see below
            $('#state_error').html(state_error);
        }else{
            state = "";
            $('#state_error').html('');
        }

        if(!country) {
            country = "country is required";
            $('#country_error').html(''); // This line might be incorrect, see below
            $('#country_error').html(country_error);
        }else{
            country = "";
            $('#country_error').html('');
        }

        if(!pincode) {
            pincode = "pincode is required";
            $('#pincode_error').html(''); // This line might be incorrect, see below
            $('#pincode_error').html(pincode_error);
        }else{
            pincode = "";
            $('#pincode_error').html('');
        }

        if(fname_error !='' || lname_error !='' || email_error !='' || phone_error !='' || address1_error !='' || address2_error !='' || city_error !='' || country_error !='' || state_error !='' || pincode_error !='')
        {
            return false;
        }
        else
        {
            var data = {
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'phone': phone,
                'address1': address1,
                'address2': address2,
                'city': city,
                'state': state,
                'country': country,
                'pincode': pincode
            };
            
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    
                    var options = {
                        "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                        "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Acme Corp", //your business name
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                            "name": "Gaurav Kumar", //your customer's name
                            "email": "gaurav.kumar@example.com",
                            "contact": "9000090000" //Provide the customer's phone number for better conversion rates 
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();

                }
            });
        }
    });
});